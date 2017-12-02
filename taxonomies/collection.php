<?php
// Register Custom Taxonomy
function custom_boilierplate_taxonomy_collection() {

	$labels = array(
		'name'                       => _x( 'Collections', 'Taxonomy General Name', 'collection' ),
		'singular_name'              => _x( 'Collection', 'Taxonomy Singular Name', 'collection' ),
		'menu_name'                  => __( 'Collections', 'collection' ),
		'all_items'                  => __( 'All Items', 'collection' ),
		'parent_item'                => __( 'Parent Item', 'collection' ),
		'parent_item_colon'          => __( 'Parent Item:', 'collection' ),
		'new_item_name'              => __( 'New Item Name', 'collection' ),
		'add_new_item'               => __( 'Add New Item', 'collection' ),
		'edit_item'                  => __( 'Edit Item', 'collection' ),
		'update_item'                => __( 'Update Item', 'collection' ),
		'view_item'                  => __( 'View Item', 'collection' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'collection' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'collection' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'collection' ),
		'popular_items'              => __( 'Popular Items', 'collection' ),
		'search_items'               => __( 'Search Items', 'collection' ),
		'not_found'                  => __( 'Not Found', 'collection' ),
		'no_terms'                   => __( 'No items', 'collection' ),
		'items_list'                 => __( 'Items list', 'collection' ),
		'items_list_navigation'      => __( 'Items list navigation', 'collection' ),
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
		// 'rest_base'          => 'bond-collections',
	);
	register_taxonomy( 'collection', array( 'item-post-type' ), $args );

}
add_action( 'init', 'custom_boilierplate_taxonomy_collection', 0 );
