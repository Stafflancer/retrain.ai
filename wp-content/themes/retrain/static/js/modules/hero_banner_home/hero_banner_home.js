!function(e){e(document).on("ready",(function(){var s=e(".hero_banner_home_block .customers-slider");s.length&&(s.each((function(){e(this).closest(".hero_banner_home_block").hasClass("video-bg")?e(this).slick({dots:!1,arrows:!1,pauseOnHover:false,centerMode:!0,slidesToShow:8,slidesToScroll:1,initialSlide:5,responsive:[{breakpoint:991,settings:{slidesToShow:5}},{breakpoint:576,settings:{slidesToShow:3}}]}):e(this).slick({dots:!1,arrows:!1,pauseOnHover:false,centerMode:!0,slidesToShow:8,slidesToScroll:1,initialSlide:5,autoplay:!0,autoplaySpeed:0,cssEase:"linear",speed:4000,responsive:[{breakpoint:991,settings:{slidesToShow:5}},{breakpoint:576,settings:{slidesToShow:3}}]})})),e(window).width()>576?setTimeout((function(){e(".hero_banner_home_block.video-bg").find(".customers-slider").slick("unslick").not("slick-initialized").slick({dots:!1,arrows:!1,centerMode:!0,pauseOnHover:false,slidesToShow:8,slidesToScroll:1,initialSlide:5,autoplay:!0,autoplaySpeed:0,cssEase:"linear",speed:4000,responsive:[{breakpoint:991,settings:{slidesToShow:5}},{breakpoint:576,settings:{slidesToShow:3}}]})}),5500):e(".hero_banner_home_block.video-bg").find(".customers-slider").slick("unslick").not("slick-initialized").slick({dots:!1,pauseOnHover:false, arrows:!1,centerMode:!0,slidesToShow:8,slidesToScroll:1,initialSlide:5,autoplay:!0,autoplaySpeed:0,cssEase:"linear",speed:4000,responsive:[{breakpoint:991,settings:{slidesToShow:5}},{breakpoint:576,settings:{slidesToShow:3}}]}))}))}(jQuery);