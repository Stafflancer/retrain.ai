<?php

$media_position = get_sub_field('media_position');
$media_content = get_sub_field('media_content');
$media_block = get_sub_field('media_block');


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

wp_enqueue_style('media_object_content_block', get_template_directory_uri() . '/static/css/modules/media_object_content_block/media_object_content_block.css', [], null);

?>
<section class="<?php if ($media_type == 'image' && !empty($image) && $parallax) { echo 'prallax-added'; } if($media_position == 'right') { echo "rightposition"; } else { echo "leftposition"; } ?> media_object_content_block crack-science-module <?php 

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

			<div class="crack-module-inner">
				<div class="container-fluid px-0">
					<div class="row no-gutters">
						<div class="col-12 col-lg-7">
							<div class="compare-candidate bg-before-blue"><?php
							if(have_rows('media_group'))
							{
								while(have_rows('media_group'))
								{
									the_row(); 
									$image = get_sub_field('image');
									$background_color = get_sub_field('background_color'); 
									if($image)
									{ ?>
										<img src="<?php echo $image['url']; ?>" class="img-fluid <?php echo $background_color; ?>"><?php
									} 
								} 
							} ?>
							</div>
						</div>
						<div class="col-12 col-lg-5">
							<div class="animated-tabs-main">
								<?php if (have_rows('content')) {
									while (have_rows('content')) 
									{   
										the_row();
										$heading    = get_sub_field('c_heading');
										$content = get_sub_field('c_content');
										$button = get_sub_field('c_button'); ?>
										<div class="media-object-content">
											<?php if($heading){ ?>
												<h2 class="media-object-block-heading <?php echo $heading_color; ?>"><?php echo $heading; ?></h2>
											<?php } ?>
											<div class="media-object-paragraph-content <?php echo $text_color; ?>"><?php echo $content; ?></div><?php 
											if ($button) { ?>
												<a href="<?php echo $button['url']; ?>" class="btn btn-gradient" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a><?php 
											} ?>
										</div>
										<?php 
									} 
								} ?>			
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>