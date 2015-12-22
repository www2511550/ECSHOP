<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>购物车</title>
	<link rel="stylesheet" href="http://localhost/ecshop/ECSHOP/Index/View/Index/css/acount.css">
	<link rel="stylesheet" href="http://localhost/ecshop/ECSHOP/Index/View/Index/css/header_bottom.css">
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
URL = 'http://localhost/ecshop/index.php/Index/Index/acount';
APP = 'http://localhost/ecshop/ECSHOP';
COMMON = 'http://localhost/ecshop/ECSHOP/Common';
HDPHP = 'http://localhost/ecshop/hdphp/hdphp';
HDPHPDATA = 'http://localhost/ecshop/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/ecshop/hdphp/hdphp/Extend';
MODULE = 'http://localhost/ecshop/index.php/Index';
CONTROLLER = 'http://localhost/ecshop/index.php/Index/Index';
ACTION = 'http://localhost/ecshop/index.php/Index/Index/acount';
STATIC = 'http://localhost/ecshop/Static';
HDPHPTPL = 'http://localhost/ecshop/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/ecshop/ECSHOP/Index/View';
PUBLIC = 'http://localhost/ecshop/ECSHOP/Index/View/Public';
CONTROLLERVIEW = 'http://localhost/ecshop/ECSHOP/Index/View/Index';
HISTORY = 'http://localhost/ecshop/';
</script>
	<script type="text/javascript" src="http://localhost/ecshop/ECSHOP/Index/View/Index/js/jquery172.js"></script>
	<script type="text/javascript" src='http://localhost/ecshop/ECSHOP/Index/View/Index/js/acount.js'></script>
</head>
<body>
<!-- 头部灰色区块 -->
<div class="top_out">
	<div class="top">
		<div class="t_right">
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
<!-- 流程图区块 -->
<div class="search_out">
	<div class="logo">
		<a href="http://localhost/ecshop"><img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/public/logo.png" alt=""></a>
	</div>
	<div class="liucheng">
		<div class="lc1"></div>
		<div class="lc2"></div>
		<div class="lc3"></div>
	</div>
</div>
<!-- 流程图区块 -->
<?php if($_SESSION['cart']['goods']){?>
<!-- 购物车中的商品 -->
<div class="goods">
	<table>
	<!-- 标题 -->
		<tr class="tr_title">
			<th class="g_check"><input type="checkbox"  class="select_all" checked="checked"></th>
			<th class="g_pro">商品</th>
			<th class="g_price">单价（元）</th>
			<th class="g_num">数量</th>
			<th class="g_total">小计（元）</th>
			<th class="g_operate">操作</th>
		</tr>
	<!-- 标题结束 -->
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

		<tr class="select">
			<td class="g_check">
				<input type="checkbox" class="one_check" checked="checked" cartId='<?php echo $c['cartId'];?>' onclick="checkOne(this)">
			</td>
			<td class="g_pro td2">
			 	<img src="http://localhost/ecshop/<?php echo $c['goods_thumb'];?>" alt="">
			 	<p><a href="<?php echo U('detail',array('goods_id'=>$c['goods_id']));?>" target="_blank"><?php echo $c['goods_name'];?></a></p>
			 	<p>规格： <?php echo $c['attr'];?></p>
			</td>
			<td class="g_price bd">¥<span class='one_price'><?php echo $c['goods_price'];?></span></td>
			<td class="g_num bd">
				<div class="inc">
					<a href="javascript:;" class="a_inc" onclick="changeNum(this)" tp="1">-</a>
					<input type="text" class="num num_ipt" value="<?php echo $c['num'];?>" name="num" onkeyup="changeNum(this)"  onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" cartId='<?php echo $c['cartId'];?>' proNum='<?php echo $c['product_number'];?>'>
					<a href="javascript:;" class="a_cre" onclick="changeNum(this)" tp="2">+</a>
				</div>
			</td>
			<td class="g_total bd" style="background:#FDFDFD">
				<b>¥</b><span style='font-weight:600;'><?php echo number_format($c['total_price'],2); ?></span> 
			</td>
			<td class="g_operate td_close"><a href="javascript:;" onclick='delCart(this,"<?php echo $c['cartId'];?>")'></a></td>
		</tr>
	<?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>

	</table>
</div>
<!-- 购物车中的商品结束 -->
<div class="h_20"></div>
<!-- 商品结算 -->
<div class="jiesuan">
	<div class="total_control">
		<input type="checkbox" class="select_all" checked="checked">
		<label for="">全选</label>
		<a href="javascript:;" onclick="delCheck()">删除选中商品</a>
	</div>
	<div class="total_price">
		<p>总计金额：	<i>¥</i><span class='total_money'><?php echo number_format($_SESSION['cart']['total'],2); ?></span></p>
		<p>共节省：	<i>¥</i><span>0.00</span></p>
		<p class="p_p3">总计金额：	<b>¥</b><span class='total_money'><?php echo number_format($_SESSION['cart']['total'],2); ?></span></p>
	</div>
</div>
<div class="h_25"></div>
<div class="two_input">
	<a href="javascript:;" class="ipt_suan" onclick="test()">去结算</a>
	<a href="http://localhost/ecshop" class="ipt_buy">继续购物</a>
</div>
<!-- 商品结算结束 -->
<?php  }else{ ?>
<!-- 大笑脸 -->
<div class="goods">
	<table>
	<!-- 标题 -->
		<tr class="tr_title">
			<th class="g_check"><input type="checkbox"></th>
			<th class="g_pro">商品</th>
			<th class="g_price">单价（元）</th>
			<th class="g_num">数量</td>
			<th class="g_total">小计（元）</th>
			<th class="g_operate">操作</th>
		</tr>
	</table>
</div>
<div class="sweet">
	<h4>亲，您购物车里还没有物品哦，快去逛逛吧！ </h4>
</div>
<!-- 大笑脸结束 -->
<?php }?>
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