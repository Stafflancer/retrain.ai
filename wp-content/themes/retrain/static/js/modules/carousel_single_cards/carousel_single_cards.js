jQuery(document).ready(function () {
	let $quoteSlider = jQuery('#quote-slider');

	if ($quoteSlider.length) {
		$quoteSlider.owlCarousel({
			loop: true,
			margin: 30,
			responsiveClass: true,
			dots: false,
			nav: true,
			smartSpeed: 800,
			items: 1
		});
		jQuery('#quote-slider .owl-prev').html('<img src="/wp-content/uploads/2022/03/left.png" class="img-fluid" />');
		jQuery('#quote-slider .owl-next').html('<img src="/wp-content/uploads/2022/03/right.png" class="img-fluid" />');
	}
});