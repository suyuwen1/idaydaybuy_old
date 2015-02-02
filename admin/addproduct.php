<?php
function __autoload($className){
    include '../class/'.$className.'_class.php';
}
if (!empty($_GET['name'])) {
    if ($_GET['name']=='change') {
        $M=new Allfunction();
        $s=$M->biao('products')->where('id='.$_GET['id'])->select();
        if ($s) {
            $name='change';
            $i=$_GET['id'];
        }else{
            exit;
        }
    }else{
        exit;
    }
}else{
    $name='add';
    $i='';
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>添加产品</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="../css/font-awesome-4.2.0/css/font-awesome.min.css">
<link href="admin.css" rel="stylesheet">
<script type="text/javascript" src="../js/jquery-1.11.2.min.js"></script>
<!-- <script type="text/javascript" src="../js/AjaxFileUploader/ajaxfileupload.js"></script> -->
<script type="text/javascript" src="admin.js"></script>
<script type="text/javascript" charset="utf-8" src="../ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="../ueditor/ueditor.all.min.js"> </script>
</head>
<body>
    <div id="b">
    	<div id="m" d="<?php echo $name;?>" i="<?php echo $i;?>">
    		<div class="m-i">标题：<input id="title" class="input-text" size="200" type="text" value="<?php echo ($name=='add')?'':$s[0]['title'];?>"></div>
    		<div class="m-i">价格：<input id="price" class="input-text price" size="50" type="text" value="<?php echo ($name=='add')?'':$s[0]['price'];?>"></div>
    		<div class="m-i">厂商：<input id="store" class="input-text" size="200" type="text" value="<?php echo ($name=='add')?'':$s[0]['store'];?>"></div>
    		<div class="m-i">图片：<form id="form" action="upfile.php" method="POST"  target="tarframe" enctype="multipart/form-data"><input name="img" id="img" class="input-text" size="200" type="file"></form></div>
            <iframe src="" style="display:none;" name="tarframe"></iframe>
            <div class="m-i" id="img-show"><?php echo ($name=='add')?'':'<img p="'.$s[0]['img'].'" width="100" height="100" src="../'.$s[0]['img'].'">';?></div>
    		<div class="m-i">链接：<input id="links" class="input-text" size="200" type="text" value="<?php echo ($name=='add')?'':$s[0]['links'];?>"></div>
    		<div class="m-i">排序：<input id="sort" class="input-text price" size="50" type="text" value="<?php echo ($name=='add')?'':$s[0]['sort'];?>"></div>
    		<div class="m-i">内容：<textarea id="description" rows="6" cols="100"><?php echo ($name=='add')?'':$s[0]['description'];?></textarea></div>
            <div class="m-i">详细信息：<script id="content" type="text/plain" style="width:1000px;height:500px;"><?php echo ($name=='add')?'':stripcslashes($s[0]['content']);?></script></div>
    		<div class="m-i"><button type="button">提交</button><a style="padding:20px;" href="admin.php">返回</a></div>
            <div id="info"></div>
    	</div>
    </div>
    <script type="text/javascript">
        var ue = UE.getEditor('content');
    </script>
</body>
</html>