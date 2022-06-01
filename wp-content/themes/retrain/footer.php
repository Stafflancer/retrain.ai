<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package retrain
 */
?>

<footer id="footer-retrain">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-8 col-lg-4">
				<div class="footer-block-1">
					<?php
					if ( have_rows( 'contact', 'option' ) ) {
						while ( have_rows( 'contact', 'option' ) ) {
							the_row();
							$c_logo    = get_sub_field( 'c_logo' );
							$cities    = get_sub_field( 'cities' );
							$addresses = get_sub_field( 'addresses' );

							if ( $c_logo ) { ?>
								<div class="footer-logo">
									<a href="<?php echo site_url(); ?>"><img src="<?php echo $c_logo; ?>"
									                                         class="img-fluid"></a>
								</div>
							<?php } ?>
							<?php if ( have_rows( 'cities', 'option' ) ) { ?>
								<ul class="list-unstyled footer-link-address mb-0">
									<?php
									while ( have_rows( 'cities', 'option' ) ) {
										the_row();
										$c_city = get_sub_field( 'c_city' );
										if ( $c_city ) { ?>
											<li><?php echo $c_city; ?></li>
											<?php
										}
									} ?>
								</ul>
								<?php
							}
							if ( have_rows( 'addresses', 'option' ) ) {
								while ( have_rows( 'addresses', 'option' ) ) {
									the_row();
									$add_title      = get_sub_field( 'add_title' );
									$address_line_1 = get_sub_field( 'address_line_1' );
									$address_line_2 = get_sub_field( 'address_line_2' );
									$add_phone      = get_sub_field( 'add_phone' );
									$add_email      = get_sub_field( 'add_email' ); ?>
									<div class="headquarters"><?php
									if ( $add_title ) { ?>
										<h4 class="heading-footer"><?php echo $add_title; ?></h4>
										<?php
									}
									if ( $address_line_1 ) { ?>
										<div class="address"><?php echo $address_line_1; ?>
										<?php echo $address_line_2; ?></div><?php
									}
									if ( $add_phone ) { ?>
										<a href="tel:<?php echo $add_phone; ?>"
										   class="contact-number"><?php echo $add_phone; ?></a>
										<?php
									}
									if ( $add_email ) { ?>
										<a href="mailto:<?php echo $add_email; ?>"
										   class="contact-number"><?php echo $add_email; ?></a>
										<?php
									} ?>
									</div><?php
								}
							}
						}
					}
					?>

					<?php if ( have_rows( 'social_media', 'option' ) ): ?>
						<ul class="list-unstyled d-flex mb-0 social-icons-footer">
							<?php
							while ( have_rows( 'social_media', 'option' ) ): the_row();
								$linkedin = get_sub_field( 'linkedin' );
								$facebook = get_sub_field( 'facebook' );
								$twitter  = get_sub_field( 'twitter' );
								$youtube  = get_sub_field( 'youtube' );

								if ( $linkedin ) { ?>
									<li>
										<a href="<?php echo $linkedin; ?>" target="_blank">
											<img src="<?php echo get_stylesheet_directory_uri() ?>/static/images/linked-in.png" class="img-fluid">
										</a>
									</li>
								<?php
								}

								if ( $facebook ) { ?>
									<li>
										<a href="<?php echo $facebook; ?>" target="_blank">
											<img src="<?php echo get_stylesheet_directory_uri() ?>/static/images/facebook.png" class="img-fluid">
										</a>
									</li>
								<?php
								}

								if ( $twitter ) { ?>
									<li>
										<a href="<?php echo $twitter; ?>" target="_blank">
											<img src="<?php echo get_stylesheet_directory_uri() ?>/static/images/twitter.png" class="img-fluid">
										</a>
									</li>
								<?php
								}

								if ( $youtube ) { ?>
									<li>
										<a href="<?php echo $youtube; ?>" target="_blank">
											<img src="<?php echo get_stylesheet_directory_uri() ?>/static/images/youtube.png" class="img-fluid">
										</a>
									</li>
								<?php
								} ?>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-12 col-md-4 col-lg-2">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'footer',
					'container'      => 'ul',
					'menu'           => 'Footer Menu',
					'menu_class'     => 'list-unstyled footer-menu',
				) );
				?>
			</div>
			<?php
			if ( have_rows( 'subscribe_form', 'option' ) ) {
				while ( have_rows( 'subscribe_form', 'option' ) ) {
					the_row();
					$s_heading = get_sub_field( 's_heading' );
					$s_content = get_sub_field( 's_content' );
					$s_form    = get_sub_field( 's_form' ); ?>
					<div class="col-12 col-md-12 col-lg-6">
						<div class="subscribe-box">
							<h3><?php echo $s_heading; ?></h3>
							<?php
							echo $s_content;
							echo do_shortcode( '[gravityform id="' . $s_form . '" title="false" ajax="true"]' );
							?>
						</div>
						
					</div> <!--end of subscription box-->
					<?php
				}
			}

			if ( have_rows( 'copyright', 'option' ) ) {
				while ( have_rows( 'copyright', 'option' ) ) {
					the_row();
					$copyright = get_sub_field( 'copyright' ); ?>
					<div class="col-12 col-lg-12">
						<div class="row align-items-end">
							<div class="col-12 col-md-6 col-lg-7">
								<div class="copyright-footer">&copy; <?php echo gmdate( 'Y' ) . ' ' . $copyright; ?> | <?php
									if ( have_rows( 'footer_links', 'option' ) ) {
										while ( have_rows( 'footer_links', 'option' ) ) {
											the_row();
											$f_link = get_sub_field( 'f_link' ); ?>
											<a href="<?php echo $f_link['url']; ?>"><?php echo $f_link['title']; ?></a>
											<?php
										}
									} ?>
								</div>
							</div>
							<div class="col-12 col-md-6 col-lg-5">
								<div class="subscribe-box-logo text-center text-md-right">
									<img src="/wp-content/uploads/2022/05/iso-logo-footer.png" /> 
									<img src="/wp-content/uploads/2022/05/gdpr-logo-footer.png" /> 
									<img src="/wp-content/uploads/2022/05/ccpa-logo-footer.png" />
								</div>
							</div>
						</div>
						
					</div>
					<?php
				}
			}
			?>
		</div>
	</div>
</footer>
<!--<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>-->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script>
	function stickyNavigation() {
		let $header = jQuery('.header-retrain');

		if (jQuery(window).scrollTop() > 50) {
			$header.addClass('header-white');
		} else {
			$header.removeClass('header-white');
		}
	}

	jQuery(window).on('load', function () {
		stickyNavigation();
	}).scroll(function () {
		stickyNavigation();
	});
</script>
</div><!-- #page -->

<?php wp_footer(); ?>
<!--LinkedIn Insights Tag-->
<script type="text/javascript">
_linkedin_partner_id = "3421241";
window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
window._linkedin_data_partner_ids.push(_linkedin_partner_id);
</script><script type="text/javascript">
(function(l) {
if (!l){window.lintrk = function(a,b){window.lintrk.q.push([a,b])};
window.lintrk.q=[]}
var s = document.getElementsByTagName("script")[0];
var b = document.createElement("script");
b.type = "text/javascript";b.async = true;
b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
s.parentNode.insertBefore(b, s);})(window.lintrk);
</script>
<noscript>
<img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=3421241&fmt=gif" />
</noscript>
<!--end LinkedIn Insights Tag-->
</body>
</html>