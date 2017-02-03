<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>首页</title>
<meta name="keywords" content="">
<meta name="description" content="">
<base href="<?php echo site_url();?>"/>
<link href="assets/admin/files/css/base.css" rel="stylesheet">
<link href="assets/admin/files/css/index.css" rel="stylesheet">
<script type="text/javascript" src="assets/admin/files/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/admin/files/js/sliders.js"></script>
<style>
  		.page_num{
  			position: absolute;
  			left: 500px;
  			margin-top:2px;
  		}
		.page_num a{
			margin:0 2px;
			display: inline-block;
			padding: 2px 5px 2px 5px;
			line-height: 10px;
			overflow: hidden;
			color: #7CGG7C;
			border: 1px solid #dddddd;
			border-radius:3px;
			
		}
		.page_num strong{
			margin:0 2px;
			display: inline-block;
			padding: 2px 5px 2px 5px;
			line-height: 10px;
			overflow: hidden;
			background-color: #ffa405;
			color:#ffffff;
			border: 1px solid #dddddd;
			border-radius:3px;
		}
		.page_num a:hover{
			background-color: #ffa405;
			color:#ffffff;
		}
        
  </style>	
</head>

<body>
  <?php include 'webHeader.php';?>

  <div class="banner1">
      <section class="box">
        <ul class="texts">
            <p>欢迎来到我的个人网站，我是董艳龙</p>
            <p>希望给我留言多多交流</p>
            <p>多多提建议谢谢喽</p>
        </ul>
        <div class="avatar">
          <a href="admin/help">
            <span>站长</span>
          </a> 
        </div>
      </section>
  </div>

  <article>
    <!-- banner代码 开始 -->
    <div class="l_box f_l">
      <div class="banner">
        <div id="slide-holder">
          <div id="slide-runner"> 
              <a href="javascript:;" target="_blank">
                <img id="slide-img-1" src="assets/admin/files/img/f2.png" alt="" style="left: -1897.9481733405078px;">
              </a> 
              <a href="javascript:;" target="_blank">
                <img id="slide-img-2" src="assets/admin/files/img/f3.png" alt="" style="left: -897.9481733405077px;">
              </a> 
              <a href="javascript:;" target="_blank">
                <img id="slide-img-3" src="assets/admin/files/img/f1.png" alt="" style="left: 102.05182665949235px;">
              </a> 
              <a href="javascript:;" target="_blank">
                <img id="slide-img-4" src="assets/admin/files/img/a4.jpg" alt="" style="left: 1102.0518266594922px;">
              </a>

            <div id="slide-controls" style="display: block;">
              <p id="slide-client" class="text"><strong></strong><span>标题3</span></p>
              <p id="slide-desc" class="text">add your description here</p>
              <p id="slide-nav"></p>
            </div>
          </div>
        </div>
      </div>
      <!-- banner代码 结束 -->

      <div class="topnews">
        <h2>
          <span>
            <a href="javascript:;" target="_blank">栏目标题</a>
            <a href="javascript:;" target="_blank">栏目标题</a>
            <a href="javascript:;" target="_blank">栏目标题</a>
          </span>
          <b>文章</b>
          <b>推荐</b>
        </h2>
        
        <?php
			foreach($article as $v){        
        ?>
        	
		        <div class="blogs">
		          <figure><img src="<?php echo $v->thumbs_img_src; ?>"></figure>
		          <ul>
		            <h3>
		              <a href="admin/welcome/webArticle?id=<?php echo $v->article_id; ?>&click=<?php echo $v->click; ?>"><?php echo $v->title; ?></a>
		            </h3>
		            <p id="pcon"> <?php if(strlen($v->content)>200){echo mb_substr($v->content,0,200).'...';}else{ echo  $v->content;} ?></p>
		            <p class="autor">
		              <span class="lm f_l">
		              <a href="javascript:;"><?php echo $v->category_name; ?></a>
		              </span>
		              <span class="dtime f_l"><?php echo $v->add_time; ?></span>
		              <a href="javascript:;"  class="viewnum2 f_r dz"><input type="hidden" class="dzn" value="<?php echo $v->click_zan; ?>"><input type="hidden" class="aid" value="<?php echo $v->article_id; ?>"><span class="dzspan">(<?php echo $v->click_zan; ?>)</span></a>
		              <span class="viewnum f_r">浏览（<a href="javascript:;"><?php echo $v->click; ?></a>）</span>
		              <span class="pingl f_r">评论（<a href="javascript:;"><?php echo $v->comms;?></a>）</span>
		            </p>
		          </ul>
		        </div>
        <?php 
			} 
        ?>
        <div class="page_num">
     			
		    <?php echo $this->pagination->create_links(); ?>
				
		</div>
        
      </div>
    </div>
    
    <div class="r_box f_r">
      <div class="tit01">
        <h3>关注我</h3>
        <div class="gzwm">
          <ul>
            <li><a class="xlwb" href="http://weibo.com">新浪微博</a></li>
            <li><a class="txwb" href="http://t.qq.com">腾讯微博</a></li>
            <li><a class="rss" href="javascript:;">RSS</a></li>
            <li><a class="wx" href="http://mail.qq.com">邮箱</a></li>
          </ul>
        </div>
      </div>

      <div class="cloud">
        <h3><a href="admin/welcome/webCloud">标签云</a></h3>
        <ul>
          <?php
          foreach($tag as $v){
            ?>
            <li><a href="admin/article/tagArticle?tname=<?php echo $v->tag_name; ?>"><?php echo $v->tag_name; ?></a></li>
            <?php
          }
          ?>
        </ul>
      </div>

      <div id="img_slide" style="">
        <h3>滑动照片</h3>
        <div id="images_slide">
          <a href="javascript:;" style="display:block; width:100%; height:234px; position:absolute; top:0px; left:0px; background:red; filter: alpha(opacity:0); opacity:0; z-index:10;"></a>
          <img src="assets/admin/files/img/abs/4.jpg" style="z-index:1;" />
          <img src="assets/admin/files/img/long2.jpg" style="z-index:2;" />
          <img src="assets/admin/files/img/abs/21.jpg" style="z-index:3;" />
          <img src="assets/admin/files/img/long1.jpg" style="z-index:4;" />

        </div>
      </div>


      <!--切换卡 moreSelect begin -->
      <div class="moreSelect" id="lp_right_select">
        <div class="ms-top">
          <ul class="hd" id="tab">
            <li class="cur"><a href="javascript:;">点击排行</a></li>
            <li><a href="javascript:;">最新文章</a></li>
            <li><a href="javascript:;">站长推荐</a></li>
          </ul>
        </div>

        <div class="ms-main" id="ms-main">
          <div style="display: block;" class="bd bd-news">
            <ul>
            	<?php 
            		foreach($hot as $v){
            	?>
            		<li><a href="admin/welcome/webArticle?id=<?php echo $v->article_id; ?>&click=<?php echo $v->click; ?>"><?php echo $v->title; ?></a></li>
            		
            	<?php
					}
            	?>
            	
            </ul>
          </div>
          <div class="bd bd-news">
            <ul>
            	<?php 
            		foreach($now as $v){
            	?>
            		<li><a href="admin/welcome/webArticle?id=<?php echo $v->article_id; ?>&click=<?php echo $v->click; ?>"><?php echo $v->title; ?></a></li>
            		
            	<?php
					}
            	?>
              
            </ul>
          </div>
          <div class="bd bd-news">
            <ul>
            	<?php 
            		foreach($article as $k){
            	?>
            		<li><a href="admin/welcome/webArticle?id=<?php echo $v->article_id; ?>&click=<?php echo $v->click; ?>"><?php echo $k->title; ?></a></li>
            		
            	<?php
					}
            	?>
              
            </ul>
          </div>
        </div>
        <!--ms-main end --> 
      </div>
      <!--切换卡 moreSelect end -->
      

