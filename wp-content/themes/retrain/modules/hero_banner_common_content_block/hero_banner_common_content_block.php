<?php
// Create id attribute allowing for custom "anchor" value.
$id = get_sub_field('custom_id') ? : 'hero-banner-common-content';

// Create class attribute allowing for custom "className".
$sectionClassName = 'hero_banner_common_content_block hero-background hero-banner background-logomark ';
$sectionClassName .= !empty($custom_css_class) ? ' ' . $custom_css_class : '';
$sectionClassName .= !empty($heading_color) ? ' ' . $heading_color : '';
$sectionClassName .= !empty($text_color) ? ' ' . $text_color : '';

$breadcrumbs_color = get_sub_field('breadcrumbs_color');
$main_heading_color    = get_sub_field('heading_color');
$content_text_color       = get_sub_field('text_color');
?>
<?php //if ($heading || $tagline || $content || $button) {
	wp_enqueue_style('hero_banner_common_content_block_styles', get_template_directory_uri() . '/static/css/modules/hero_banner_common_content_block/hero_banner_common_content_block.css', [], null);

	wp_register_script( 'lottie', 'https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.9.4/lottie.min.js', null, null, true );
	wp_enqueue_script('lottie');

	wp_enqueue_script( 'bodymovin-js', get_template_directory_uri() . '/static/js/modules/hero_banner_common_content_block/bodymovin.js', array(), _S_VERSION, true );

	// Start a <container> with possible block options.
	retrainai_display_block_background_options([
		'container' => 'section', // Any HTML5 container: section, div, etc...
		'class'     => $sectionClassName, // Container class.
		'id'        => $id, // Container id.
	]);
	?>

	<div class="container">
		<div class="hero-background-inner">
			<div class="row align-items-center">
				<div class="col-12 col-lg-5 pr-0">
					<div class="breadcrumbs <?php echo $breadcrumbs_color; ?>"><?php echo template_breadcrumbs(); ?></div>
					<?php
					$heading    = get_sub_field('s_heading');
					$content = get_sub_field('s_content');
					$button   = get_sub_field('s_button');
					$image   = get_sub_field('s_image'); 
					if($heading)
					{ ?>
						<h1 class="text-white heading-1 <?php echo $heading_color; ?>"><?php echo $heading; ?></h1><?php 
					} ?>
					<div class="text-white hero-banner-content <?php echo $content_text_color; ?>"><?php echo $content; ?></div><?php 
					if ($button) 
					{ ?>
						<div class="get-a-demo">
							<a href="<?php echo $button['url']; ?>" class="btn btn-gradient" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
						</div><?php 
					} ?>

				</div>
				<div class="col-12 col-lg-7"><?php
					if(is_page( 'Platform' )) 
					{ ?>
						<div id="svgContainer"></div><?php
					}
					else
					{
						$image = get_sub_field('s_image'); 
						if($image)
						{ ?>
							<div class="banner-img text-center ">
								<img src="<?php echo $image['url'] ?>" class="img-fluid">
							</div><?php

						}
					} ?>	
				</div>
			</div>
		</div>
	</div>
</section>
<?php //} ?>
