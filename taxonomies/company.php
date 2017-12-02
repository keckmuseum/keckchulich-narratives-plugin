<?php
// Register Custom Taxonomy
function custom_boilierplate_taxonomy_company() {

	$labels = array(
		'name'                       => _x( 'Companies', 'Taxonomy General Name', 'company' ),
		'singular_name'              => _x( 'Company', 'Taxonomy Singular Name', 'company' ),
		'menu_name'                  => __( 'Companies', 'company' ),
		'all_items'                  => __( 'All Items', 'company' ),
		'parent_item'                => __( 'Parent Item', 'company' ),
		'parent_item_colon'          => __( 'Parent Item:', 'company' ),
		'new_item_name'              => __( 'New Item Name', 'company' ),
		'add_new_item'               => __( 'Add New Item', 'company' ),
		'edit_item'                  => __( 'Edit Item', 'company' ),
		'update_item'                => __( 'Update Item', 'company' ),
		'view_item'                  => __( 'View Item', 'company' ),
		'separate_items_with_commas' => __( 'Separate items with commas. For a company name with commas replace commas with -- for example: <br />CompanyName-- ltd.', 'company' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'company' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'company' ),
		'popular_items'              => __( 'Popular Items', 'company' ),
		'search_items'               => __( 'Search Items', 'company' ),
		'not_found'                  => __( 'Not Found', 'company' ),
		'no_terms'                   => __( 'No items', 'company' ),
		'items_list'                 => __( 'Items list', 'company' ),
		'items_list_navigation'      => __( 'Items list navigation', 'company' ),
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
		// 'rest_base'          => 'bond-companies',
	);
	register_taxonomy( 'company', array( 'item-post-type' ), $args );

}
add_action( 'init', 'custom_boilierplate_taxonomy_company', 0 );


// filter for tags (as a taxonomy) with comma
//  replace '--' with ', ' in the output - allow tags with comma this way

if(!is_admin()){ // make sure the filters are only called in the frontend

	$custom_taxonomy_type = 'company';	// here goes your taxonomy type

	function comma_taxonomy_filter($tag_arr){
		global $custom_taxonomy_type;
		$tag_arr_new = $tag_arr;
		if($tag_arr->taxonomy == $custom_taxonomy_type && strpos($tag_arr->name, '--')){
			$tag_arr_new->name = str_replace('--',', ',$tag_arr->name);
		}
		return $tag_arr_new;
	}
	add_filter('get_'.$custom_taxonomy_type, 'comma_taxonomy_filter');

	function comma_taxonomies_filter($tags_arr){
		$tags_arr_new = array();
		foreach($tags_arr as $tag_arr){
			$tags_arr_new[] = comma_taxonomy_filter($tag_arr);
		}
		return $tags_arr_new;
	}
	add_filter('get_the_taxonomies',	'comma_taxonomies_filter');
	add_filter('get_terms', 			'comma_taxonomies_filter');
	add_filter('get_the_terms',			'comma_taxonomies_filter');
}
