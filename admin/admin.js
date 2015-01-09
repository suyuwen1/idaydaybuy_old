/**
 * 
 * @authors Your Name (you@example.org)
 * @date    2015-01-09 11:59:55
 * @version $Id$
 */
$(function(){
	tj();
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
			"img":$.trim($("#img").val()),
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
	if (data.d) {
		$("#sort").val('');
	} else{
		alert('提交失败，请稍后再试！');
	};
}