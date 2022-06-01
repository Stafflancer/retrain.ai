/*!function(e){e(document).on("ready",(function(){let t=-1;setInterval((function(e){e.eq(t).removeClass("active"),t=(t+1)%e.length,e.eq(t).addClass("active")}),1e3,e(".gallery_list  .item_gall"))}))}(jQuery);*/
 
 !(function (e) {
    e(document).on("ready", function () {
        let t = -1;
        setInterval(
            function (e) {

            	//console.log('Total Items',e.length);

            	var myArray = [];

				for(var i = 0; i < 5; i++) {
				    var numberIsInArray = false;
				    var rand = generateRandomNumb(1, e.length);
				    for(var j = 0; j < myArray.length; j++){
				        if(rand === myArray[j]) {
				            numberIsInArray = true;
				            i--;
				        }
				    }
				    if(!numberIsInArray){
				       myArray.push(rand);
				    }
				}


                //e.eq(t).removeClass("active"), (t = (t + 1) % e.length), e.eq(t).addClass("active");
                jQuery('.item_gall').removeClass('active');
                e.eq(myArray[0]).addClass('active');
                e.eq(myArray[1]).addClass('active');
                e.eq(myArray[2]).addClass('active');
                e.eq(myArray[4]).addClass('active');
            },
            1500,
            e(".gallery_list  .item_gall")
        );
    });
})(jQuery);



/**
 * Returns a random number between min (inclusive) and max (exclusive)
 */
function generateRandomNumb(min, max) {
    return Math.floor(Math.random() * (max - min) + min);
}