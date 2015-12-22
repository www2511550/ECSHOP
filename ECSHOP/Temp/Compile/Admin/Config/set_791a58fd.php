<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?>/**
 * 异步修改配置项
 */
$('form').submit(function() {
	alert(1);
	var data=$(this).serialize();
	$.ajax({
		url:ACTION,
		data:data,
		type:'POST',
		dataType:'JSON',
		success:function(JSON) {
			alert(JSON.massage);
		}
	})
	return false;
})