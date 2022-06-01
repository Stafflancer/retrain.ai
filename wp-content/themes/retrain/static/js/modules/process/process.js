
jQuery(document).ready(function ($) {
	function reveal_board() {
	    jQuery(".process-block:not(:first-child)").each(function(index) {  
	    	console.log(index);      
	        (function(that, i) { 
	            var t = setTimeout(function() { jQuery(that).addClass("activedata"); }, 2000 * i);
	        })(this, index);
	    });
	}
	$(window).scroll(function() { 
		if ($(window).scrollTop() >  $(".process").offset().top) {
	        reveal_board();
	    }

	});
});