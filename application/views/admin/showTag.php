<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;">
<meta charset="UTF-8">
<title>云标签</title>
<meta name="keywords" content="云标签,个人博客,个人网站,个人博客模板,个人网站模板">
<meta name="description" content="">
<base href="<?php echo site_url();?>"/>
<link href="assets/admin/files/css/base.css" rel="stylesheet">
<link href="assets/admin/files/css/showTag.css" rel="stylesheet">
</head>
<body>
   <?php include 'webHeader.php';?>
	<article class="blogs">
		<h1 class="t_nav">
			<span>“慢生活”不是懒惰，放慢速度不是拖延时间，而是让我们在生活中寻找到平衡。</span>
			<a href="http://www.yangqq.com/" class="n1">网站首页</a>
			<a href="http://www.yangqq.com/news/#" class="n2">云标签</a>
		</h1>
		
		<div class="newblog left">
				<?php
					foreach($article as $v){
				?>
					<h2 class="ziti">
			          <a href="#"><?php echo $v->title;?></a>
			        </h2>
			        <p class="dateview">
			          <span>发布时间：<?php echo $v->add_time; ?></span>
			          <span>作者：<?php echo $v->writer;?></span>
			          <span>[<a href="#"><?php echo $v->category_name;?></a>]</span>
			        </p>
			        <figure>
			          <a href="#">
			          <img src="<?php echo $v->thumbs_img_src;?>" alt="【】生活本该如此"></a>
			        </figure>
			        <ul class="nlist">
			          <p><?php echo mb_substr($v->content, 0, 200);?>...</p>
			          <a href="admin/welcome/webArticle?id=<?php echo $v->article_id; ?>&click=<?php echo $v->click; ?>" class="readmore">阅读全文&gt;&gt;</a>
			        </ul>       
			        <div class="line"></div>
			        <div class="blank"></div>
				<?php
					}
				?>
		        
		      </div>
		
		<aside class="right">  
		<div class="blank"></div>
		<div class="news">
			<h3>
		      <p>最新<span>文章</span></p>
		    </h3>
		    <ul class="rank">
		      <li><a href="javascript:;">【孕期日记】生活本该如此</a></li>
		  	</ul>
		
		
		    <h3 class="ph">
		      <p>点击<span>排行</span></p>
		    </h3>
		    <ul class="paih">
		     <li><a href="javascript:;">即便是坑，我也想要拉你入伙！</a></li>
		     <li><a href="javascript:;">女程序员职业生涯该如何发展？</a></li>
		 	</ul>
		    </div>
		</aside>
	
	</article>
	
	
	<footer>
	  <p>董艳龙-个人网站</p>
	</footer>



</body>
</html>