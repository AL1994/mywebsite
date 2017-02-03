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
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">用户管理</strong> / <small>一些常用模块</small></div>
    </div>

      <div class="am-g">
          <div class="am-u-sm-12 am-u-md-6">
              <div class="am-btn-toolbar">
                  <div class="am-btn-group am-btn-group-xs">
                      <button type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</button>
                      <button type="button" class="am-btn am-btn-default"><span class="am-icon-save"></span> 保存</button>
                      <button type="button" class="am-btn am-btn-default"><span class="am-icon-archive"></span> 审核</button>
                      <button type="button" class="am-btn am-btn-default"><span class="am-icon-trash-o"></span> 删除</button>
                  </div>
              </div>
          </div>
          <div class="am-u-sm-12 am-u-md-3">
              <div class="am-form-group">
                  <select data-am-selected="{btnSize: 'sm'}">
                      <option value="option1">所有类别</option>
                      <option value="option2">IT业界</option>
                      <option value="option3">数码产品</option>
                      <option value="option3">笔记本电脑</option>
                      <option value="option3">平板电脑</option>
                      <option value="option3">只能手机</option>
                      <option value="option3">超极本</option>
                  </select>
              </div>
          </div>
          <div class="am-u-sm-12 am-u-md-3">
              <div class="am-input-group am-input-group-sm">
                  <input type="text" class="am-form-field">
          <span class="am-input-group-btn">
            <button class="am-btn am-btn-default" type="button">搜索</button>
          </span>
              </div>
          </div>
      </div>
    

    <div class="am-g">
      <div class="am-u-sm-12">
        <table class="am-table am-table-bd am-table-striped admin-content-table">
          <thead>
          <tr>
            <th><input type="checkbox"/></th>
            <th>用户ID</th>
            <th>用户头像</th>
            <th>用户名称</th>
            <th>用户邮箱</th>
            <th>注册时间</th>
            <th>管理</th>
          </tr>
          </thead>
          <tbody>
          	<?php 
          		foreach($user as $v){
          	?>
          		<tr>
          		  <td><input type="checkbox"/></td>
                  <td><?php echo $v->user_id;?></td>
                  <td><img src="assets/admin/files/img/user_pic_default.jpg" alt=""  style="width: 100px;height: 100px;"></td>
                  <td><a href="#"><?php echo $v->username;?></a></td>
                  <td><span><?php echo $v->email;?></span></td>
                  <td><?php echo substr($v->add_time,5,11);?></td>
                  <td>
                    <div class="am-dropdown" data-am-dropdown>
                      <button class="am-btn am-btn-default am-btn-xs am-dropdown-toggle" data-am-dropdown-toggle><span class="am-icon-cog"></span> <span class="am-icon-caret-down"></span></button>
                      <ul class="am-dropdown-content">
                        <li><a href="#">1. 编辑</a></li>
                        <li><a href="#">2. 下载</a></li>
                        <li><a href="javascript:;">3. 删除</a></li>
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
       var cid = $(this).attr('cid');
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
