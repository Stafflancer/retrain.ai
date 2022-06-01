	<?php
$fifty_main_heading = get_sub_field('fifty_main_heading');
$fifty_main_description = get_sub_field('fifty_main_description');

/* Heading Settings */
$block_layout = get_sub_field('block_layout');
$left_side_image = get_sub_field('left_side_image');
$right_side_image = get_sub_field('right_side_image');
$image_gradient = get_sub_field('image_gradient');
$image_gradient_right_side = get_sub_field('image_gradient_copy');

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

wp_enqueue_style('fiftyfifty_block', get_template_directory_uri() . '/static/css/modules/fiftyfifty_block/fiftyfifty_block.css', [], null);

?>
<section class="fiftyfifty_block <?php 
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
				<div class="row">
					<div class="col-12 col-lg-12">
						<?php if($fifty_main_heading){ ?>
						<h2 class="heading-title-dark text-center <?php echo $heading_color; ?>"><?php echo $fifty_main_heading; ?></h2>
						<?php } ?>
						<?php if($fifty_main_description){?>
							<div class="cards_with_round_images_content <?php echo $text_color; ?>"><?php echo $fifty_main_description; ?></div>
						<?php }?>
					</div>
				</div>
				<?php if($block_layout == 'textmedia'){?>
				<div class="row align-items-center">
					<div class="col-12 col-md-12 col-lg-6 content-order">

						<?php if (have_rows('media_content')) {
								while (have_rows('media_content')) : the_row();
									$heading    = get_sub_field('heading');
									$content = get_sub_field('content');
									$button   = get_sub_field('button');

									?>

										<div class="block-layout-content">
											<?php if($heading){ ?>
												<h2 class="block-heading <?php echo $heading_color; ?>"><?php echo $heading; ?></h2>
											<?php } ?>
											<div class="paragraph-content <?php echo $text_color; ?>"><?php echo $content; ?></div>
											<?php if ($button) { ?>
												
													<a href="<?php echo $button['url']; ?>" class="btn btn-gradient we-diffrent" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
												
											<?php } ?>
										</div>
										<?php
								 endwhile;
							} ?>

						
					</div>
					<div class="col-12 col-md-12 col-lg-6">
						<?php if($right_side_image){ ?>
						<div class="block-layout-img <?php echo $image_gradient_right_side; ?>"><?php
						if($custom_id == "three-image-block")
						{ ?>
							<div class="new-img-1 new-common-image">
								<img src="<?php echo get_stylesheet_directory_uri()?>/static/images/new-img.png">
							</div>
							<div class="new-img-2 new-common-image">
								<img src="<?php echo get_stylesheet_directory_uri()?>/static/images/img-new.png">
							</div>
							<div class="new-img-3 new-common-image">
								<img src="<?php echo get_stylesheet_directory_uri()?>/static/images/iStock-1261229865.png">
							</div><?php
						} ?>
							<img src="<?php echo $right_side_image['url']; ?>" class="img-fluid">
						</div>
					<?php } ?>
					</div>
				</div>
			<?php }elseif ($block_layout == 'mediatext') { ?>

				<div class="row align-items-center mt-xl-top mb-xl-btm">
					<div class="col-12 col-md-12 col-lg-6">
						<?php if($left_side_image){ ?>
							<div class="block-layout-img <?php echo $image_gradient; ?>"><?php
								if($custom_id == "three-image-block")
								{ ?>
									<div class="new-img-1 new-common-image">
										<img src="<?php echo get_stylesheet_directory_uri()?>/static/images/new-img.png">
									</div>
									<div class="new-img-2 new-common-image">
										<img src="<?php echo get_stylesheet_directory_uri()?>/static/images/img-new.png">
									</div>
									<div class="new-img-3 new-common-image">
										<img src="<?php echo get_stylesheet_directory_uri()?>/static/images/iStock-1261229865.png">
									</div><?php
								} ?>
								<img src="<?php echo $left_side_image['url']; ?>" class="img-fluid">
							</div>
						<?php } ?>
					</div>
					<div class="col-12 col-md-12 col-lg-6">
						
						<?php if (have_rows('media_content')) {
								while (have_rows('media_content')) : the_row();
									$heading    = get_sub_field('heading');
									$content = get_sub_field('content');
									$button   = get_sub_field('button');

									?>

										<div class="block-layout-content">
											<?php if($heading){ ?>
												<h2 class="block-heading <?php echo $heading_color; ?>"><?php echo $heading; ?></h2>
											<?php } ?>
											<div class="paragraph-content <?php echo $text_color; ?>"><?php echo $content; ?></div>
											<?php if ($button) { ?>
												
													<a href="<?php echo $button['url']; ?>" class="btn btn-gradient we-diffrent" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
												
											<?php } ?>
										</div>
										<?php
								 endwhile;
							} ?>

					</div>
				</div>
			<?php }else{ ?>

				<div class="row align-items-center mt-xl-top mb-xl-btm">
					<div class="col-12 col-md-12 col-lg-6">
						<?php if (have_rows('media_content')) {
								while (have_rows('media_content')) : the_row();
									$heading    = get_sub_field('heading');
									$content = get_sub_field('content');
									$button   = get_sub_field('button');

									?>

										<div class="block-layout-content">
											<?php if($heading){ ?>
												<h2 class="block-heading <?php echo $heading_color; ?>"><?php echo $heading; ?></h2>
											<?php } ?>
											<div class="paragraph-content <?php echo $text_color; ?>"><?php echo $content; ?></div>
											<?php if ($button) { ?>
												
													<a href="<?php echo $button['url']; ?>" class="btn btn-gradient we-diffrent" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
												
											<?php } ?>
										</div>
										<?php
								 endwhile;
							} ?>
					</div>
					<div class="col-12 col-md-12 col-lg-6">
						
						<?php if (have_rows('content_secondary')) {
								while (have_rows('content_secondary')) : the_row();
									$heading    = get_sub_field('heading');
									$content = get_sub_field('content');
									$button   = get_sub_field('button');

									?>

										<div class="block-layout-content">
											<?php if($heading){ ?>
												<h2 class="block-heading <?php echo $heading_color; ?>"><?php echo $heading; ?></h2>
											<?php } ?>
											<div class="paragraph-content <?php echo $text_color; ?>"><?php echo $content; ?></div>
											<?php if ($button) { ?>
												
													<a href="<?php echo $button['url']; ?>" class="btn btn-gradient we-diffrent" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
												
											<?php } ?>
										</div>
										<?php
								 endwhile;
							} ?>

					</div>
				</div>


			<?php } ?>	

			</div>
		</section>