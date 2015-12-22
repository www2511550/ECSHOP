<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录</title>
	<link rel="stylesheet" href="css/login.css">
</head>
<body>
<!-- 头部区块 -->
<div class="top">
	<img src="images/login/logo2.png" alt=""><span>|</span><span>&nbsp;华为商城</span>
</div>
<!-- 头部区块结束 -->

<div class="main">
	<!-- 左边区块 -->
	<div class="left"></div>
	<!-- 右边区块 -->
	<div class="right">
		<h3>欢迎登录华为帐号</h3>
		<label><input type="text" value="手机号/邮箱/用户名"></label>
		<label><input type="text" value="密码 (6~32 个字符)"></label>
		<div class="yzm">
			<input type="text" value="不区分大小写">
			<img src="images/login/yzm.jpg" alt="">
		</div>
		<div class="check">
			<input type="checkbox">&nbsp;&nbsp;记住用户名<a href="">忘记密码?</a>
		</div>
		<input type="submit" class="login" value="登录">
		<a href="zhuce.html" class="zhuce">免费注册</a>
	</div>
</div>

</body>
</html>