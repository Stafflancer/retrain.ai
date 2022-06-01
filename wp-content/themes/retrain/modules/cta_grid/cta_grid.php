<?php

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

wp_enqueue_style('cta_grid', get_template_directory_uri() . '/static/css/modules/cta_grid/cta_grid.css', [], null);
wp_enqueue_script('cta_grid_js', get_template_directory_uri() . '/static/js/modules/cta_grid/cta_grid.js', [], null);
?>
<section class="cta_grid <?php 
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

	<div class="container-fluid px-0">
		<div class="row no-gutters"><?php
		if(have_rows('left_block'))
		{ 	
			while(have_rows('left_block'))
			{ 
				the_row(); 
				$cta_grid_heading = get_sub_field('cta_grid_heading');
				$cta_grid_content = get_sub_field('cta_grid_content');
				$cta_grid_button = get_sub_field('cta_grid_button');  ?>
				<div class="col-12 col-md-6">
					<a href="<?php echo $cta_grid_button['url']; ?>" target="<?php echo $cta_grid_button['target']; ?>">
						<div class="cta-layout-area left_block" style="background-image: url(<?php echo get_stylesheet_directory_uri()?>/static/images/iStock-1302423098.png);">
							<div class="cta-layout-inner">
								<?php 
								if($cta_grid_heading)
								{ ?>
									<h3 class="block-heading <?php echo $heading_color; ?>"><?php echo $cta_grid_heading; ?></h3><?php 
								}
								if($cta_grid_content)
								{ ?>
									<div class="paragraph-content <?php echo $text_color; ?>"><?php echo $cta_grid_content; ?></div><?php
								}
								if ($cta_grid_button) 
								{ ?>
									<span class="btn btn-gradient"><?php echo $cta_grid_button['title']; ?></span><?php 
								} ?>
							</div>
						</div>
					</a>
				</div><?php
			}
		} 
		if(have_rows('right_block'))
		{ 	
			while(have_rows('right_block'))
			{ 
				the_row(); 
				$right_cta_grid_heading = get_sub_field('cta_grid_heading');
				$right_cta_grid_content = get_sub_field('cta_grid_content');
				$right_cta_grid_button = get_sub_field('cta_grid_button');  ?>
				<div class="col-12 col-md-6">
					<a href="<?php echo $right_cta_grid_button['url']; ?>" target="<?php echo $right_cta_grid_button['target']; ?>">
						<div class="cta-layout-area right_block" style="background-image: url(<?php echo get_stylesheet_directory_uri()?>/static/images/iStock-666135210.png);">
							<div class="cta-layout-inner">
								<?php 
								if($right_cta_grid_heading)
								{ ?>
									<h3 class="block-heading <?php echo $heading_color; ?>"><?php echo $right_cta_grid_heading; ?></h3><?php 
								}
								if($right_cta_grid_content)
								{ ?>
									<div class="paragraph-content <?php echo $text_color; ?>"><?php echo $right_cta_grid_content; ?></div><?php
								}
								if ($right_cta_grid_button) 
								{ ?>
									<span class="btn btn-gradient"><?php echo $right_cta_grid_button['title']; ?></span><?php 
								} ?>
							</div>
						</div>
					</a>
				</div><?php
			} 
		} ?>
		</div>
	</div>
</section>