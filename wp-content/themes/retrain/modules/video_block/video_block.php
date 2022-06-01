<?php
/* Heading Settings */
$heading_video = get_sub_field('heading_video');
$content_video = get_sub_field('content_video');
$video = get_sub_field('video');
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

wp_enqueue_style('video_block', get_template_directory_uri() . '/static/css/modules/video_block/video_block.css', [], null);
//wp_enqueue_style('bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css', [], null);

if($video)
{ ?>
<section class="<?php if ($media_type == 'image' && !empty($image) && $parallax) { echo 'prallax-added'; } ?> video_block video-module <?php     
	
	echo !empty($custom_css_class) ?  $custom_css_class . ' ' : '';
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
	/* bg image with parallax */
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
				
				<?php if (!empty($heading_video)) { ?>
				<h2 class="heading-title-dark text-center <?php echo $heading_color; ?>"><?php echo $heading_video; ?></h2>
				<?php }
				if ($content_video) { ?>
					<div class="cards_with_round_images_content <?php echo $text_color; ?>"><?php echo $content_video; ?></div>
				<?php } ?>
				<?php
				if($video){
				?>
				<div class="video-module-inner">
					<?php echo $video; ?>
				</div>
			<?php } ?>

				<?php if ($button) { ?>
					<div class="btn-talk">
						<a href="<?php echo $button['url']; ?>" class="btn btn-gradient" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section><?php
} ?>