<!--      <div class="tuwen">-->
<!--        <h3>今日热点</h3>-->
<!--        <ul>-->
<!--        	--><?php
//        		foreach($article as $v){
//        	?>
<!--        		<li>-->
<!--		          	<a href="admin/welcome/webArticle?id=--><?php //echo $v->article_id; ?><!--&click=--><?php //echo $v->click; ?><!--"><img src="--><?php //echo $v->thumbs_img_src;?><!--"><b>--><?php //echo $v->title;?><!--</b></a>-->
<!--		            <p>-->
<!--		            	<span class="tulanmu"><a href="javascript:;">--><?php //echo $v->category_name;?><!--</a></span>-->
<!--		            	<span class="tutime">--><?php //echo $v->add_time;?><!--</span>-->
<!--		            </p>-->
<!--          		</li>-->
<!--        	--><?php //
//				}
//        	?>
<!--          -->
<!--        </ul>-->
<!--      </div>-->
      <div class="ad"> <img src="assets/admin/files/img/ad300x100.jpg"> </div>
      <div class="links">
        <h3><span>[<a href="admin/suba/text">申请友情链接</a>]</span>友情链接</h3>
        <ul>
          <li><a href="javascript:;">董艳龙个人博客</a></li>
          <li><a href="javascript:;">web开发</a></li>
          <li><a href="javascript:;">前端设计</a></li>
          <li><a href="javascript:;">Html</a></li>
          <li><a href="javascript:;">CSS3</a></li>
          <li><a href="javascript:;">Html5+css3</a></li>
          <li><a href="javascript:;">百度</a></li>
        </ul>
      </div>
    </div>
    <!--r_box end --> 
  </article>

  <footer>
    <p class="ft-copyright">董艳龙-个人博客</p>
    <div id="tbox"> 
      <!-- <a id="togbook" href="javascript:;"></a> -->
      <a id="gotop" href="javascript:void(0)"></a> 
    </div>
  </footer>
  
  <script type="text/javascript" src="assets/admin/layer/layer.min.js"></script>
  <script src="assets/admin/files/js/server.js"></script>
  <script src="assets/admin/files/js/index.js"></script>
  <script src="assets/admin/files/js/gotop.js"></script>
  <script>
    var isMobile = {
      Android: function(){
        return navigator.userAgent.match(/Android/i);
      },
      BlackBerry: function(){
        return navigator.userAgent.match(/BlackBerry/i);
      },
      iOS: function(){
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
      },
      Opera: function(){
        return navigator.userAgent.match(/Opera Mini/i);
      },
      Windows: function(){
        return navigator.userAgent.match(/IEMobile/i);
      },
      any: function(){
        return (this.Android() || this.BlackBerry() || this.iOS() || this.Opera() || this.Windows());
      }
    }
    if(isMobile.any()){
      alert(11);






    }
  </script>
</body>
</html>