jQuery(document).ready(function ($) 
{

	$( ".sub-menu" ).before( "<span class='submenutoggle'></span>" );

	$('.footer-menu').find('.sub-menu').addClass('list-unstyled');
	$('.footer-menu').find('.sub-menu').addClass('footer-sub-menu');
	$('.form-group ').find('.sf-input-select').addClass('form-control');
	$('.form-group ').find('.sf-input-text').addClass('form-control');

	$('.scroll-new-item a').on('click', function() 
	{
		var fullurl = $(this).attr('href');
		var getid = fullurl.substr(fullurl.indexOf("#") + 1)
		$('html, body').animate({
	        scrollTop: $("#"+getid).offset().top-100
	    }, 1000);

	});
	if ($(window).width() < 991) 
	{
		$('.menu-item .submenutoggle').click(function(){
			$(this).siblings('ul').slideToggle();
	    });
	}
});

jQuery(function(){
  function rescaleCaptcha(){
    var width = jQuery('.g-recaptcha-response').parent().width();
    var scale;
    if (width < 302) {
      scale = width / 302;
    } else{
      scale = 1.0; 
    }

    jQuery('.g-recaptcha-response').css('transform', 'scale(' + scale + ')');
    jQuery('.g-recaptcha-response').css('-webkit-transform', 'scale(' + scale + ')');
    jQuery('.g-recaptcha-response').css('transform-origin', '0 0');
    jQuery('.g-recaptcha-response').css('-webkit-transform-origin', '0 0');
  }

  rescaleCaptcha();

  jQuery( window ).resize(function() { 
  	rescaleCaptcha();
  });

});

