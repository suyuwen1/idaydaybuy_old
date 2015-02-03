<?php
// ob_start();
if (empty($_GET['id'])) {
	header('HTTP/1.1 404 Not Found');
	header("status: 404 Not Found");
	// ob_end_flush();
	include('404.php');
	exit;
}
function __autoload($className){
	include 'class/'.$className.'_class.php';
}
$M=new Allfunction();
$page='read';
$s=$M->biao('products')->where('id='.$_GET['id'])->limit(0,1)->select();
if ($s) {
	$title=$s[0]['title'];
	$description=mb_substr($s[0]['description'], 0, 200, 'utf-8');
	$s=$s[0];
}else{
	header('HTTP/1.1 404 Not Found');
	header("status: 404 Not Found");
	// ob_end_flush();
	include('404.php');
	exit;
}

?>
<?php include('header.php');?>
<div id="read">
	<div id="read-title"><?php echo $title;?></div>
	<div id="read-content">
		<div id="read-content-info">
			<div class="c-li-img"><img src="<?php echo $s['img'];?>"></div>
			<div class="c-li-info"><div class="content content2"><?php echo $description;?></div><div class="store store2"><?php echo $s['store'];?></div><div class="qita"><div class="price_l"><div class="rmb">&yen;</div><div class="price"><?php echo $s['price'];?></div></div><div class="links"><a target="_blank" href="<?php echo $s['links'];?>">购买</a></div></div></div>
		</div>
		<div><?php echo stripcslashes($s[0]['content']);?></div>
	</div>
</div>
<?php include('footer.php');?>