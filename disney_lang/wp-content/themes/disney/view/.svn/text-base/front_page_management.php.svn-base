<?php

if (isset($_POST['save_options'])) {
  $attachment_id_str = $_POST['front_page_images'];
  $link_url_str = $_POST['front_page_image_urls'];
  $attachment_src_str = $_POST['front_page_images_srcs'];

  update_option('front_image_attachement_id', $attachment_id_str);
  update_option('front-image-link-url', $link_url_str);
  update_option("front-image-src", $attachment_src_str);
}
wp_enqueue_media();
$style_uri=get_template_directory_uri()."/css/admin.css";
wp_enqueue_style("front_page_management_style",$style_uri);
?>

<form method="POST">
<div class="inside">
  <div id="front_page_images_container">
    <ul class="front_page_images">
      <?php
        $front_page_image_urls = array();
        $front_page_image_attach_ids = array();
        $front_page_image_srcs = array();
        if ($old_attachment_id_str = get_option("front_image_attachement_id")) {
          $front_page_image_attach_ids = explode(",", $old_attachment_id_str);
        }

        if ($old_link_url_str = get_option("front-image-link-url")) {
          $front_page_image_urls = explode("~", $old_link_url_str);
        }

        if ($old_src_str = get_option("front-image-src")) {
            $front_page_image_srcs = explode("~", $old_src_str);
        }
        $attachments = $front_page_image_attach_ids;

        if ($attachments) {
          foreach($attachments as $index => $attachment_id) {
            echo '<li class="image" data-attachment_id="'.esc_attr($attachment_id).'" data-attachment_src = "'.$front_page_image_srcs[$index].'">
        						'.wp_get_attachment_image($attachment_id, 'thumbnail').'
                       <p><label>Url:</label><input type="text" placeholder="link url" class="image-link-url" disabled value="'. ((isset($front_page_image_urls[$index])) ? $front_page_image_urls[$index] : '').'"/>
        				</p>
                       <ul class="actions">
        			     <li><a href="#" class="delete tips" data-tip="'.__('Delete image').'">::before '.__('Delete').' ::after</a></li>
        			   </ul>
        			</li>';
          }
        }?>
    </ul>
    <input type="hidden" id="front_page_image_gallery" name="front_page_images" value="<?php echo esc_attr($old_attachment_id_str); ?>" />
    <input type="hidden" id="front_page_image_urls" name="front_page_image_urls" value="<?php echo esc_attr($old_link_url_str) ?>" />
    <input type="hidden" id="front_page_image_srcs" name="front_page_images_srcs" value="<?php echo esc_attr($old_src_str) ?>"/>
    <input type="hidden" name="save_options" value="1" />
  </div>
  <p class="add_product_images hide-if-no-js">
    <a href="#" data-choose="<?php _e('Add Images to Front Page Images Gallery'); ?>" data-update="<?php _e('Add'); ?>" data-delete="<?php _e('Delete image'); ?>" data-text="<?php _e('Delete'); ?>"><?php _e('Add Images to Front Page Images Gallery'); ?></a>
  </p>
  <input type="submit" class="button button-primary" value="<?php _e("Update") ?>" />
  </div>
</form>

<script>
  jQuery(function($) {
    var gallery_frame;
    var $image_gallery_ids = jQuery('#front_page_image_gallery');
    var $image_gallery_links = $("#front_page_image_urls");
    var $product_images = jQuery('#front_page_images_container ul.front_page_images');
    var $image_gallery_srcs = $("#front_page_image_srcs");

    jQuery('.add_product_images').on('click', 'a', function(event) {
      var $el = jQuery(this);
      var attachment_ids = $image_gallery_ids.val();
      var attachment_srcs =$image_gallery_srcs.val();

      event.preventDefault();

      // If the media frame already exists, reopen it.
      if (gallery_frame) {
        gallery_frame.open();
        return;
      }

      // Create the media frame.
      gallery_frame = wp.media({
        title: $el.data('choose'),
        button: {
          text: $el.data('update'),
        },
        states: [
          new wp.media.controller.Library({
            title: $el.data('choose'),
            filterable: 'all',
            multiple: true,
          })
        ]
      });

      // When an image is selected, run a callback.
      gallery_frame.on('select', function() {
        var selection = gallery_frame.state().get('selection');

        selection.map(function(attachment) {
          attachment = attachment.toJSON();

          if (attachment.id) {
            attachment_ids = attachment_ids ? attachment_ids + "," + attachment.id : attachment.id;
            attachment_srcs = attachment_srcs ? attachment_srcs + "~" + attachment.url : attachment.url;
            attachment_image = attachment.sizes.thumbnail ? attachment.sizes.thumbnail.url : attachment.url;
            var elements = '\<li class="image" data-attachment_id="';
            elements += attachment.id + '" data-attachment_src="';
            elements +=attachment.url+'">\<img src="';
            elements += attachment_image + '" />\<p>\<label>Url:</label>\<input type="text" placeholder="link url" class="image-link-url" \\></p>\<ul class="actions">\<li>\<a href="#" class="delete" title="' + $el.data('delete') + '">';
            elements += $el.data('text') + '\</a>\</li>\</ul>\</li>';
            $product_images.append(elements);
          }
        });
        $image_gallery_ids.val(attachment_ids);
        $image_gallery_srcs.val(attachment_srcs);
      });

      // Finally, open the modal.
      gallery_frame.open();
    });

    //Remove images
    $('#front_page_images_container').on('click', 'a.delete', function() {
    $(this).closest('li.image').remove();
	reset_hide_inputs($image_gallery_ids, $image_gallery_links, $image_gallery_srcs);

      return false;
    });

    $(".image-link-url").live('change', function() {
    	reset_hide_inputs($image_gallery_ids, $image_gallery_links, $image_gallery_srcs);
    });

    function reset_hide_inputs($image_gallery_ids, $image_gallery_links, $image_gallery_srcs) {
    	 var attachment_ids = '';
         var image_urls = '';
         var attachment_srcs='';

         $('#front_page_images_container ul li.image').css('cursor', 'default').each(function() {
           var attachment_id = jQuery(this).attr('data-attachment_id');
           var image_url = $(this).find('.image-link-url').val();
           var attachment_src = jQuery(this).attr('data-attachment_src');
           attachment_ids = attachment_ids ? attachment_ids +','+ attachment_id : attachment_ids + attachment_id;
           image_urls = image_urls ? image_urls +'~'  + image_url :  image_urls + image_url;
           attachment_srcs = attachment_srcs ? attachment_srcs +'~'+ attachment_src : attachment_srcs + attachment_src;
         });

         $image_gallery_ids.val(attachment_ids);
         $image_gallery_links.val(image_urls);
         $image_gallery_srcs.val(attachment_srcs);
      }
  });
</script>