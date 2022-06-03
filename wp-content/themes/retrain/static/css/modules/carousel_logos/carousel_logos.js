jQuery(document).ready(function () {
	let $quoteSlider = jQuery('#logos-slider');

	if ($quoteSlider.length) {
		$quoteSlider.owlCarousel({
			loop:false,
		    margin:33,
		    nav:false,
		    dots:true,
		    responsiveClass:true,
		    responsive:{
		        0:{
		            items:1
		        },
		        767:{
		            items:3
		        },
		        1200:{
		            items:4
		            
		        },
		        1460:{
		            items:6
		        }
		    }
		});
/*		jQuery('#logos-slider .owl-prev').html('<img src="/wp-content/uploads/2022/03/left.png" class="img-fluid" />');
		jQuery('#logos-slider .owl-next').html('<img src="/wp-content/uploads/2022/03/right.png" class="img-fluid" />');*/
	}
});