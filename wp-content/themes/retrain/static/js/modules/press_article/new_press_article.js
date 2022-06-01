jQuery(document).ready(function ($) {
	$('#press-slider').owlCarousel({
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
	$('#press-slider .owl-prev').html('<img src="/wp-content/uploads/2022/03/left.png" />');
	$('#press-slider .owl-next').html('<img src="/wp-content/uploads/2022/03/right.png" />');
});