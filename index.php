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
	<title>爱国者</title>
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
					<li class="tsou"><form method="post"><input id="sou-text" placeholder="搜索" name="sou-text" type="text" value="<?php echo (empty($_POST['sou-text']))? '' : $_POST['sou-text'];?>"><button id="t-submit" style="submit"><i class="fa fa-search"></i></button></form></li>
				</ul>
			</div>
		</div>
		<div id="c">
			<ul>
				<?php
				$f=5;    //显示几页
				$n=isset($_GET['n'])?$_GET['n']:1;
				$sum=$M->sel_str('select count(*) as a from products');
				$s=$M->biao('products')->where($w)->limit(($n-1)*$f,$f)->order('sort')->select();
				if ($s) {
					foreach ($s as $k => $v) {
						if ($k>=$f) {
							break;
						}
						// echo $k;
						echo <<< END
						<li class="c-li"><div class="c-li-img"><img src="img/123.png"></div><div class="c-li-info"><div class="title">{$v['title']}</div><div class="content">{$v['content']}</div><div class="qita"><div class="price_l"><div class="rmb">&yen;</div><div class="price">{$v['price']}</div><div class="store">{$v['store']}</div></div><div class="links"><a target="_blank" href="">购买</a></div></div></div></li>
END;
					}
					echo '<div id="fanye">';
					$a=ceil($sum['a']/$f);   //总页数
					// echo count($s).'-'.$a;
					$b=10;    //显示几页
					$c=5;    //左右几个数
					$d=3;    //首页从 x+3 个数开始翻页
					// $n=isset($_GET['n'])?$_GET['n']:1;
					if($n==1){
						echo '';
					}else{
						echo '<a href="?n='.($n-1).'">上一页</a>';
					}
					if($a>$b){
						if(($n-$c)<$d){
							$i1=1;
							$i2=$b;
						}else if(($n-$c)>=$d and ($n+$c)<$a){
							$i1=$n-$c;
							$i2=$n+$c;
						}else if(($n+$c)>=$a){
							$i1=$n-$c;
							$i2=$a;
						}
					}else{
						$i1=1;
						$i2=$a;
					}
					for($i=$i1;$i<=$i2;$i++){
						if ($i==$n) {
							if ($a!=1) {
								echo '<span>'.$i.'</span>';
							}
						}else{
							echo '<a href="?n='.$i.'">'.$i.'</a>';
						}
					}
					if($n==$a){
						echo '';
					}else{
						echo '<a href="?n='.($n+1).'">下一页</a>';
					}
					echo '</div>';
				} else {
					echo '没有找到"'.$_POST['sou-text'].'"!';
				}

				?>
			</ul>
		</div>
		<span id="top"><i class="fa fa-arrow-up"></i></span>
		<div id="d">京ICP备12017597号-1</div>
	</div>
</div>
</body>
</html>