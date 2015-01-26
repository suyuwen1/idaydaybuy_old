/**
 * 
 * @authors Your Name (you@example.org)
 * @date    2015-01-01 17:19:09
 * @version $Id$
 */
$(function(){
	top_show();
	top_click();
	// screen_width();
	// sou_click();
});
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
function top_show(){
	$(window).scroll(function(event) {
		var t=$(this).scrollTop();
		if (t>100) {
			$("#top").show();
		} else{
			$("#top").hide();
		};
	});
}
function top_click(){
	$("#top").click(function(event) {
		$('html,body').animate({scrollTop:0}, 'fast');
	});
}
function screen_width(){
	var w='width:'+$(window).width();
	w+=',innerwidth:'+$(window).innerWidth();
	w+=',outerwidth:'+$(window).outerWidth();
	var h='height:'+$(window).height();
	h+=',innerheight:'+$(window).innerHeight();
	h+=',outerheight:'+$(window).outerHeight();
	alert(w+'\n'+h);
}