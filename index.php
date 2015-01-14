<?php
function __autoload($className){
    include 'class/'.$className.'_class.php';
}
$M=new Allfunction();
$w = (empty($_POST['sou-text'])) ? 'id>0' : 'title like "%'.$_POST['sou-text'].'%" or store like "%'.$_POST['sou-text'].'%"' ;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>我们只是产品的搬用工</title>
<meta name="description" content="">
<meta name="keywords" content="">
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
					<li class="t-bars-li tlogo"><a class="t-bars-a" href="#">爱国者</a></li>
					<li class="t-bars-li"><a class="t-bars-a" href="#">爱国者</a></li>
					<li class="t-bars-li"><a class="t-bars-a" href="#">爱国者</a></li>
					<li class="tsou"><form method="post"><input id="sou-text" placeholder="搜索" name="sou-text" type="text"><button id="t-submit" style="submit"><i class="fa fa-search"></i></button></form></li>
				</ul>
			</div>
    	</div>
    	<div id="c">
			<ul>
				<?php
					$s=$M->biao('products')->where($w)->select();
					if ($s) {
						foreach ($s as $k => $v) {
							echo <<< END
								<li class="c-li"><div class="c-li-img"><img src="img/123.png"></div><div class="c-li-info"><div class="title">{$v['title']}</div><div class="content">{$v['content']}</div><div class="qita"><div class="price_l"><div class="rmb">&yen;</div><div class="price">{$v['price']}</div><div class="store">{$v['store']}</div></div><div class="links"><a target="_blank" href="">去购买</a></div></div></div></li>
END;
						}
					} else {
						echo '没有找到数据！';
					}
					
				?>
				<li class="c-li"><div class="c-li-img"><img src="img/123.png"></div><div class="c-li-info"><div class="title">没有</div><div class="content">没有找</div><div class="qita"><div class="price_l"><div class="rmb">&yen;</div><div class="price">34.53</div><div class="store">数</div></div><div class="links"><a target="_blank" href="">去购买</a></div></div></div></li>
				<li class="c-li"><div class="c-li-img"><img src="img/456.jpg"></div><div class="c-li-info">1</div></li>
				<li class="c-li"><div class="c-li-img"><img src="img/123.png"></div><div class="c-li-info">1</div></li>
			</ul>
    	</div>
    	<span id="top"><i class="fa fa-arrow-up"></i></span>
    	<div id="d">京ICP备12017597号-1</div>
    	</div>
    </div>
</body>
</html>