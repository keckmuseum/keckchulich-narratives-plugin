var media_uploader = null;

function custom_boilerplate_open_media_uploader_multiple_images(target, repeating=true, state="insert")
{
    media_uploader = wp.media({
        frame:    "post",
        state:    state,
        multiple: repeating
    });

    slug = target.attr('class');

    media_uploader.on("insert", function(){

        var length = media_uploader.state().get("selection").length;
        var images = media_uploader.state().get("selection").models

        for(var iii = 0; iii < length; iii++)
        {

            //var image_id = images[iii].id;
            console.log( images[iii] );

            target.find('.image-previews').append(
              '<div style="width:30%; height:auto; display:inline-block;">\
              <img style="width:100%; height:auto;" id="'+slug+'-'+images[iii].attributes.id+'" src="'+images[iii].attributes.url+'" alt="'+images[iii].attributes.alt+'" />\
              <input class="'+slug+'-'+images[iii].attributes.id+'" value="'+images[iii].attributes.id+'" type="hidden" name="'+slug+'[]" />\
              <a href="#delete-image">-</a>\
              </div>'
            );
            target.find('.image-previews').append('');

        }
    });

    media_uploader.open();
}

function custom_boilerplate_init(target){
  console.log('init');
  jQuery( document ).ready(function() {
    jQuery(target+' [href="#add-field"]').click(
      function(e){
        e.preventDefault();

        field = jQuery(this).parent().find('>div>div:last-child').clone();

        field.find('input').val('');

        field.appendTo(jQuery(this).parent().find('>div'));
      }
    );
    jQuery(target+' [href="#delete-field"]').click(
      function(e){
        e.preventDefault();
        jQuery(this).parent().find('input').val('');
        jQuery(this).parent().remove();
      }
    );
    jQuery(target+' [href="#choose-media"]').click(
      function(e){
        e.preventDefault();
        custom_boilerplate_open_media_uploader_multiple_images(jQuery(this).parent());
      }
    );
    jQuery(document).on('click', target+' [href="#delete-image"]',
      function(e){
        e.preventDefault();
        jQuery(this).parent().remove();
      }
    );
  });
}
