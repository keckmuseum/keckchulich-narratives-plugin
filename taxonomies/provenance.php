<?php
// Register Custom Taxonomy
function custom_boilierplate_taxonomy_provenance() {

	$labels = array(
		'name'                       => _x( 'Provenances', 'Taxonomy General Name', 'provenance' ),
		'singular_name'              => _x( 'Provenance', 'Taxonomy Singular Name', 'provenance' ),
		'menu_name'                  => __( 'Provenances', 'provenance' ),
		'all_items'                  => __( 'All Items', 'provenance' ),
		'parent_item'                => __( 'Parent Item', 'provenance' ),
		'parent_item_colon'          => __( 'Parent Item:', 'provenance' ),
		'new_item_name'              => __( 'New Item Name', 'provenance' ),
		'add_new_item'               => __( 'Add New Item', 'provenance' ),
		'edit_item'                  => __( 'Edit Item', 'provenance' ),
		'update_item'                => __( 'Update Item', 'provenance' ),
		'view_item'                  => __( 'View Item', 'provenance' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'provenance' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'provenance' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'provenance' ),
		'popular_items'              => __( 'Popular Items', 'provenance' ),
		'search_items'               => __( 'Search Items', 'provenance' ),
		'not_found'                  => __( 'Not Found', 'provenance' ),
		'no_terms'                   => __( 'No items', 'provenance' ),
		'items_list'                 => __( 'Items list', 'provenance' ),
		'items_list_navigation'      => __( 'Items list navigation', 'provenance' ),
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
	register_taxonomy( 'provenance', array( 'item-post-type' ), $args );

}
add_action( 'init', 'custom_boilierplate_taxonomy_provenance', 0 );
