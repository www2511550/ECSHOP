<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>控制台页面</title>
		<link rel="stylesheet" href="http://localhost/ecshop/ECSHOP/Admin/View/global/css/style.default.css" type="text/css" />
		<script type="text/javascript" src="http://localhost/ecshop/ECSHOP/Admin/View/global/js/plugins/jquery-1.7.min.js"></script>
		<script type="text/javascript" src="http://localhost/ecshop/ECSHOP/Admin/View/global/js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
		<!-- <script type="text/javascript" src="http://localhost/ecshop/ECSHOP/Admin/View/global/js/plugins/jquery.cookie.js"></script> -->
		<script type="text/javascript" src="http://localhost/ecshop/ECSHOP/Admin/View/global/js/plugins/jquery.uniform.min.js"></script>
		<script type="text/javascript" src="http://localhost/ecshop/ECSHOP/Admin/View/global/js/plugins/jquery.flot.min.js"></script>
		<script type="text/javascript" src="http://localhost/ecshop/ECSHOP/Admin/View/global/js/plugins/jquery.flot.resize.min.js"></script>
		<script type="text/javascript" src="http://localhost/ecshop/ECSHOP/Admin/View/global/js/plugins/jquery.slimscroll.js"></script>
		<script type="text/javascript" src="http://localhost/ecshop/ECSHOP/Admin/View/global/js/custom/general.js"></script>
		<script type="text/javascript" src="http://localhost/ecshop/ECSHOP/Admin/View/global/js/custom/dashboard.js"></script> 
		<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="http://localhost/ecshop/ECSHOP/Admin/View/global/js/plugins/excanvas.min.js"></script><![endif]-->
		<!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="http://localhost/ecshop/ECSHOP/Admin/View/global/css/style.ie9.css"/>
<![endif]-->
		<!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="http://localhost/ecshop/ECSHOP/Admin/View/global/css/style.ie8.css"/>
<![endif]-->
		<!--[if lt IE 9]>
	<script src="http://localhost/ecshop/ECSHOP/Admin/View/global/js/plugins/css3-mediaqueries.js"></script>
