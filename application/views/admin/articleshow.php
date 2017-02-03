<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;">
<meta charset="UTF-8">
<title>详细文章</title>
<meta name="keywords" content="董艳龙">
<meta name="description" content="">
<base href="<?php echo site_url();?>"/>
<link href="assets/admin/files/css/base.css" rel="stylesheet">
<link href="assets/admin/files/css/articleshow.css" rel="stylesheet">
</head>
<body>
  <?php include 'webHeader.php';?>

  <article class="aboutcon">
    <h1 class="t_nav">
      <span>n像“草根”一样，紧贴着地面，低调的存在，冬去春来，枯荣无恙。</span>
      <a href="admin/welcome/webIndex" class="n1">网站首页</a>
    </h1>
    <?php
      $user = $this->session->userdata('user');
      if($user){
        echo "<input type='hidden' id='uid' value='".$user->user_id."'>";
      }else{
        echo "<input type='hidden' id='uid' value=''>";
      }
    ?>

    <div class="about">

      <h2><?php echo $article[0]->title; ?></h2>
      <ul class="left">
      	<img src="<?php echo $article[0]->img_src; ?>" alt="董艳龙的个人网站"> 
        <p><?php echo $article[0]->content; ?></p>
        <a href="javascript:;" class="viewnum2 f_r dz">&nbsp;&nbsp;&nbsp;&nbsp;<span>(<?php echo $article[0]->click_zan;?>)</span></a>
      	<input type="hidden" class="aid" value="<?php echo $article[0]->article_id; ?>">
      	<input type="hidden" class="dzn" value="<?php echo $article[0]->click_zan; ?>">
      </ul>

       
      <aside class="right">  
        <div class="about_c">
          <p>网名：<span>DanceSmile</span> | 即步非烟</p>
	        <p>姓名：<span><a href="javascript:;">董艳龙 </a></span></p>
	        <p>籍贯：黑龙江省—绥化市</p>
	        <p>现居：黑龙江省—哈尔滨市</p>
	        <p>职业：<span>网站设计、网站制作</span></p>
	        <p>学历：黑龙江大学 本科</p>
	        <p>喜欢的电影：《我脑子里有块橡皮擦》《创可贴》《比悲伤更悲伤的故事》</p>
	        <p>喜欢的音乐：《When I was You Man》《怎么说我不爱你》《飘扬过海来看你》</p>
          <p>
            <a class="_blank" href="943822868@qq.com">
              <img src="assets/admin/files/img/ico_mailme_22.png" alt="董艳龙的个人网站">
            </a>
          </p>
          <p>
            <a class="_blank" href="943822868@qq.com">
              <img border="0" alt="填写您的邮件地址，订阅我们的精彩内容：" src="assets/admin/files/img/picMode_light_m.png">
            </a>
          </p>
        </div>      
      </aside>


    </div>
  </article>

  <div class="comment clearfix">
    <div style="font-size:15px; color: orange;">喜欢的话，就快来评论吧!</div>
    <?php foreach($comment as $v){ ?>

    <div class="user-c clearfix">
      <img src="assets/admin/files/img/user_pic_default.jpg" alt="">
      <div style="float: left;">
        <div class="uc-1"><?php echo $v->username;?></div>
        <div class="uc-2"><?php echo $v->content;?></div>
        <div class="uc-3"><?php echo $v->add_time;?></div>
      </div>
    </div>
    <?php } ?>
  </div>
  <form action="" id="send-com" class="clearfix">
    <textarea name="" id="comm"></textarea>
    <button type="button" id="btn-comm">提交</button>
  </form>
  <footer>
    <p>董艳龙的个人博客</p>
    <div id="tbox">  
      <a id="gotop" href="javascript:void(0)"></a> 
    </div>
  </footer>



<script src="assets/admin/files/js/jquery.min.js"></script>
  <script type="text/javascript" src="assets/admin/layer/layer.min.js"></script>
  <script src="assets/admin/files/js/server.js"></script>
<script>
	
	$(function(){
		$('.dz').on('click',function(){
			//alert('111');
			var zan = $(".dzn").val();
			var aid = $('.aid').val();
			$.post('admin/admin/dianZan', {
				click_zan: zan,
				article_id: aid
			}, function(data){
				if(data == 'success'){
					zan++;
					$(".dz span").text("("+zan+")")
					//location.href = 'admin/articleshow';
				}else{
					alert('抱歉，您不能连续点赞...');
				}
			}, 'text');
			
			
		});
		
		$('#btn-comm').on('click',function(){
          var aid = $('.aid').val();
          var uid = $('#uid').val();
          var comm = $('#comm').val();
          if(comm){
            if(uid){
              $.post('admin/article/post_comm',{user_id: uid, article_id: aid, content: comm},function(data){
                if(data == 'success'){
                  alert('管理员整在审核您的评论，请耐心等待！');
                  $('#comm').val('');
                }else{
                  alert('评论失败！');
                }
              },'text');
            }else{
              alert('您还没有登录！');
            }
          }else{
            alert('您还没有输入文字！');
          }


        });
		
		
		
		

		
		// $('#dz').on('click',function(){
			// $.ajax(
				// url:"",
				// success:function(d){
					// if(){
// 						
					// }
				// }
			// )
			// var count = 0;
					// count++;
					// $("#dz span").text("("+count+")");
// 		
			// });
// 			
						// var idx = parseInt($(".dz span").text()) || 0;
		// $('.dz').on('click',function(){
			// idx += 1;
			// $(".dz span").text("("+idx+")")
// 					
			// });
		});

</script>


</body>
</html>