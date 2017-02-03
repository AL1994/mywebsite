<!DOCTYPE>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>CSS3 transform实现图片旋转木马3D浏览</title>
	<base href="<?php echo site_url();?>"/>
	<link rel="stylesheet" href="assets/admin/files/css/abs/carrousel.css" type="text/css" />
<style>
.stage_area {
	width: 900px;
	min-height: 100px;
	margin-left: auto;
	margin-right: auto;
	padding: 100px 50px;
	background-color: #f0f0f0;
	box-shadow: inset 0 0 3px rgba(0,0,0,.35);	
	
	 -webkit-perspective: 800px;
	   -moz-perspective: 800px;
            perspective: 800px;
	
	-webkit-transition: top .5s;
	
	position: relative;
	top: 0;
}

.container {
	width: 128px;
	height: 100px;
	margin-left: -64px;
	
	-webkit-transition: -webkit-transform 1s;
	   -moz-transition: -moz-transform 1s;
	        transition: transform 1s;
	
	-webkit-transform-style: preserve-3d;
	  -moz-transform-style: preserve-3d;
	       transform-style: preserve-3d;	
		   
	position: absolute;
	left: 50%;
}

.piece {
	width: 128px;
	
	box-shadow: 0 1px 3px rgba(0,0,0,.5);
	
	-webkit-transition: opacity 1s, -webkit-transform 1s;
       -moz-transition: opacity 1s, -moz-transform 1s;
            transition: opacity 1s, transform 1s;
			
	position: absolute;
	bottom: 0;
}

.remind {
	position: absolute;
	left: 1em;
	top: 1em;
}

.chrome_fix {
	position: absolute;
	left: 1em;
	top: 3em;
}
</style>
</head>

<body>

<div id="main">
	<h1>CSS3 transform实现图片旋转木马3D浏览效果</h1>
    <div id="body" class="light">
    	<div id="content" class="show">
            <div class="demo">
                <div id="stage" class="stage_area">
                	<strong class="remind">点击任意图片浏览：</strong>
                	<div id="container" class="container"></div>
                </div>
            </div>
        </div>       
    </div>
</div>
<script>
(function() {
	if (typeof window.screenX === "number") {
		// 随机颜色HSL
		var randomHsl = function() {
			return "hsla(" + Math.round(360 * Math.random()) + "," + "60%, 50%, .75)";
		}
		// CSS transform变换应用
		, transform = function(element, value, key) {
			key = key || "Transform";
			["Moz", "O", "Ms", "Webkit", ""].forEach(function(prefix) {
				element.style[prefix + key] = value;	
			});	
			
			return element;
		}
		// 浏览器选择器API
		, $ = function(selector) {
			return document.querySelector(selector);
		}, $$ = function(selector) {
			return document.querySelectorAll(selector);
		};
		
		// 显示图片
		var htmlPic = '', arrayPic = [1, 8, 3, 4, 6, 7, 10, 13, 15], rotate = 360 / arrayPic.length;
		
		arrayPic.forEach(function(i) {
			htmlPic = htmlPic + '<img id="piece'+ i +'" src="assets/admin/files/img/abs/mm'+ i +'.jpg" class="piece" />';
		});
			
		// 元素
		var eleStage = $("#stage"), eleContainer = $("#container"), indexPiece = 0;
		// 元素
		var elePics = $$(".piece"), transZ = 64 / Math.tan((rotate / 2 / 180) * Math.PI);
		
		eleContainer.innerHTML = htmlPic;
		eleContainer.addEventListener("click", function() {
			transform(this, "rotateY("+ (-1 * rotate * ++indexPiece) +"deg)");	
		});
		
		arrayPic.forEach(function(i, j) {
			transform($("#piece" + i), "rotateY("+ j * rotate +"deg) translateZ("+ (transZ + 20) +"px)");	
		});	
		
		
		
		
		
		// 垂直位置居中 - Chrome浏览器
		var funStageValign = function(element) {
			var scrollTop = document.documentElement.scrollTop, clientHeight = document.documentElement.clientHeight;
				offsetTop = element.getBoundingClientRect().top;
			
			if (parseInt(window.getComputedStyle(element).top) === 0) {
				element.style.top = scrollTop + (window.innerHeight - 300) / 2 - offsetTop;
			} else {
				element.style.top = "0px";
			}
		};
		
		if (/chrome/i.test(navigator.userAgent)) {
			// 创建Chrome浏览器视区修正按钮
			var eleButton = document.createElement("input");
			var arrValue = ["舞台位置窗体区域垂直居中", "垂直位置还原"];

			eleButton.type = "button";
			eleButton.value = arrValue[0];	
			eleButton.className = "chrome_fix";
			eleButton.addEventListener("click", function() {
				this.value = arrValue[Number(this.value !== arrValue[1])];
				var stage = this.parentNode;
				funStageValign(stage);
			});
			
			eleStage.appendChild(eleButton);
		}			
	} else {
		alert("你好，养猪场不是飞机场，是开不了战斗机的！");	
	}
})();
</script>
</body>
</html>
