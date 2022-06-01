<?php
/* Heading Settings */
$media_position = get_sub_field('media_position');

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

wp_enqueue_style('grid_block', get_template_directory_uri() . '/static/css/modules/grid_block/grid_block.css', [], null);

?>
<section class="<?php if ($media_type == 'image' && !empty($image) && $parallax) { echo 'prallax-added'; } ?> grid_block
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
					$grid_heading = get_sub_field('grid_heading'); 
					if($grid_heading)
					{ ?> 
						<div class="col-12 col-lg-12"><h2 class="grid-block-main-heading heading-title-dark text-center headingdark"><?php echo $grid_heading; ?></h2></div><?php
					} ?>
					<?php if($media_position == 'right'){?>
					
					<div class="col-12 col-lg-6">

						<?php if (have_rows('media_content')) {
								while (have_rows('media_content')) : the_row();
									$heading    = get_sub_field('heading');
									$content = get_sub_field('content');
									$button   = get_sub_field('button');

									?>
									<div class="grid-block-market-content">
										<?php if($heading){ ?>
											<h2 class="grid-block-heading text-white <?php echo $heading_color; ?>"><?php echo $heading; ?></h2>
										<?php } 
										?>
										<div class="grid-paragraph-content text-white <?php echo $text_color; ?>"><?php echo $content; ?></div>
										<?php if ($button) { ?>
										
											<a href="<?php echo $button['url']; ?>" class="btn btn-gradient our-story" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
										
										<?php } ?>
									</div>

										<?php  
								 endwhile;
							} ?>

						
					</div>
					<div class="col-12 col-lg-6">

						<?php if (have_rows('media_block')) {
								while (have_rows('media_block')) : the_row();
									$image    = get_sub_field('image');
									$overlay_type     = get_sub_field('overlay_type');
									
									if($overlay_type == 'color'){
										$overlay_color = get_sub_field('overlay_color');
										$class='coloroverlay-'.$overlay_color;
									}else{
										$overlay_gradient   = get_sub_field('overlay_gradient');
										$class='gradientoverlay-'.$overlay_gradient;
									}
									?>
									<div class="grid-block-img-right position-relative <?php echo $class; ?>" style="background-image:url('<?php echo $image['url']; ?>') ;">
										<!-- <img src="<?php echo $image['url']; ?>" class="img-fluid" /> -->
									</div>
									<?php
								 endwhile;
							} ?>
					</div>
				<?php }else{ ?>

					<div class="col-12 col-lg-6">
						<?php if (have_rows('media_block')) {
								while (have_rows('media_block')) : the_row();
									$image    = get_sub_field('image');
									$overlay_type     = get_sub_field('overlay_type');
									
									if($overlay_type == 'color'){
										$overlay_color = get_sub_field('overlay_color');
										$class='coloroverlay-'.$overlay_color;
									}else{
										$overlay_gradient   = get_sub_field('overlay_gradient');
										$class='gradientoverlay-'.$overlay_gradient;
									}
									?>
									<div class="grid-block-img-right position-relative <?php echo $class; ?>">
										<img src="<?php echo $image['url']; ?>" class="img-fluid" />
									</div>
									<?php
								 endwhile;
							} ?>
					</div>
					<div class="col-12 col-lg-6">
						<?php if (have_rows('media_content')) {
								while (have_rows('media_content')) : the_row();
									$heading    = get_sub_field('heading');
									$content = get_sub_field('content');
									$button   = get_sub_field('button');

									?>
									<div class="grid-block-market-content">
										<?php if($heading){ ?>
											<h2 class="grid-block-heading text-white <?php echo $heading_color; ?>"><?php echo $heading; ?></h2>
										<?php } ?>
										<div class="grid-paragraph-content text-white <?php echo $text_color; ?>"><?php echo $content; ?></div>
										<?php if ($button) { ?>
										
											<a href="<?php echo $button['url']; ?>" class="btn btn-gradient our-story" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
										
										<?php } ?>
									</div>

										<?php 
								 endwhile;
							} ?>
					</div>

				<?php } ?>
				</div>
			</div>
		</section>