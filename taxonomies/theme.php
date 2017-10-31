<?php
// Register Custom Taxonomy
function custom_boilierplate_taxonomy_document_type() {

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
	);
	register_taxonomy( 'theme', array( 'item-post-type' ), $args );

}
add_action( 'init', 'custom_boilierplate_taxonomy_document_type', 0 );
