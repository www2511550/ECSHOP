/**
 * 取得对应的子栏目
 */
function changeCategory (obj) {
	var value=$(obj).val();
	location.href=ACTION+'&pid='+value;
}