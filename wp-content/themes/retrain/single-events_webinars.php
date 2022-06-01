<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package retrain
 */

get_header();

$postid = get_the_ID();
while ( have_posts() ) : the_post();
	$category      = get_the_category();
	$mycategory    = $category[0]->cat_name;
	$category_id   = get_cat_ID( $mycategory );
	$category_link = get_category_link( $category_id );
	$image         = get_the_post_thumbnail_url( get_the_ID(), 'full' );
	$blogpageurl   = get_permalink( 866 );
	/*$terms = get_the_terms( $postid, 'events_webinars_type' );
	if ( !empty( $terms ) ){
	    // get the first term
	    $term = array_shift( $terms );
	    
	}*/

	$ourcategory = wp_get_post_terms( $postid, 'category' );
    $arraycatname = array();
    $workterm_id = array();
   	foreach($ourcategory as $thisslug)
    {
        $arraycatname[] = $thisslug->name;
        $workterm_id[] = $thisslug->term_id;
    }
   	$categoryname = implode( " ", $arraycatname );
    $term_id = implode( " ", $workterm_id );
	?>
	<section class="rightsideicons">
		<?php echo do_shortcode('[addtoany]'); ?>
	</section>
	<section class="blog-single">
		<div class="container">
			<div class="back-section">
				<div class="row">
					<div class="col-12 col-lg-12">
						<a href="<?php echo $blogpageurl; ?>" class="backbtn">Back to Resources</a>
					</div>
				</div>
			</div>
			<div class="single-blog-topbar">
				<div class="row">
					<div class="col-12 col-lg-12">
						<h1 class="heading-blog-single"><?php the_title(); ?></h1>
						<div class="details-meta-tab">
							<span class="posted-by"><?php the_author(); ?></span>
							<div class="reading"><?php echo do_shortcode('[rt_reading_time label="Reading Time:" postfix="minutes" postfix_singular="minute"]'); ?></div>
						</div>
					</div>
				</div>
			</div><?php 
			if ( $image ) { ?>
				<div class="single-blog-image">
					<div class="row">
						<div class="col-12 col-lg-12">
							<div class="blog-image-area text-center">
								<img src="<?php echo $image; ?>">
							</div>
						</div>
					</div>
				</div><?php 
			} ?>
		<div class="content-blog-single">
			<div class="blog-content">
				<?php the_content(); ?>
			</div><?php

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
			$heading_3 = get_field('heading_3');
			if($heading_3)
			{ ?> 
				<div class="othersection">
					<h3 class="heading-3-blog"><?php echo $heading_3; ?></h3>
					<?php the_field('description_3'); ?>
				</div><?php
			}
			$heading_4 = get_field('heading_4');
			if($heading_4)
			{ ?> 
				<div class="othersection">
					<h4 class="heading-4-blog"><?php echo $heading_4; ?></h4>
					<?php the_field('description_4'); ?>
				</div><?php
			}
			$quote_heading = get_field( 'quote_heading' );
			$quote_content = get_field( 'quote_content' ); ?>
			<div class="blog-quote">
				<div class="blog-quote-items row"><?php 
					if ( $quote_content ) { ?>
						<div class="lefysidecontent col-lg-12">
							<blockquote><?php echo $quote_content; ?></blockquote>
						</div><?php 
					} ?>
					<div class="name-heading col-lg-12">
						<h5 class="name-heading-blog"><?php echo $quote_heading; ?></h5>
					</div>
				</div>
			</div>
			<div class="bottom-sec-video"><?php
				$heading_5 = get_field( 'heading_5' );
				if ( $heading_5 ) { ?>
					<h5 class="heading-5-blog"><?php echo $heading_5; ?></h5>
				<?php } ?>

				<?php
				$youtube_video = get_field( 'youtube_video' );
				if ( $youtube_video ) {
					$data      = $youtube_video;
					$whatIWant = substr( $data, strpos( $data, "https://youtu.be/" ) + 17 );
					?>
				<iframe width="100%" height="450" src="https://www.youtube.com/embed/<?php echo $whatIWant; ?>"
				        title="YouTube video player"
				        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
				        allowfullscreen></iframe>
				<?php } ?>
			</div><?php
			$promo_image = get_field('promo_image');
			$promo_heading = get_field('promo_heading');
			$promo_content = get_field('promo_content');
			$promo_button = get_field('promo_button');
			$background_options_promo = get_field('background_options_promo');
			$display_options_promo = get_field('display_options_promo'); 

			$media_type_new    = get_field('media_type_new');
			$parallax_new   = get_field('parallax_new');
			$add_overlay_new = get_field('add_overlay_new');
			$overlay_color_new      = get_field('overlay_color_new');
			$color_new         = get_field('color_new');
			$gradient_new         = get_field('gradient_new');
			$image_new     = get_field('image_new');
			$mobile_background_image_new    = get_field('mobile_background_image_new');

			/* Other Settings */
			$custom_id_new        = get_field('custom_id_new');
			$custom_css_class_new = get_field('custom_css_class_new');
			$heading_color_new    = get_field('heading_color_new');
			$text_color_new       = get_field('text_color_new');  
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
								<h3 class="heading-blue-single text-white <?php echo $heading_color_new; ?>"><?php echo $promo_heading; ?></h3>
								<div class="details-cta-content text-white <?php echo $text_color_new; ?>"><?php echo $promo_content; ?></div>
							<?php 
						endif; ?>
						<?php if ( ! ( empty( $promo_button ) ) ): ?>
							
								<a href="<?php echo $promo_button['url']; ?>" class="link_here text-light btn btn-gradient"><?php echo $promo_button['title']; ?></a>
							</div>
						<?php endif; ?>
						</div>
					</div>
				</div><?php
			} ?>
		</div>
	</section>
