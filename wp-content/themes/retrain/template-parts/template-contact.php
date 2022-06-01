<?php
/**
 * Template Name: Contact
 */

get_header();
?>
	<section class="contact-page-sec bg-default-gradient">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center">
					<div class="breadcrumbs contact-page-breadcrumbs"><?php echo template_breadcrumbs(); ?></div>
					<div class="heading-contact">
						<h1 class="text-white heading-1"><?php the_field( 'ct_heading' ); ?></h1>
						<div class="text-white hero-banner-content textcolorlight"><?php the_field( 'ct_content' ); ?></div>
					</div>
				</div>
			</div>
			<div class="contact-form-main" style="background-image:url(<?php echo get_theme_file_uri('/static/images/contact-page.png'); ?>);">
				<div class="row">
					<div class="col-12">
						<div class="contact-form-inner">
							<?php
							$contact_form = get_field( 'contact_form' );

							if ( $contact_form ) {
								?>
								<div class="contact-grivity-form">
									<?php echo do_shortcode( '[gravityform id="' . $contact_form . '" title="false" ajax="true"]' ); ?>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="contact-details-bottom">
					<div class="row">
						<?php
						if ( have_rows( 'headquarters' ) ) {
							while ( have_rows( 'headquarters' ) ) {
								the_row();
								$ht_heading     = get_sub_field( 'ht_heading' );
								$address_line_1 = get_sub_field( 'ht_address_line_1' );
								$address_line_2 = get_sub_field( 'ht_address_line_2' );
								$ht_email       = get_sub_field( 'ht_email' );
								$ht_phone       = get_sub_field( 'ht_phone' );
								?>
								<div class="col-12 col-sm-6 col-md-6 col-lg-8">
									<div class="address-contact"><?php
										if ( $ht_heading ) { ?>
											<h4 class="heading-footer"><?php echo $ht_heading; ?></h4><?php
										}
										if ( $address_line_1 ) {
											?>
											<div class="address"><?php echo $address_line_1; ?><br>
												<?php echo $address_line_2; ?>
											</div>
											<?php
										}
										if ( $ht_phone ) { ?>
											<a href="mailto:<?php echo $ht_email; ?>" class="contact-email"><?php echo $ht_email; ?></a>
											<?php
										}
										if ( $ht_phone ) { ?>
											<a href="tel:<?php echo $ht_phone; ?>" class="contact-number"><?php echo $ht_phone; ?></a>
											<?php
										} ?>
									</div>
								</div>
								<?php
							}
						}
						?>
						<div class="col-12 col-sm-6 col-md-6 col-lg-4">
							<div class="global-office address-contact pl-0">
								<?php
								if ( have_rows( 'global_offices' ) ) { ?>
									<h4 class="heading-footer">Global Offices</h4>
									<ul class="list-unstyled footer-link-address mb-0">
										<?php
										while ( have_rows( 'global_offices' ) ) {
											the_row();
											$global_heading = get_sub_field( 'global_heading' );

											if ( $global_heading ) { ?>
												<li><?php echo $global_heading; ?></li>
												<?php
											}
										}
										?>
									</ul>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php get_footer();