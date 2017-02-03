<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

<title>日志档</title>
<meta name="keywords" content="">
<meta name="description" content="">
<base href="<?php echo site_url();?>"/>
<link href="assets/admin/files/css/base.css" rel="stylesheet">
<link href="assets/admin/files/css/record.css" rel="stylesheet">

</head>
<body>


 <?php include 'webHeader.php';?>

  <article class="blogs">
      <h1 class="t_nav">
        <span>“慢生活”不是懒惰，放慢速度不是拖延时间，而是让我们在生活中寻找到平衡。</span>
        <a href="admin/welcome/webIndex" class="n1">网站首页</a>
        <a href="admin/welcome/webRecord" class="n2">日志档</a>
      </h1>


      <div class="left">
      	<div>
		    <div class="archives">


		      <?php $i=0; $total=0; foreach($time as $t){?>
				  <h3><?php
                            if(substr($t->group_by_time,4,2) == '01'){
                                echo '一';
                            }else if(substr($t->group_by_time,4,2) == '02'){
                                echo '二';
                            }else if(substr($t->group_by_time,4,2) == '03'){
                                echo '三';
                            }else if(substr($t->group_by_time,4,2) == '04'){
                                echo '四';
                            }else if(substr($t->group_by_time,4,2) == '05'){
                                echo '五';
                            }else if(substr($t->group_by_time,4,2) == '06'){
                                echo '六';
                            }else if(substr($t->group_by_time,4,2) == '07'){
                                echo '七';
                            }else if(substr($t->group_by_time,4,2) == '08'){
                                echo '八';
                            }else if(substr($t->group_by_time,4,2) == '09'){
                                echo '九';
                            }else if(substr($t->group_by_time,4,2) == '10'){
                                echo '十';
                            }else if(substr($t->group_by_time,4,2) == '11'){
                                echo '十一';
                            }else if(substr($t->group_by_time,4,2) == '12'){
                                echo '十二';
                            }
                      ?>月 <?php echo substr($t->group_by_time,0,4);?>年</h3>
				  <table>
					  <tbody>
					  <?php foreach($record[$i] as $r){ ?>
					  <tr>
						  <td width="40" style="text-align:right;"><?php echo substr($r->add_time,8,2);?>日</td>
						  <td width="400"><a href="admin/welcome/webArticle?id=<?php echo $r->article_id; ?>&click=<?php echo $r->click; ?>"><?php echo $r->title;?></a></td>
						  <td width="120"><a class="comm" href="javascript:;" title="查看 css3径向渐变做优惠券[转] 的评论"><?php echo $r->comms;?>人评论</a></td>
						  <td width="120"><span class="view"><?php echo $r->click;?> 浏览</span></td>
					  </tr>
					  <?php }?>
					  </tbody>
				  </table>
		        <?php $total += sizeof($record[$i]); $i++;}?>



				共有<?php echo $total;?>记录

		    </div>
  		</div>
    </div>

    <aside class="right">
   	  <div class="about_c">
        <p>网名：<span>DanceSmile</span> | 即步非烟</p>
        <p>姓名：<span><a href="javascript:;">董艳龙</a></span></p>
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
    <div id="tbox">  
      <a id="gotop" href="javascript:;"></a> 
    </div>
  </footer>


  <script src="assets/admin/files/js/jquery.min.js"></script>
  <script type="text/javascript" src="assets/admin/layer/layer.min.js"></script>
  <script src="assets/admin/files/js/server.js"></script>
  <script src="assets/admin/files/js/gotop.js"></script>
  
</body>
</html>