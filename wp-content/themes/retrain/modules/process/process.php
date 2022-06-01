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

wp_enqueue_style('process_css', get_template_directory_uri() . '/static/css/modules/process/process.css', [], null);
wp_enqueue_script( 'process_js', get_template_directory_uri() . '/static/js/modules/process/process.js', [], null );

?>
<section class="<?php if ($media_type == 'image' && !empty($image) && $parallax) { echo 'prallax-added'; } ?> process <?php 
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
				<div class="heading-area">
					<?php if($heading){ ?>
					<h2 class="heading-title-dark text-center <?php echo $heading_color; ?>"><?php echo $heading; ?></h2>
					<?php } ?>
					<?php if($content){?>
						<div class="cards_with_round_images_content <?php echo $text_color; ?>"><?php echo $content; ?></div>
					<?php }?>
				</div>
			</div>
		</div><?php
		if (have_rows('steps')) 
		{ 
			$new = 1; ?>
			<div class="process_inner">
				<ul class="process_grid list-unstyled"><?php 
					while (have_rows('steps')) 
					{
						the_row();
						$step_heading    = get_sub_field('step_heading');
						$step_description = get_sub_field('step_description'); ?>
						
						<li class="process-block <?php if($new == 1){ echo "activedata"; } ?>">
							<span class="number"><span><?php echo $new; ?></span></span>
							<?php
							if($step_heading){ ?>
								<h5 class="simple_card_heading"><?php echo $step_heading; ?></h5><?php 
							}
							if($step_description)
							{ ?>
								<div class="process_step_description">
									<?php echo $step_description; ?>
								</div><?php 
							} ?>
						</li><?php
						$new++;
					} ?>
				</ul>
			</div><?php
		}  ?>
	</div>
</section>