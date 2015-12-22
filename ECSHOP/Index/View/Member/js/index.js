$(function() {

	//二级菜单区块
	$('.all').mouseenter(function() {
		$(this).find('.menu').slideDown(10);
	}).mouseleave(function() {
		$(this).find('.menu').slideUp(10);
	})
	
	$('.m_li').mouseenter(function() {
		if ($(this).parent().index()<3) {
			$('.hd').addClass('top');	
		}else{
			var bottom=($(this).parent().index()-6)*57+'px';
			$('.hd').removeClass('top');
			$('.hd').css('bottom',bottom);
		}
		$(this).css('background-color','#FCF7F7').find('h3').css('color','#E63547');
		$(this).find('div.hd').show();
	}).mouseleave(function() {
		$(this).css('background-color','#E63547').find('h3').css('color','#fff');
		$(this).find('div.hd').hide();
	})

	// 购物车区块
	$('.gouwu').mouseenter(function() {
		$(this).find('a').addClass('current').siblings('.hd_shop').stop().show();
		$('.my').find('b').hide(); 
	}).mouseleave(function() {
		$(this).find('a').removeClass('current').siblings('.hd_shop').stop().hide();
		$('.my').find('b').show();
	})
	//我的商城区块
	$('.my').mouseenter(function() {
		$(this).find('a').addClass('my_cur').siblings('.hd_my').stop().show();
		$('.my').find('b').hide(); 
	}).mouseleave(function() {
		$(this).find('a').removeClass('my_cur').siblings('.hd_my').stop().hide();
		$('.my').find('b').show();
	})
/**
 * 异步修改地址
 */
	$('form').submit(function() {
		// var msg=$(this).serialize();
		var addressId=$("[name='address_id']").val(),order=$("[name='address_order']").val(),
			address=$("[name='address']").val(),tel=$("[name='address_tel']").val();
		$.post(CONTROLLER+'&editAddress',{id:addressId,order:order,address:address,tel:tel},
		function(JSON) {
			if (JSON.status==1) {
				alert(JSON.message);
				window.location.reload();
			}else{
				alert(JSON.message);
			}
		},'JSON')
		return false;
	})

})
/**
 * 取消订单
 * @param  {[type]} order_goods_id [订单ID]
 */
function cancelOrder (order_goods_id) {
	$.post(CONTROLLER+'&cancelOrder',{id:order_goods_id},function(JSON) {
			if (JSON.status==1) {
				window.location.reload();
			}else{
				alert(JSON.message);
			}
	},'JSON');
}

/**
 * 修改地址
 * @return {[type]} [description]
 */
function editAddress () {
		$('table.show_tb').hide();
		$('table.hide_tb').show();
	}
/**
 * 编辑个人信息
 * @return {[type]} [description]
 */
function editMsg () {
	$("[name='button']").show();
	$("[name='username']").removeAttr('disabled');
	$("[name='password']").removeAttr('disabled');
}
/**
 * 异步修改用户信息
 * @return {[type]} [description]
 */
function saveMsg () {
	var uid=$("[name='uid']").val(),uname=$("[name='username']").val(),
		psw=$("[name='password']").val();
	if ($("[name='username']").attr('pass')==1) {
		return false;
	}
	$.post(CONTROLLER+'&eidtMsg',{uid:uid,username:uname,password:psw},function(JSON) {
		if (JSON.status) {
			alert(JSON.message);
			$("[name='button']").hide();
			$("[name='username']").attr('disabled','');
			$("[name='password']").attr('disabled','');
			$("[name='username']").siblings('span').hide();
		}else{
			alert(JSON.message);
		}
	},'JSON')


}
/**
 * 检测用户名是否存在
 */
function testUname (obj) {
	var username=$(obj).val();
	$.post(CONTROLLER+'&testUname',{username:username},function(JSON) {
		if (JSON.status) {
			$(obj).attr('pass',0).siblings('span').html(JSON.message);
		}else{
			$(obj).attr('pass',1).siblings('span').html(JSON.message);
		}
	},'JSON')
}