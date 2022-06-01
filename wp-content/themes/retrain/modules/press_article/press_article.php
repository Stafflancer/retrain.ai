<?php
$heading   = get_sub_field('heading');
$description   = get_sub_field('description');
$s_press = get_sub_field('press');


/* BG Settings */
$media_type    = get_sub_field('media_type');
$add_overlay   = get_sub_field('add_overlay');
$overlay_color = get_sub_field('overlay_color');
$parallax      = get_sub_field('parallax');
$color         = get_sub_field('color');
$image         = get_sub_field('image');
$video_mp4     = get_sub_field('video_mp4');
$video_webm    = get_sub_field('video_webm');

/* Other Settings */
$custom_id        = get_sub_field('custom_id');
$custom_css_class = get_sub_field('custom_css_class');
$heading_color    = get_sub_field('heading_color');
$text_color       = get_sub_field('text_color'); ?>

<?php //if ($heading) {
	/*if (!empty($s_press)) {
		wp_enqueue_style('slick-style');
	}*/

	wp_enqueue_style('press_article_styles', get_template_directory_uri() . '/static/css/modules/press_article/press_article.css', [], null);

	wp_enqueue_style('OwlCarousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css', [], null);

	wp_enqueue_style('OwlCarouselTheme', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css', [], 
		null);

	
	wp_enqueue_script('OwlCarousel-js', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', '', '', true);

	wp_enqueue_script('press_article_js', get_template_directory_uri() . '/static/js/modules/press_article/new_press_article.js', [], null);



if (!empty($s_press)) 
{  
	$count = count($s_press); ?>
	<section class="<?php if ($media_type == 'image' && !empty($image) && $parallax) { echo 'prallax-added'; } ?> press_article
        <?php
		echo ($media_type == 'video' && !empty($video_mp4) || $media_type == 'video' && !empty($video_webm)) ? ' video ' : '';
		/* css class */
		echo !empty($custom_css_class) ? $custom_css_class . ' ' : '';
	
		/* bg image */
		echo ($media_type == 'image' && !empty($image)) ? 'bg-image ' : '';
		/* bg color */
		echo $media_type == 'color' && !empty($color) ? 'bg-' . $color : ''; ?>"
		<?php
		/* custom id */
		echo !empty($custom_id) ? 'id="' . $custom_id . '"' : '';
		/* bg image */
		if ($media_type == 'image' && !empty($image) && $parallax) { ?>style="background-image: url('<?php echo $image ?>')"
		<?php }
		?>>
		<div class="container">
			<?php
			/* overlay */
			if (($media_type == 'image' || $media_type == 'video') && $add_overlay && !empty($overlay_color)) { ?>
				<div class="overlay <?php echo $overlay_color; ?>"></div>
			<?php }

			/* video */
			if ($media_type == 'video' && !empty($video_mp4) || $media_type == 'video' && !empty($video_webm)) { ?>
				<video class="bg-video" autoplay loop muted>
					<source src="<?php echo $video_mp4['url'] ?>" type="video/mp4">
					<source src="<?php echo $video_webm['url'] ?>" type="video/webm">
				</video>
			<?php } ?>
				<div class="row">
					<div class="col-12 col-lg-12"><?php 
						if ($heading) { ?>
							<h2 class="heading-title-dark text-center <?php echo $heading_color; ?>"><?php echo $heading; ?></h2><?php 
						}
						if($description)
						{ ?>
							<div class="paragraph-content text-center <?php echo $text_color; ?>"><?php echo $description; ?></div><?php
						} ?>
					</div>
				</div>
				<div class="row"><?php
					if ( $count > 3 ) 
					{ ?>
						<div id="press-slider" class="owl-carousel owl-theme resource-slider"><?php 
					}
						foreach ($s_press as $item) 
						{ ?>
							<div class="col-12 <?php if ( $count < 4 ) { echo "col-md-4 col-lg-4"; } ?>">
								<div class="press_article_block"><?php
									$thumb = get_the_post_thumbnail($item, 's_243');
									if ($thumb) 
									{ ?>
										<div class="press_article_img">
											<a href="<?php the_permalink($item); ?>"><?php echo $thumb; ?></a>
										</div><?php 
									} ?>
									<div class="press_article_content">
										<p class="text-uppercase featured_text"><?php echo get_the_category( $item )[0]->name; ?></p>
										<a href="<?php the_permalink($item); ?>"><h4 class="featured_heading"><?php echo get_the_title($item); ?></h4></a>
									</div>
									<div class="view-btn text-right">
										<a href="<?php the_permalink($item); ?>" class="btn btn-biew">View <span class="right-arrow"></span></a>
									</div>
								</div>
							</div><?php 
						} 
					if ( $count > 3 ) 
					{ ?>
						</div><?php 
					} ?>
				</div>
				<div class="col-12 col-lg-12">
					<div class="text-center">
						<a href="<?php echo get_permalink(2059); ?>" class="btn btn-gradient view-all" target="_blank">View All</a>
					</div>
				</div>
			</div>
	</section><?php 
} ?>
