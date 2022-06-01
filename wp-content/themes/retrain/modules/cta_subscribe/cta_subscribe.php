<?php
$cta_heading = get_sub_field('cta_subscribe_heading');
$cta_subscribe_content = get_sub_field('cta_subscribe_content');
$cta_form = get_sub_field('cta_form');
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

wp_enqueue_style('cta_subscribe_styles', get_template_directory_uri() . '/static/css/modules/cta_subscribe/cta_subscribe.css', [], null);
wp_enqueue_script( 'cta_subscribe_js', get_template_directory_uri() . '/static/js/modules/cta_subscribe/cta_subscribe.js', [], null );
	
if ($cta_heading) 
{ ?>
	<section class="cta-subcription <?php if ( $media_type == 'image' && ! empty( $image ) && $parallax ) {
		echo 'prallax-added';
	}
	if ( $media_type == 'none' ) {
		echo 'bg-dark-gradient';
	} ?> cta_subscribe  <?php echo ! empty( $custom_css_class ) ? $custom_css_class . ' ' : '';
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
		<?php } 
		if ($cta_heading) 
		{ ?>
			<div class="container">
				<div class="row">
					<div class="col-12 col-lg-6 mb-4 mb-lg-0">
						<div class="cta-side-content-area">
							<?php if ( $cta_heading ) { ?>
								<h2 class="cta-side-heading text-white <?php echo $heading_color; ?>"><?php echo $cta_heading; ?></h2>
							<?php } ?>
							<?php if ( $cta_subscribe_content ) { ?>
								<div class="cta-side-content-area text-white <?php echo $text_color; ?>"><?php echo $cta_subscribe_content; ?></div>
							<?php } ?>
						</div>
					</div>
					<div class="col-12 col-lg-6"><?php
						if ($cta_form) 
						{ ?>
							<div class="cta-img-area text-right">
								<div class="form-now-cta">
									<?php echo do_shortcode('[gravityform id="'.$cta_form.'" title="false" ajax="true"]'); ?> 
								</div>
							</div><?php
						}
						?>
					</div>
				</div>
			</div><?php
		} ?>
	</section><?php
} 