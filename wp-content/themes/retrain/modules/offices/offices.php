<?php
/* Heading Settings */
$heading = get_sub_field('heading');



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

wp_enqueue_style('offices_css', get_template_directory_uri() . '/static/css/modules/offices/offices.css', [], null);
wp_enqueue_script( 'offices_js', get_template_directory_uri() . '/static/js/modules/offices/offices.js', [], null );

?>
<section class="<?php if ($media_type == 'image' && !empty($image) && $parallax) { echo 'prallax-added'; } ?> offices <?php 
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
				<?php if($heading){ ?>
				<h2 class="heading-title-dark text-center <?php echo $heading_color; ?>"><?php echo $heading; ?></h2>
				<?php } ?>
			</div>
		</div><?php
		if (have_rows('offices')) 
		{ 
			$i = 1; ?>
			<div class="offices_inner">
				<div class="offices_grid row"><?php 
					while (have_rows('offices')) 
					{
						the_row();
						$office_title    = get_sub_field('office_title');
						$office_address = get_sub_field('office_address'); ?>						
						<div class="col-12 col-lg-4">
							<div class="simple-icons-block text-center <?php echo "newrow-".$i; ?>">
								<div class="hover-content">
									<div class="hover-content-inner">
								
							<?php
							if($office_title){ ?>
								<h3 class="simple_card_heading text-center"><?php echo $office_title; ?></h3><?php 
							}
							if($office_address)
							{ ?>
								<div class="offices_address">
									<?php echo $office_address; ?>
								</div><?php 
							}  ?>
						</div></div></div></div><?php
						$i++; 
					} ?>
				</div>
			</div><?php
		}  ?>
	</div>
</section>