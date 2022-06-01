(function ( $ ) {
	$( document ).on( 'ready', function () {
		var customersSlider = $( '.hero_banner_home_block .customers-slider' );
		if ( customersSlider.length ) {
			customersSlider.each( function () {
				if ( $( this ).closest( '.hero_banner_home_block' ).hasClass( 'video-bg' ) ) {
					$( this ).slick( {
						dots: false,
						arrows: false,
						centerMode: true,
						slidesToShow: 8,
						slidesToScroll: 1,
						initialSlide: 5,
						responsive: [
							{
								breakpoint: 991,
								settings: {
									slidesToShow: 5,
								}
							},
							{
								breakpoint: 576,
								settings: {
									slidesToShow: 3,
								}
							},
						]
					} );
				} else {
					$( this ).slick( {
						dots: false,
						arrows: false,
						centerMode: true,
						slidesToShow: 8,
						slidesToScroll: 1,
						initialSlide: 5,
						autoplay: true,
						autoplaySpeed: 0,
						cssEase: 'linear',
						speed: 5000,
						responsive: [
							{
								breakpoint: 991,
								settings: {
									slidesToShow: 5,
								}
							},
							{
								breakpoint: 576,
								settings: {
									slidesToShow: 3,
								}
							},
						]
					} );
				}
			} );

			if ( $( window ).width() > 576 ) {
				setTimeout( function () {
					$( '.hero_banner_home_block.video-bg' ).find( '.customers-slider' ).slick( 'unslick' ).not( 'slick-initialized' ).slick( {
						dots: false,
						arrows: false,
						centerMode: true,
						slidesToShow: 8,
						slidesToScroll: 1,
						initialSlide: 5,
						autoplay: true,
						autoplaySpeed: 0,
						cssEase: 'linear',
						speed: 5000,
						responsive: [
							{
								breakpoint: 991,
								settings: {
									slidesToShow: 5,
								}
							},
							{
								breakpoint: 576,
								settings: {
									slidesToShow: 3,
								}
							},
						]
					} );
				}, 5500 );
			} else {
				$( '.hero_banner_home_block.video-bg' ).find( '.customers-slider' ).slick( 'unslick' ).not( 'slick-initialized' ).slick( {
					dots: false,
					arrows: false,
					centerMode: true,
					slidesToShow: 8,
					slidesToScroll: 1,
					initialSlide: 5,
					autoplay: true,
					autoplaySpeed: 0,
					cssEase: 'linear',
					speed: 5000,
					responsive: [
						{
							breakpoint: 991,
							settings: {
								slidesToShow: 5,
							}
						},
						{
							breakpoint: 576,
							settings: {
								slidesToShow: 3,
							}
						},
					]
				} );
			}
		}
	} );
})( jQuery );