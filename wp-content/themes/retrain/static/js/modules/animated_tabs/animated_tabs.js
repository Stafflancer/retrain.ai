jQuery(document).ready(function ($) {
	setCookie('animationcookie', '0', 1);

	function getCookie(cookiesname) {
		var name = cookiesname + '=',
			ca = document.cookie.split(';');

		for (var i = 0; i < ca.length; i++) {
			var c = ca[i];

			while (c.charAt(0) == ' ') {
				c = c.substring(1);
			}

			if (c.indexOf(name) == 0) {
				return c.substring(name.length, c.length);
			}
		}

		return '';
	}

	function setCookie(cookiesname, cvalue, exdays) {
		var d = new Date();
		d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));

		var expires = 'expires=' + d.toUTCString();
		document.cookie = cookiesname + '=' + cvalue + ';' + expires + ';path=/';
	}

	var heightThreshold = $('.animated_tabs').offset().top,
		heightThreshold_end = $('.animated_tabs').offset().top + $('.animated_tabs').height(),
		divHeight = (heightThreshold - 160),
		divTopSectionHeight = (heightThreshold_end - 160);

	$(window).scroll(function () {
		var scroll = $(window).scrollTop();
		var windowwidth = $( window ).width();
		if (scroll >= divHeight && scroll <= divTopSectionHeight && windowwidth >= 520) {
			var cookievalue = getCookie('animationcookie');

			if (cookievalue == 0) {
				scrollbarMove(1);
				imageScrollbar(1);
				setCookie('animationcookie', '1', 1);
			}
			$('.animated_tabs').addClass('nowscroll');
		} else {
			$('.animated_tabs').removeClass('nowscroll');
		}
	});

	$('.animated-tabs-inner').on('click', function () {
		var x = setTimeout('alert("x");', 100000);

		for (var i = 0; i <= x; i++)
			clearTimeout(i);
		$('.fill-dark').css('width', '0%');
		$('.animated-tabs-inner').removeClass('activedata');
		$('.compare-candidate').removeClass('activedata');
		$(this).addClass('activedata');
		var datattr = $(this).attr('data-id');
		$('#imagescrollAnimationId' + datattr).addClass('activedata');
		scrollbarMove($(this).attr('data-id'));
		imageScrollbar($(this).attr('data-id'));
	});
});

function scrollbarMove(startValue) {
	var increment = 75,
		setTime = 0,
		loopLength = $('.animated-tabs-main .animated-tabs').length;

	for (let a = startValue; a <= loopLength; a++) {
		setTimeout(function (setTime) {
			$('#scrollAnimationId' + a).addClass('activedata');
		}, setTime + 35);

		for (let index = 1; index <= 100; index++) {
			let percentage = index;

			setTime = setTime + increment;

			setTimeout(function (setTime) {
				$('#scrollId' + a).css('width', percentage + '%');
			}, setTime);

			if (index === 100) {
				setTime = setTime + increment;
				setTimeout(function (setTime) {
					$('#scrollId' + a).css('width', 0 + '%');
					$('.animated-tabs-inner').removeClass('activedata');
					if (a === loopLength) {
						$('#scrollAnimationId1').addClass('activedata');
					}
				}, setTime);
			}
		}
	}
}

function imageScrollbar(startValue) {
	var increment = 75,
		setTime = 0,
		loopLength = $('.animated-tabs-main-image .animated-tabs-main-new-image').length;

	for (let a = startValue; a <= loopLength; a++) {
		setTimeout(function (setTime) {
			$('#imagescrollAnimationId' + a).addClass('activedata');
		}, setTime + 35);

		for (let index = 1; index <= 100; index++) {
			let percentage = index;
			setTime = setTime + increment;
			setTimeout(function (setTime) {
				$('#scrollId' + a).css('width', percentage + '%');
			}, setTime);
			if (index === 100) {
				setTime = setTime + increment;
				setTimeout(function (setTime) {
					$('#scrollId' + a).css('width', 0 + '%');
					$('.animated-tabs-inners').removeClass('activedata');
					if (a === loopLength) {
						$('#imagescrollAnimationId1').addClass('activedata');
					}
				}, setTime);
			}
		}
	}
}