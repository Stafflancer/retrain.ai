<?php
/* Heading Settings */
$heading = get_sub_field('heading');
$content = get_sub_field('content');

$button = get_sub_field('button');

$cards_per_row = get_sub_field('cards_per_row');

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

wp_enqueue_style('cards_with_round_images_content_block ', get_template_directory_uri() . '/static/css/modules/cards_with_round_images_content_block/cards_with_round_images_content_block.css', [], null);

?>
<section class="<?php if ($media_type == 'image' && !empty($image) && $parallax) { echo 'prallax-added'; } ?> cards_with_round_images_content_block bg-light-gray  <?php 
	/* css class */ echo !empty($custom_css_class) ? $custom_css_class . ' ' : '';
	/* bg image */ echo ($media_type == 'image' && !empty($image)) ? 'bg-image ' : '';
	/* bg color */ echo $media_type == 'color' && !empty($color) ? 'bg-' . $color : '';
	/* bg color */ echo $media_type == 'gradient' && !empty($gradient) ? 'gradient-' . $gradient : ''; ?>"<?php
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
						<div class="cards_with_round_images_content <?php echo $text_color; ?>"><?php echo $content; ?></div>
					<?php }?>
					</div>
				</div>
				<div class="cards_with_round_images_content_inner">
					<div class="cards_with_round_images_content_block_inner">
						<div class="<?php echo 'grid-'.$cards_per_row; ?>">

					<?php if (have_rows('cards')) {
								while (have_rows('cards')) : the_row();
									$heading    = get_sub_field('heading');
									$content = get_sub_field('content');
									$image = get_sub_field('image');
									

									?>

									
							    	<div class="card-block-inner"><?php
							    		if($image)
							    		{ ?>
								    		<div class="card-img">
									    		<img src="<?php echo $image['url']; ?>" class="img-fluid">
									    	</div><?php
									    } ?>
								    	<div class="card-block-content">

								    		<?php if($heading){ ?>
												<h3 class="card-heading"><?php echo $heading; ?></h3>
												
											<?php } ?>
											<?php if($content){ ?>
											<div class="paragraph-content">
										
												<?php echo $content; ?>
											</div>

											<?php } ?>
											
								    	</div>
							    	</div>

									<?php 
								 endwhile;
							} ?>
						</div>
					</div>
					<?php if ($button) { ?>
						<div class="view-all-cases text-center">
							<a href="<?php echo $button['url']; ?>" class="btn btn-gradient" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
						</div>
					<?php }  ?>
					
				</div>
			</div>
		</section>