<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>文章管理</title>
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
  <style>
  		.page_num{
  			position: absolute;
  			left: 300px;
  			margin-top:5px;
  		}
		.page_num a{
			margin:0 2px;
			display: inline-block;
			padding: 5px 13px 5px 13px;
			line-height: 26px;
			overflow: hidden;
			color: #7CGG7C;
			border: 1px solid #dddddd;
			border-radius:3px;
			
		}
		.page_num strong{
			margin:0 2px;
			display: inline-block;
			padding: 5px 13px 5px 13px;
			line-height: 26px;
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
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->

<?php include 'admin-sidebar.php';?>

  <!-- content start -->
  <div class="admin-content">
  	

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> / <small>一些常用模块</small></div>
    </div>

	<div class="am-g">
            <div class="am-u-sm-12 am-u-md-6">
                <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                        <button type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span>
                            <a href="javascript:void(0)" onClick="article_add('900','','添加文章','b_server/article_add')">新增</a>
                        </button>

                    </div>
                </div>
            </div>
			
			<div class="am-u-sm-12 am-u-md-3">
		        <div class="am-form-group">
		          <select data-am-selected="{btnSize: 'sm'}">
		          	<?php 
		          		foreach($category as $v){
		          	?>
		          		<option value="<?php echo $v->category_id?>"><a href="admin/index"><?php echo $v->category_name; ?></a></option>
		          	<?php
						}
		          	?>
		            
		          </select>
		        </div>
		      </div>
			
            <div class="am-u-sm-12 am-u-md-3">
                <form action="admin/article/toSearch" method="post">
                <div class="am-input-group am-input-group-sm">

                    <input type="text" class="am-form-field" name="search">
                      <span class="am-input-group-btn">
                        <button class="am-btn am-btn-default" type="submit">搜索</button>
                      </span>

                </div>
                </form>
            </div>
    </div>

    <div class="am-g">
      <div class="am-u-sm-12">
        <table class="am-table am-table-bd am-table-striped admin-content-table">
          <thead>
          <tr>
            <th class="table-check"><input type="checkbox" /></th><th>文章ID</th><th>标题</th><th>内容</th><th>类别</th><th>时间</th><th>点击量</th><th>设置</th>
          </tr>
          </thead>
          <tbody>
          	<?php
          		foreach ($article as $v) {
				?>
				<tr>
					<td><input type="checkbox"/></td>
					<td><?php echo $v->article_id;?></td>
					<td><a href="javascript:;"><?php echo $v->title;?></a></td>
					<td><?php echo mb_substr($v->content,0,10).'...'; ?></td>
					<td><?php echo $v->category_name;?></td>  <!-- $category[$v->category_id - '1'] -->
					<td><?php echo $v->add_time;?></td>
					<td><?php echo $v->click;?></td>
					<td>
						<div class="am-dropdown" data-am-dropdown>
							<button class="am-btn am-btn-default am-btn-xs am-dropdown-toggle" data-am-dropdown-toggle><span class="am-icon-cog"></span> <span class="am-icon-caret-down"></span></button>
			                <ul class="am-dropdown-content">
			                  <li><a href="javascript:void(0)" onClick="edit_notice('900','','编辑文章','admin/article/edit_article?id=<?php echo $v->article_id;?>')">1. 编辑</a></li>
			                  <li><a href="">2. 下载</a></li>
			                  <li><a href="javascript:void(0)" onClick="del_article(this,<?php echo $v->article_id;?>)">3. 删除</a></li>
			                </ul>
		                </div>
					</td>					
				</tr>
				
			<?php	
          	   }
          	 ?>
          
          </tbody>
        </table>
        
    	<div class="page_num">
     			
			    <?php echo $this->pagination->create_links(); ?>
				
		</div>
        <div class="am-cf">
	           共 <?php echo $total;
	           //sizeof($article);
	          ?> 条记录
        </div><hr />
        
        

     
      </div>
    </div>

    

<a href="#" class="am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}">
  <span class="am-icon-btn am-icon-th-list"></span>
</a>

<footer >
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
</body>
</html>
