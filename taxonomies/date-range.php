<?php
// Register Custom Taxonomy
function custom_boilierplate_taxonomy_date_range() {

	$labels = array(
		'name'                       => _x( 'Date Ranges', 'Taxonomy General Name', 'date-range' ),
		'singular_name'              => _x( 'Date Range', 'Taxonomy Singular Name', 'date-range' ),
		'menu_name'                  => __( 'Date Ranges', 'date-range' ),
		'all_items'                  => __( 'All Items', 'date-range' ),
		'parent_item'                => __( 'Parent Item', 'date-range' ),
		'parent_item_colon'          => __( 'Parent Item:', 'date-range' ),
		'new_item_name'              => __( 'New Item Name', 'date-range' ),
		'add_new_item'               => __( 'Add New Item', 'date-range' ),
		'edit_item'                  => __( 'Edit Item', 'date-range' ),
		'update_item'                => __( 'Update Item', 'date-range' ),
		'view_item'                  => __( 'View Item', 'date-range' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'date-range' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'date-range' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'date-range' ),
		'popular_items'              => __( 'Popular Items', 'date-range' ),
		'search_items'               => __( 'Search Items', 'date-range' ),
		'not_found'                  => __( 'Not Found', 'date-range' ),
		'no_terms'                   => __( 'No items', 'date-range' ),
		'items_list'                 => __( 'Items list', 'date-range' ),
		'items_list_navigation'      => __( 'Items list navigation', 'date-range' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'           => array('slug' => 'bonds/date-range','with_front' => false),
		'show_in_rest'       => true,
		// 'rest_base'          => 'bond-Date Ranges',
	);
	register_taxonomy( 'date-range', array( 'item-post-type' ), $args );

}
add_action( 'init', 'custom_boilierplate_taxonomy_date_range', 0 );
