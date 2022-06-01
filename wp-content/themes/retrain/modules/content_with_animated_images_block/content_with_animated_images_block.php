<?php
/* Heading Settings */
$heading = get_sub_field( 'animated_heading' );
$content = get_sub_field( 'animated_content' );
$button = get_sub_field( 'animated_button' );

/* BG Settings */
$media_type    = get_sub_field( 'media_type' );
$add_overlay   = get_sub_field( 'add_overlay' );
$overlay_color = get_sub_field( 'overlay_color' );
$parallax      = get_sub_field( 'parallax' );
$color         = get_sub_field( 'color' );
$gradient      = get_sub_field( 'gradient' );
$image         = get_sub_field( 'image' );
$video_mp4     = get_sub_field( 'video_mp4' );
$video_webm    = get_sub_field( 'video_webm' );

/* Other Settings */
$custom_id        = get_sub_field( 'custom_id' );
$custom_css_class = get_sub_field( 'custom_css_class' );
$heading_color    = get_sub_field( 'heading_color' );
$text_color       = get_sub_field( 'text_color' );

/* video Settings */
$image_video = get_sub_field( 'image_video' );
$video_id    = get_sub_field( 'video_id' );

wp_enqueue_style( 'content_with_animated_images_block', get_template_directory_uri() . '/static/css/modules/content_with_animated_images_block/content_with_animated_images_block.css', [], null );

wp_enqueue_script( 'content_with_animated_images_block-js', get_template_directory_uri() . '/static/js/modules/content_with_animated_images_block/content_with_animated_images_block.js', [], null );

?>
<section class="<?php if ( $media_type == 'image' && ! empty( $image ) && $parallax ) {
  echo 'prallax-added';
} ?> content_with_animated_images_block content-animated-images-module
    <?php
/* css class */
echo ! empty( $custom_css_class ) ? $custom_css_class . ' ' : '';
/* bg image */
echo ( $media_type == 'image' && ! empty( $image ) ) ? 'bg-image ' : '';
/* bg color */
echo $media_type == 'color' && ! empty( $color ) ? 'bg-' . $color : '';
/* bg color */
echo $media_type == 'gradient' && ! empty( $gradient ) ? 'gradient-' . $gradient : ''; ?>"
         <?php
         /* custom id */
         echo ! empty( $custom_id ) ? 'id="' . $custom_id . '"' : '';
         /* bg image */
         if ( $media_type == 'image' && ! empty( $image ) && $parallax ) { ?>style="background-image: url('<?php echo $image ?>')"
  <?php }
  ?>>
  <?php
  /* overlay */
  if ( ( $media_type == 'image' || $media_type == 'video' ) && $add_overlay && ! empty( $overlay_color ) ) { ?>
    <div class="overlay <?php echo $overlay_color; ?>"></div>
  <?php }

  /* video */
  if ( $media_type == 'video' && ! empty( $video_mp4 ) || $media_type == 'video' && ! empty( $video_webm ) ) { ?>
    <video class="bg-video" autoplay muted>
      <source src="<?php echo $video_mp4['url'] ?>" type="video/mp4">
      <source src="<?php echo $video_webm['url'] ?>" type="video/webm">
    </video>
  <?php } ?>

  <div class="container-fluid px-0">
     <div class="row no-gutters"><?php 
        $animated_gallery_images = get_sub_field('animated_gallery'); 
        if ($animated_gallery_images) 
        { ?>
          <div class="col-lg-6 ml-auto">
            <div class="animated_imageanimated_gallery">
              <div class="gallery_list"><?php 
                foreach ($animated_gallery_images as $animated_gallery_image)
                { ?>
                  <div class="item_gall">
                    <div class="img_gallery" style="background: url('<?php echo $animated_gallery_image['sizes']['thumbnail']; ?>')"></div>
                  </div><?php
                } ?>
              </div>
            </div>
          </div><?php
        } ?>
        <div class="col-lg-6">
          <div class="animated_images_block_content"><?php 
              if ($heading) 
              { ?>
                <h2 class="h2"><?php echo $heading; ?></h2><?php 
              } 
              if ($content) 
              { ?>
                <div class="content_wrap">
                  <?php echo $content; ?>
                </div><?php 
              } 
              if ($button) 
              { ?>
                <div class="btn-wrap"><?php 
                  if ($button) 
                  { ?>
                    <a class="btn btn-gradient " href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>"><span><?php echo $button['title']; ?></span></a><?php 
                  } ?>
                </div><?php 
              } ?>
            </div> 
        </div> 
    </div>
</section>