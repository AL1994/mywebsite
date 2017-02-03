$(function(){
    $('.s1').on('click',function(){
        if($(this).attr('active') == 'act'){
            $(this).removeAttr('active');
            $('.s2').animate({opacity: 1,left: '120'},'easing');
            $('.s3').animate({opacity: 1,left: '240'},'easing');
            $('.s4').animate({opacity: 1,left: '360'},'easing');
            $('#tcn1').fadeOut();
        }else{
            $(this).attr('active','act');
            $('.s2').animate({opacity: 0,left: '-560'},'easing',function(){$('#tcn1').fadeIn();});
            $('.s3').animate({opacity: 0,left: '-860'},'easing');
            $('.s4').animate({opacity: 0,left: '-860'},'easing');
        }

    });
    $('.s2').on('click',function(){
        if($(this).attr('active') == 'act'){
            $(this).removeAttr('active');
            $('#tcn2').fadeOut();
            $('.s1').animate({opacity: 1,left: 0},'easing');
            $('.s2').animate({left: '120'},'easing');
            $('.s3').animate({opacity: 1,left: '240'},'easing');
            $('.s4').animate({opacity: 1,left: '360'},'easing');
        }else{
            $('.s2').animate({left: '-160'},'easing',function(){$('#tcn2').fadeIn();});
            $('.s1').animate({opacity: 0,left: '-560'},'easing');
            $('.s3').animate({opacity: 0,left: '-860'},'easing');
            $('.s4').animate({opacity: 0,left: '-860'},'easing');
            $(this).attr('active','act');
        }
    });
        $('.s3').on('click',function(){
            if($(this).attr('active') == 'act'){
                $(this).removeAttr('active');
                $('#tcn3').fadeOut();
                $('.s1').animate({opacity: 1,left: 0},'easing');
                $('.s2').animate({opacity: 1,left: '120'},'easing');
                $('.s3').animate({left: '240'},'easing');
                $('.s4').animate({opacity: 1,left: '360'},'easing');
            }else{
                $('.s2').animate({opacity: 0,left: '-160'},'easing');
                $('.s1').animate({opacity: 0,left: '-260'},'easing');
                $('.s3').animate({left: '-320'},'easing',function(){$('#tcn3').fadeIn();});
                $('.s4').animate({opacity: 0,left: '-860'},'easing');
                $(this).attr('active','act');
            }
        });
            $('.s4').on('click',function(){
                if($(this).attr('active') == 'act'){
                    $(this).removeAttr('active');
                    $('#tcn4').fadeOut();
                    $('.s1').animate({opacity: 1,left: 0},'easing');
                    $('.s2').animate({opacity: 1,left: '120'},'easing');
                    $('.s3').animate({opacity: 1,left: '240'},'easing');
                    $('.s4').animate({left: '360'},'easing');
                }else{
                    $('.s2').animate({opacity: 0,left: '-160'},'easing');
                    $('.s1').animate({opacity: 0,left: '-260'},'easing');
                    $('.s3').animate({opacity: 0,left: '-860'},'easing');
                    $('.s4').animate({left: '-480'},'easing',function(){$('#tcn4').fadeIn();});
                    $(this).attr('active','act');
                }
    });


















});



