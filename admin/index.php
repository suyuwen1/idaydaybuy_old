<?php
	function __autoload($className){
	include '../class/'.$className.'_class.php';
	}
	$M=new Allfunction();
	if (!empty($_POST['user']) && !empty($_POST['pw'])) {
		if (empty($_SESSION['ctime'])) {
			
		}else{
			(time()-$_SESSION['ctime'])
		}
		$s=$M->biao('login')->where('user="'.$_POST['user'].'"')->select();
		if ($s) {
			if ($s['pw']==md5($_POST['pw'].ibuy)) {
				session_start();
				$_SESSION['user']=$_POST['user'];
				unset($_SESSION['ctime']);
				header("Location:admin.php");
			}else{
				$_SESSION['dl']=empty($_SESSION['dl'])? 2 : $_SESSION['dl']-1;
				if ($_SESSION['dl']<=0) {
					$_SESSION['ctime']=time();
					echo '密码输入3次，请稍后再试！'
				}else{
					echo '密码错误！';
				}
			}
		}else{
			echo '无此用户！';
		}
	}else{
		echo '请输入用户和密码！';
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
		<form method="post">
				<div><input type="text" name="user"></div>
				<div><input type="password" name="pw"></div>
				<div><button id="tj" type="submit">登陆</button></div>
			</form>
		</div>
	</div>
</body>
</html>