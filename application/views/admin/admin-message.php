<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>评论管理</title>
  <meta name="description" content="这是一个 index 页面">
  <meta name="keywords" content="index">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <base href="<?php echo site_url();?>"/>
  <link rel="icon" type="image/png" href="assets/admin/i/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="assets/admin/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-title" content="Amaze UI" />
  <link rel="stylesheet" href="assets/admin/css/amazeui.min.css"/>
  <link rel="stylesheet" href="assets/admin/css/admin.css">
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->

<?php include 'admin-sidebar.php';?>

  <div class="admin-content">

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">评论管理</strong> / <small>一些常用模块</small></div>
    </div>

    

    <div class="am-g">
      <div class="am-u-sm-12">
        <table class="am-table am-table-bd am-table-striped admin-content-table">
          <thead>
          <tr>
            <th><input type="checkbox"/></th>
            <th>文章ID</th>
            <th>文章标题</th>
            <th>评论人</th>
            <th>评论内容</th>
            <th>评论时间</th>
            <th>是否通过</th>
            <th>管理</th>
          </tr>
          </thead>
          <tbody>
          	<?php 
          		foreach($comment as $v){
          	?>
          		<tr>
          		  <td><input type="checkbox"/></td>
                  <td><?php echo $v->article_id;?></td>
                  <td><?php echo $v->title;?></td>
                  <td><a href="#"><?php echo $v->username;?></a></td>
                  <td style="width: 200px; font-size: 10px; color: orange;"><span><?php echo $v->content;?></span></td>
                  <td><?php echo substr($v->add_time,5,11);?></td>
                  <td>
                    <div class="am-btn-toolbar">
                          <div class="am-btn-group am-btn-group-xs">
                            <button class="am-btn am-btn-default am-btn-xs am-text-secondary is-pass" data-cid="<?php echo $v->comment_id;?>"><?php if($v->is_read == 0){echo "未通过";}else if($v->is_read == 1){echo "已通过";}?></button>
                          </div>
                    </div>
                  </td>
                  <td>
                    <div class="am-dropdown" data-am-dropdown>
                      <button class="am-btn am-btn-default am-btn-xs am-dropdown-toggle" data-am-dropdown-toggle><span class="am-icon-cog"></span> <span class="am-icon-caret-down"></span></button>
                      <ul class="am-dropdown-content">
                        <li><a href="#">1. 编辑</a></li>
                        <li><a href="#">2. 下载</a></li>
                        <li><a href="javascript:;" onClick="del_comment(this,<?php echo $v->comment_id;?>)">3. 删除</a></li>
                      </ul>
                    </div>
                  </td>

	          </tr>
          	<?php
				}
          	?>
	                   
          </tbody>
        </table>
      </div>
    </div>

    
  </div>
  <!-- content end -->


<a href="#" class="am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}">
  <span class="am-icon-btn am-icon-th-list"></span>
</a>

<footer style="clear: both; background: #fff; height: 50px;">
  <hr>
  <p class="am-padding-left">© 2015 个人网站管理</p>
</footer>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/admin/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="assets/admin/js/jquery.min.js"></script>
<!--<![endif]-->
<script type="text/javascript" src="assets/admin/layer/layer.min.js"></script>
<script src="assets/admin/js/b_server.js"></script>
<script src="assets/admin/js/amazeui.min.js"></script>
<script src="assets/admin/js/app.js"></script>
<script>
  $(function(){
    $('.is-pass').on('click',function(){
       var cid = $(this).data('cid');
        var th = $(this);
        if($(this).text() == "未通过"){
            $.post('admin/welcome/ch',{is_read:1,comment_id:cid},function(data){
                if(data == "success"){
                    alert('修改成功！');
                    th.text('已通过');
                }else{
                    alert('修改失败！');
                }
            },'text');
        }else{
            $.post('admin/welcome/ch',{is_read:0,comment_id:cid},function(data){
                if(data == "success"){
                    alert('修改成功！');
                    th.text('未通过');
                }else{
                    alert('修改失败！');
                }
            },'text');
        }


    });

  });
</script>
</body>
</html>
