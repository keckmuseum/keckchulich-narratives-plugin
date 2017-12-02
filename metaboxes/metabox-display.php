<?php
/*
 * Admin Init
 */

 function custom_boilerplate_admin_init($hook) {
	//  if ( 'edit.php' != $hook || 'post.php' != $hook ) {
  //       return;
  //   }
    wp_enqueue_script( 'custom_boilerplate_admin_js', plugins_url('../assets/js/custom-boilerplate-admin.js', __FILE__) );
 }
 add_action( 'admin_enqueue_scripts', 'custom_boilerplate_admin_init' );


 /*
  * Enque Media Uploader
  */

  function custom_boilerplate_enqueue_media_uploader()
  {
      wp_enqueue_media();
  }

  add_action("admin_enqueue_scripts", "custom_boilerplate_enqueue_media_uploader");


  /*
   * Metabox display functions
   */

  function custom_boilerplate_add_meta_box()
  {
      global $custom_boilerplate_metabox_spec;

      foreach($custom_boilerplate_metabox_spec as $metabox) {
        add_meta_box($metabox['slug'], $metabox['title'], "custom_boilerplate_metabox_display", $metabox['post-type'], $metabox['placement'], $metabox['priority'], $metabox['fields']);
      }
  }

  add_action("add_meta_boxes", "custom_boilerplate_add_meta_box");

/*
 * Fields
 */

// Helpers
 function custom_boilerplate_repeat_field_link_add($repeating) {
	 if ($repeating) { ?>
		 <a href="#add-field">+</a>
	 <?php }
 }
 function custom_boilerplate_repeat_field_link_delete($repeating) {
	 if ($repeating) { ?>
		 <a href="#delete-field">-</a>
	 <?php }
 }
 function custom_boilerplate_repeat_field_name_suffix($repeating) {
	 if ($repeating) {
		 return '[]';
	 }
	 else {
	 	 return '';
	 }
 }

// Fields
 function custom_boilerplate_field_date($field='', $class, $slug, $label, $placeholder=false, $repeating=false) {
	 ?>
	 <div class="<?php echo $class; ?>">
			 <label for="<?php echo $slug.custom_boilerplate_repeat_field_name_suffix($repeating); ?>"><?php echo $label; ?> </label>
			 <input name="<?php echo $slug.custom_boilerplate_repeat_field_name_suffix($repeating); ?>" type="date" value="<?php if ($field != '') echo esc_attr( $field ); // else echo $sample; ?>"<?php echo ($placeholder)?' placeholder="'.$placeholder.'"':'';?>>
			 <?php custom_boilerplate_repeat_field_link_delete($repeating); ?>
	 </div>
	 <?php
 }
 function custom_boilerplate_field_text($field='', $class, $slug, $label, $placeholder=false, $repeating=false) {
	 ?>
	 <div class="<?php echo $class; ?>">
			 <label for="<?php echo $slug.custom_boilerplate_repeat_field_name_suffix($repeating); ?>"><?php echo $label; ?> </label>
			 <input name="<?php echo $slug.custom_boilerplate_repeat_field_name_suffix($repeating); ?>" type="text" value="<?php if ($field != '') echo esc_attr( $field ); // else echo $sample; ?>"<?php echo ($placeholder)?' placeholder="'.$placeholder.'"':'';?>>
			 <?php custom_boilerplate_repeat_field_link_delete($repeating); ?>
	 </div>
	 <?php
 }
 function custom_boilerplate_field_checkbox($field='', $class, $slug, $label, $placeholder=false, $repeating=false) {
	 ?>
	 <div class="<?php echo $class; ?>">
			 <input name="<?php echo $slug.custom_boilerplate_repeat_field_name_suffix($repeating); ?>" type="checkbox"<?php if ($field != false) echo ' checked="checked"'?>><label for="<?php echo $slug.custom_boilerplate_repeat_field_name_suffix($repeating); ?>"><?php echo $label; ?> </label>

			 <?php custom_boilerplate_repeat_field_link_delete($repeating); ?>
	 </div>
	 <?php
 }
 function custom_boilerplate_field_textarea($field='', $class, $slug, $label, $placeholder=false, $repeating=false) {
	 ?>
	 <div class="<?php echo $class; ?>">
			 <label for="<?php echo $slug.custom_boilerplate_repeat_field_name_suffix($repeating); ?>"><?php echo $label; ?> </label>
			 <textarea name="<?php echo $slug.custom_boilerplate_repeat_field_name_suffix($repeating); ?>"<?php echo ($placeholder)?' placeholder="'.$placeholder.'"':'';?>><?php if ($field != '') echo esc_attr( $field ); // else echo $sample; ?></textarea>
			 <?php custom_boilerplate_repeat_field_link_delete($repeating); ?>
	 </div>
	 <?php
 }
 function custom_boilerplate_field_image($field='', $class, $slug, $label, $placeholder=false, $repeating=false) {
	 ?>
	 <div class="<?php echo $class; ?>">
			 <label for="<?php echo $slug.custom_boilerplate_repeat_field_name_suffix($repeating); ?>"><?php echo $label; ?> </label>
         <div class="image-previews">
           <?php
              if(is_array($field)) {
                foreach($field as $image) {
                  $imgArray = wp_prepare_attachment_for_js($image); ?>
                <div style="width:30%; height:auto; display:inline-block;">
                  <img
                    style="width:100%; height:auto;"
                    src="<?php echo $imgArray['url']; ?>"
  									alt="<?php echo $imgArray['alt']; ?>"
                    id="<?php echo $slug; ?>-<?php if ($image != '') echo $image ?>"
                  />

                  <input
                    value="<?php if ($image != '') echo $image ?>"
                    type="hidden"
                    name="<?php echo $slug; ?>[]"
                    class="<?php echo $slug; ?>-<?php if ($image != '') echo $image ?>"
                  />
                  <a href="#delete-image">-</a>
                </div>
                <?php
                }
              }
              else {
                echo 'No images yet.';
              } ?>
         </div>
         <a href="#choose-media">Choose media</a>
	 </div>
	 <?php
 }
 function custom_boilerplate_field_select($field='', $class, $slug, $label, $placeholder=false, $repeating=false, $options, $selected) {
    if($field) {
      $selected=-1;
    }
	 ?>
	 <div class="<?php echo $class; ?>">
			 <label for="<?php echo $slug.custom_boilerplate_repeat_field_name_suffix($repeating); ?>"><?php echo $label; ?> </label>
       <select name="<?php echo $slug.custom_boilerplate_repeat_field_name_suffix($repeating); ?>">
         <?php
         $i=0;
         foreach ($options as $option) {
           ?>
           <option<?php
            if($field && $field==$option) {
              echo ' selected="selected"';
            }
            elseif($selected==$i) {
              echo ' selected="selected"';
            } ?>><?php echo $option ?></option>
           <?php
           $i++;
         } ?>
       </select>
	 </div>
	 <?php
 }

 /*
  * Display field wrappers and repeating handling.
  */
 function custom_boilerplate_field($type, $object, $slug, $label, $placeholder=false, $repeating=false, $options, $selected)
 {
	 if($repeating) {
		 $fields = get_post_meta($object->ID, $slug, true);
	 }

 		$class = $slug;
		?>
		<div>
		 <div>
		<?php
			if($repeating) {
				if($fields) {
					foreach ( $fields as $field ) {
						$function = 'custom_boilerplate_field_'.$type;
						if(function_exists($function)) {
						  $function($field, $class, $slug, $label, $placeholder, $repeating, $options, $selected);
						}
					}
				} else {
					$function = 'custom_boilerplate_field_'.$type;
					if(function_exists($function)) {
						$function('', $class, $slug, $label, $placeholder, $repeating, $options, $selected);
					}
				}
			} else {
				$function = 'custom_boilerplate_field_'.$type;
				if(function_exists($function)) {
					$function(get_post_meta($object->ID, $slug, true), $class, $slug, $label, $placeholder, $repeating, $options, $selected);
				}
			}
		?>
		</div>
	 <?php custom_boilerplate_repeat_field_link_add($repeating); ?>
	</div>
	<?php

 }

