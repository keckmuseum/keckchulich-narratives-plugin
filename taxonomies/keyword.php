<?php
// Register Custom Taxonomy
function custom_boilierplate_taxonomy_keyword() {

	$labels = array(
		'name'                       => _x( 'Keywords', 'Taxonomy General Name', 'keyword' ),
		'singular_name'              => _x( 'Keyword', 'Taxonomy Singular Name', 'keyword' ),
		'menu_name'                  => __( 'Keywords', 'keyword' ),
		'all_items'                  => __( 'All Items', 'keyword' ),
		'parent_item'                => __( 'Parent Item', 'keyword' ),
		'parent_item_colon'          => __( 'Parent Item:', 'keyword' ),
		'new_item_name'              => __( 'New Item Name', 'keyword' ),
		'add_new_item'               => __( 'Add New Item', 'keyword' ),
		'edit_item'                  => __( 'Edit Item', 'keyword' ),
		'update_item'                => __( 'Update Item', 'keyword' ),
		'view_item'                  => __( 'View Item', 'keyword' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'keyword' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'keyword' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'keyword' ),
		'popular_items'              => __( 'Popular Items', 'keyword' ),
		'search_items'               => __( 'Search Items', 'keyword' ),
		'not_found'                  => __( 'Not Found', 'keyword' ),
		'no_terms'                   => __( 'No items', 'keyword' ),
		'items_list'                 => __( 'Items list', 'keyword' ),
		'items_list_navigation'      => __( 'Items list navigation', 'keyword' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'       => true,
		// 'rest_base'          => 'bond-keywords',
	);
	register_taxonomy( 'keyword', array( 'item-post-type' ), $args );

}
add_action( 'init', 'custom_boilierplate_taxonomy_keyword', 0 );
