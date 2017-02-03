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
        offset: ['20px',''],
        area: [w+'px', h +'px'],
        iframe: {src: url}
    });
}
function edit_notice(w,h,title,url){
        layer_show(w,h,title,url);
}

function del_article(obj,id){
    layer.confirm('Are you sure you want to delete it?',function(index){
        $.get('admin/article/del_article_byId',{id:id},function(data){
            $(obj).parents("tr").remove();
            layer.msg('Deleted!',1);
       },'text');
    });
}

function del_comment(obj,id){
    layer.confirm('Are you sure you want to delete it?',function(index){
        $.get('admin/message/del_comment_byId',{id:id},function(data){
            $(obj).parents("tr").remove();
            layer.msg('Deleted!',1);
        },'text');
    });
}