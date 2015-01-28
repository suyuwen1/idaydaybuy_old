<?php
// ob_start();
if (empty($_GET['id'])) {
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
}else{
	header('HTTP/1.1 404 Not Found');
	header("status: 404 Not Found");
	// ob_end_flush();
	include('404.php');
	exit;
}

?>
<?php include('header.php');?>

<?php include('footer.php');?>