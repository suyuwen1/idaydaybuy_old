<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="logo/logo_ico.ico">
	<meta charset="utf-8">
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport"content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<title><?php echo empty($title)?'天天买-我们只是产品的搬用工！':$title.'-天天买';?></title>
	<meta name="description" content="<?php echo empty($description)?'天天买-我们只是产品的搬用工！':$description;?>">
	<meta name="keywords" content="天天买,天天特卖,促销活动">
	<link rel="stylesheet" type="text/css" href="css/font-awesome-4.2.0/css/font-awesome.min.css">
	<link href="css/i.css" type="text/css" rel="stylesheet" media="all">
	<script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
	<script src="js/i.js" type="text/javascript"></script>
</head>
<body>
	<div id="b">
		<div id="t">
			<div id="t-bars">
					<div class="t-bars-li tlogo"><a class="t-bars-a" href="index.php">天天买</a></div>
					<div id="fa-bars"><i id="fa-bars-i" class="fa fa-bars fa-2x fa-fw"></i></div>
					<div id="bars-list" class="t-bars-li"><div class="bars-list-b"><a class="t-bars-a" href="#">天天买特卖</a></div><div class="bars-list-b"><a class="t-bars-a" href="#">天天买特卖</a></div></div>
					<div class="tsou bars-list-b"><form action="search.php" method="get"><input id="sou-text" placeholder="搜索" name="s" type="text" value="<?php echo (empty($_POST['sou-text']))? '' : $_POST['sou-text'];?>"><button id="t-submit" style="submit"><i class="fa fa-search"></i></button></form></div>
			</div>
		</div>