<?php

// Todo:
// - fix hook filter for admin JS
// - separate some code into other files

/*
 * Post Type
 */


function item_post_type_init() {
	register_post_type( 'item-post-type', array(
		'labels'            => array(
			'name'                => __( 'Items', 'item-post-type' ),
			'singular_name'       => __( 'Item', 'item-post-type' ),
			'all_items'           => __( 'All Items', 'item-post-type' ),
			'new_item'            => __( 'New Item', 'item-post-type' ),
			'add_new'             => __( 'Add New', 'item-post-type' ),
			'add_new_item'        => __( 'Add New Item', 'item-post-type' ),
			'edit_item'           => __( 'Edit Item', 'item-post-type' ),
			'view_item'           => __( 'View Item', 'item-post-type' ),
			'search_items'        => __( 'Search Items', 'item-post-type' ),
			'not_found'           => __( 'No Items found', 'item-post-type' ),
			'not_found_in_trash'  => __( 'No Items found in trash', 'item-post-type' ),
			'parent_item_colon'   => __( 'Parent Item', 'item-post-type' ),
			'menu_name'           => __( 'Items', 'item-post-type' ),
		),
		'public'            => true,
		'hierarchical'      => true,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'editor', 'page-attributes' ),
		'has_archive'       => true,
		'rewrite'           => true,
		'query_var'         => true,
		'menu_icon'         => 'dashicons-lightbulb',
		'show_in_rest'      => true,
		'rest_base'         => 'item-post-type',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'item_post_type_init' );

function item_post_type_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['item-post-type'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Item updated. <a target="_blank" href="%s">View Item</a>', 'item-post-type'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'item-post-type'),
		3 => __('Custom field deleted.', 'item-post-type'),
		4 => __('Item updated.', 'item-post-type'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Item restored to revision from %s', 'item-post-type'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Item published. <a href="%s">View Item</a>', 'item-post-type'), esc_url( $permalink ) ),
		7 => __('Item saved.', 'item-post-type'),
		8 => sprintf( __('Item submitted. <a target="_blank" href="%s">Preview Item</a>', 'item-post-type'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Item scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Item</a>', 'item-post-type'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Item draft updated. <a target="_blank" href="%s">Preview Item</a>', 'item-post-type'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'item_post_type_updated_messages' );