<?php endwhile; ?>
	<div class="navigation max-width-nav">
		<div class="container">
			<div class="d-flex justify-content-between">
				<div class="per-class">
					<?php
					$prev_post = get_previous_post();
					if ( $prev_post ) {
						$prev_title = strip_tags( str_replace( '"', '', $prev_post->post_title ) );
						echo "\t" . '<a id="prev" rel="prev" href="' . get_permalink( $prev_post->ID ) . '" title="' . $prev_title . '" class="prev-arrow btn-arrow"><span class="btn-arrow-icon"><img src="/wp-content/uploads/2022/03/Icon-left.png" class="img-fluid" /></span> Previous</a>' . "\n";
					} ?>
				</div>
				<div class="next-class"><?php
					$next_post = get_next_post();
					if ( $next_post ) {
						$next_title = strip_tags( str_replace( '"', '', $next_post->post_title ) );
						echo "\t" . '<a id="next" rel="next" href="' . get_permalink( $next_post->ID ) . '" title="' . $next_title . '" class="next-arrow btn-arrow">Next <span class="btn-arrow-icon"><img src="/wp-content/uploads/2022/03/Icon-right.png" class="img-fluid" /></span></a>' . "\n";
					}
					?>
				</div>
			</div>
		</div>
	</div><?php
