$(function() {
	//更改商品数量后刷新
	$('input.num_ipt').blur(function() {
		 window.location.reload();
	})

	//全选
	$('input.select_all').click(function() {
		if ($(this).attr('checked')!="checked") {
			$('input.one_check').each(function(i) {
				$(this).removeAttr('checked');
			})
			$('input.select_all').each(function(i) {
				$(this).removeAttr('checked');
			})
		}else{
			$('input.one_check').each(function(i) {
				$(this).attr('checked','checked');
			})
			$('input.select_all').each(function(i) {
				$(this).attr('checked','checked');
			})
		}
	})


})
	/**
	 * 单个复选框
	 */
	function checkOne (obj) {
		if ($(obj).attr('checked')=="checked") {
			$(obj).attr('checked','checked');	
		}else{
			$(obj).removeAttr('checked');
		}
		$('input.select_all').each(function(i) {
				$(this).removeAttr('checked');
		})
	}
/**
 * 删除选中商品
 * @return {[type]} [description]
 */
	function delCheck () {
		var cartId=[];
		$('input.one_check').each(function(i) {
			if ($(this).attr('checked')=='checked') {
				cartId[i]=$(this).attr('cartId');
			};
		})
		if (cartId=='') {
			alert('请至少选择一件商品');
			return;
		}
		if (confirm('确定删除该商品?')) {
			$.ajax({
				url:MODULE+'&c=Cart&a=del',
				data:{cartId:cartId},
				type:'POST',
				dataType:'JSON',
				success:function(JSON) {
					if (JSON.status) {
						$('input.one_check').each(function(i) {
							if ($(this).attr('checked')=='checked') {
								$(this).parents('tr').eq(0).remove();
							};
						})
						location.reload();
					}else{
						alert('删除选中商品失败');
					}
				}
			})
		};
		
	}
	//结算验证
	function test() {
		var length=0;
		var cartId=[];
		$('input.one_check').each(function(i) {
			if ($(this).attr('checked')=='checked') {
				cartId[i]=$(this).attr('cartId');
				length+=1;
			};
		})
		if (length) {
			/**
			 * 给session添加一个字段is_checked
			 */
			$.ajax({
				url:MODULE+'&c=Cart&a=addChecked',
				data:{cartId:cartId},
				type:'POST',
				dataType:'JSON',
				success:function(JSON) {	
					if (JSON.status) {
						location.href=CONTROLLER+'&a=check&s=1';
					}else{
						alert('结算失败');
					}
				}
			})

		}else{
			alert('请至少选择一件商品');
			return false;
		}
	}
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
				//小计价格
				$(obj).parents('td').siblings('td.g_total').find('span').html(price.toFixed(2));
				/**
				 * 总价
				 */
				var total=0,cartId=$(obj).siblings('input').attr('cartId');
				$('.select').each(function(i) {
					total+=parseInt($(this).find('td.g_total').find('span').html());
				})
				$('.total_price>p').find('span.total_money').html(total.toFixed(2));
				//异步修改session
				changeCart(cartId,NewVal);
			}else{//数量加1
					var proNum=$(obj).siblings('input').attr('proNum');
					var NewVal=Math.min($(obj).siblings('input').val()*1+1,proNum);
					var price=NewVal*$('.one_price').html();
					$(obj).siblings('input.num_ipt').val(NewVal);
					//小计价格
					$(obj).parents('td').siblings('td.g_total').find('span').html(price.toFixed(2));
					/**
					*总价
					*/
					var total=0,cartId=$(obj).siblings('input').attr('cartId');
					$('.select').each(function(i) {
						total+=parseInt($(this).find('td.g_total').find('span').html());
					})
					$('.total_price>p').find('span.total_money').html(total.toFixed(2));
					//异步修改session
					changeCart(cartId,NewVal); 
			}
		}else{//input表单数量变化
			var proNum=$(obj).attr('proNum');
		 	var value=$(obj).val(),cartId=$(obj).attr('cartId'),id=$(obj).attr('cartId');
   			value=value.replace(/[^\d]/g,'');
   			if(value>proNum) {
				$(obj).val(proNum);
				changeCart(cartId,proNum);
			}else{
				if (value=='') {value=1};
				$(obj).val(value);
				changeCart(cartId,value);
			}
		}
	}
	/**
	 * 更改session中的数量
	 * @param  {[type]} cartId [商品键名]
	 * @param  {[type]} num    [商品数量]
	 * @return {[type]}        [description]
	 */
	function changeCart (cartId,num) {
		$.ajax({
				url:MODULE+'&c=Cart&a=edit',
				data:{cartId:cartId,num:num},
				type:'POST',
				success:function(JSON) {	
				}
			})
	}
	/**
	 * 购物车货品删除
	 */
	function delCart (obj,cartId) {
		var id=cartId;
		if (confirm('确定删除该商品?')) {
			$.ajax({
				url:MODULE+'&c=Cart&a=del',
				data:{cartId:id},
				type:'POST',
				dataType:'JSON',
				success:function(JSON) {
					if (JSON.status) {
						$(obj).parents('tr').eq(0).remove();
						location.reload();
					}else{
						alert(JSON.message);
					}
				}
			})
		};
	}