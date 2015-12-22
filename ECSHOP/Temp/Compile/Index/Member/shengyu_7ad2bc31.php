<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>会员中心</title>
	<link rel="stylesheet" href="http://localhost/ecshop/ECSHOP/Index/View/Member/css/member.css">
	<link rel="stylesheet" href="http://localhost/ecshop/ECSHOP/Index/View/Member/css/header_bottom.css">
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
URL = 'http://localhost/ecshop/index.php/Index/Member/shengyu';
APP = 'http://localhost/ecshop/ECSHOP';
COMMON = 'http://localhost/ecshop/ECSHOP/Common';
HDPHP = 'http://localhost/ecshop/hdphp/hdphp';
HDPHPDATA = 'http://localhost/ecshop/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/ecshop/hdphp/hdphp/Extend';
MODULE = 'http://localhost/ecshop/index.php/Index';
CONTROLLER = 'http://localhost/ecshop/index.php/Index/Member';
ACTION = 'http://localhost/ecshop/index.php/Index/Member/shengyu';
STATIC = 'http://localhost/ecshop/Static';
HDPHPTPL = 'http://localhost/ecshop/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/ecshop/ECSHOP/Index/View';
PUBLIC = 'http://localhost/ecshop/ECSHOP/Index/View/Public';
CONTROLLERVIEW = 'http://localhost/ecshop/ECSHOP/Index/View/Member';
HISTORY = 'http://localhost/ecshop/index.php/Index/Member/message';
</script>
	<script type="text/javascript" src='http://localhost/ecshop/ECSHOP/Index/View/Member/js/index.js'></script>
</head>
<body>
<!-- 头部区块 -->
<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?>

<script type="text/javascript" src="http://localhost/ecshop/ECSHOP/Index/View/Member/js/header.js"></script>
<!-- 头部灰色区块 -->
<div class="top_out">
	<div class="top">
		<div class="t_right" style="color:#8B8B8B">
			<?php if(isset($_SESSION['username'])){?>
				欢迎您，<a href="<?php echo U('Member/index');?>" style="color:#317DB9;margin-right:8px"><?php echo $_SESSION['username']; ?></a>
				[<a href="<?php echo U('Index/out');?>" style="color:#317DB9">退出</a>]
			<?php  }else{ ?>
				<a href="<?php echo U('Index/login');?>">[登录]</a>
				<a href="<?php echo U('Index/zhuce');?>">[注册]</a>
			<?php }?>

			<span>|</span>
			<a href="<?php echo U('Member/order');?>">我的订单</a>
		</div>
	</div>
</div>
<!-- 头部灰色区块结束 -->

