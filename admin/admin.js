/**
 * 
 * @authors Your Name (you@example.org)
 * @date    2015-01-09 11:59:55
 * @version $Id$
 */
$(function(){
	tj();
	upimg.init();
})
var b_ajax;
function i_ajax(t,u,dt,d,bf,su){
	if(b_ajax){
		b_ajax.abort();
	}
	b_ajax=$.ajax({
		type:t,
		url:u,
		dataType:dt,
		data:d,
		beforeSend:bf,
		success:su
	});
}
function tj(){
	$(".m-i button").click(function(event) {
		var da={
			"title":$.trim($("#title").val()),
			"price":$.trim($("#price").val()),
			"store":$.trim($("#store").val()),
			"img":$.trim($("#img-show img").attr('p')),
			"links":$.trim($("#links").val()),
			"sort":$.trim($("#sort").val()),
			"content":$.trim($("#content").val()),
		}
		if(da.title!='' && da.price!='' && da.store!='' && da.img!='' && da.links!='' && da.sort!='' && da.content!=''){
			i_ajax('post','post.php','json',{"name":"add","d":da},tj_bf,tj_su);
		}else{
			alert('请全部填写！');
		}
	});
}
function tj_bf(){
	$(".m-i button").html('提交中...').attr('disabled', 'disabled');
}
function tj_su(data){
	if (data[0]) {
		$("#sort").val('');
		$("#info").html(data[1]);
	} else{
		alert('提交失败，请稍后再试！');
		$("#info").html(data[1]);
	}
	$(".m-i button").html('提交').removeAttr('disabled');
}
var upimg={
	imgtype:['image/jpg','image/jpeg','image/gif','image/png'],
	up:function(e){
		e = e || window.event;
		var f=e.target.files[0];
		// if (this.check(f.type)) {};
		// console.log(f);
		if (f.type.indexOf('image')==0) {
			$.ajax({
				type:"POST",
				async:false,
				global:false,
				url:"upfile.php?n="+f.name,
				dataType:"json",
				data:f,
				contentType:"multipart/form-data",
				processData:false,
				beforeSend:function(){
					$("#img-show").html('<i class="fa fa-refresh fa-spin"></i>');
				},
				success:function(d){
					if (d.p) {
						$("#img-show").html('<img p="'+d.p+'" width="100" height="100" src="..'+d.p+'">');
					}else{
						alert('图片上传失败，请稍后再试！');
					}
				}
			});
		}else{
			alert('你选择的不是图片！')
		}
	},
	check:function(a){
		for (var i = 0,v; v=this.imgtype['i']; i++) {
			if (v==a) {
				return true;
			}
		};
		return false;
	},
	init:function(){
		var t=this;
		$("#img").change(function(e) {
			t.up(e);
			return false;
		});
	}
}