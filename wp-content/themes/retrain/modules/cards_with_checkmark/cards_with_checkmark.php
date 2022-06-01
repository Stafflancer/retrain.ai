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

wp_enqueue_style('cards_with_checkmark ', get_template_directory_uri() . '/static/css/modules/cards_with_checkmark/cards_with_checkmark.css', [], null);

?>
<section class="<?php if ($media_type == 'image' && !empty($image) && $parallax) { echo 'prallax-added'; } ?> cards_with_checkmark bg-dark-blue <?php 
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
	<?php } 
	if (have_rows('cards')) 
	{ ?>
		<div class="container">
			<div class="cards_with_checkmark_block">
				<div class="row align-items-center">
						<div class="col-12 col-sm-6 col-md-6 col-lg-4">
							<div class="core-values">
								<?php if($heading){?>
								<h2 class="core-values-heading <?php echo $heading_color; ?>"><?php echo $heading; ?></h2>
								<?php } ?>
								<?php if($content){?>
									<div class="content-core <?php echo $text_color; ?>"><?php echo $content; ?></div>
								<?php }?>
							</div>
						</div><?php
						while (have_rows('cards')) 
						{
							the_row();
							$heading    = get_sub_field('heading');
							$content = get_sub_field('content'); ?>
							<div class="col-12 col-sm-6 col-md-6 col-lg-4">
								<div class="cards_with_checkmark_grid">
									<?php if($heading)
										{ ?>
											<div class="cards_with_checkmark_heading">
												<span class="checkmark-icon"><img src="<?php echo get_stylesheet_directory_uri()?>/static/images/Checkmark.svg" class="img-fluid"></span>
												<span><h3><?php echo $heading; ?></h3></span>
											</div><?php
										}
										if($content)
										{ ?>
											<div class="cards_with_checkmark_content">
												<?php echo $content; ?>
											</div><?php
										} ?>
									</div>
								
							</div><?php
						} ?>
				</div>
			</div>
		</div><?php
	} ?>
</section>