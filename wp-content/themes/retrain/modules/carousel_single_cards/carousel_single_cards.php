<?php
/* Heading Settings */
$heading = get_sub_field('heading');
$content = get_sub_field('content');

$button = get_sub_field('button');

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

/* video Settings */
$image_video = get_sub_field('image_video');
$video_id    = get_sub_field('video_id');

wp_enqueue_style('carousel_single_cards', get_template_directory_uri() . '/static/css/modules/carousel_single_cards/carousel_single_cards.css', [], null);

wp_enqueue_style('OwlCarousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css', [], null);

wp_enqueue_style('OwlCarouselTheme', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css', [], null);

wp_enqueue_script('jquery-js', 'https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js', '', '', true);
wp_enqueue_script('popper-js', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js', '', '', true);
// wp_enqueue_script('bootbundle-js', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js', '', '', true);
wp_enqueue_script('OwlCarousel-js', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', '', '', true);

wp_enqueue_script('carousel_single_cards', get_template_directory_uri() . '/static/js/modules/carousel_single_cards/carousel_single_cards.js', '', '', true);

$cards = get_sub_field('cards');
$show_cards = get_sub_field('show_cards');
if (have_rows('cards')) 
{
	$count = count($cards);
	if($show_cards == 1)
	{ ?>
		<section class="<?php if ($media_type == 'image' && !empty($image) && $parallax) { echo 'prallax-added'; } ?>  carousel_single_cards
	    <?php
		/* css class */
		echo !empty($custom_css_class) ? $custom_css_class . ' ' : '';
		
		/* bg image */
		echo ($media_type == 'image' && !empty($image)) ? 'bg-image ' : '';
		/* bg color */
		echo $media_type == 'color' && !empty($color) ? 'bg-' . $color : '';
		/* bg color */
		echo $media_type == 'gradient' && !empty($gradient) ? 'gradient-' . $gradient : ''; ?>"
		<?php
		/* custom id */
		echo !empty($custom_id) ? 'id="' . $custom_id . '"' : '';
		/* bg image */
		if ($media_type == 'image' && !empty($image) && $parallax) { ?>style="background-image: url('<?php echo $image ?>')"
		<?php }
		?>>
		<?php
		/* overlay */
		if (($media_type == 'image' || $media_type == 'video') && $add_overlay && !empty($overlay_color)) { ?>
			<div class="overlay <?php echo $overlay_color; ?>"></div>
		<?php }

		/* video */
		if ($media_type == 'video' && !empty($video_mp4) || $media_type == 'video' && !empty($video_webm)) { ?>
			<video class="bg-video" autoplay muted>
				<source src="<?php echo $video_mp4['url'] ?>" type="video/mp4">
				<source src="<?php echo $video_webm['url'] ?>" type="video/webm">
			</video>
		<?php } ?>


			<div class="container">
					<div class="row">
						<div class="col-12 col-lg-12">
							<?php if($heading){?>
								<h2 class="heading-title-dark text-center <?php echo $heading_color; ?>"><?php echo $heading; ?></h2>
							<?php } ?>
							<?php if($content){?>
								<div class="carousel_single_cards <?php echo $text_color; ?>"><?php echo $content; ?></div>
							<?php }?>
						</div>
					</div>
					<div class="cards-with-rounded-inner">
						<div class="<?php if($count != 1){ echo "owl-carousel owl-theme"; } ?> cards-images-block single-card-added" <?php if($count != 1){ echo 'id="quote-slider"'; } ?>><?php

									while (have_rows('cards')) : the_row();
										$heading    = get_sub_field('heading');
										$content = get_sub_field('content');
										$image = get_sub_field('image');
										$show_quotes = get_sub_field('show_quotes');
										$heading_position = get_sub_field('heading_position');
										if($show_quotes == 1)
										{ ?>

											<div class="item">
										    	<div class="<?php if($image){ echo "single-card-inner"; } else{ echo "single-block-padding"; } ?>"><?php
										    		if($image)
										    		{ ?>
											    		<div class="single_card_original_img">
											    			<img src="<?php echo $image['url']; ?>" class="img-fluid">
											    		</div><?php
											    	} ?>
										    		<div class="single_quote_right">
										    			<div class="quote-slide-img">
												    		<img src="<?php echo get_stylesheet_directory_uri()?>/static/images/quote-mark.png" class="img-fluid">
												    	</div>
												    	<div class="single-card-inner-content">

												    		<?php if($heading_position == 'top'){

												    			if($heading){ ?>
																	<h3 class="signle-card-heading"><?php echo $heading; ?></h3>
																<?php } ?>
																<div class="single-card-para">
													    			<?php if($content){ ?>
																		<?php echo $content; ?>
																	<?php } ?>
																</div><?php

												    		}else{?>
												    			<div class="single-card-para">
																	<?php if($content){ ?>
																		<?php echo $content; ?>
																	<?php } ?>
																</div>

																<?php if($heading){ ?>
																	<h3 class="signle-card-heading"><?php echo $heading; ?></h3>
																<?php } ?>
									    					<?php } ?>

												    	</div>
										    		</div>
										    	</div>
										    </div><?php
										} 
									endwhile;
								?>
						    
						</div>
					</div>
				</div>
			</section><?php
		}
} ?>
