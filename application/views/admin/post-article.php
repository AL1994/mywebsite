<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>发表文章</title>
  <meta name="description" content="这是一个 user 页面">
  <meta name="keywords" content="user">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <base href="<?php echo site_url();?>"/>
  <link rel="icon" type="image/png" href="assets/admin/i/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="assets/admin/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-title" content="Amaze UI" />
  <link rel="stylesheet" href="assets/admin/kindeditor/themes/default/default.css" />
  <link rel="stylesheet" href="assets/admin/css/amazeui.min.css"/>
  <link rel="stylesheet" href="assets/admin/css/admin.css">
  <link rel="stylesheet" href="assets/admin/css/jquery.mytag.css">
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->

<?php include 'admin-sidebar.php';?>

  <!-- content start -->
  <div class="admin-content">
    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">发表文章</strong> / <small>Post article</small></div>
    </div>

    <hr/>

    <div class="am-g">

      <div class="am-u-sm-12">

        <form id="myform" class="am-form am-form-horizontal" action="admin/add" method="post" enctype="multipart/form-data">
          <div class="am-form-group">
            <label for="user-name" class="am-u-sm-3 am-form-label">标题</label>
            <div class="am-u-sm-9">
              <input type="text" id="title" placeholder="" name="title">
            </div>
          </div>

          <div class="am-form-group">
            <label for="user-email" class="am-u-sm-3 am-form-label">类型</label>
            <div class="am-u-sm-9">
              <select name="category_id" id="category_id">
              	<?php
              		foreach ($categories as $category) {
              	?>
              	<option value="<?php echo $category -> category_id;?>"><?php echo $category -> category_name;?></option>
              	<?php }?>
              </select>
            </div>
          </div>

          <div class="am-form-group">
            <label for="user-phone" class="am-u-sm-3 am-form-label">Tag</label>
            <div class="am-u-sm-9">
              <!-- <ul id="tag1"></ul> -->
              <input type="text" placeholder="" name="tag">
            </div>
          </div>
          <div class="am-form-group">
            <label for="user-QQ" class="am-u-sm-3 am-form-label" >图片</label>
            <div class="am-u-sm-9">
              <input type="file" id="imgSrc" name="imgSrc" placeholder="">
              <span>
                   <?php
                          if(isset($error)){
                       		echo $error;
                           }
                    ?>
              </span>
            </div>
          </div>

          <div class="am-form-group">
            <label for="user-intro" class="am-u-sm-3 am-form-label">内容</label>
            <div class="am-u-sm-9">
              <textarea class="" rows="5" id="content1" name="content1" placeholder=""></textarea>
            </div>
          </div>

          <div class="am-form-group">
            <div class="am-u-sm-9 am-u-sm-push-3">
              <button type="submit"  class="am-btn am-btn-primary" name="sub">保存</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- content end -->

</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

<footer>
  <hr>
  <p class="am-padding-left">© 2015 个人网站管理</p>
</footer>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/admin/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="assets/admin/js/jquery.min.js"></script>
<!--<![endif]-->

<script src="assets/admin/js/amazeui.min.js"></script>
<script src="assets/admin/js/jquery.mytag.js"></script>
<script src="assets/admin/kindeditor/kindeditor-min.js"></script>
<script src="assets/admin/kindeditor/lang/zh_CN.js"></script>
<script src="assets/admin/js/app.js"></script>
<script>
	
		// $(function(){
// 			
			// $('#myform').on('submit', function () {
            // var $title = $('#title'),
                // $categoryId = $('#category_id'),
                // $imgSrc = $('#imgSrc'),
                // $content = $('#content1');
// 
            // var bSubmit = true;
            // if ($.trim($title.val()) == "") {
                // alert('请输入标题!');
                // bSubmit = false
            // }
            // if ($categoryId.val() == -1) {
                // alert('请选择一个类型!');
                // bSubmit = false
            // }
            // if ($imgSrc.val() == "") {
                // alert('请选择一个图片!');
                // bSubmit = false
            // }
// 
// 
            // return bSubmit;
        // });
	// $(function(){
		// $('#tag1').mytag({
			// dataSource: 'admin/article/search',
			// maxLength: 5,
            // displaySize: 6,
            // height: 37,
            // hiddenInputName: 'tags'
		// });
	// });

	KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="content1"]', {
				cssPath : '../assets/admin/kindeditor/plugins/code/prettify.css',
				uploadJson : 'assets/admin/kindeditor/php/upload_json.php',
				fileManagerJson : 'assets/admin/kindeditor/php/file_manager_json.php',
				allowFileManager : true,
				afterCreate : function() {
					var self = this;
					K.ctrl(document, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
					K.ctrl(self.edit.doc, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
				}
			});
			prettyPrint();
		});
		
</script>
</body>
</html>
