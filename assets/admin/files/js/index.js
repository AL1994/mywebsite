$(function(){
    //选项卡
    var oLi = document.getElementById("tab").getElementsByTagName("li");
    var oUl = document.getElementById("ms-main").getElementsByTagName("div");

    for(var i = 0; i < oLi.length; i++)
    {
        oLi[i].index = i;
        oLi[i].onmouseover = function ()
        {
            for(var n = 0; n < oLi.length; n++) oLi[n].className="";
            this.className = "cur";
            for(var n = 0; n < oUl.length; n++) oUl[n].style.display = "none";
            oUl[this.index].style.display = "block"
        }
    }

    //点赞
    $('.dz').on('click',function(){
        var th = $(this);
        var zan = $(this).children(".dzn").val();
        var aid = $(this).children(".aid").val();
        $.post('admin/admin/dianZan', {
            click_zan: zan,
            article_id: aid
        }, function(data){
            if(data == 'success'){
                zan++;
                th.children('span').text("("+zan+")");
            }else{
                alert('抱歉，您不能连续点赞...');
            }
        }, 'text');
    });

    //轮播图
    window.slider.data= [
        {
            "id":"slide-img-1", // 与slide-runner中的img标签id对应
            "client":"少年",
            "desc":"我所追忆的年少轻狂" //这里修改描述
        },
        {
            "id":"slide-img-2",
            "client":"顶峰",
            "desc":"我所仰望的人生高度"
        },
        {
            "id":"slide-img-3",
            "client":"星空",
            "desc":"我所不及的思考智慧"
        },
        {
            "id":"slide-img-4",
            "client":"生活",
            "desc":"我为之拼搏的美好未来"
        }
    ];
    window.slider.init();


    //图片滑动
    var oDiv = document.getElementById('images_slide');
    var aImg_ = oDiv.getElementsByTagName('img');
    var aImg = [];
    var oMark = oDiv.getElementsByTagName('a')[0];
    var aEffect = null;
    (aEffect=[
        function (obj){gotoCreator(obj, -1, 0);},
        function (obj){gotoCreator(obj, 1, 0);},
        function (obj){gotoCreator(obj, 0, -1);},
        function (obj){gotoCreator(obj, 0, 1);}
    ]).shift();

    for(var i=0;i<aImg_.length;i++)
    {
        aImg.push(aImg_[i]);
        aImg[i].initLeft=aImg[i].offsetLeft;
        aImg[i].initTop=aImg[i].offsetTop;
    }
    oMark.onmousedown=oMark.onmouseover=function ()
    {
        this.blur();
        for(i=0;i<aImg.length;i++)
            cssd(aImg[i], 'zIndex', i+2);
        var oImg=aImg.pop();
        aImg.unshift(oImg);
        aEffect[parseInt(Math.random()*99999)%aEffect.length](oImg);
    };

    //function start(){
    //    timer = setInterval(function(){
    //        oMark.onmousedown=oMark.onmouseover=function ()
    //        {
    //            this.blur();
    //            for(i=0;i<aImg.length;i++)
    //                cssd(aImg[i], 'zIndex', i+2);
    //            var oImg=aImg.pop();
    //            aImg.unshift(oImg);
    //            aEffect[parseInt(Math.random()*99999)%aEffect.length](oImg);
    //        }();
    //    },2000);
    //}
    //
    //oMark.onmouseover = function(){
    //
    //};
    //oMark.onmouseout = function(){
    //    start();
    //};


    function cssd(obj, attr, value)
    {
        if(arguments.length==2)
            return parseFloat(obj.currentStyle?obj.currentStyle[attr]:document.defaultView.getComputedStyle(obj, false)[attr]);
        else if(arguments.length==3)
            switch(attr)
            {
                case 'left':
                case 'top':
                    obj.style[attr]=value+'px';
                    break;
                case 'opacity':
                    obj.style.filter="alpha(opacity:"+value*100+")";
                    obj.style.opacity=value;
                    break;
                default:
                    obj.style[attr]=value;
            }

        return cssd;
    }

    function startMove(obj, oTarget, iTime, fnCallBack)
    {
        var iInterval=30;
        var iTimes=Math.ceil(iTime/iInterval);
        var oSpeed={};
        var attr='';
        var iEnd=(new Date()).getTime()+iTime;

        for(attr in oTarget)
            oSpeed[attr]=(oTarget[attr]-cssd(obj, attr))/iTimes;

        if(obj.timer)
            clearInterval(obj.timer);

        obj.timer=setInterval(function(){
            doMove(obj, oTarget, oSpeed, iEnd, fnCallBack);
        }, 30);
    }

    function doMove(obj, oTarget, oSpeed, iEnd, fnCallBack)
    {
        var iNow=(new Date()).getTime();
        var attr='';

        if(iNow>=iEnd)
        {
            clearInterval(obj.timer);
            obj.timer=null;

            for(attr in oTarget)
                cssd(obj, attr, oTarget[attr]);

            if(fnCallBack)fnCallBack(obj, oTarget);
        }
        else
            for(attr in oTarget)
                if(oSpeed[attr])
                    cssd(obj, attr, cssd(obj, attr)+oSpeed[attr]);
    }

    function gotoCreator(obj, iLeft, iTop)
    {
        startMove(obj, {left: obj.offsetLeft+iLeft*obj.offsetWidth, top: obj.offsetTop+iTop*obj.offsetHeight, opacity: 0}, 400, function (){
            cssd(obj, 'left', obj.initLeft)(obj, 'top', obj.initTop)(obj, 'opacity', 1)(obj, 'zIndex', 1);
        });
    }




});//文档就绪函数


