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
	<div id="read-info">
		<div id="read-info-con">
			<div id="read-info-con-title"><?php echo $s['title'];?></div>
			<div id="read-info-con-description"><?php echo $s['description'];?>含有高浓缩燕窝原液，集中供给皮肤水分 锁水能力突出，在皮肤水分子表面形成保护膜防止水分快速流失，令皮肤长时间保湿不缺水 保护修复对外界刺激敏感的皮肤，令其更加健康 1.含有燕窝（金丝燕燕窝）萃取物1000MG 对因缺水而引起干燥的皮肤集中进行水分供给，增加皮肤自身含水量，使皮肤润泽水嫩</div>
			<div id="read-info-con-price"><div class="price_l"><div class="rmb">&yen;</div><div class="price"><?php echo $s['price'];?></div></div><div class="old_price_l">&yen; <?php echo $s['old_price'];?></div></div>
			<div id="read-info-con-buy"><a rel="external nofollow" href="<?php echo $s['links'];?>">立即购买</a></div>
			<div id="read-info-con-store"><?php echo $s['store'];?></div>
		</div>
		<div id="read-info-img"><img alt="<?php echo $s['title'];?>" src="../<?php echo $s['img'];?>"></div>
	</div>
	<div id="read-content">
	<!-- stripcslashes -->
		<?php echo $s['content'];?>
	</div>
</div>
<?php include('footer.php');?>