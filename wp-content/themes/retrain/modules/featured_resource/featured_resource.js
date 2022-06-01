(function ( $ ) {
	$( document ).on( 'ready', function () {
		var latestresourcesSlider = $( '.latest_resources_block .resources' );
		if ( latestresourcesSlider.length ) {
			latestresourcesSlider.each( function () {
				$( this ).slick( {
					dots: true,
					arrows: false,
					slidesToShow: 2,
					slidesToScroll: 1,
					responsive: [
						{
							breakpoint: 768,
							settings: {
								slidesToShow: 1,
							}
						},
					]
				} );
			} );
		}
	} );
})( jQuery );