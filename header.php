<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>爱国者<?php ?></title>
	<meta name="description" content="天天买-我们只是产品的搬用工！">
	<meta name="keywords" content="天天买,天天特卖,促销活动">
	<link rel="stylesheet" type="text/css" href="css/font-awesome-4.2.0/css/font-awesome.min.css">
	<link href="css/i.css" type="text/css" rel="stylesheet">
	<script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
	<script src="js/i.js" type="text/javascript"></script>
</head>
<body>
	<div id="b">
		<div id="t">
			<div id="t-bars">
				<ul>
					<li class="t-bars-li tlogo"><a class="t-bars-a" href="index.php">爱国者</a></li>
					<li class="t-bars-li"><a class="t-bars-a" href="#">爱国者特卖</a></li>
					<li class="t-bars-li"><a class="t-bars-a" href="#"></a></li>
					<li class="tsou"><form action="search.php" method="get"><input id="sou-text" placeholder="搜索" name="s" type="text" value="<?php echo (empty($_POST['sou-text']))? '' : $_POST['sou-text'];?>"><button id="t-submit" style="submit"><i class="fa fa-search"></i></button></form></li>
				</ul>
			</div>
		</div>