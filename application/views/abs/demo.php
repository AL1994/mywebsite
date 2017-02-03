<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>搜索框组件</title>
	<base href="<?php echo site_url();?>"/>
	<link rel="stylesheet" href="assets/admin/files/css/abs/autocomplete.css">
</head>
<body>
	<div id="container">
		<input type="text" id="ipt" autocomplete="off">
		<!-- <ul class="autocomplete-list">
			<li>1</li>
			<li>2</li>
			<li>3</li>
			<li>4</li>
		</ul> -->
	</div>
	<script src="assets/admin/files/js/jquery.min.js"></script>
	<script src="assets/admin/files/js/abs/autocomplete.js"></script>
	<script>
		$(function(){
			$('#ipt').autocomplete();
		});
	</script>
</body>
</html>