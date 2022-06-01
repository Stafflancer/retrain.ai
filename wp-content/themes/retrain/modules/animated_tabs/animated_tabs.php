<?php
/* Heading Settings */
$heading = get_sub_field( 'heading' );
$content = get_sub_field( 'content' );

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

wp_enqueue_style( 'animated_tabs', get_template_directory_uri() . '/static/css/modules/animated_tabs/animated_tabs.css', [], null );

wp_enqueue_script( 'animated-tabs-js', get_template_directory_uri() . '/static/js/modules/animated_tabs/animated_tabs.js', [], null );

?>
<section class="<?php if ( $media_type == 'image' && ! empty( $image ) && $parallax ) {
	echo 'prallax-added';
} ?> animated_tabs crack-science-module
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

	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-12">
				<?php
				if ( $heading ) { ?>
					<h2 class="heading-title-dark text-center <?php echo $heading_color; ?>"><?php echo $heading; ?></h2>
					<?php
				}
				if ( $content ) { ?>
					<div class="animated-tab-paragraph-content-main <?php echo $text_color; ?>"><?php echo $content; ?></div>
					<?php
				} ?>
			</div>
		</div>
	</div>
	<div class="crack-module-inner">
		<div class="container">
			<?php if(wp_is_mobile()){ ?>

				<div class="row align-items-center">
				<div class="col-12 col-lg-6 col-xl-7 pl-0 animated-tabs-main-image"><?php
					if ( have_rows( 'tabs' ) ) {
						$upernumbercount = 1;
						while ( have_rows( 'tabs' ) ) {
							the_row();
							$heading        = get_sub_field( 'heading' );
							$content        = get_sub_field( 'content' );
							$animated_image = get_sub_field( 'animated_image' );
							$button         = get_sub_field( 'button' );
							?>
							<div class="animated-tabs-main-new-image">
								<div id="imagescrollAnimationId<?php echo $upernumbercount; ?>" data-id="<?php echo $upernumbercount; ?>" class="compare-candidate animated-tabs-inners newprograssdata <?php if ( $upernumbercount == 1 ) {echo 'activedata';} ?> numbers-<?php echo $upernumbercount; ?>">
									<?php if ( $animated_image ) { ?>
										<div class="animated-tab-paragraph-content">
											<img src="<?php echo $animated_image; ?>">
										</div>
									<?php } ?>
									<?php if ( $button ) { ?>
										<div class="view-platform mt-50 text-center">
											<a class="btn btn-gradient" href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
										</div>
									<?php } ?>
								</div>
							</div>

							<div class="animated-tabs">
									<div id="scrollAnimationId<?php echo $upernumbercount; ?>" data-id="<?php echo $upernumbercount; ?>" class="animated-tabs-inner for-prograss-bar newprograssdata <?php if ( $upernumbercount == 1 ) {echo 'activedata';} ?> numbers-<?php echo $upernumbercount; ?>">
										<?php if ( $heading ){ ?>
											<h3 class="heading-progress"><?php echo $heading; ?></h3>
										<?php } ?>
										<?php if ( $content ) { ?>
											<div class="animated-tabs-content">
												<?php echo $content; ?>
											</div>
										<?php } ?>
									</div>
								</div>

							<?php
							$upernumbercount++;
						}
					} ?>
				</div>
				
			</div>

			<?php }else{?>
			<div class="row align-items-center">
				<div class="col-12 col-lg-6 col-xl-7 pl-0 animated-tabs-main-image"><?php
					if ( have_rows( 'tabs' ) ) {
						$upernumbercount = 1;
						while ( have_rows( 'tabs' ) ) {
							the_row();
							$heading        = get_sub_field( 'heading' );
							$content        = get_sub_field( 'content' );
							$animated_image = get_sub_field( 'animated_image' );
							$button         = get_sub_field( 'button' );
							?>
							<div class="animated-tabs-main-new-image">
								<div id="imagescrollAnimationId<?php echo $upernumbercount; ?>" data-id="<?php echo $upernumbercount; ?>" class="compare-candidate animated-tabs-inners newprograssdata <?php if ( $upernumbercount == 1 ) {echo 'activedata';} ?> numbers-<?php echo $upernumbercount; ?>" style="display: none;">
									<?php if ( $animated_image ) { ?>
										<div class="animated-tab-paragraph-content">
											<img src="<?php echo $animated_image; ?>">
										</div>
									<?php } ?>
									<?php if ( $button ) { ?>
										<div class="view-platform mt-50 text-center">
											<a class="btn btn-gradient" href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
										</div>
									<?php } ?>
								</div>
							</div>
							<?php
							$upernumbercount++;
						}
					} ?>
				</div>
				<div class="col-12 col-lg-6 col-xl-5">
					<div class="animated-tabs-main"><?php
						if ( have_rows( 'tabs' ) ) {
							$numbercount = 1;
							while ( have_rows( 'tabs' ) ) {
								the_row();
								$heading = get_sub_field( 'heading' );
								$content = get_sub_field( 'content' );
								?>
								<div class="animated-tabs">
									<div class="animated-progress progress-bar-purple <?php if ( $numbercount == 1 ) {echo 'animated-class';} ?>">
										<span id="scrollId<?php echo $numbercount; ?>" class="beforeattr <?php if ( $numbercount ) {echo 'fill-dark';} ?>" data-progress="100"></span>
									</div>
									<div id="scrollAnimationId<?php echo $numbercount; ?>" data-id="<?php echo $numbercount; ?>" class="animated-tabs-inner for-prograss-bar newprograssdata <?php if ( $numbercount == 1 ) {echo 'activedata';} ?> numbers-<?php echo $numbercount; ?>">
										<?php if ( $heading ){ ?>
											<h3 class="heading-progress"><?php echo $heading; ?></h3>
										<?php } ?>
										<?php if ( $content ) { ?>
											<div class="animated-tabs-content">
												<?php echo $content; ?>
											</div>
										<?php } ?>
									</div>
								</div>
								<?php
								$numbercount++;
							}
						} ?>
					</div>
				</div>
			</div>

		<?php } ?>

		</div>
	</div>
</section>