<?php
function upfile(){
	$pp=array();
	$p='img/'.date('Ymdhis').'_'.iconv("UTF-8","gb2312",$_GET['n']);
	$f=file_put_contents('../'.$p,file_get_contents('php://input'));
	if ($f) {
		$pp['p']=iconv("gb2312","UTF-8",$p);
	}else{
		$pp['p']=0;
	}
	return $pp;
}
echo json_encode(upfile());
?>