/*
显示对应商品的属性
*/
function  changeGoodsType(obj) {
	var cat_id=$(obj).val();
	location.href=ACTION+'&cat_id='+cat_id;
}