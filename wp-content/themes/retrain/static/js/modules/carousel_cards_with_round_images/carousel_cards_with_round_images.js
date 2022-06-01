jQuery(document).ready(function () {
	let $testimonialsSlider = jQuery('#testimonial-slider');

	if ($testimonialsSlider.length) {
		$testimonialsSlider.owlCarousel({
			loop: true,
			margin: 30,
			responsiveClass: true,
			dots: false,
			smartSpeed: 800,
			autoplay: true,
			autoplayTimeout: 7000,
			autoplayHoverPause: true,
			responsive: {
				0: {
					items: 1,
					nav: true
				},
				600: {
					items: 1,
					nav: true
				},
				1199: {
					items: 2,
					nav: true,
					loop: true
				}
			},
			onInitialized: function() {
				let $carouselArrows = jQuery('#testimonial-slider .owl-prev', '#testimonial-slider .owl-next'),
					carouselPaused = false;

				$carouselArrows.on('click', function () {
					console.log('CLICK');
					if (carouselPaused) {
						$testimonialsSlider.trigger('play.owl.autoplay');
						carouselPaused = false;
						console.log('PLAY');
					} else {
						$testimonialsSlider.trigger('stop.owl.autoplay');
						carouselPaused = true;
						console.log('STOP');
					}
				});
			}
		});

		jQuery('#testimonial-slider .owl-prev').html('<img src="/wp-content/uploads/2022/03/left.png" class="img-fluid" />');
		jQuery('#testimonial-slider .owl-next').html('<img src="/wp-content/uploads/2022/03/right.png" class="img-fluid" />');
	}
});