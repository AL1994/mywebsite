<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>留言板</title>
<meta name="keywords" content="默认留言分类">
<meta name="description" content="默认留言分类">
<base href="<?php echo site_url();?>"/>

<link href="assets/admin/files/css/base.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="assets/admin/files/css/embed.default.css">
<link href="assets/admin/files/css/guestbook.css" rel="stylesheet">
<link rel="stylesheet" href="assets/admin/kindeditor/themes/default/default.css" />
</head>

<body>
 <?php include 'webHeader.php';?>

  <article class="aboutcon">
    <h1 class="t_nav">
      <span>你，生命中最重要的过客，之所以是过客，因为你未曾为我停留。</span>
      <a href="admin/welcome/webIndex" class="n1">网站首页</a>
      <a href="admin/welcome/webGuestbook" class="n2">留言版</a>
    </h1>
    <div class="book left">
    <!-- Duoshuo Comment BEGIN -->
    
      <div class="ds-thread" id="ds-thread">
      	
       
      </div>
    	<script type="text/javascript">
    	var duoshuoQuery = {short_name:"dongyl"};
    	(function() {
    		var ds = document.createElement('script');
    		ds.type = 'text/javascript';ds.async = true;
    		ds.src = 'http://static.duoshuo.com/embed.js';
    		ds.charset = 'UTF-8';
    		(document.getElementsByTagName('head')[0]
    		|| document.getElementsByTagName('body')[0]).appendChild(ds);
    	})();
    	</script>
    <!-- Duoshuo Comment END -->   
    </div>

    <aside class="right">  
      <div class="about_c">
        <p>网名：<span>DanceSmile</span> | 即步非烟</p>
        <p>姓名：<span><a href="javascript:;">董艳龙</a></span> </p>
        <p>籍贯：黑龙江省—绥化市</p>
        <p>现居：黑龙江省—哈尔滨市</p>
        <p>职业：<span>网站设计、网站制作</span></p>
        <p>学历：黑龙江大学 本科</p>
        <p>喜欢的电影：《我脑子里有块橡皮擦》《创可贴》《比悲伤更悲伤的故事》</p>
        <p>喜欢的音乐：《When I was You Man》《怎么说我不爱你》《飘扬过海来看你》</p>
        <a href="javascript;:"><img src="assets/admin/files/img/group.png" alt="个人博客网站"></a>
        <a href="javascript:;"><img src="assets/admin/files/img/ico_mailme_22.png" alt="个人博客网站"></a>
      </div>     
    </aside>

  </article>

  <footer>
    <p>董艳龙-个人网站</p>
  </footer>

<script src="assets/admin/files/js/jquery.min.js"></script>
<script src="assets/admin/kindeditor/kindeditor-min.js"></script>
<script src="assets/admin/kindeditor/lang/zh_CN.js"></script>
 <script type="text/javascript" src="assets/admin/layer/layer.min.js"></script>
 <script src="assets/admin/files/js/server.js"></script>
<script>
	$(function(){
		$('#pa').children().addClass('ds-current');
		
	});
	
	// KindEditor.ready(function(K) {
			// var editor1 = K.create('textarea[name="content1"]', {
				// cssPath : '../assets/admin/kindeditor/plugins/code/prettify.css',
				// uploadJson : 'assets/admin/kindeditor/php/upload_json.php',
				// fileManagerJson : 'assets/admin/kindeditor/php/file_manager_json.php',
				// allowFileManager : true,
				// afterCreate : function() {
					// var self = this;
					// K.ctrl(document, 13, function() {
						// self.sync();
						// K('form[name=example]')[0].submit();
					// });
					// K.ctrl(self.edit.doc, 13, function() {
						// self.sync();
						// K('form[name=example]')[0].submit();
					// });
				// }
			// });
			// prettyPrint();
		// });
</script>
</body>
</html>