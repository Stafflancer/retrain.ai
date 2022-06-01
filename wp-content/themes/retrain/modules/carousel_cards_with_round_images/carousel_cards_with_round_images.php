<?php
// Block default settings.
$section_id    = get_row_layout() ? str_replace( '_', '-', get_row_layout() . '-' . get_row_index() ) : '';
$section_class = 'carousel_cards_with_round_images';
$section_style = '';

/* Heading Settings */
$heading = get_sub_field( 'heading' );
$content = get_sub_field( 'content' );
$button  = get_sub_field( 'button' );

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
if ( get_sub_field( 'custom_id' ) ) {
	$section_id = get_sub_field( 'custom_id' );
}
$custom_css_class = get_sub_field( 'custom_css_class' );
$heading_color    = get_sub_field( 'heading_color' );
$text_color       = get_sub_field( 'text_color' );

/* video Settings */
$image_video = get_sub_field( 'image_video' );
$video_id    = get_sub_field( 'video_id' );

wp_enqueue_style( 'carousel_cards_with_round_images', get_template_directory_uri() . '/static/css/modules/carousel_cards_with_round_images/carousel_cards_with_round_images.css', [], null );
wp_enqueue_style( 'OwlCarousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css', [], null );
wp_enqueue_style( 'OwlCarouselTheme', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css', [], null );

wp_enqueue_script( 'jquery-js', 'https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js', array(), null, true );
wp_enqueue_script( 'popper-js', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js', array(), null, true );
wp_enqueue_script( 'OwlCarousel-js', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array(), null, true );
wp_enqueue_script( 'carousel_cards_with_round_images', get_template_directory_uri() . '/static/js/modules/carousel_cards_with_round_images/carousel_cards_with_round_images.js', array(), null, true );

if ( ! empty( $custom_css_class ) ) {
	$section_class .= ' ' . $custom_css_class;
}

if ( 'image' === $media_type && ! empty( $image ) && $parallax ) {
	$section_class .= ' prallax-added parallax';
}

if ( 'image' === $media_type && ! empty( $image ) ) {
	$section_class .= ' bg-image';
}

if ( 'color' === $media_type && ! empty( $color ) ) {
	$section_class .= ' bg-' . $color;
}

if ( 'gradient' === $media_type && ! empty( $gradient ) ) {
	$section_class .= ' gradient-' . $gradient;
}

if ( 'image' === $media_type && ! empty( $image ) && $parallax ) {
	$section_style .= ' style="background-image: url(' . $image . ')"';
}
?>
<section id="<?php echo esc_attr($section_id); ?>" class="<?php echo esc_attr($section_class); ?>"<?php echo esc_attr($section_style); ?>>
	<?php
	// Overlay
	if ( ( 'image' === $media_type || 'video' === $media_type ) && $add_overlay && ! empty( $overlay_color ) ) { ?>
		<div class="overlay <?php echo $overlay_color; ?>"></div>
	<?php } ?>

	<?php
	// Video
	if ( 'video' === $media_type && ! empty( $video_mp4 ) || 'video' === $media_type && ! empty( $video_webm ) ) { ?>
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
					<div class="carousel_cards_with_round_images_content <?php echo $text_color; ?>"><?php echo $content; ?></div>
				<?php } ?>
			</div>
		</div>
		<div class="carousel_cards_with_round_inner">
			<div id="testimonial-slider" class="owl-carousel owl-theme cards-images-block">
				<?php
				if ( have_rows( 'cards' ) ) {
					while ( have_rows( 'cards' ) ) : the_row();
						$heading = get_sub_field( 'heading' );
						$content = get_sub_field( 'content' );
						$image   = get_sub_field( 'image' );
						?>
						<div class="item">
							<div class="card-block-inner">
								<div class="card-img">
									<?php echo wp_get_attachment_image( $image['ID'], 'medium', array( 'class' => 'img-fluid' ) ); ?>
								</div>
								<div class="card-block-content">
									<?php if ( $heading ){ ?>
										<h3 class="card-heading"><?php echo $heading; ?></h3>
									<?php } ?>

									<?php if ( $content ) { ?>
										<div class="paragraph-content">
											<?php echo $content; ?>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					<?php
					endwhile;
				}
				?>
			</div>
			<?php if ( $button ) { ?>
				<div class="view-all-cases text-center">
					<a href="<?php echo $button['url']; ?>" class="btn btn-gradient" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
				</div>
			<?php } ?>
		</div>
	</div>
</section>