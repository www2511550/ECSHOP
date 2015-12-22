<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>注册</title>
	<link rel="stylesheet" href="http://localhost/ecshop/ECSHOP/Index/View/Index/css/zhuce.css">
	<script type='text/javascript' src='http://localhost/ecshop/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
<link href='http://localhost/ecshop/hdphp/hdphp/Extend/Org/hdjs/hdui/css/hdui.css' rel='stylesheet' media='screen'>
<script src='http://localhost/ecshop/hdphp/hdphp/Extend/Org/hdjs/hdui/js/hdui.js'></script>
<link href='http://localhost/ecshop/hdphp/hdphp/Extend/Org/hdjs/hdvalidate/css/hdvalidate.css' rel='stylesheet' media='screen'>
<script src='http://localhost/ecshop/hdphp/hdphp/Extend/Org/hdjs/hdvalidate/js/hdvalidate.js'></script>
<script src='http://localhost/ecshop/hdphp/hdphp/Extend/Org/cal/lhgcalendar.min.js'></script>
<script src='http://localhost/ecshop/hdphp/hdphp/Extend/Org/hdjs/hdslide/js/hdslide.js'></script>
<script type='text/javascript'>
HOST = 'http://localhost';
ROOT = 'http://localhost/ecshop';
WEB = 'http://localhost/ecshop/index.php';
URL = 'http://localhost/ecshop/index.php/Index/Index/zhuce';
APP = 'http://localhost/ecshop/ECSHOP';
COMMON = 'http://localhost/ecshop/ECSHOP/Common';
HDPHP = 'http://localhost/ecshop/hdphp/hdphp';
HDPHPDATA = 'http://localhost/ecshop/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/ecshop/hdphp/hdphp/Extend';
MODULE = 'http://localhost/ecshop/index.php/Index';
CONTROLLER = 'http://localhost/ecshop/index.php/Index/Index';
ACTION = 'http://localhost/ecshop/index.php/Index/Index/zhuce';
STATIC = 'http://localhost/ecshop/Static';
HDPHPTPL = 'http://localhost/ecshop/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/ecshop/ECSHOP/Index/View';
PUBLIC = 'http://localhost/ecshop/ECSHOP/Index/View/Public';
CONTROLLERVIEW = 'http://localhost/ecshop/ECSHOP/Index/View/Index';
HISTORY = 'http://localhost/ecshop/index.php/Index/Index/lists/cid/8/order/0/s/0-0-0-0';
</script>
	<script type="text/javascript" src='http://localhost/ecshop/ECSHOP/Index/View/Index/js/validate.js'></script>
</head>
<body>
<!-- 头部区块 -->
<div class="top">
	<img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/login/logo2.png" alt=""><span>|</span><span>&nbsp;华为商城</span>
</div>
<!-- 头部区块结束 -->	 
<div class="main">
	<h2>注册华为帐号</h2>
<form  method="post">
	<table width="100%">
		<tr>
			<th>账号: </th>
			<td>
				<input type="text" placeholder="5~50 个字符" name="username" onblur="validate(this,5,50)">
				<span style='padding:0 5px;font-size:14px;' class='ps'></span>
			</td>
		</tr>
		<tr>
			<th>密码: </th>
			<td>
				<input type="password" placeholder="6-32个字符" name="password" onblur="validate(this,6,32)">
				<span style='padding:0 5px;font-size:14px;' class='ps'></span>
			</td>
		</tr>
		<tr>
			<th>确认密码: </th>
			<td>
				<input type="password" placeholder="请重复输入您的密码" name="psw">
				<span style='padding:0 5px;font-size:14px;' class='ps'></span>
			</td>
		</tr>
		<tr>
			<th>验证码: </th>
			<td>
				<input type="text" class="yzm" placeholder="不区分大小写" name="code">
				<img src="<?php echo U('code');?>" onclick="this.src='<?php echo U('code');?>&'+Math.random()">
				<span style='padding:0 5px;font-size:14px;' class='ps'></span>
			</td>
		</tr>
	</table>
	<input type="submit" class="zhuce" value="立即注册">
</form>
	<div class="img"></div>
	<div class="login">
		已有华为账号<a href="<?php echo U('Index/login');?>">登录</a>
	</div>

</div>
</body>
</html>