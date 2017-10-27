<?php
// Register Custom Taxonomy
function custom_boilierplate_taxonomy_signature() {

	$labels = array(
		'name'                       => _x( 'Signatures', 'Taxonomy General Name', 'signature' ),
		'singular_name'              => _x( 'Signature', 'Taxonomy Singular Name', 'signature' ),
		'menu_name'                  => __( 'Signatures', 'signature' ),
		'all_items'                  => __( 'All Items', 'signature' ),
		'parent_item'                => __( 'Parent Item', 'signature' ),
		'parent_item_colon'          => __( 'Parent Item:', 'signature' ),
		'new_item_name'              => __( 'New Item Name', 'signature' ),
		'add_new_item'               => __( 'Add New Item', 'signature' ),
		'edit_item'                  => __( 'Edit Item', 'signature' ),
		'update_item'                => __( 'Update Item', 'signature' ),
		'view_item'                  => __( 'View Item', 'signature' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'signature' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'signature' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'signature' ),
		'popular_items'              => __( 'Popular Items', 'signature' ),
		'search_items'               => __( 'Search Items', 'signature' ),
		'not_found'                  => __( 'Not Found', 'signature' ),
		'no_terms'                   => __( 'No items', 'signature' ),
		'items_list'                 => __( 'Items list', 'signature' ),
		'items_list_navigation'      => __( 'Items list navigation', 'signature' ),
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
	register_taxonomy( 'signature', array( 'item-post-type' ), $args );

}
add_action( 'init', 'custom_boilierplate_taxonomy_signature', 0 );
