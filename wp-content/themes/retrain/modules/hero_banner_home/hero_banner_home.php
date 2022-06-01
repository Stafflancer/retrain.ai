<?php
// Create id attribute allowing for custom "anchor" value.
$id = get_sub_field('custom_id') ? : 'hero-banner-home';

// Create class attribute allowing for custom "className".
$sectionClassName = 'hero_banner_home hero-background hero-banner ';
$sectionClassName .= !empty($custom_css_class) ? ' ' . $custom_css_class : '';
$sectionClassName .= !empty($heading_color) ? ' ' . $heading_color : '';
$sectionClassName .= !empty($text_color) ? ' ' . $text_color : '';


$breadcrumbs_color = get_sub_field('breadcrumbs_color');
$main_heading_color    = get_sub_field('heading_color');
$content_text_color       = get_sub_field('text_color');


?>
<?php //if ($heading || $tagline || $content || $button) {
	wp_enqueue_style('hero_banner_home_styles', get_template_directory_uri() . '/static/css/modules/hero_banner_home/hero_banner_home.css', [], null);
	// Start a <container> with possible block options.
	retrainai_display_block_background_options([
		'container' => 'section', // Any HTML5 container: section, div, etc...
		'class'     => $sectionClassName, // Container class.
		'id'        => $id, // Container id.
	]);
	 ?>

		<div class="container">
			<div class="hero-background-inner">
				<div class="row align-items-baseline">
					<div class="col-12 col-lg-5 pr-0">
						<div class="hero_content-inner">
						<?php if (have_rows('content')) {
								while (have_rows('content')) : the_row();
									$heading    = get_sub_field('heading');
									$tagline     = get_sub_field('tagline');
									$content = get_sub_field('content');
									$button   = get_sub_field('button');

									?>

										<?php if($tagline){ ?>
										<h3 class="text-white workforce-plan"><?php echo $tagline; ?></h3>
										<?php } ?>
										<?php if($tagline){ ?>
										<h1 class="text-white heading-1 <?php echo $main_heading_color; ?>"><?php echo $heading; ?></h1>
										<?php } ?>
										<div class="text-white hero-banner-content <?php echo $content_text_color; ?>"><?php echo $content; ?></div>
										<?php if ($button) { ?>
										<div class="btn-talk">
											<a href="<?php echo $button['url']; ?>" class="btn btn-gradient" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
										</div>
										<?php } 
								 endwhile;
							} ?>
						</div>
					</div>
					<div class="col-12 col-lg-7">
						<?php

							if (have_rows('media')) {
								while (have_rows('media')) : the_row();
									$media_type    = get_sub_field('media_type');
									
									if($media_type == 'video'){
										$classblock = 'banner-video';
										$video = get_sub_field('video');

										?>
										<div class="banner-img text-right">
											<video width="320" height="240" controls>
											  <source src="<?php echo $video['url']; ?>" type="video/mp4">
											  <source src="<?php echo $video['url']; ?>" type="video/ogg">
											</video>
										</div>

										<?php

									}else{

										$image     = get_sub_field('image');

										?>
										<div class="banner-img text-right">
											<img src="<?php echo $image['url'] ?>" class="img-fluid">
										</div>

										<?php

										
									}		

								 endwhile;
							}
						?>
						
					</div>
				</div>
			</div>
		</div>
</section>
<?php //} ?>
