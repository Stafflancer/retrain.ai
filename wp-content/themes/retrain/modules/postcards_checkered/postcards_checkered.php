<?php

$heading = get_sub_field('heading');
$content = get_sub_field('content');
$postcards_button = get_sub_field('postcards_button');


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

wp_enqueue_style('postcards_checkered_css', get_template_directory_uri() . '/static/css/modules/postcards_checkered/postcards_checkered.css', [], null);
wp_enqueue_script( 'postcards_checkered_js', get_template_directory_uri() . '/static/js/modules/postcards_checkered/postcards_checkered.js', [], null );
?>
<section class="<?php if ($media_type == 'image' && !empty($image) && $parallax) { echo 'prallax-added'; } ?> postcards_checkered <?php 

	/* css class */echo !empty($custom_css_class) ? $custom_css_class . ' ' : '';

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

	<div class="postcards-checkered-module-inner">
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-12"><div class="heading-area"><?php 
					if($heading)
					{ ?>
						<h2 class="heading-title-dark text-center <?php echo $heading_color; ?>"><?php echo $heading; ?></h2><?php 
					} 
					if($content)
					{ ?>
						<div class="cards_with_round_images_content <?php echo $text_color; ?>"><?php echo $content; ?></div><?php 
					} ?>
				</div></div>
			</div><?php
			if(have_rows('postcards'))
			{
				while(have_rows('postcards'))
				{
					the_row();
					$postcards_image = get_sub_field('postcards_image');
					$postcards_heading = get_sub_field('postcards_heading');
					$postcards_content = get_sub_field('postcards_content'); ?>
					<div class="postcards-items">
						<div class="row no-gutters">
						<div class="col-12 col-lg-6">
							<div class="postcards-image jarallax" style="background-image: url('<?php echo $postcards_image['url']; ?>');"></div>
						</div>
						<div class="col-12 col-lg-6">
							<div class="postcards-content-area"><?php 
								if($postcards_heading)
								{ ?>
									<h5 class="postcards-heading"><?php echo $postcards_heading; ?></h5><?php 
								}
								if($postcards_content)
								{ ?>
									<div class="postcard-content"><?php echo $postcards_content; ?></div><?php
								} ?>		
							</div>
						</div>
					</div></div><?php
				}
				if($postcards_button)
				{ ?>
					<div class="row">
						<div class="col-12 col-lg-12 text-center">
							<a href="<?php echo $postcards_button['url']; ?>" class="btn btn-gradient" target="<?php echo $postcards_button['target']; ?>"><?php echo $postcards_button['title']; ?></a>
						</div>
					</div>
					<?php
				} 
			} ?>
		</div>
	</div>
</section>