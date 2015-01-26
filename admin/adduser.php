<?php
if (empty($_SESSION['user'])) {
    header("Location:index.php");
    exit;
}
function __autoload($className){
	include '../class/'.$className.'_class.php';
}
$M=new Allfunction();
if (!empty($_POST['user']) && !empty($_POST['pw'])) {
	$_POST['pw']=md5($_POST['pw'].'ibuy');
	$s=$M->biao('login')->where('user="'.$_POST['user'].'"')->select();
	if (!$s) {
		$i=$M->biao('login')->insert($_POST);
		if ($i) {
			echo "添加成功！";
		}else{
			echo "添加失败，请稍后再试！";
		}
	}else{
		echo "用户已存在！";
	}
	
}else{
	echo "请输入用户名和密码！";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>添加用户</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link href="" rel="stylesheet">
</head>
<body>
    <form method="post">
    	用户名：<input type="text" name="user" value="<?php echo empty($_POST['user'])? '' : $_POST['user'];?>">
    	密码：<input type="password" name="pw">
    	<button type="submit">添加</button>
    </form>
</body>
</html>