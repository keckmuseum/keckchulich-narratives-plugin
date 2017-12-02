<?php
// Register Custom Taxonomy
function custom_boilierplate_taxonomy_region() {

	$labels = array(
		'name'                       => _x( 'Regions', 'Taxonomy General Name', 'region' ),
		'singular_name'              => _x( 'Region', 'Taxonomy Singular Name', 'region' ),
		'menu_name'                  => __( 'Regions', 'region' ),
		'all_items'                  => __( 'All Items', 'region' ),
		'parent_item'                => __( 'Parent Item', 'region' ),
		'parent_item_colon'          => __( 'Parent Item:', 'region' ),
		'new_item_name'              => __( 'New Item Name', 'region' ),
		'add_new_item'               => __( 'Add New Item', 'region' ),
		'edit_item'                  => __( 'Edit Item', 'region' ),
		'update_item'                => __( 'Update Item', 'region' ),
		'view_item'                  => __( 'View Item', 'region' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'region' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'region' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'region' ),
		'popular_items'              => __( 'Popular Items', 'region' ),
		'search_items'               => __( 'Search Items', 'region' ),
		'not_found'                  => __( 'Not Found', 'region' ),
		'no_terms'                   => __( 'No items', 'region' ),
		'items_list'                 => __( 'Items list', 'region' ),
		'items_list_navigation'      => __( 'Items list navigation', 'region' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'           => array('slug' => 'bonds/region','with_front' => false),
		'show_in_rest'       => true,
		// 'rest_base'          => 'bond-Regions',
	);
	register_taxonomy( 'region', array( 'item-post-type' ), $args );

}
add_action( 'init', 'custom_boilierplate_taxonomy_region', 0 );
