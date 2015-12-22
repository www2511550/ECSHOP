$(function() {
	//列表页边框
	$('.list_pro').mouseenter(function() {
		$(this).css('border','1px solid #E01D20');
	}).mouseleave(function() {
		$(this).css('border','1px solid #dedede');
	})
	//加入购物车
	$('.p_btn>a').mouseenter(function() {
		$(this).addClass('current');
	}).mouseleave(function() {
		$(this).removeClass('current');
	})
})