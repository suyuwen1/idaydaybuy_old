<?php
set_time_limit(0);
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

// if (!empty($_FILES['img']){
	$pp=array();
	$p='img/'.date('Ymdhis').'_'.$_FILES['img']['name'];
	$f=move_uploaded_file($_FILES["img"]["tmp_name"],'../'.$p);
	if ($f) {
		$pp['p']=$p;
	}else{
		$pp['p']=0;
	}
// }

echo "<script>parent.stopSend('".$pp['p']."')</script>";
?>