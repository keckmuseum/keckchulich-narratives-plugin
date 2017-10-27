<?php
// Register Custom Taxonomy
function custom_boilierplate_taxonomy_document_type() {

	$labels = array(
		'name'                       => _x( 'Document Types', 'Taxonomy General Name', 'document-type' ),
		'singular_name'              => _x( 'Document Type', 'Taxonomy Singular Name', 'document-type' ),
		'menu_name'                  => __( 'Document Types', 'document-type' ),
		'all_items'                  => __( 'All Items', 'document-type' ),
		'parent_item'                => __( 'Parent Item', 'document-type' ),
		'parent_item_colon'          => __( 'Parent Item:', 'document-type' ),
		'new_item_name'              => __( 'New Item Name', 'document-type' ),
		'add_new_item'               => __( 'Add New Item', 'document-type' ),
		'edit_item'                  => __( 'Edit Item', 'document-type' ),
		'update_item'                => __( 'Update Item', 'document-type' ),
		'view_item'                  => __( 'View Item', 'document-type' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'document-type' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'document-type' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'document-type' ),
		'popular_items'              => __( 'Popular Items', 'document-type' ),
		'search_items'               => __( 'Search Items', 'document-type' ),
		'not_found'                  => __( 'Not Found', 'document-type' ),
		'no_terms'                   => __( 'No items', 'document-type' ),
		'items_list'                 => __( 'Items list', 'document-type' ),
		'items_list_navigation'      => __( 'Items list navigation', 'document-type' ),
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
	register_taxonomy( 'document-type', array( 'item-post-type' ), $args );

}
add_action( 'init', 'custom_boilierplate_taxonomy_document_type', 0 );