<![endif]-->
	</head>

	<body class="withvernav">
		<div class="bodywrapper">
			<div class="topheader">
				<div class="left">
					<h1 class="logo">ECSHOP.<span>Admin</span></h1>
					<span class="slogan">后台管理系统</span>

					<div class="search">
						<form action="" method="post">
							<input type="text" name="keyword" id="keyword" value="请输入" />
							<button class="submitbutton"></button>
						</form>
					</div>
					<!--search-->

					<br clear="all" />

				</div>
				<!--left-->

				<div class="right">
					<!--<div class="notification">
                <a class="count" href="http://localhost/ecshop/ECSHOP/Admin/View/global/ajax/notifications.html"><span>9</span></a>
        	</div>-->
					<div class="userinfo">
						<img src="http://localhost/ecshop/ECSHOP/Admin/View/global/images/thumbs/avatar.png" alt="" />
						<span>管理员</span>
					</div>
					<!--userinfo-->

					<div class="userinfodrop">
						<div class="avatar">
							<a href="">
								<img src="http://localhost/ecshop/ECSHOP/Admin/View/global/images/thumbs/avatarbig.png" alt="" />
							</a>
							<div class="changetheme">
								切换主题:
								<br />
								<a class="default"></a>
								<a class="blueline"></a>
								<a class="greenline"></a>
								<a class="contrast"></a>

							</div>
						</div>
						<!--avatar-->
						<div class="userdata">
							<h4>CC</h4>
							<span class="email">379624432@qq.com</span>
							<ul>
								<li><a href="?m=Admin&c=Login" target="iframe">编辑资料</a>
								</li>
								<li><a href="?m=Admin&c=Login" target="iframe">账号设置</a>
								</li>
								<li><a href="#">帮助</a>
								</li>
								<li><a href="http://localhost/ecshop/index.php/Admin/Index/index&c=Login&a=out">退出</a>
								</li>
							</ul>
						</div>
						<!--userdata-->
					</div>
					<!--userinfodrop-->
				</div>
				<!--right-->
			</div>
			<!--topheader-->


			<div class="header">
				<ul class="headermenu">
					<li class="current"><a href="#"><span class="icon icon-flatscreen"></span>首页</a>
					</li>
					<li><a href="<?php echo U('Category/index');?>" target="iframe"><span class="icon icon-pencil"></span>问题分类</a>
					</li>
					<li><a href="#"><span class="icon icon-message"></span>查看消息</a>
					</li>
					<li><a href="#"><span class="icon icon-chart"></span>统计报表</a>
					</li>
				</ul>

				<div class="headerwidget">
					<div class="earnings">
						<div class="one_half">
							<h4>登录时间</h4>
							<h4><?php echo date('Y-m-d H:i:s',time());?></h4>
						</div>

						<!--one_half-->
						<div class="one_half last alignright">
							<h2 style="line-height:55px;font-size:22px;padding-left:15px;"><a href="http://localhost/ecshop/index.php" style="color:#fff" target="_blank">去前台</a></h2>
						</div>
						<!--one_half last-->
					</div>
					<!--earnings-->
				</div>
				<!--headerwidget-->

			</div>
			<!--header-->

			<div class="vernav2 iconmenu">
				<ul>
					<li><a href="#formsub" class="editor">商品管理</a>
						<span class="arrow"></span>
						<ul id="formsub">
							<li>
								<a href="<?php echo U('Goods/index');?>" target='iframe'>商品管理</a>
							</li>
							<li>
								<a href="<?php echo U('Brand/index');?>" target='iframe'>品牌管理</a>
							</li>
							<li>
								<a href="<?php echo U('Category/index');?>" target='iframe'>栏目管理</a>
							</li>
							<li>
								<a href="<?php echo U('GoodsType/index');?>" target='iframe'>商品类型</a>
							</li>
						</ul>
					</li>
					<li><a href="#formsub5" target='iframe' class="editor">订单管理</a>
						<span class="arrow"></span>
						<ul id="formsub5">
							<li><a href="<?php echo U('Order/index');?>" target='iframe'>查看订单</a>
							</li>
						</ul>
					</li>
					<li><a href="#formsub1" target='iframe' class="editor">网站配置</a>
						<span class="arrow"></span>
						<ul id="formsub1">
							<li><a href="<?php echo U('Config/set');?>" target='iframe'>网站配置</a>
							</li>
						</ul>
					</li>
					<li><a href="#formsub2" target='iframe' class="editor">角色管理</a>
						<span class="arrow"></span>
						<ul id="formsub2">
							<li>
								<a href="<?php echo U('Role/index');?>" target='iframe'>角色分配</a>
							</li>
						</ul>
					</li>
					<li><a href="#formsub3" target='iframe' class="editor">权限管理</a>
						<span class="arrow"></span>
						<ul id="formsub3">
							<li>
								<a href="<?php echo U('Access/set');?>" target='iframe'>权限设置</a>
							</li>
						</ul>
					</li>
					<li><a href="#formsub4" target='iframe' class="editor">数据备份</a>
						<span class="arrow"></span>
						<ul id="formsub4">
							<li>
								<a href="<?php echo U('Backup/index');?>" target='iframe'>数据备份</a>
							</li>
							<li>
								<a href="<?php echo U('Backup/backList');?>" target='iframe'>数据恢复</a>
							</li>
						</ul>
					</li>
				</ul>
				<a class="togglemenu"></a>
				<br />
				<br />
			</div>
			<!--leftmenu-->

			<div class="centercontent">

				<!-- <div class="pageheader">
					<h1 class="pagetitle">控制台</h1>
					<span class="pagedesc">页面的描述内容</span>
				</div> -->
				<!-- pageheader -->

				<div id="contentwrapper" class="contentwrapper">

<iframe src=" " name='iframe' frameborder="0" width="100%" height="400px" style="height:visible">
	
</iframe>

					





					</div>
					<!--two_third dashboard_left -->
					<!--one_third last-->


				</div>
				<!-- #updates -->



			</div>
			<!--contentwrapper-->

			<br clear="all" />

		</div>
		<!-- centercontent -->


		</div>
		<!--bodywrapper-->

	</body>

</html>
