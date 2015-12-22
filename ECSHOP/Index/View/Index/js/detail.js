$(function() {

	// 图片展示
	$('.ol_min_img>li').mouseenter(function() {
		$(this).addClass('ol_img_cur').siblings('li').removeClass('ol_img_cur');
		$('.l_img>li').eq($(this).index()).show().siblings('li').hide();
	})

	//商品详情区块切换
	$('.b_title>ul>li').click(function() {
		$(this).addClass('b_cur').siblings('li').removeClass('b_cur');
		$('.box>div').eq($(this).index()).show().siblings('div').hide();
	})

	//加入购物车成功
	$('a.success_close').click(function() {
		$(this).parent('div.hd_buy_success').hide();
	})
	$('a.ipt_buy').click(function() {
		$(this).parents('div.hd_buy_success').hide();
	})

	//加入购物车
	$('#form_buy').submit(function() {
		if ($('.sel_txt').length!=$('.sel_txt a.cur').length) {
			$('.sel_txt').each(function(i) {
				var val=$('.sel_txt').eq(i).find('a.cur').html();
				if (val==null) {alert('请'+$(this).find('dt').text())};
			})
		}else{
			var id='';
			$('.sel_txt').each(function(i) {
				id+=($('.sel_txt').eq(i).find('a.cur').attr('id')+'-');
			})
			id=id.slice(0,-1);
			var num=$('.num_ipt').val();
			$.ajax({
				url:MODULE+'&c=Cart&a=add',
				data:{id:id,num:num},
				type:'POST',
				success:function(JSON) {
					if (JSON==0) {
						$('.msg').html('暂时无货');
						return;
					}
					//原来购物车cart_div隐藏
					$('.cart_div').remove();
					//后来的购物车cart_div追加
					$('.hd_shop').append(JSON);	
					//更改b.b_num中的数量
					$('.b_num').html($('.span_num').html());
					$('.hd_shop .hd_sp1').hide();
					//成功提示
					$('span.sp_num').html($('b.b_num').html());
					$('span.sp_total').html($('span.total_price').html());
					$('div.hd_buy_success').show();
				}
			})
			
		}
		return false;
	})

})
	/**
	 * 购买数量
	 * parseInt()转化成整数
	 */
	function changeNum (obj) {
		if ($(obj).attr('tp')) {
			if ($(obj).attr('tp')==1) {//数量减1
				var NewVal=parseInt($(obj).siblings('input').val())-1;
				var price=NewVal*$('.one_price').html();
				if (!NewVal) return;
				$(obj).siblings('input').val(NewVal);
			}else{//数量加1
				var NewVal=parseInt($(obj).siblings('input').val())+1;
				var price=NewVal*$('.one_price').html(),proNum=$(obj).siblings('input').attr('proNum');
				$(obj).siblings('input').val(Math.min(NewVal,proNum));
			}
		}else{//input表单数量变化
		 	var value=$(obj).val(),proNum=$(obj).attr('proNum');
   			value=value.replace(/[^\d]/g,'');
			if(value>proNum) {
				$(obj).val(proNum);
			}else{
				if (value=='') {value=1};
				$(obj).val(value);
			}
		}
	}
	/**
	 * 绑定cur 
	 * @param {[type]} obj [description]
	 */
	function addCur (obj) {
		$('.msg').html('');
		$(obj).addClass('cur').parent('li').siblings('li').find('a').removeClass('cur');
		$('.sel_txt').each(function(i) {
			var val=$('.sel_txt').eq(i).find('a.cur').html();
			$('.you_select'+i).html(val);
		})
		product();
	}
/**
 * 查找商品库存
 */
	function product () {
		var id='';
		$('.sel_txt').each(function(i) {
			id+=($('.sel_txt').eq(i).find('a.cur').attr('id')+'-');
		})
		id=id.slice(0,-1);
		if ($('.sel_txt').length==$('.sel_txt a.cur').length) {
			$.post(CONTROLLER+'&a=proNum',{id:id},function(JSON) {
				if (JSON.proNum==0) {
					$('.msg').html('暂时无货');
				}else{
					$('input.num_ipt').attr('proNum',JSON.proNum);
				}
			},'JSON');
		};
		
	}