<!-- 搜索区块 -->
<div class="search_out">
	<div class="logo">
		<a href="<?php echo U('Index/index');?>"><img src="http://localhost/ecshop/ECSHOP/Index/View/Member/images/public/logo.png" alt=""></a>
	</div>
	<!-- 搜索 -->
	<div class="search">
		<div class="ipt">
			<form >
				<label for=""><input type="text" class="s_txt"></label>
				<label for=""><input type="submit" class="s_sbt" value="搜索"></label>		
			</form>
		</div>
	</div>
	<!-- 购物车 -->
	<div class="shop">
		<div class="my">
			<div class="hd_my">
				<h4>
				<?php if(isset($_SESSION['username'])){?>
					<a href="<?php echo U('Member/index');?>" style="color:#317DB9;margin-right:8px"><?php echo $_SESSION['username']; ?></a>
				<?php  }else{ ?>
					你好，请  <a href="<?php echo U('Index/login');?>">登录</a>  / <a href="<?php echo U('Index/zhuce');?>">注册</a>
				<?php }?>
				</h4> 
				<ul>
					<li><a href="">待付款</a><span></span></li>
					<li><a href="">待评论</a><span></span></li>
					<li><a href="">优惠券</a><span></span></li>
					<li><a href="">站内信</a><span></span></li>
				</ul>
			</div>
			<a href="<?php echo U('Index/member');?>">我的商城</a>
			<b></b>
		</div>
		<div class="gouwu">
		<?php if(!$_SESSION['cart']['goods']){?>
			<b class="b_num">0</b>
		<?php  }else{ ?>
			<b class="b_num"><?php echo $_SESSION['cart']['total_num'];?></b>
		<?php }?>
			<a href="<?php echo U('Index/acount');?>" >我的购物车</a>
			<div class="hd_shop">
			<?php if(!$_SESSION['cart']['goods']){?>
				<span class='hd_sp1' style="padding:30px 0;display:block"><?php echo $_SESSION['cart']['goods'];?>你的购物车是空的，赶紧选购吧</span>
			<?php  }else{ ?>

				<div class="cart_div">
					<ul>
				<?php $hd["list"]["c"]["total"]=0;if(isset($_SESSION['cart']['goods']) && !empty($_SESSION['cart']['goods'])):$_id_c=0;$_index_c=0;$lastc=min(1000,count($_SESSION['cart']['goods']));
$hd["list"]["c"]["first"]=true;
$hd["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$hd["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($_SESSION['cart']['goods'],0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$hd["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$hd["list"]["c"]["last"]=true;endif;?>

						<li>
							<img src="http://localhost/ecshop/<?php echo $c['goods_thumb'];?>" alt="">
							<p><a href="<?php echo U('Index/detail',array('goods_id'=>$c['goods_id']));?>"><?php echo $c['goods_name'];?></a></p>
							<span style='color:#E01D4C;padding:10px 0 0 5px;'>¥ <?php echo $c['goods_price'];?> </span> <span style='padding:10px 0 0 5px;'>x <?php echo $c['num'];?></span>
							<span style='padding:10px 30px 0 5px;float:right'><?php echo $c['attr'];?></span>
							<i class="close" onclick='delCart(this,"<?php echo $c['cartId'];?>")'>X</i>
						</li>
				<?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
					</ul>
					<div class="total">
						<p>共<span style='color:#E01D4C;padding:2px 5px'><?php echo $_SESSION['cart']['total_num'];?></span>件商品</p>
						<p>共计<span class='total_price'>¥ <?php echo number_format($_SESSION['cart']['total'],2); ?></span></p>
						<a href="<?php echo U('Index/acount');?>" class="a_jiesuan">结算</a>
					</div>
				</div>
			<?php }?>
			</div>

		</div>
	</div>
	<!-- 购物车结束 -->
</div>

<!-- 搜索区块结束 -->

<!-- 导航条区块 -->
<div class="nav_out">
	<div class="nav">
		<div class="all">
			<h2>全部商品</h2>
			<!-- 菜单区块 -->
			<div class="menu"> 
				<ul>
				<?php $hd["list"]["c"]["total"]=0;if(isset($category) && !empty($category)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($category));
$hd["list"]["c"]["first"]=true;
$hd["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$hd["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($category,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$hd["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$hd["list"]["c"]["last"]=true;endif;?>

					<li>
						<div class="m_li">
						<!-- 一级栏目 -->
							<h3><?php echo $c['cat_name'];?></h3>
						<!-- 一级栏目结束 -->
						<?php if($c['_data']){?>
							<?php $hd["list"]["cd"]["total"]=0;if(isset($c['_data']) && !empty($c['_data'])):$_id_cd=0;$_index_cd=0;$lastcd=min(1000,count($c['_data']));
$hd["list"]["cd"]["first"]=true;
$hd["list"]["cd"]["last"]=false;
$_total_cd=ceil($lastcd/1);$hd["list"]["cd"]["total"]=$_total_cd;
$_data_cd = array_slice($c['_data'],0,$lastcd);
if(count($_data_cd)==0):echo "";
else:
foreach($_data_cd as $key=>$cd):
if(($_id_cd)%1==0):$_id_cd++;else:$_id_cd++;continue;endif;
$hd["list"]["cd"]["index"]=++$_index_cd;
if($_index_cd>=$_total_cd):$hd["list"]["cd"]["last"]=true;endif;?>

							<!-- 二级栏目 -->
								<a href="<?php echo U('Index/lists',array('cid'=>$cd['cid']));?>" target="_blank"><?php echo $cd['cat_name'];?></a>
							<!-- 二级栏目结束 -->
								<?php if($cd['_data']){?>
									<!-- 隐藏三级菜单 -->
									<div class="hd">
									<?php $hd["list"]["cd_cd"]["total"]=0;if(isset($c['_data']) && !empty($c['_data'])):$_id_cd_cd=0;$_index_cd_cd=0;$lastcd_cd=min(1000,count($c['_data']));
$hd["list"]["cd_cd"]["first"]=true;
$hd["list"]["cd_cd"]["last"]=false;
$_total_cd_cd=ceil($lastcd_cd/1);$hd["list"]["cd_cd"]["total"]=$_total_cd_cd;
$_data_cd_cd = array_slice($c['_data'],0,$lastcd_cd);
if(count($_data_cd_cd)==0):echo "";
else:
foreach($_data_cd_cd as $key=>$cd_cd):
if(($_id_cd_cd)%1==0):$_id_cd_cd++;else:$_id_cd_cd++;continue;endif;
$hd["list"]["cd_cd"]["index"]=++$_index_cd_cd;
if($_index_cd_cd>=$_total_cd_cd):$hd["list"]["cd_cd"]["last"]=true;endif;?>

										<a href="<?php echo U('Index/lists',array('cid'=>$cd_cd['cid']));?>" target="_blank"><?php echo $cd_cd['cat_name'];?></a>
									<?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
										<dl class="hd_dl">
											<dt>推荐商品</dt>
										<?php $hd["list"]["c_d"]["total"]=0;if(isset($cd['_data']) && !empty($cd['_data'])):$_id_c_d=0;$_index_c_d=0;$lastc_d=min(1000,count($cd['_data']));
$hd["list"]["c_d"]["first"]=true;
$hd["list"]["c_d"]["last"]=false;
$_total_c_d=ceil($lastc_d/1);$hd["list"]["c_d"]["total"]=$_total_c_d;
$_data_c_d = array_slice($cd['_data'],0,$lastc_d);
if(count($_data_c_d)==0):echo "";
else:
foreach($_data_c_d as $key=>$c_d):
if(($_id_c_d)%1==0):$_id_c_d++;else:$_id_c_d++;continue;endif;
$hd["list"]["c_d"]["index"]=++$_index_c_d;
if($_index_c_d>=$_total_c_d):$hd["list"]["c_d"]["last"]=true;endif;?>

											<dd><a href=""><?php echo $c_d['cat_name'];?></a></dd>
			    						<?php $hd["list"]["c_d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
										</dl>
									</div>
									<!-- 隐藏三级菜单结束 -->
								<?php }?>
							<?php $hd["list"]["cd"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
						<?php }?>	
						</div>
					</li>
				<?php $hd["list"]["cd_cd"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
				</ul>
			</div>
		<!-- 菜单区块结束 -->
		</div>
		<div class="nav_right">
			<a href="http://localhost/ecshop/index.php" style="background:#BA181F">首页</a>
			<a href="<?php echo U('Index/detail',array('goods_id'=>3));?>" target="_blank">荣耀6</a>
		</div>
	</div>
</div>
<!-- 导航条区块结束 -->


<!-- 头部区块结束 -->

<!-- 路径 -->
<div class="position">
	<i>你现在的位置 :</i> <a href="http://localhost/ecshop">首页</a><span> > </span>个人中心
</div>
<!-- 路径 -->
<!-- 中间大区 -->
<div class="main_out">
	<!-- 左边列表区块 -->
	<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?>	<!-- 左边列表区块 -->
	<div class="left">
		<div class="l_title">
			会员中心
		</div>
		<div class="list">
			<ul>
				<li><h3>订单中心</h3></li>
				<li>
					<a href="<?php echo U('Member/order');?>" <?php if($_GET['a']==order){?>style="color:#F96209"<?php }?>>> 我的订单</a>
				</li>
			</ul>
			<ul>
				<li><h3>个人中心</h3></li>
				<li>
					<a href="<?php echo U('Member/message');?>" <?php if($_GET['a']==message){?>style="color:#F96209"<?php }?>>> 会员信息</a>
				</li>
				<li>
					<a href="<?php echo U('Member/shengyu');?>" <?php if($_GET['a']==shengyu){?>style="color:#F96209"<?php }?> >> 账户余额</a>
				</li>
				<li>
					<a href="<?php echo U('Member/address');?>" <?php if($_GET['a']==address){?>style="color:#F96209"<?php }?>>> 收货信息</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- 左边列表区块结束 -->
	<!-- 左边列表区块结束 -->

	
	<!-- 右边区块结束 -->

	<!-- 我的余额 -->
	<div class="yuyue">
		<div class="title"><h3>账户余额</h3></div>
		<table width="100%">
		<br/>
			<tr>
				<td style="text-align:left;color:#BB0000;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您的余额：0</td>
			</tr>
		</table>
		

	</div>
	<!-- 我的预约 -->


</div>
<!-- 中间大区结束 -->


<!-- 底部区块 -->
<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!-- 底部区块 -->
<div class="bottom">
	<ul>
		<li>
			<i class='i1'></i>
			500强企业 品质保证
		</li>
		<li>
			<i class='i2'></i>
			7天退货 15天换货
		</li>
		<li>
			<i class='i3'></i>
			100元起免运费
		</li>
		<li>
			<i class='i4'></i>
			448家维修网点 全国联保
		</li>
	</ul>
	<div class="banquan">
		<p>Copyright © 2011-2014 华为软件技术有限公司 版权所有 保留一切权利 苏B2-20130048号 | 苏ICP备09062682号-9 </p>
		<p>网络文化经营许可证苏网文[2012]0401-019号</p>
	</div>
</div>

<!-- 底部区块结束 -->
<!-- 底部区块结束 -->
</body>
</html>