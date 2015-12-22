/**
 * 异步修改配置项
 */
$('form').submit(function() {
	var data=$(this).serialize();
	$.ajax({
		url:ACTION,
		data:data,
		type:'POST',
		dataType:'JSON',
		success:function(JSON) {
			alert(JSON.message);
		}
	})
	return false;
})