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

wp_enqueue_style('simple_cards ', get_template_directory_uri() . '/static/css/modules/simple_cards/simple_cards.css', [], null);
wp_enqueue_style('animate ', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css', [], null);

wp_register_script( 'oyethemes_onscroll_animation', 'https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js', null, null, true );
wp_enqueue_script('oyethemes_onscroll_animation');
?>
<section class="<?php if ($media_type == 'image' && !empty($image) && $parallax) { echo 'prallax-added'; } ?> simple_cards bg-light-gray  <?php 
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
				<?php if($heading){?>
				<h2 class="heading-title-dark text-center <?php echo $heading_color; ?>"><?php echo $heading; ?></h2>
				<?php } ?>
				<?php if($content){?>
					<div class="cards_with_round_images_content <?php echo $text_color; ?>"><?php echo $content; ?></div>
				<?php }?>
			</div>
		</div><?php
		if (have_rows('cards')) 
		{ ?>
			<div class="simple_cards_inner">
				<div class="simple_cards_grid <?php echo 'grid-'.$cards_per_row; ?>"><?php 
					$number = 1;
					while (have_rows('cards')) 
					{
						the_row();
						$heading    = get_sub_field('heading');
						$content = get_sub_field('content'); 
						$cards_icon = get_sub_field('cards_icon'); ?>			
						<div class="simple_cards-block <?php if($number%2){ echo "wow fadeInLeft"; } else { echo "wow fadeInRight"; } ?> "><?php
							if($cards_icon)
							{ ?>
								<div class="card-img">
									<img src="<?php echo $cards_icon['url']; ?>" alt="<?php echo $cards_icon['title']; ?>">
								</div><?php
							} 
							if($heading)
							{ ?>
								<h2 class="simple_card_heading"><?php echo $heading; ?></h2><?php 
							} 
							if($content)
							{ ?>
								<div class="simple_card_content">
									<?php echo $content; ?>
								</div><?php 
							} ?>
						</div><?php
						$number++;
					}
				} ?>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
	jQuery(document).ready(function(){

		// Aniamtion
        wow = new WOW(
	      {
	        animateClass: 'animated',
	        offset:       100,
	        callback:     function(box) {
	          console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
	        }
	      }
	    );
	    wow.init();

	});
</script>