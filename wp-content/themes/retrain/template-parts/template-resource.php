<?php
/**
 * Template Name: Resources
 */

get_header();

$breadcrumbs_color  = get_field( 'breadcrumbs_color' );
$main_heading_color = get_field( 'heading_color' );
$content_text_color = get_field( 'text_color' );

$media_type      = get_field( 'media_type' );
$add_overlay     = get_field( 'add_overlay' );
$overlay_color   = get_field( 'overlay_color' );
$parallax        = get_field( 'parallax' );
$color           = get_field( 'color' );
$gradient        = get_field( 'gradient' );
$image_url       = get_field( 'image' );
$mobile_image_id = get_field( 'mobile_background_image' );

// Setup defaults.
$args = [
	'container'       => 'section',
	'background_type' => $media_type,
	'class'           => 'content-block resource-centered-banner hero-background hero-banner background-logomark',
	'id'              => '',
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
		$video_mp4  = get_sub_field( 'video_mp4' );
		$video_webm = get_sub_field( 'video_webm' );

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
			<div class="row align-items-center">
				<div class="col-12">
					<div class="breadcrumbs <?php echo $breadcrumbs_color; ?>"><?php echo template_breadcrumbs(); ?></div>
					<?php
					$heading = get_field( 's_heading' );
					$content = get_field( 's_content' );
					$button  = get_field( 's_button' );
					$image   = get_field( 's_image' );

					if ( $heading ) { ?>
						<h1 class="text-white heading-1 <?php echo $main_heading_color; ?>"><?php echo $heading; ?></h1>
					<?php } ?>
					<div class="text-white hero-banner-content <?php echo $content_text_color; ?>"><?php echo $content; ?></div>
					<?php if ( $button ) { ?>
						<div class="get-a-demo">
							<a href="<?php echo $button['url']; ?>" class="btn btn-gradient" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
						</div>
					<?php } ?>
				</div>
				<?php
				$form = get_field( 'form' );

				if ( $form ) {
					?>
					<div class="col-12">
						<div class="resource-grivity-form">
							<?php echo do_shortcode( '[gravityform id="' . $form . '" title="false" ajax="true"]' ); ?>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</<?php echo $args['container']; ?>>

<section class="featured_resources bg-light-gray search-filter-resource">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="form-group mb-0">
					<?php echo do_shortcode( '[searchandfilter id="939"]' ); ?>
				</div>
			</div>
		</div>
		<?php
		$paged = ! empty( $_GET['sf_paged'] ) ? $_GET['sf_paged'] : 1;
		$resources = new WP_Query( [
			'post_type'        => 'post',
			'post_status'      => 'publish',
			'search_filter_id' => 939,
			'paged'            => $paged,
		] );

		if ( $resources->have_posts() ) {
			?>
			<div id="posts" class="posts-list row">
				<?php
				while ( $resources->have_posts() ): $resources->the_post();
					$post_id           = get_the_ID();
					$post_categories   = get_the_terms( get_the_ID(), 'category' );
					$white_papers_type = $post_categories[0]->name;
					?>
					<div class="col-12 col-md-4 col-lg-4">
						<div class="featured_resources_block">
							<?php if ( has_post_thumbnail() ) { ?>
								<div class="featured_resources_img">
									<a href="<?php the_permalink( $post_id ); ?>">
										<?php the_post_thumbnail( 's_243' ); ?>
									</a>
								</div>
							<?php } ?>
							<div class="featured_resources_content">
								<?php
								if ( $white_papers_type ) { ?>
									<p class="text-uppercase featured_text"><?php echo $white_papers_type; ?></p>
								<?php } else { ?>
									<p class="text-uppercase featured_text"><?php echo get_the_category( $post_id )[0]->name; ?></p>
								<?php } ?>
								<a href="<?php the_permalink( $post_id ); ?>"><h4 class="featured_heading"><?php echo get_the_title( $post_id ); ?></h4></a>
							</div>
							<div class="view-btn text-right">
								<a href="<?php the_permalink( $post_id ); ?>" class="btn btn-biew">View <span class="right-arrow"></span></a>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
			<div class="resources-pagination row">
				<div class="pagination-gradient col-12 text-center d-flex justify-content-center">
					<?php
					echo paginate_links( [
						'prev_text' => "<i class='fas fa-chevron-left'></i>",
						'next_text' => "<i class='fas fa-chevron-right'></i>",
						'base'      => site_url() . '%_%',
						'format'    => "?paged=%#%",
						'total'     => $resources->max_num_pages,
						'current'   => $paged,
						'mid_size'  => 1,
						'end_size'  => 0,
					] );
					?>
				</div>
			</div>
			<?php wp_reset_postdata(); ?>
		<?php } ?>
	</div>
</section>

<?php
/* BG Settings */
$cta_media_type    = get_field( 'cta_media_type' );
$cta_add_overlay   = get_field( 'cta_add_overlay' );
$cta_overlay_color = get_field( 'cta_overlay_color' );
$cta_parallax      = get_field( 'cta_parallax' );
$cta_color         = get_field( 'cta_color' );
$cta_gradient      = get_field( 'cta_gradient' );
$cta_image         = get_field( 'cta_image' );
$cta_video_mp4     = get_field( 'cta_cta_video_mp4' );
$cta_video_webm    = get_field( 'cta_video_webm' );

/* Other Settings */
$cta_custom_id        = get_field( 'cta_custom_id' );
$cta_custom_css_class = get_field( 'cta_custom_css_class' );
$cta_heading_color    = get_field( 'cta_heading_color' );
$cta_text_color       = get_field( 'cta_text_color' );

/* video Settings */
$image_video = get_field( 'image_video' );
$video_id    = get_field( 'video_id' ); ?>
	<section class="<?php if ( $cta_media_type == 'image' && ! empty( $cta_image ) && $cta_parallax ) {
		echo 'prallax-added';
	}
	if ( $cta_media_type == 'none' ) {
		echo 'bg-dark-gradient';
	} ?> cta_side_image  <?php echo ! empty( $cta_custom_css_class ) ? $cta_custom_css_class . ' ' : '';
	/* bg image */
	echo ( $cta_media_type == 'image' && ! empty( $cta_image ) ) ? 'bg-image ' : '';
	/* bg color */
	echo $cta_media_type == 'color' && ! empty( $cta_color ) ? 'bg-' . $cta_color : '';
	/* bg color */
	echo $cta_media_type == 'gradient' && ! empty( $cta_gradient ) ? 'gradient-' . $cta_gradient : ''; ?>"
		 <?php
		 /* custom id */
		 echo ! empty( $cta_custom_id ) ? 'id="' . $cta_custom_id . '"' : '';
		 /* bg image */
		 if ( $cta_media_type == 'image' && ! empty( $image ) && $cta_parallax ) { ?>style="background-image: url('<?php echo $cta_image ?>')"
		<?php }
		?>>
		<?php
		/* overlay */
		if ( ( $cta_media_type == 'image' || $cta_media_type == 'video' ) && $cta_add_overlay && ! empty( $cta_overlay_color ) ) { ?>
			<div class="overlay <?php echo $cta_overlay_color; ?>"></div>
		<?php }
		/* video */
		if ( $cta_media_type == 'video' && ! empty( $cta_video_mp4 ) || $cta_media_type == 'video' && ! empty( $cta_video_webm ) ) { ?>
			<video class="bg-video" autoplay muted>
				<source src="<?php echo $cta_video_mp4['url'] ?>" type="video/mp4">
				<source src="<?php echo $cta_video_webm['url'] ?>" type="video/webm">
			</video>
		<?php } ?>
		<div class="container-fluid px-0">
			<div class="row no-gutters align-items-center">
				<div class="col-12 col-lg-6">
					<?php if ( have_rows( 'cta_side_image_content' ) ) {
						while ( have_rows( 'cta_side_image_content' ) ) : the_row();
							$cta_heading            = get_sub_field( 'cta_heading' );
							$cta_side_image_content = get_sub_field( 'cta_side_image_content' );
							$cta_side_image_button  = get_sub_field( 'cta_side_image_button' );
							?>
							<div class="cta-side-content">
								<?php if ( $cta_heading ) { ?>
									<h2 class="cta-heading text-white <?php echo $cta_heading_color; ?>"><?php echo $cta_heading; ?></h2>
								<?php } ?>
								<?php if ( $cta_side_image_content ) { ?>
									<div class="cta-content text-white <?php echo $cta_text_color; ?>"><?php echo $cta_side_image_content; ?></div>
								<?php } ?>
								<?php if ( $cta_side_image_button ) { ?>
									<a href="<?php echo $cta_side_image_button['url']; ?>" class="btn btn-gradient lets-connect" target="<?php echo $cta_side_image_button['target']; ?>"><?php echo $cta_side_image_button['title']; ?></a>
								<?php } ?>
							</div>
						<?php
						endwhile;
					}
					?>
				</div>
				<div class="col-12 col-lg-6"><?php
					if ( have_rows( 'cta_group_image' ) ) {
						while ( have_rows( 'cta_group_image' ) ) : the_row();
							$new_cta_image = get_sub_field( 'new_cta_image' );
							?>
							<div class="cta-img text-right">
								<img src="<?php echo $new_cta_image['url'] ?>" class="img-fluid">
							</div>
						<?php
						endwhile;
					}
					?>
				</div>
			</div>
		</div>
	</section>
<?php get_footer();