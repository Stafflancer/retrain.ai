<?php

$heading = get_sub_field('heading');
$content = get_sub_field('content');

/* BG Settings */
$media_type    = get_sub_field('media_type');
$add_overlay   = get_sub_field('add_overlay');
$overlay_color = get_sub_field('overlay_color');
$parallax      = get_sub_field('parallax');
$color         = get_sub_field('color');
$gradient = get_sub_field('gradient');
$image         = get_sub_field('image');
$video_mp4     = get_sub_field('video_mp4');
$video_webm    = get_sub_field('video_webm');

/* Other Settings */
$custom_id        = get_sub_field('custom_id');
$custom_css_class = get_sub_field('custom_css_class');
$heading_color    = get_sub_field('heading_color');
$text_color       = get_sub_field('text_color');



wp_enqueue_style( 'carousel_logos', get_template_directory_uri() . '/static/css/modules/carousel_logos/carousel_logos.css', [], null );
wp_enqueue_style( 'OwlCarousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css', [], null );
wp_enqueue_style( 'OwlCarouselTheme', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css', [], null );
wp_enqueue_script( 'OwlCarousel-js', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', [], null, true );
wp_enqueue_script( 'carousel_logos', get_template_directory_uri() . '/static/js/modules/carousel_logos/carousel_logos.js', [], null, true );

?>
	<section class="carousel_logos <?php if ( $media_type == 'image' && ! empty( $image ) && $parallax ) {
		echo 'prallax-added ';
	}
	/* css class */
	echo ! empty( $custom_css_class ) ? $custom_css_class . ' ' : '';

	/* bg image */
	echo ( 'image' === $media_type && ! empty( $image ) ) ? 'bg-image ' : '';
	/* bg color */
	echo 'color' === $media_type && ! empty( $color ) ? 'bg-' . $color : '';
	/* bg color */
	echo 'gradient' === $media_type && ! empty( $gradient ) ? 'gradient-' . $gradient : ''; ?>"
		<?php
		/* custom id */
		echo ! empty( $custom_id ) ? 'id="' . $custom_id . '"' : '';
		/* bg image */
		if ( 'image' === $media_type && ! empty( $image ) && $parallax ) { ?>style="background-image: url('<?php echo $image ?>')"
		<?php }
		?>>
		<?php
		/* overlay */
		if ( ( 'image' === $media_type || 'video' === $media_type ) && $add_overlay && ! empty( $overlay_color ) ) { ?>
			<div class="overlay <?php echo $overlay_color; ?>"></div>
		<?php }
		/* video */
		if ( 'video' === $media_type && ( ! empty( $video_mp4 ) || ! empty( $video_webm ) ) ) { ?>
			<video class="bg-video" autoplay muted>
				<source src="<?php echo $video_mp4['url'] ?>" type="video/mp4">
				<source src="<?php echo $video_webm['url'] ?>" type="video/webm">
			</video>
		<?php } ?>

		<div class="container">
			<div class="row">
				<div class="col-12">
					<?php if ( $heading ) { ?>
						<h2 class="heading-title-dark text-center <?php echo $heading_color; ?>"><?php echo $heading; ?></h2>
					<?php } ?>
					<?php if ( $content ) { ?>
						<div class="carousel_logos <?php echo $text_color; ?>"><?php echo $content; ?></div>
					<?php } ?>
				</div>
			</div><?php 
			$logos = get_sub_field('logos'); 
			if( $logos )
			{ ?>
				<div class="cards-with-rounded-inner">
					<div id="logos-slider" class="owl-carousel owl-theme cards-images-block"><?php
						foreach( $logos as $image )
						{ 
			?>
							<div class="item">
								<div class="card-logos">
									<img src="<?php echo esc_url($image['url']); ?>">
								</div>
							</div>
						<?php } ?>
					</div>
				</div><?php 
			} ?>
		</div>
	</section>
