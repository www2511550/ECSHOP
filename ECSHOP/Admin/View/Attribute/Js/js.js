/*
录入方式为'下拉列表框'是可以编辑
其他方式均不可以编辑文本域
*/
$("input[name='attr_input_type']").change(function() {
	if ($(this).val()==1) {
		$("[name='attr_value']").removeAttr('disabled');
	}else{
		$("[name='attr_value']").attr('disabled',true);
	}
})