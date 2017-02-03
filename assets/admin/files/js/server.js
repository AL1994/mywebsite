/**
 * Created by shuffle��LD on 2015/8/26.
 */
function layer_show(w,h,title,url){
    if (w == null || w == '') {
        w=800;
    };
    if (h == null || h == '') {
        h=($(window).height() - 50);
    };
    if (title == null || title == '') {
        title=false;
    };
    if (url == null || url == '') {
        url="404.html";
    };
    $.layer({
        type: 2,
        shadeClose: true,
        title: title,
        maxmin:false,
        shadeClose: true,
        closeBtn: [0, true],
        shade: [0.8, '#000'],
        border: [0],
        offset: ['150px',''],
        area: [w+'px', h +'px'],
        iframe: {src: url}
    });
}



function laryer_set(w,h,title,url){
    layer_show(w,h,title,url);
}