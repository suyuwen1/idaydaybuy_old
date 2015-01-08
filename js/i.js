/**
 * 
 * @authors Your Name (you@example.org)
 * @date    2015-01-01 17:19:09
 * @version $Id$
 */
$(function(){
	top_show();
	top_click();
})
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