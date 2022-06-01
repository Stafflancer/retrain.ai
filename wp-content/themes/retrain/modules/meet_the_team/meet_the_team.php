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

wp_enqueue_style('meet_the_team ', get_template_directory_uri() . '/static/css/modules/meet_the_team/meet_the_team.css', [], null);

?>
<section class="<?php if ($media_type == 'image' && !empty($image) && $parallax) { echo 'prallax-added'; } ?> meet_the_team bg-light-gray  <?php 
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
	 ?>
	<div class="container">
		<div class="team_block_header-wrap">
			<div class="team_block_header text-center row">
				<div class="col-12 col-lg-12">
					<?php if($heading){?>
					<h2 class="heading-meet heading-title-dark text-center <?php echo $heading_color; ?>"><?php echo $heading; ?></h2>
					<?php } ?>
					<?php if($content){?>
						<!-- <div class="cards_with_round_images_content <?php echo $text_color; ?>"><?php echo $content; ?></div> -->
					<?php }?>
				</div>
			</div><?php 
			$s_team = get_sub_field( 'team' ); ?>

			<div id="team-slider" class="meet_the_team_wrap"><div class="row justify-content-center"><?php 
			if ( $s_team )
			{ 
				global $post; 
				foreach ( $s_team as $post )
				{
					setup_postdata( $post ); ?>
					<div class="col-12 col-sm-6 col-md-4 col-lg-3"><div class="item_blog text-center">
						<div class="thumbnail_ava">
							<a href="<?php the_permalink(); ?>" class="btn-read-bio"><img src="<?php the_post_thumbnail_url( '' ); ?>" class="img-fluid">
								<div class="hover-btn">
									<span>Read Bio</span>
								</div>
							</a>
						</div>
						<div class="item_blog-info">
							<div class="item_blog-info-title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</div><?php
							$position = get_field('member_position'); 
							if($position)
							{ ?>
								<div class="item_blog-info-position">
									<?php echo $position; ?>
								</div><?php
							} 
							$linkedin_url = get_field('linkedin_url');
							if($linkedin_url)
							{  ?>
								<div class="member-social-icons">
									<a href="<?php echo $linkedin_url; ?>" target="_blank" class="icon-gradient"><img src="<?php echo get_stylesheet_directory_uri()?>/static/images/linked-in.png" class="img-fluid"></a>
								</div><?php
							} ?>
						</div>
					</div></div> <!-- // item_blog --><?php
					}
					wp_reset_postdata();
			} ?></div>
		</div>
	</div>
</div>
</section>