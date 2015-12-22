/**
 * 添加一行
 */
function  addTr (obj) {
	var tr=$(obj).parents('tr').eq(0).clone();
	tr.find('a').attr('onclick','removeTr(this)').html('[-]');
	$(obj).parents('tr').after(tr);
}
/**
 * 删除一行
 */
function removeTr (obj) {
	$(obj).parents('tr').eq(0).remove();
}