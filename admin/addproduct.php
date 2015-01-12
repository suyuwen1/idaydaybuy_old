<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>添加产品</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link href="admin.css" rel="stylesheet">
<script type="text/javascript" src="../js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="admin.js"></script>
</head>
<body>
    <div id="b">
    	<div id="m">
    		<div class="m-i">标题：<input id="title" class="input-text" size="200" type="text"></div>
    		<div class="m-i">价格：<input id="price" class="input-text price" size="50" type="text"></div>
    		<div class="m-i">厂商：<input id="store" class="input-text" size="200" type="text"></div>
    		<div class="m-i">图片：<input id="img" class="input-text" size="200" type="file"></div>
            <div class="m-i" id="img-show"></div>
    		<div class="m-i">链接：<input id="links" class="input-text" size="200" type="text"></div>
    		<div class="m-i">排序：<input id="sort" class="input-text price" size="50" type="text"></div>
    		<div class="m-i">内容：<textarea id="content" rows="6" cols="100"></textarea></div>
    		<div class="m-i"><button type="button">提交</button></div>
            <div id="info"></div>
    	</div>
    </div>
</body>
</html>
<?php
var_dump(ini_get_all());
?>