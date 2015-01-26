<?php
function __autoload($className){
	include '../class/'.$className.'_class.php';
}
$M=new Allfunction();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>后台管理</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="css/font-awesome-4.2.0/css/font-awesome.min.css">
<link href="" type="text/css" rel="stylesheet">
<script type="text/javascript" src="../js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="admin.js"></script>
</head>
<body>
    <div id="b">
    	<div id="m">
    		<div style="padding:10px;"><a target="_blank" href="addproduct.php">添加</a></div>
    		<?php
    			$s=$M->biao('products')->where('id>"0"')->order('sort')->select();
    			if ($s) {
    				foreach ($s as $key => $value) {
    					echo '<div id="'.$value['id'].'" style="padding:5px;"><span style="color:blue">'.$value['sort'].'</span> '.$value['title'].' <a target="_blank" href="addproduct.php?name=change&id='.$value['id'].'">修改</a> <a class="del" href="#">删除</a></div>';
    				}
    			}else{
    				echo '没有数据！';
    			}
    		?>
    	</div>
    </div>
</body>
</html>