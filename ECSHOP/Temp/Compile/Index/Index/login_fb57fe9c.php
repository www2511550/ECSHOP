<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录</title>
	<link rel="stylesheet" href="http://localhost/ecshop/ECSHOP/Index/View/Index/css/login.css">
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
URL = 'http://localhost/ecshop/index.php/Index/Index/login';
APP = 'http://localhost/ecshop/ECSHOP';
COMMON = 'http://localhost/ecshop/ECSHOP/Common';
HDPHP = 'http://localhost/ecshop/hdphp/hdphp';
HDPHPDATA = 'http://localhost/ecshop/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/ecshop/hdphp/hdphp/Extend';
MODULE = 'http://localhost/ecshop/index.php/Index';
CONTROLLER = 'http://localhost/ecshop/index.php/Index/Index';
ACTION = 'http://localhost/ecshop/index.php/Index/Index/login';
STATIC = 'http://localhost/ecshop/Static';
HDPHPTPL = 'http://localhost/ecshop/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/ecshop/ECSHOP/Index/View';
PUBLIC = 'http://localhost/ecshop/ECSHOP/Index/View/Public';
CONTROLLERVIEW = 'http://localhost/ecshop/ECSHOP/Index/View/Index';
HISTORY = 'http://localhost/ecshop/index.php/Index/Index/index';
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
	<!-- 左边区块 -->
	<div class="left"></div>
	<!-- 右边区块 -->
<form action="<?php echo U('Index/login',array('s'=>$s));?>" method="post">
	<div class="right">
		<h3 style="font-family:'宋体'">欢迎登录华为帐号</h3>
		<label style="width:100%">
			<input type="text" placeholder="手机号/邮箱/用户名" name="username" onblur="validate(this,5,50)" login='1'>
			<span style='padding:0 5px;font-size:12px;' class='ps'></span>
		</label>
		<label  style="width:100%">
			<input type="password" placeholder="密码 (6~32 个字符)" name="password" onblur="validate(this,6,32)">
			<span style='padding:0 5px;font-size:12px;' class='ps'></span>
		</label>
		<div class="yzm" style="width:100%">
			<input type="text" placeholder="不区分大小写" name="code">
			<img src="<?php echo U('code');?>" onclick="this.src='<?php echo U('code');?>&'+Math.random();">
			<span style='font-size:12px;' class='ps'></span>
		</div>
		<div class="check">
			<input type="checkbox" checked="">&nbsp;&nbsp;记住用户名<a href="javascript:;">忘记密码?</a>
		</div>
		<input type="submit" class="login" value="登录">
		<a href="<?php echo U('Index/zhuce');?>" class="zhuce">免费注册</a>
	</div>
</form>
</div>

</body>
</html>