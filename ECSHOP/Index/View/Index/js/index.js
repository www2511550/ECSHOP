$(function() {
	
	//首页轮播图
	$('.lb_box ol li').mouseenter(function() {
		clearInterval(timer);
		$(this).addClass('cur').siblings('li').removeClass();
		$('.lb_box a').eq($(this).index()).stop().fadeTo(600,1).siblings('a').stop().fadeTo(600,0);
	}).mouseleave(function() {
		n=$(this).index();
		timer=setInterval(run,3000);
	})
	//定时播放轮播图
	var n=0;
	var timer=setInterval(run,3000);
	function run() {
		if (n==4) {
			n=0;
		}else{
			n++;
		}
		$('.lb_box ol li').eq(n).addClass('cur').siblings('li').removeClass();
		$('.lb_box a').eq(n).stop().fadeTo(600,1).siblings('a').stop().fadeTo(600,0);
	}

	//产品边框
	$('.div_border').mouseenter(function() {
		$(this).css({'padding':'0','border':'4px solid #EFCACC'});
	}).mouseleave(function() {
		$(this).css({'padding':'4px','border':'none'});
	})

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


})
