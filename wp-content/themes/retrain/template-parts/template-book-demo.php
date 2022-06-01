<?php
/**
 * Template Name: Book a Demo
 */

get_header();


/* BG Settings */
$media_type    = get_field('media_type');
$add_overlay   = get_field('add_overlay');
$overlay_color = get_field('overlay_color');
$parallax      = get_field('parallax');
$color         = get_field('color');
$gradient = get_field('gradient');
$image         = get_field('image');
$video_mp4     = get_field('video_mp4');
$video_webm    = get_field('video_webm');

/* Other Settings */
$custom_id        = get_field('custom_id');
$custom_css_class = get_field('custom_css_class');
$heading_color    = get_field('heading_color');
$text_color       = get_field('text_color');

/* video Settings */
$image_video = get_field('image_video');
$video_id    = get_field('video_id');
// Setup defaults.
	$args = [
		'container'       => 'section',
		'background_type' => $media_type,
		'class'           => 'book_a_demo hero-background hero-banner background-logomark',
		'id'              => 'book-a-demo',
		'attributes'      => '',
	];

	$background_video_markup = $background_image_markup = $background_overlay_markup = '';

	// Only try to get the rest of the settings if the background type is set to anything.
	if ( $args['background_type'] ) {
		if ( 'color' === $args['background_type'] && $color ) {
			$args['class'] .= ' has-background color-as-background bg-' . esc_attr( $color );
		}
		if ( 'gradient' === $args['background_type'] && $gradient ) {
			$args['class'] .= ' has-background color-as-background gradient-' . esc_attr( $gradient );
		}
		if ( $media_type == 'image' && ! empty( $image_url ) && $parallax ) {
			$args['class'] .= ' prallax-added';
		}
		if ( $media_type == 'none' ) {
			$args['class'] .= ' bg-default-gradient';
		}

		if ( 'image' === $args['background_type'] && $image_url ) {
			// Make sure images stay in their containers - relative + overflow hidden.
			$args['class']      .= ' has-background image-as-background bg-image';
			$args['attributes'] .= ' style="background-image: url(' . $image_url . ');"';

			if ( $parallax && $image_url ) {
				$args['class']      .= ' has-parallax';
				$args['attributes'] .= ' data-parallax="scroll"  data-image-src="' . $image_url . '"';
			}
		}

		if ( 'video' === $args['background_type'] ) {
			$video_mp4  = get_field( 'video_mp4' );
			$video_webm = get_field( 'video_webm' );

			// Make sure videos stay in their containers - relative + overflow hidden.
			$args['class'] .= ' has-background video-as-background video-bg';

			ob_start();
			?>
			<figure class="video-background">
				<video id="<?php echo esc_attr( $args['id'] ); ?>-video" autoplay muted playsinline preload="none" class="bg-video">
					<?php if ( $video_webm['url'] ) : ?>
						<source src="<?php echo esc_url( $video_webm['url'] ); ?>" type="video/webm">
					<?php endif; ?>
					<?php if ( $video_mp4['url'] ) : ?>
						<source src="<?php echo esc_url( $video_mp4['url'] ); ?>" type="video/mp4">
					<?php endif; ?>
				</video>
			</figure>
			<?php
			$background_video_markup = ob_get_clean();
		}

		if ( ( 'image' === $args['background_type'] || 'video' === $args['background_type'] ) ) {
			if ( $mobile_image_id ) {
				ob_start();
				?>
				<figure class="image-background mobile-background-figure" aria-hidden="true">
					<?php echo wp_get_attachment_image( $mobile_image_id, 'full', false, array( 'class' => 'mobile-background-image' ) ); ?>
				</figure>
				<?php
				$background_image_markup = ob_get_clean();
			}

			if ( $add_overlay && $overlay_color ) {
				$args['class'] .= ' has-overlay';
				$args['class'] .= ' has-overlay-color-' . esc_attr( $overlay_color );

				ob_start();
				?>
				<div class="overlay <?php echo $overlay_color; ?>"></div>
				<?php
				$background_overlay_markup = ob_get_clean();
			}
		}

		if ( 'none' === $args['background_type'] ) {
			$args['class'] .= ' no-background';
		}
	}

	// Print our block container with options.
	printf( '<%s id="%s" class="%s"%s>', esc_attr( $args['container'] ), esc_attr( $args['id'] ), esc_attr( $args['class'] ), $args['attributes'] );

	// If we have a background overlay, echo our background overlay markup inside the block container.
	if ( $background_overlay_markup ) {
		echo $background_overlay_markup; // WPCS XSS OK.
	}

	// If we have a background video, echo our background video markup inside the block container.
	if ( $background_video_markup ) {
		echo $background_video_markup; // WPCS XSS OK.
	}

	// If we have a background image, echo our background image markup inside the block container.
	if ( $background_image_markup ) {
		echo $background_image_markup; // WPCS XSS OK.
	}
	?>
	<div class="container">
		<div class="hero-background-inner">
			<div class="row">
				<div class="col-12 col-lg-6 mb-5 mb-lg-0">
					<div class="breadcrumbs <?php echo $breadcrumbs_color; ?>"><?php echo template_breadcrumbs(); ?></div><?php
					$dm_content = get_field('dm_content'); 
					if($dm_content)
					{ ?>					
						<div class="text-white hero-banner-content <?php echo $text_color; ?>"><?php echo $dm_content; ?></div><?php
					} ?>
				</div>
				<div class="col-12 col-lg-6 col-xl-4  mx-auto">
					<div class="banner-img text-right "><?php
					$dm_from  = get_field( 'dm_from' );
					if ( $dm_from ) 
					{ ?>
						<div class="bookdemo-gravity-form">
							<?php echo do_shortcode( '[gravityform id="' . $dm_from . '" title="true" ajax="true"]' ); ?>
						</div><?php 
					} ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</<?php echo $args['container']; ?>>
<main class="main">
    <?php get_all_modules(); ?>
</main>
<?php get_footer();