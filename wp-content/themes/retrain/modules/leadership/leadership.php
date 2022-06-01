<?php

$layout = get_sub_field('layout');
$left_picture = get_sub_field('left_picture');
$center_picture = get_sub_field('center_picture');
$right_picture = get_sub_field('right_picture');
$leadership_heading = get_sub_field('leadership_heading');
$leadership_content = get_sub_field('leadership_content');
$leadership_button = get_sub_field('leadership_button');

/* Heading Settings */


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

wp_enqueue_style('leadership', get_template_directory_uri() . '/static/css/modules/leadership/leadership.css', [], null);

?>
<section class="leadership <?php 
	if ($media_type == 'image' && !empty($image) && $parallax) { echo 'prallax-added'; } ?> 
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
		<div class="row align-items-center <?php if($layout == 'vertical'){ echo "vertical"; } else { echo "horizontal"; } ?>">
			<div class="col-12 col-md-12 col-lg-6">
				<div class="block-layout-content"><?php 
					if($leadership_heading)
					{ ?>
						<h2 class="block-heading <?php echo $heading_color; ?>"><?php echo $leadership_heading; ?></h2><?php 
					}
					if($leadership_content)
					{ ?>
						<div class="paragraph-content <?php echo $text_color; ?>"><?php echo $leadership_content; ?></div><?php
					}
					if ($leadership_button) 
					{ ?>
						<a href="<?php echo $leadership_button['url']; ?>" class="btn btn-gradient we-diffrent" target="<?php echo $leadership_button['target']; ?>"><?php echo $leadership_button['title']; ?></a><?php 
					} ?>
				</div>
			</div>
			<div class="col-12 col-md-12 col-lg-6">
				<div class="block-layout-inner"><?php 
					if($left_picture)
					{ ?>
						<div class="block-layout-img left_picture">
							<img src="<?php echo $left_picture['url']; ?>" class="img-fluid">
						</div><?php 
					} 
					if($center_picture)
					{ ?>
						<div class="block-layout-img center_picture">
							<img src="<?php echo $center_picture['url']; ?>" class="img-fluid">
						</div><?php 
					} 
					if($right_picture)
					{ ?>
						<div class="block-layout-img right_picture">
							<img src="<?php echo $right_picture['url']; ?>" class="img-fluid">
						</div><?php 
					} ?>
				</div>
			</div>
		</div>
	</div>
</section>