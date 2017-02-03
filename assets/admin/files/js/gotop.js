$(function(){

    $(window).on('scroll',function(){
      if($(window).scrollTop() > 150){
        $('#gotop').css('display', 'block');
         //$('#gotop').animate({display: 'block'},5000,'easing',function(){});
      }else{
        $('#gotop').hide();
      }
    });


    $('#tbox').on('click',function(){
    	var iScrollTop = document.documentElement.scrollTop || document.body.scrollTop;
    	
    	var timer = setInterval(function(){
    		scrollTo(0,iScrollTop-=200);
    		if(iScrollTop <= 0){
    			clearInterval(timer);
    		}
    	},30);
      
    });


});



