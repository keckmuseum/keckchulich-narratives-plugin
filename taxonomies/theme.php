<?php
// Register Custom Taxonomy
function custom_boilierplate_taxonomy_theme() {

	$labels = array(
		'name'                       => _x( 'Themes', 'Taxonomy General Name', 'theme' ),
		'singular_name'              => _x( 'Theme', 'Taxonomy Singular Name', 'theme' ),
		'menu_name'                  => __( 'Themes', 'theme' ),
		'all_items'                  => __( 'All Items', 'theme' ),
		'parent_item'                => __( 'Parent Item', 'theme' ),
		'parent_item_colon'          => __( 'Parent Item:', 'theme' ),
		'new_item_name'              => __( 'New Item Name', 'theme' ),
		'add_new_item'               => __( 'Add New Item', 'theme' ),
		'edit_item'                  => __( 'Edit Item', 'theme' ),
		'update_item'                => __( 'Update Item', 'theme' ),
		'view_item'                  => __( 'View Item', 'theme' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'theme' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'theme' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'theme' ),
		'popular_items'              => __( 'Popular Items', 'theme' ),
		'search_items'               => __( 'Search Items', 'theme' ),
		'not_found'                  => __( 'Not Found', 'theme' ),
		'no_terms'                   => __( 'No items', 'theme' ),
		'items_list'                 => __( 'Items list', 'theme' ),
		'items_list_navigation'      => __( 'Items list navigation', 'theme' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'           => array('slug' => 'bonds/theme','with_front' => false),
		'show_in_rest'       => true,
		// 'rest_base'          => 'bond-themes',
	);
	register_taxonomy( 'theme', array( 'item-post-type' ), $args );

}
add_action( 'init', 'custom_boilierplate_taxonomy_theme', 0 );


add_action( 'theme_add_form_fields', 'custom_boilerplate_add_form_fields', 10, 2 );
function custom_boilerplate_add_form_fields($term_id) {
    ?><div class="form-field term-group">
        <label for="theme-featured">Featured:</label>
        <input type="checkbox" id="theme-featured" name="theme-featured" />
    </div>
		<div class="form-field term-group">
        <label for="theme-button-label">Button Label:</label>
        <input type="text" id="theme-button-label" name="theme-button-label" />
    </div>
		<div class="form-field term-group">
        <label for="theme-button-image">Button Image1:</label>
        <input type="text" id="theme-button-image" name="theme-button-image" />
    </div>
 	 </div><?php
}

add_action( 'created_theme', 'custom_boilerplate_save_taxonomy_meta', 10, 2 );

function custom_boilerplate_save_taxonomy_meta( $term_id, $tt_id ){
    if( isset( $_POST['theme-featured'] ) && '' !== $_POST['theme-featured'] ){
        $group = sanitize_title( $_POST['theme-featured'] );
        add_term_meta( $term_id, 'theme-featured', $group, true );
    }
		if( isset( $_POST['theme-button-label'] ) && '' !== $_POST['theme-button-label'] ){
        $group = sanitize_text_field( $_POST['theme-button-label'] );
        add_term_meta( $term_id, 'theme-button-label', $group, true );
    }
		if( isset( $_POST['theme-button-image'] ) && '' !== $_POST['theme-button-image'] ){
        $group = sanitize_file_name( $_POST['theme-button-image'] );
        add_term_meta( $term_id, 'theme-button-image', $group, true );
    }
}

add_action( 'theme_edit_form_fields', 'custom_boilerplate_edit_taxonomy_meta', 10, 2 );

function custom_boilerplate_edit_taxonomy_meta( $term, $taxonomy ){

    ?><div class="form-field term-group">
        <label for="theme-featured">Featured:</label>
        <input type="checkbox" id="theme-featured" name="theme-featured"<?php echo (get_term_meta( $term->term_taxonomy_id,'theme-featured')[0])? ' checked="checked"' : '' ; ?> />
	    </div>
			<div class="form-field term-group">
	        <label for="theme-button-label">Button Label:</label>
	        <input type="text" id="theme-button-label" name="theme-button-label" value="<?php echo (get_term_meta( $term->term_taxonomy_id,'theme-button-label')[0])? get_term_meta( $term->term_taxonomy_id,'theme-button-label')[0] : '' ; ?>" />
	    </div>
			<div class="form-field term-group">
	        <label for="theme-button-image">Button Image:</label>
					<?php if(get_term_meta( $term->term_taxonomy_id,'theme-button-image')) { ?>
	          <img src="<?php echo get_term_meta( $term->term_taxonomy_id,'theme-button-image')[0]; ?>" alt="" />
	        <?php } else {
						echo 'nope';
					}?>
	        <input type="text" id="theme-button-image" name="theme-button-image" value="<?php echo (get_term_meta( $term->term_taxonomy_id,'theme-button-image')[0])? get_term_meta( $term->term_taxonomy_id,'theme-button-image')[0] : '' ; ?>" />

					<?php
					// if($image = get_term_meta( $term->term_taxonomy_id,'theme-button-image')[0]) {
					// 	$imgArray = wp_prepare_attachment_for_js($image); ?>
						<!-- <div style="width:30%; height:auto; display:inline-block;" class="image-chooser">
							<img
								style="width:100%; height:auto;"
								src="<?php // echo $imgArray['url']; ?>"
								alt="<?php // echo $imgArray['alt']; ?>"
								id="theme-button-image-img"
							/>

							<input
								value="<?php // if ($image != '') echo $image ?>"
								type="hidden"
								id="theme-button-image"
								name="theme-button-image"
							/>
						</div> -->
					<? // } ?>
					<!-- <a href="#choose-media">Choose image</a> -->
	    </div>
		<?php
}

add_action( 'edited_theme', 'custom_boilerplate_update_taxonomy', 10, 2 );

function custom_boilerplate_update_taxonomy( $term_id, $tt_id ){

    if( isset( $_POST['theme-featured'] ) && '' !== $_POST['theme-featured'] ){
        $group = sanitize_title( $_POST['theme-featured'] );
        update_term_meta( $term_id, 'theme-featured', $group );
    } else {
			delete_term_meta( $term_id, 'theme-featured' );
		}
		if( isset( $_POST['theme-button-label'] ) && '' !== $_POST['theme-button-label'] ){
        $group = sanitize_text_field( $_POST['theme-button-label'] );
        update_term_meta( $term_id, 'theme-button-label', $group );
    } else {
			delete_term_meta( $term_id, 'theme-button-label' );
		}
		if( isset( $_POST['theme-button-image'] ) && '' !== $_POST['theme-button-image'] ){
        $group = $_POST['theme-button-image'];
        update_term_meta( $term_id, 'theme-button-image', $group );
    } else {
			delete_term_meta( $term_id, 'theme-button-image' );
		}
}
