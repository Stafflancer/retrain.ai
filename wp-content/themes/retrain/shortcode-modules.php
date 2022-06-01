<?php 
function promo_bar_shortcode() {
	ob_start();
	$id = get_the_ID();
	
	$pr_heading = get_field('pr_heading');
	$pr_button = get_field('pr_button'); 
	/* BG Settings */
	$media_type    = get_field('media_type');
	$add_overlay   = get_field('add_overlay');
	$overlay_color = get_field('overlay_color');
	$parallax      = get_field('parallax');
	$color         = get_field('color');
	$image         = get_field('image');
	$video_mp4     = get_field('video_mp4');
	$video_webm    = get_field('video_webm');

	/* Other Settings */
	$custom_id        = get_field('custom_id');
	$custom_css_class = get_field('custom_css_class');
	$heading_color    = get_field('heading_color');
	$text_color       = get_field('text_color'); 

	if($pr_heading)
			{ ?>
				<div class="cta-block <?php if ($media_type == 'image' && !empty($image) && $parallax) { echo 'prallax-added'; } 
					if ($media_type == 'none')
					{
						echo "default-blue";
					} 
					echo ($media_type == 'video' && !empty($video_mp4) || $media_type == 'video' && !empty($video_webm)) ? ' video ' : '';
					/* css class */
					echo !empty($custom_css_class) ? $custom_css_class . ' ' : '';
				
					/* bg image */
					echo ($media_type == 'image' && !empty($image)) ? 'bg-image ' : '';
					/* bg color */
					echo $media_type == 'color' && !empty($color) ? 'bg-' . $color : ''; ?>"
					<?php
					/* custom id */
					echo !empty($custom_id) ? 'id="' . $custom_id . '"' : '';
					/* bg image */
					if ($media_type == 'image' && !empty($image) && $parallax) { ?>style="background-image: url('<?php echo $image ?>')"
					<?php }
					?>>
					<div class="row align-items-center">
						<?php if ( ! ( empty( $pr_heading ) ) ): ?>
							<div class="col-12 col-md-9">
								<h3 class="<?php echo $heading_color; ?>"><?php echo $pr_heading; ?></h3>
							</div>
						<?php endif; ?>
						<?php if ( ! ( empty( $pr_button ) ) ): ?>
							<div class="col-12 col-md-3 text-right">
								<a href="<?php echo $pr_button['url']; ?>" class="link_more text-light btn btn-gradient"><?php echo $pr_button['title']; ?></a>
							</div>
						<?php endif; ?>
					</div>
				</div><?php
			}
	
	$output_string = ob_get_contents();
	ob_end_clean();
	return $output_string;

}
add_shortcode('promo-bar', 'promo_bar_shortcode');

function promo_card_shortcode() {
	ob_start();
	$id = get_the_ID();
	
	$promo_image = get_field('promo_image');
			$promo_heading = get_field('promo_heading');
			$promo_content = get_field('promo_content');
			$promo_button = get_field('promo_button');
			$background_options_promo = get_field('background_options_promo');
			$display_options_promo = get_field('display_options_promo'); 

			$media_type    = get_field('media_type_new');
			$parallax   = get_field('parallax_new');
			$add_overlay = get_field('add_overlay_new');
			$overlay_color      = get_field('overlay_color_new');
			$color         = get_field('color_new');
			$gradient         = get_field('gradient_new');
			$image     = get_field('image_new');
			$mobile_background_image    = get_field('mobile_background_image_new');

			/* Other Settings */
			$custom_id        = get_field('custom_id_new');
			$custom_css_class = get_field('custom_css_class_new');
			$heading_color    = get_field('heading_color_new');
			$text_color       = get_field('text_color_new');  
			if($promo_heading)
			{ ?>
				<div class="cta-block-full cta-block-single <?php if ($media_type == 'image' && !empty($image) && $parallax) { echo 'prallax-added'; } 
					if ($media_type == 'none')
					{
						echo "default-blue";
					} 
					echo ($media_type == 'video' && !empty($video_mp4) || $media_type == 'video' && !empty($video_webm)) ? ' video ' : '';
					/* css class */
					echo !empty($custom_css_class) ? $custom_css_class . ' ' : '';
				
					/* bg image */
					echo ($media_type == 'image' && !empty($image)) ? 'bg-image ' : '';
					/* bg color */
					echo $media_type == 'color' && !empty($color) ? 'bg-' . $color : ''; ?>"
					<?php
					/* custom id */
					echo !empty($custom_id) ? 'id="' . $custom_id . '"' : '';
					/* bg image */
					if ($media_type == 'image' && !empty($image) && $parallax) { ?>style="background-image: url('<?php echo $image ?>')"
					<?php }
					?>>
					<div class="cta-block-single-inner align-items-center d-flex flex-wrap"><?php 
						if($promo_image)
						{ ?>
							<div class="left-img-blog">
								<img src="<?php echo $promo_image; ?>">
							</div><?php
						} ?>
						<div class="right-content-blog"><?php 
						if ( ! ( empty( $promo_heading ) ) ): ?>
							<div class="cta-block-single-right">
								<h3 class="heading-blue-single text-white <?php echo $heading_color; ?>"><?php echo $promo_heading; ?></h3>
								<div class="details-cta-content text-white <?php echo $text_color; ?>"><?php echo $promo_content; ?></div>
							<?php 
						endif; ?>
						<?php if ( ! ( empty( $promo_button ) ) ): ?>
							
								<a href="<?php echo $promo_button['url']; ?>" class="link_here text-light btn btn-gradient"><?php echo $promo_button['title']; ?></a>
							</div>
						<?php endif; ?>
						</div>
					</div>
				</div><?php
			}
	
	$output_string = ob_get_contents();
	ob_end_clean();
	return $output_string;

}
add_shortcode('promo-card', 'promo_card_shortcode');