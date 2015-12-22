<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>订单创建成功</title>
		<link rel="stylesheet" type="text/css" href="http://localhost/ecshop/ECSHOP/Index/View/Order/css/order_detail.css"/>
		<link rel="stylesheet" href="http://localhost/ecshop/ECSHOP/Index/View/Order/css/header_bottom.css">
		<script type='text/javascript' src='http://localhost/ecshop/hdphp/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>

	</head>
	<body>
		<!--头部区块-->
<!-- 头部灰色区块 -->
<div class="top_out">
	<div class="top">
		<div class="t_right">
			<?php if(isset($_SESSION['username'])){?>
				欢迎您，<a href="<?php echo U('Index/member');?>" style="color:#317DB9;margin-right:8px"><?php echo $_SESSION['username']; ?></a>
				[<a href="<?php echo U('Index/out');?>" style="color:#317DB9">退出</a>]
			<?php  }else{ ?>
				<a href="<?php echo U('Index/login');?>">[登录]</a>
				<a href="<?php echo U('Index/zhuce');?>">[注册]</a>
			<?php }?>

			<span>|</span>
			<a href="<?php echo U('Member/order');?>" style="color:#8B8B8B">我的订单</a>
		</div>
	</div>
</div>
<!-- 头部灰色区块结束 -->
<!-- 流程图区块 -->
<div class="search_out">
	<div class="logo">
		<a href="http://localhost/ecshop"><img src="http://localhost/ecshop/ECSHOP/Index/View/Order/img/logo.png" alt=""></a>
	</div>
	<div class="liucheng">
		<div class="lc3"></div>
		<div class="lc2"></div>
		<div class="lc1"></div>		
	</div>
</div>
<!-- 流程图区块 -->		
		<!--头部区块结束-->
	<div class="box">
		<!--订单详情区块-->
		<div class="box_detail">
			<div class="h">
				<s></s>
				<h3>订单提交成功，请您尽快付款！</h3>
				<p>订单号：  <span><?php echo $data['order_sn'];?></span> &nbsp;&nbsp;&nbsp;   |  &nbsp;&nbsp;&nbsp;  付款金额（元）：&nbsp;<b><?php echo number_format($data['amount'],2); ?></b> 元</p>
				<p style="margin-top: 20px;">请您在  <b class="time"><?php echo date('Y-m-d H:i',strtotime("+1 hour")); ?></b> 完成支付，否则订单将自动取消。</p> 
			</div>
			<div class="b">
				<table>
					<tr>
						<td>订单编号：</td>
						<td><span class="bianhao"><?php echo $data['order_sn'];?></span></td>
					</tr>
					<tr>
						<td>订单金额：</td>
						<td><span class="total"><?php echo number_format($data['amount'],2); ?></span>元</td>
					</tr>
					<tr>
						<td>收货信息：</td>
						<td>
							<span class="address"><?php echo $data['address'];?></span> &nbsp;&nbsp;&nbsp;&nbsp;
							<span class="order"><?php echo $data['consignee'];?></span> &nbsp;&nbsp;&nbsp;&nbsp;  
							<span class="tel"><?php echo $data['tel'];?></span> 
						</td>
					</tr>
					<tr>
						<td>购买日期： 	</td>
						<td><span class="date"><?php echo date('Y-m-d H:i',$data['add_time']); ?></span></td>
					</tr>
					<tr>
						<td>配送方式：</td>
						<td>快递应收费用       运费￥0.00 </td>
					</tr>
					<tr>
						<td>发票信息： 	</td>
						<td>
							<?php if($data['is_fapiao']){?>
								<span class="fapiao">个人</span>
							<?php  }else{ ?>
								<span class="fapiao">无</span>
							<?php }?>
						</td>
					</tr>
				</table>
			</div>
			<div class="f">
				<a href="javascript:;">订单详情</a>
			</div>
		</div>
		<!--选择支付方式-->
		<div class="order_pay">
			<div class="pay_title">选择支付方式</div>
			<div class="pay_area">
				<h4>第三方支付平台</h4>
				<div class="st">
					<ul>
						<li>
							<label><input type="radio" name="pay" /><img src="http://localhost/ecshop/ECSHOP/Index/View/Order/img/pay1.gif" alt="" /></label>
						</li>
						<li>
							<label><input type="radio" name="pay" /><img src="http://localhost/ecshop/ECSHOP/Index/View/Order/img/pay2.gif" alt="" /></label>
						</li>
						<li>
							<label><input type="radio" name="pay" /><img src="http://localhost/ecshop/ECSHOP/Index/View/Order/img/pay3.png" alt="" /></label>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<a href="javascript:;" class="sbt">确认支付方式</a>
	</div>	

<script type="text/javascript">
	$('div.f>a').click(function() {
		$('div.b').toggle();
	})
</script>
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