$blogpost = array(
	'post_type'      => 'events_webinars',
	'post_status'    => 'publish',
	'posts_per_page' => get_option('posts_per_page'),
	'post__not_in'   => array( $postid ),
	'orderby'        => 'date',
	'order'          => 'DESC',
	'tax_query' => array(
		
 		array (
 			'taxonomy' => 'category',
 
            'field' => 'term_id',
 
            'terms' => $term_id,
 
       )
 
   ),
);
$wp_query = new WP_Query( $blogpost );
if ( $wp_query->have_posts() ) 
{ 
	$num = $wp_query->post_count;?>
	<section class="featured_resource">
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-12">
					<h2 class="heading-title-dark text-center headingdark">Related posts</h2>
				</div>
			</div>
			<div class="row"><?php
				if ( $num > 3 ) 
				{ ?>
					<div id="single-team-slider" class="owl-carousel owl-theme resource-slider"><?php 
				} 
				while ( $wp_query->have_posts() ) {
					$wp_query->the_post(); 
					$innerpostid = get_the_ID(); 
					$innerquerycategory = wp_get_post_terms( $innerpostid, 'category' );
				    $innerqueryarraycat = array();
				    $innerworkid = array();
				   	foreach($innerquerycategory as $thisslug)
				    {
				        $innerqueryarraycat[] = $thisslug->name;
				        $innerworkid[] = $thisslug->term_id;
				    }
				   	$categoryname = implode( " ", $innerqueryarraycat );
				    $term_id = implode( " ", $innerworkid ); ?>
					<div class="col-12 <?php if ( $num < 4 ) { echo "col-md-4 col-lg-4"; } ?>">
						<div class="featured_resources_block"><?php
							$thumb = get_the_post_thumbnail($item, 's_243');
							if ($thumb) { ?>
								<div class="featured_resources_img">
									<a href="<?php the_permalink($item); ?>"><?php echo $thumb; ?></a>
								</div><?php 
							} ?>
							<div class="featured_resources_content">
								<p class="text-uppercase featured_text"><?php echo $categoryname; ?></p>
								<a href="<?php the_permalink($item); ?>"><h4 class="featured_heading"><?php echo get_the_title($item); ?></h4></a>
							</div>
							<div class="view-btn text-right">
								<a href="<?php the_permalink($item); ?>" class="btn btn-biew">View <span class="right-arrow"></span></a>
							</div>
						</div>
					</div><?php
				} wp_reset_query();
				if ( $num > 3 ) 
				{ ?>
					</div><?php 
				} ?>	
			<div class="col-12 col-lg-12">
				<div class="text-center">
					<a href="<?php echo $blogpageurl; ?>" class="btn btn-gradient view-all">View All</a>
				</div>
			</div>
		</div>
	</section><?php
} 
$cta_heading = get_field('cta_heading');
$st_content = get_field('st_content'); 
$st_form = get_field('st_form'); 
$media_type_new_copy    = get_field('media_type_new_copy');
$parallax_new_copy   = get_field('parallax_new_copy');
$add_overlay_new_copy = get_field('add_overlay_new_copy');
$overlay_color_new_copy      = get_field('overlay_color_new_copy');
$color_new_copy         = get_field('color_new_copy');
$gradient_new_copy         = get_field('gradient_new_copy');
$image_new_copy     = get_field('image_new_copy');
$mobile_background_image_new_copy    = get_field('mobile_background_image_new_copy');

/* Other Settings */
$custom_id_new_copy        = get_field('custom_id_new_copy');
$custom_css_class_new_copy = get_field('custom_css_class_new_copy');
$heading_color_new_copy    = get_field('heading_color_new_copy');
$text_color_new_copy       = get_field('text_color_new_copy');  
if($cta_heading)
{ ?>
	<section class="CTA-subscribe-form <?php if ($media_type == 'image' && !empty($image) && $parallax) { echo 'prallax-added'; }
					if ($media_type == 'none')
					{
						echo "";
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
		<div class="CTA-subscribe-form-inner">
			<h2 class="text-center CTA-form-heading <?php echo $heading_color_new_copy; ?>"><?php echo $cta_heading; ?></h2>
			<div class="details-cta-content <?php echo $text_color_new_copy; ?>"><?php echo $st_content; ?></div>
				<div class="form-now-cta">
					<?php echo do_shortcode('[gravityform id="'.$st_form.'" title="false" ajax="true"]'); ?> 
				</div>
			</div>
		</section><?php
} ?>
<?php 
wp_enqueue_style('OwlCarousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css', [], null);

wp_enqueue_style('OwlCarouselTheme', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css', [], 
		null);
	
wp_enqueue_script('OwlCarousel-js', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array(), null, true);
?>
<script>
jQuery(document).ready(function ($) 
{
	$('#single-team-slider').owlCarousel({
		loop: true,
		margin: 0,
		nav: true,
		dots: false,
		responsive: {
			0: {
				items: 1
			},
			768: {
				items: 2
			},
			992: {
				items: 3
			}
		}
	});
	$('#single-team-slider .owl-prev').html('<img src="/wp-content/uploads/2022/03/left.png" />');
	$('#single-team-slider .owl-next').html('<img src="/wp-content/uploads/2022/03/right.png" />');
});
</script>
<?php
get_footer();