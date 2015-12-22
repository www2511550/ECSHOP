/**
 * 验证
 */
$(function() {
	//立即注册
	$('form').submit(function() {
		var msg=0;
		$('span.ps').each(function(i) {
			if ($(this).attr('pass')==0) {
				msg+=1;
			};
			if ($(this).attr('pass')==undefined) {
				msg+=1;
			};
		})
		if (msg>0) {
			return false;
		}
	})

	//确认密码验证
	$("[name='psw']").blur(function() {
		var password=$("[name='password']").val();
		if ($(this).val()==password && $(this).val()!='') {
			$(this).siblings('span.ps').css('color','#63B418').html(' √ ').attr('pass',1);
		}else{
			$(this).siblings('span.ps').css('color','#BB0000').html('确认密码错误...').attr('pass',0);
		}
	})
	//验证码确认
	$("[name='code']").change(function() {
		var code=$(this).val();
		$.post(CONTROLLER+'&a=getCode',{code:code},function(JSON) {
			if (JSON.status) {
				$("[name='code']").siblings('span.ps').css('color','#63B418').html(' √ ').attr('pass',1);
			}else{
				$("[name='code']").siblings('span.ps').css('color','#BB0000').html(JSON.message).attr('pass',0);
			}
		},'JSON')
	})

})
/**
 * 长度验证
 * @param  {[type]} min [最小长度]
 * @param  {[type]} max [最大长度]
 * @return {[type]}     [description]
 */
function validate (obj,min,max) {
	var text=$(obj).val(),_name=$(obj).attr('name');
	//账号需验证是否存在
	if (_name=='username') {
		if ($(obj).attr('login')!=1) {
			user=$(obj).val();
			$.post(CONTROLLER+'&a=isUser',{user:user},function(JSON){
				if (!JSON.status) {
					$(obj).siblings('span.ps').css('color','#BB0000').html(JSON.message).attr('pass',0);
					return false;
				};
			},'JSON')
		};
	};
	if (text.length>max) {
			$(obj).siblings('span.ps').css('color','#BB0000').html('账号名过长...').attr('pass',0);
		}else if (text.length<min) {
			$(obj).siblings('span.ps').css('color','#BB0000').html('字数太少...').attr('pass',0);
		}else{
			$(obj).siblings('span.ps').css('color','#63B418').html(' √ ').attr('pass',1);
		}
}