function custom_boilerplate_metabox_display($object, $fields) {
  echo '<script type="text/javascript">custom_boilerplate_init("#'.$fields['id'].'");</script>';

	wp_nonce_field($fields['id'], $fields['id']."-nonce");

	foreach($fields['args'] as $field) {
    $selected = '';
    $options = '';
    if(isset($field['options'])) {
      $options = $field['options'];
    }
    if(isset($field['selected'])) {
      $selected = $field['selected'];
    }
		custom_boilerplate_field($field['type'], $object, $field['slug'], $field['label'], $field['placeholder'], $field['repeating'], $options, $selected);
	}


}

function custom_boilerplate_metabox_view_list($post_id, $field_name, $before='<span>', $after='</span>', $between=', ') {
  $fields = get_post_meta($post_id, $field_name, true);
  if(is_array($fields)) {
    $i=0;
    $output = '';
    $prepend = '';
    foreach($fields as $item) {
      if($i>0){$prepend=$between;}
      $output .= $prepend.$before.$item.$after;
      $i++;
    }
    return $output;
  } else {
    return $before.$fields.$after;
  }
}



function custom_boilerplate_rest_get_post_meta( $object, $attr ) {
    $post_id = $object['id'];
     return get_post_meta( $post_id, $attr );
}

// function custom_boilerplate_update_post_meta( $object, $field_name, $request ) {
//   return update_post_meta( $object[ 'id' ], $field_name, $value );
// }

function custom_boilerplate_rest_api_init() {
  global $custom_boilerplate_metabox_spec;

  foreach($custom_boilerplate_metabox_spec as $metabox) {
    foreach($metabox['fields'] as $field ) {
      register_rest_field( 'item-post-type',
         $field['slug'],
         array(
            'get_callback'    => 'custom_boilerplate_rest_get_post_meta',
            'update_callback' => null, // 'custom_boilerplate_update_post_meta',
            'schema'          => null,
         )
      );
    }
  }
}

add_action( 'rest_api_init', 'custom_boilerplate_rest_api_init');


function custom_boilerplate_taxonomy_selector($taxonomy, $firstItem=false) {
  $terms = get_terms( array(
      'taxonomy' => $taxonomy,
      'hide_empty' => false,
  ) );
  if($terms && is_array($terms)) {
    echo '<select id="'.$taxonomy.'">';
    if($firstItem){
      ?><option name="0"><?php echo $firstItem; ?></option>';<?php 
    }
    foreach($terms as $term) { ?>
      <option name="<? echo $term->term_id ?>"><? echo $term->name ?></option>
    <?php }
    echo '</select>';
  }
}
