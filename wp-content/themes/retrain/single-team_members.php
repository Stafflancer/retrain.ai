<?php
get_header();

$postid = get_the_ID();
while ( have_posts() ) : the_post();
	$category      = get_the_category();
	$mycategory    = $category[0]->cat_name;
	$category_id   = get_cat_ID( $mycategory );
	$category_link = get_category_link( $category_id );
	$image         = get_the_post_thumbnail_url( get_the_ID(), 'full' );
	$teampageurl   = get_permalink( 2506 ); ?>
	<section class="rightsideicons">
		<?php echo do_shortcode('[addtoany]'); ?>
	</section>
	<section class="team-single">
		<div class="container">
			<div class="row">
				<div class="col-lg-3"></div>
				<div class="col-lg-7">
					<div class="back-btn">
						<a href="<?php echo $teampageurl; ?>" class="backbtn">Back to Leadership</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3">
					<?php 
					if ( $image ) { ?>
						<div class="single-team-image text-lg-center mb-5 mb-lg-0">
							<div class="single-team-inner">
							<div class="team-image-area text-center">
								<img src="<?php echo $image; ?>">
							</div><?php 
							$linkedin_url = get_field('linkedin_url');
							if($linkedin_url)
							{ ?> 
								<div class="member-social-icons">
									<a href="<?php echo $linkedin_url; ?>" target="_blank" class="icon-gradient"><img src="<?php echo get_stylesheet_directory_uri(); ?>/static/images/linked-in.png" class="img-fluid"></a>
								</div><?php
							} ?>
						</div></div><?php 
					} ?>
				</div>
				<div class="col-lg-7">
					<div class="single-team-topbar">
						<div class="row">
							<div class="col-12 col-lg-12">
								<h1 class="heading-team-single"><?php the_title(); ?></h1>
								<div class="details-meta-tab">
									<span class="posted-by"><?php the_field('member_position'); ?></span>
								</div>
							</div>
						</div>
					</div>
					<div class="content-team-single">
						<div class="team-content">
							<?php the_content(); ?>
						</div><?php
						$quote_heading = get_field( 'quote_name');
						$quote_content = get_field( 'member_quote'); ?>
						<div class="team-quote">
							<div class="team-quote-items"><?php 
								if ( $quote_content ) { ?>
									<div class="lefysidecontent">
										<blockquote>
											<?php echo $quote_content; ?>
											<h5 class="avatar-name">— <?php echo $quote_heading; ?></h5>
										</blockquote>
									</div><?php 
								} ?>
							</div>
						</div><?php
						if(have_rows('questions_info'))
						{ ?>
							<div class="question-information"><?php
								$other_info_heading = get_field('other_info_heading');
								if($other_info_heading)
								{ ?>
									<div class="main-question-heading">
										<h2><?php echo $other_info_heading; ?></h2>
									</div><?php
								} ?>
								<div class="question-other-info"><?php
								while(have_rows('questions_info'))
								{
									the_row();
									$question_heading = get_sub_field('question_heading');
									$question_description = get_sub_field('question_description'); ?> 
									<div class="questions-items">
										<h3><?php echo $question_heading; ?></h3>
										<?php echo $question_description; ?>
									</div><?php
								} ?>
								</div>
							</div><?php
						} ?>
					</div>
				</div>
			</div>
	</section>
<?php endwhile; 
$select_created_resource = get_field('select_created_resource');
if( $select_created_resource )
{ ?>
	<section class="featured_resource">
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-12">
					<h2 class="heading-title-dark text-center headingdark">resources by Team Member (if available)</h2>
				</div>
			</div>
			<div class="row"><?php
				foreach( $select_created_resource as $post )
				{
					setup_postdata($post); ?>
					<div class="col-12 <?php if ( $num < 4 ) { echo "col-md-4 col-lg-4"; } ?>">
						<div class="featured_resources_block"><?php
							$thumb = get_the_post_thumbnail($item, 's_243');
							if ($thumb) { ?>
								<div class="featured_resources_img">
									<a href="<?php the_permalink($item); ?>"><?php echo $thumb; ?></a>
								</div><?php 
							} ?>
							<div class="featured_resources_content">
								<p class="text-uppercase featured_text"><?php echo get_the_category( $item )[0]->name; ?></p>
								<a href="<?php the_permalink($item); ?>"><h4 class="featured_heading"><?php echo get_the_title($item); ?></h4></a>
							</div>
							<div class="view-btn text-right">
								<a href="<?php the_permalink($item); ?>" class="btn btn-biew">View <span class="right-arrow"></span></a>
							</div>
						</div>
					</div><?php
				}  wp_reset_postdata(); ?>
			</div>			
			<div class="col-12 col-lg-12">
				<div class="text-center">
					<a href="<?php echo $teampageurl; ?>" class="btn btn-gradient view-all">View All</a>
				</div>
			</div>
		</div>
	</section><?php
} 


/* BG Settings */
$media_type    = get_field('media_type_new_copy');
$add_overlay   = get_field('add_overlay_new_copy');
$overlay_color = get_field('overlay_color_new_copy');
$parallax      = get_field('parallax_new_copy');
$color         = get_field('color_new_copy');
$gradient = get_field('gradient_new_copy');
$image         = get_field('image_new_copy');
$video_mp4     = get_field('video_mp4_new_copy');
$video_webm    = get_field('video_webm_new_copy');

/* Other Settings */
$custom_id        = get_field('custom_id_new_copy');
$custom_css_class = get_field('custom_css_class_new_copy');
$heading_color    = get_field('heading_color_new_copy');
$text_color       = get_field('text_color_new_copy');

/* video Settings */
$image_video = get_field('image_video');
$video_id    = get_field('video_id'); ?>
 <section class="<?php if ($media_type == 'image' && !empty($image) && $parallax) { echo 'prallax-added'; } if($media_type == 'none'){ echo 'bg-dark-gradient'; } ?> cta_side_image  <?php echo !empty($custom_css_class) ? $custom_css_class . ' ' : '';
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
		<div class="row no-gutters align-items-center">
			<div class="col-12 col-lg-6"><?php 
				if (have_rows('st_content')) 
				{
					while (have_rows('st_content')) : the_row();
						$heading    = get_sub_field('heading');
						$content = get_sub_field('content');
						$button   = get_sub_field('button'); ?>
						<div class="cta-side-content">
							<?php if($heading){ ?>
							<h2 class="cta-heading text-white <?php echo $heading_color; ?>"><?php echo $heading; ?></h2>
							<?php } ?>
							<?php if ($content) { ?>
							<div class="cta-content text-white <?php echo $text_color; ?>"><?php echo $content; ?></div>
							<?php } ?>
							<?php if ($button) { ?>
								<a href="<?php echo $button['url']; ?>" class="btn btn-gradient lets-connect" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
							<?php } ?>
						</div><?php 
					endwhile;
				} ?>		
			</div>
			<div class="col-12 col-lg-6"><?php
				if (have_rows('cta_image')) {
					while (have_rows('cta_image')) : the_row();				
						$cta_new_image     = get_sub_field('cta_new_image'); ?>
						<div class="cta-img text-right">
							<img src="<?php echo $cta_new_image['url'] ?>" class="img-fluid">
						</div><?php
					endwhile;
				} ?>
			</div>
		</div>
	</div>
</section>
<?php
get_footer();