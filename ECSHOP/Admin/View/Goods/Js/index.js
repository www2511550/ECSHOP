/**
 * 获得该类的所有商品
 */
function changeGoodsType (obj) {
	var val=$(obj).val();
	location.href=ACTION+'&cat_id='+val;
}
/**
 * 异步修改商品价格
 */
function changePrice (obj) {
	var price=$(obj).val();
	var goods_id=$(obj).attr('goodsId');
	$.ajax({
		url:CONTROLLER+'&update',
		data:{price:price,goods_id:goods_id},
		type:'POST',
		dataType:'JSON',
		success:function(JSON) {
			if (JSON.status) {
				alert(JSON.message);
			}else{
				alert(JSON.message);
			}
			
		}
	})
}
/**
 * 回收站 status=1表示放入回收站
 */
function recover (obj,goods_id,status) {
	var title=status?'放入回收站?':'还原商品?';
	if(confirm(title)){
		$.ajax({
			url:CONTROLLER+'&a=update',
			data:{goods_id:goods_id,is_recover:status},
			type:'POST',
			dataType:'JSON',
			success:function(JSON) {
				if (JSON.status) {
					$(obj).parents('tr').eq(0).remove();
				}else{
					alert(JSON.message);
				}
			}
		})
	}
}