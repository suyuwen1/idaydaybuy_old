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
	<div id="read-content"><?php echo stripcslashes($s[0]['content']);?></div>
</div>
<?php include('footer.php');?>