<?php
// ob_start();
$i='';
session_start();
function __autoload($className){
	include '../class/'.$className.'_class.php';
}
$M=new Allfunction();
if (!empty($_POST['user']) && !empty($_POST['pw'])) {
	if (!empty($_SESSION['ctime']) && ((time()-strtotime("-30 minutes"))<$_SESSION['ctime'])) {
		$i="密码输入3次，请稍后再试！";
	}else{
		$s=$M->biao('login')->where('user="'.$_POST['user'].'"')->select();
		if ($s) {
			if ($s[0]['pw']==md5($_POST['pw'].'ibuy')) {
				$_SESSION['user']=$_POST['user'];
				unset($_SESSION['ctime']);
				unset($_SESSION['dl']);
				$i=1;
			}else{
				$_SESSION['dl']=empty($_SESSION['dl'])? 2 : $_SESSION['dl']-1;
				if ($_SESSION['dl']<=0) {
					$_SESSION['ctime']=time();
					$i='密码输入3次，请稍后再试！';
				}else{
					$i='密码错误！';
				}
			}
		}else{
			$i='无此用户！';
		}
	}
}else{
	$i='请输入用户和密码！';
}
if ($i==1) {
	header('Location:admin.php');
	// ob_end_flush();
	// exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>登陆</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link href="admin.css" rel="stylesheet">
</head>
<body>
	<div id="b">
		<div id="m">
		<?php 
			if ($i!=1) {
				echo $i;
			}
		?>
			<form method="post">
				<div><input type="text" name="user" value="<?php echo empty($_POST['user'])? '' : $_POST['user'];?>"></div>
				<div><input type="password" name="pw"></div>
				<div><button id="tj" type="submit">登陆</button></div>
			</form>
		</div>
	</div>
</body>
</html>