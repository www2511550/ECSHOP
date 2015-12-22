/**
 * 购物车货品删除
 */
function delCart (obj,cartId) {
	var id=cartId;
	$.ajax({
		url:MODULE+'&c=Cart&a=del',
		data:{cartId:id},
		type:'POST',
		dataType:'JSON',
		success:function(JSON) {
			if (JSON.status) {
				$(obj).parent('li').remove();
				location.reload();
			}else{
				alert(JSON.message);
			}
		}
	})
}