<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录</title>
	<link rel="stylesheet" href="http://localhost/ecshop/ECSHOP/Index/View/Index/css/login.css">
</head>
<body>
<!-- 头部区块 -->
<div class="top">
	<img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/login/logo2.png" alt=""><span>|</span><span>&nbsp;华为商城</span>
</div>
<!-- 头部区块结束 -->

<div class="main">
	<!-- 左边区块 -->
	<div class="left"></div>
	<!-- 右边区块 -->
<form action="">
	<div class="right">
		<h3>欢迎登录华为帐号</h3>
		<label><input type="text" placeholder="手机号/邮箱/用户名" name="username"></label>
		<label><input type="password" placeholder="密码 (6~32 个字符)" name="password"></label>
		<div class="yzm">
			<input type="text" placeholder="不区分大小写" name="code">
			<img src="<?php echo U('code');?>" onclick="this.src='<?php echo U('code');?>&'+Math.random();">
		</div>
		<div class="check">
			<input type="checkbox">&nbsp;&nbsp;记住用户名<a href="javascript:;">忘记密码?</a>
		</div>
		<input type="submit" class="login" value="登录">
		<a href="<?php echo U('Index/zhuce');?>" class="zhuce">免费注册</a>
	</div>
</form>
</div>

</body>
</html>