<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>轮播图组件</title>
	<style>
		.slider-container{
			overflow: hidden;
			position: relative;
		}
		.slider-container ul{
			list-style: none;
			margin: 0;
			padding: 0;
		}
		.slider-img{
			height: 495px;
			position: absolute;
			left:0;
		}
		.slider-img li{
			float: left;
		}
		.slider-btn{
			position: absolute;
			right: 10px;
			bottom: 10px;
		}
		.slider-btn li{
			float: left;
			width: 20px;
			height: 20px;
			background: #000;
			color: #fff;
			text-align: center;
			line-height: 20px;
			margin-right: 5px;
			cursor: pointer;
		}
		.slider-btn li.active{
			background: orange;
		}
	</style>
	<base href="<?php echo site_url();?>"/>
</head>
<body>
	<div id="slider1">
		<div class="slider-container">
			<ul class="slider-img">
				<li><img src="assets/admin/files/img/abs/1.1.jpg" alt=""></li>
				<li><img src="assets/admin/files/img/abs/1.2.jpg" alt=""></li>
				<li><img src="assets/admin/files/img/abs/1.3.jpg" alt=""></li>
				<li><img src="assets/admin/files/img/abs/1.4.jpg" alt=""></li>
			</ul>
			<ul class="slider-btn">
			</ul>
		</div>
	</div>
	<p>
		将下列代码粘贴在style标签中 <br>

		.slider-container{
		overflow: hidden;
		position: relative;
		}<br>
		.slider-container ul{
		list-style: none;
		margin: 0;
		padding: 0;
		} <br>
		.slider-img{
		height: 495px;
		position: absolute;
		left:0;
		} <br>
		.slider-img li{
		float: left;
		} <br>
		.slider-btn{
		position: absolute;
		right: 10px;
		bottom: 10px;
		} <br>
		.slider-btn li{
		float: left;
		width: 20px;
		height: 20px;
		background: #000;
		color: #fff;
		text-align: center;
		line-height: 20px;
		margin-right: 5px;
		cursor: pointer;
		} <br>
		.slider-btn li.active{
		background: orange;
		} <br>
	</p>
	<p>
		将下列代码粘贴在body标签中 <br>

		< div id="slider"> <br>
			< div class="slider-container"> <br>
				< ul class="slider-img"> <br>
					< li>< img src="img/1.1.jpg" alt="">< /li> <br>
					< li>< img src="img/1.2.jpg" alt="">< /li> <br>
					< li>< img src="img/1.3.jpg" alt="">< /li> <br>
					< li>< img src="img/1.4.jpg" alt="">< /li> <br>
					//	图片数量可以是任意 <br>
				< /ul> <br>
				< ul class="slider-btn"> <br>
				< /ul> <br>
			< /div> <br>
		< /div> <br>

		将下列代码粘贴在script标签中 <br>

		var slider1=new Slider({
		container:'#slider',
		order:'asc',
		duration:2000,
		width:640,
		height:240
		}); <br>
		slider1.init(); <br>

		说明：	container：	必选  slider为上述div的id <br>
		order：		可选  asc为正序，desc为逆序，默认为正序 <br>
		duration：	可选  间隔时长  默认为2秒 <br>
		width：     必选  图片宽度 <br>
		heigt：     必选  图片高度 <br>
	</p>

	<script src="assets/admin/files/js/jquery.min.js"></script>
	<script src='assets/admin/files/js/abs/slider.js'></script>
	<script>
		$(function(){
			var slider1=new Slider({
				container:'#slider1',
				order:'asc',
				duration:2000,
				width:640,
				height:240
			});
			slider1.init();
		});
	</script>
</body>
</html>