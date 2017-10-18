<?php

/*
 * Item Post Type Update
 */
function custom_boilerplate_save_custom_meta_boxes($post_id, $post, $update)
{
	global $custom_boilerplate_metabox_spec;

	foreach($custom_boilerplate_metabox_spec as $metabox){
		custom_boilerplate_save_custom_meta_box($post_id, $post, $update, $metabox);
	}
}
function custom_boilerplate_save_custom_meta_box($post_id, $post, $update, $fields)
{
//print_r($_POST);
//echo '<br /><br />';
//print_r($fields);
    if (!isset($_POST[$fields['slug']."-nonce"]) || !wp_verify_nonce($_POST[$fields['slug']."-nonce"], $fields['slug']))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    $post_type = $fields['post-type'];
    if($post_type != $post->post_type)
        return $post_id;

		foreach ($fields['fields'] as $field_spec) {

  			if($field_spec['repeating']) {

  				$old = get_post_meta($post_id, $field_spec['slug'], true);
  				$new = array();

  				if(isset($_POST[$field_spec['slug']])) {
  					$posted = $_POST[$field_spec['slug']];
  					$count = count( $posted );

  					for ( $i = 0; $i < $count; $i++ ) {
  						if ( $posted[$i] != '' ) :
  							$new[$i] = stripslashes( strip_tags( $posted[$i] ) );
  						endif;
  					}
  				}



  				if ( !empty( $new ) && $new != $old )
  					update_post_meta( $post_id, $field_spec['slug'], $new );
  				elseif ( empty($new) && $old )
  					delete_post_meta( $post_id, $field_spec['slug'], $old );

  			}
  			else {
  				${$field_spec['slug'].'_value'} = "";
  				if(isset($_POST[$field_spec['slug']]))
  				{
  						${$field_spec['slug'] . "_value"} = $_POST[$field_spec['slug']];
  				}
  				update_post_meta($post_id, $field_spec['slug'], ${$field_spec['slug'] . "_value"});
  			}

	}


}

add_action("save_post", "custom_boilerplate_save_custom_meta_boxes", 10, 3);
