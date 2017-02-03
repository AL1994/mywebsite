<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>c3旋转立方体</title>
	<style>
		*{
			margin: 0;
			padding: 0;
		}
		body{
			background: #000;
			-webkit-perspective: 800px;
			-webkit-perspective-origin: 50% 125px;
		}
		#container{
			width: 200px;
			height: 200px;
			margin: 200px auto;
			
			position: relative;
			-webkit-transform-style: preserve-3d;
			-webkit-animation: xx 5s linear infinite;
		}
		@-webkit-keyframes xx{
			0%{
				-webkit-transform: rotateY(0deg);
			}
			100%{
				-webkit-transform: rotateY(-360deg);
			}
		}
		.cube{
			width: 200px;
			height: 200px;
			border-radius: 12px;
			background: rgba(255,255,255,0.6);
			border: 1px solid #fff;
			font: bold 124pt/200px "Times New Roman", Times, serif;
			color: #000;
			text-align: center;
			position: absolute;
			left: 0;
			top: 0;
			opacity: 0.6;
		}
		.four{
			-webkit-transform:  scale3d(1.2,1.2,1.2) rotateY(180deg) translateZ(100px);
		}
		.one{
			-webkit-transform: scale3d(1.2,1.2,1.2) rotateX(90deg) translateZ(100px) ;
		}
		.three{
			-webkit-transform: scale3d(1.2,1.2,1.2) rotateY(90deg) translateZ(100px) ;
		}
		.five{
			-webkit-transform: scale3d(1.2,1.2,1.2) rotateY(-90deg) translateZ(100px) ;
		}
		.six{
			-webkit-transform: scale3d(1.2,1.2,1.2) rotateX(-90deg) translateZ(100px) ;
		}
		.two{
			-webkit-transform: scale3d(1.2,1.2,1.2) translateZ(100px) ;
		}
	</style>
</head>
<body>
	<div id="container">
		<div class="cube one">1</div>
		<div class="cube two">2</div>
		<div class="cube three">3</div>
		<div class="cube four">4</div>
		<div class="cube five">5</div>
		<div class="cube six">6</div>
	</div>
</body>
</html>