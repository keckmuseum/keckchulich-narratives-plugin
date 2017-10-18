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
              if($field) {
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
                    name="<?php echo $slug.custom_boilerplate_repeat_field_name_suffix($repeating); ?>"
                    class="<?php echo $slug; ?>-<?php if ($image != '') echo $image ?>"
                  />
                  <a href="#delete-image">-</a>
                </div>
                <?php
                }
              } ?>
         </div>
         <a href="#choose-media">Choose media</a>
	 </div>
	 <?php
 }

 /*
  * Display field wrappers and repeating handling.
  */
 function custom_boilerplate_field($type, $object, $slug, $label, $placeholder=false, $repeating=false)
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
						  $function($field, $class, $slug, $label, $placeholder, $repeating);
						}
					}
				} else {
					$function = 'custom_boilerplate_field_'.$type;
					if(function_exists($function)) {
						$function('', $class, $slug, $label, $placeholder, $repeating);
					}
				}
			} else {
				$function = 'custom_boilerplate_field_'.$type;
				if(function_exists($function)) {
					$function(get_post_meta($object->ID, $slug, true), $class, $slug, $label, $placeholder, $repeating);
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
		custom_boilerplate_field($field['type'], $object, $field['slug'], $field['label'], $field['placeholder'], $field['repeating']);
	}


}
