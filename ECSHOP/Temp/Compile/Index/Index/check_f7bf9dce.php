<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>订单信息</title>
<meta name="author" content="FunTalk IT Group">
<meta name="copyright" content="FunTalk IT Group">
<link href="http://localhost/ecshop/ECSHOP/Index/View/Index/css/car2.css" rel="stylesheet" type="text/css">
<link href="http://localhost/ecshop/ECSHOP/Index/View/Index/css/car2_1.css" rel="stylesheet" type="text/css">
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
URL = 'http://localhost/ecshop/index.php/Index/Index&a=check&s=1';
APP = 'http://localhost/ecshop/ECSHOP';
COMMON = 'http://localhost/ecshop/ECSHOP/Common';
HDPHP = 'http://localhost/ecshop/hdphp/hdphp';
HDPHPDATA = 'http://localhost/ecshop/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/ecshop/hdphp/hdphp/Extend';
MODULE = 'http://localhost/ecshop/index.php/Index';
CONTROLLER = 'http://localhost/ecshop/index.php/Index/Index';
ACTION = 'http://localhost/ecshop/index.php/Index/Index/check';
STATIC = 'http://localhost/ecshop/Static';
HDPHPTPL = 'http://localhost/ecshop/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/ecshop/ECSHOP/Index/View';
PUBLIC = 'http://localhost/ecshop/ECSHOP/Index/View/Public';
CONTROLLERVIEW = 'http://localhost/ecshop/ECSHOP/Index/View/Index';
HISTORY = 'http://localhost/ecshop/index.php/Index/Index/acount';
</script>
<script type="text/javascript" src="http://localhost/ecshop/ECSHOP/Index/View/Index/js/jquery172.js"></script>
</head>
<body>

<!-- 头部灰色区块 -->
<div class="top_out">
	<div class="top">
		<div class="t_right">
			<?php if(isset($_SESSION['username'])){?>
				欢迎您，<a href="<?php echo U('member');?>" style="color:#317DB9;margin-right:8px"><?php echo $_SESSION['username']; ?></a>
				[<a href="<?php echo U('out');?>" style="color:#317DB9">退出</a>]
			<?php  }else{ ?>
				<a href="<?php echo U('Index/login');?>">[登录]</a>
				<a href="<?php echo U('Index/zhuce');?>">[注册]</a>
			<?php }?>

			<span>|</span>
			<a href="">我的订单</a>
		</div>
	</div>
</div>
<!-- 头部灰色区块结束 -->
<!-- 流程图区块 -->
<div class="search_out">
	<div class="logo">
		<a href="http://localhost/ecshop" target="_blank"><img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/public/logo.png" alt=""></a>
	</div>
	<div class="liucheng">
		<div class="lc2"></div>
		<div class="lc1"></div>	
		<div class="lc3"></div>
	</div>
</div>
<!-- 流程图区块 -->

<div class="container orderInfo">
		<div class="row">
			<div class="span1"></div>
			<div class="span10">
	<form  method="post" action="<?php echo U('Order/order');?>">
					<div id="receiver" class="receiver">
						<div class="title">收货地址
						 <a href="javascript:;" class='newAdress'>[添加新地址]</a></div>
					</div>

					<table id="newReceiver" class="newReceiver" <?php if($address){?>style="display:none" <?php }?> >
						<tbody><tr>
							<th width="100">
								<span class="requiredField">*</span>收货人:
							</th>
							<td>
								<input id="consignee" name="consignee" class="text" maxlength="200" type="text">
							</td>
						</tr>
						<tr>
							<th>
								<span class="requiredField">*</span>地区:
							</th>
							<td>
								<span class="fieldSet">
									<select style="margin-right: 4px;" name="areaId_select"><option selected="selected" value="">请选择...</option><option value="北京市">北京市</option><option value="台湾省">台湾省</option><option value="香港特别行政区">香港特别行政区</option><option value="内蒙古自治区">内蒙古自治区</option><option value="安徽省">安徽省</option><option value="甘肃省">甘肃省</option><option value="陕西省">陕西省</option><option value="辽宁省">辽宁省</option><option value="天津市">天津市</option><option value="山东省">山东省</option><option value="山西省">山西省</option><option value="江西省">江西省</option><option value="西藏自治区">西藏自治区</option><option value="重庆市">重庆市</option><option value="宁夏回族自治区">宁夏回族自治区</option><option value="江苏省">江苏省</option><option value="浙江省">浙江省</option><option value="河北省">河北省</option><option value="云南省">云南省</option><option value="澳门特别行政区">澳门特别行政区</option><option value="吉林省">吉林省</option><option value="黑龙江省">黑龙江省</option><option value="广东省">广东省</option><option value="湖南省">湖南省</option><option value="上海市">上海市</option><option value="福建省">福建省</option><option value="新疆维吾尔自治区">新疆维吾尔自治区</option><option value="青海省">青海省</option><option value="湖北省">湖北省</option><option value="2279">四川省</option><option value="2482">贵州省</option><option value="广西壮族自治区">广西壮族自治区</option><option value="河南省">河南省</option><option value="海南省">海南省</option></select>
								</span>
							</td>
						</tr>
						<tr>
							<th>
								<span class="requiredField">*</span>地址:
							</th>
							<td>
								<input id="address" name="address" class="text" maxlength="40" type="text">
							</td>
						</tr>
						<tr>
							<th>
								<span class="requiredField">*</span>手机/电话:
							</th>
							<td>
								<input id="phone" name="tel" class="text" maxlength="200" type="text">
							</td>
						</tr>
						<tr>
							<th>
								默认:
							</th>
							<td>
								<input name="isDefault" checked="checked" value="true" type="checkbox">
								<input name="_isDefault" value="false" type="hidden">
							</td>
						</tr>
						<tr>
							<th>&nbsp;
								
							</th>
							<td>
							<a href="javascript:;" class="sure" uid="<?php echo $_SESSION['uid']; ?>">确&nbsp;&nbsp;定</a>&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="javascript:;" class="cancel">取&nbsp;&nbsp;消</a>
							</td>
						</tr>
					</tbody></table>

<style>
a.sure{display: inline-block;padding: 0 10px;border: 1px solid #B7C8D9;line-height: 26px;border-radius: 3px;text-shadow: 1px 1px #ffffff;}
a.cancel{display: inline-block;padding: 0 10px;border: 1px solid #B7C8D9;line-height: 26px;border-radius: 3px;text-shadow: 1px 1px #ffffff;}
#adress{border: 1px solid #FFCD88;background: #FDFCF4;}
a.newAdress{padding: 0 10px;float: right;color:#28C0C6}
span.default{float: right;color: #999;};
</style>
     
    <?php $hd["list"]["a"]["total"]=0;if(isset($address) && !empty($address)):$_id_a=0;$_index_a=0;$lasta=min(1000,count($address));
$hd["list"]["a"]["first"]=true;
$hd["list"]["a"]["last"]=false;
$_total_a=ceil($lasta/1);$hd["list"]["a"]["total"]=$_total_a;
$_data_a = array_slice($address,0,$lasta);
if(count($_data_a)==0):echo "";
else:
foreach($_data_a as $key=>$a):
if(($_id_a)%1==0):$_id_a++;else:$_id_a++;continue;endif;
$hd["list"]["a"]["index"]=++$_index_a;
if($_index_a>=$_total_a):$hd["list"]["a"]["last"]=true;endif;?>

					<table  class="newReceiver" id='adress'>
						<tr>
							<td style="position:relative;">
						<?php if($a['is_default']){?>
								<span style="color:#E74344;padding-left:15px;">寄送至：</span>
						<?php  }else{ ?>
								<span style="color:#E74344;padding-left:70px;"></span>
						<?php }?>

								<b class='cc_order'><?php echo $a['address_order'];?></b>&nbsp;&nbsp;
								<span style="color:#999" class='cc_adress'><?php echo $a['address'];?></span>&nbsp;&nbsp;
								<span style="color:#999">收货人：</span>
								<span style="color:#999" class='cc_order'><?php echo $a['address_order'];?></span>&nbsp;&nbsp;
								<span style="color:#999">电话：</span>
								<span style="color:#999" class='cc_phone'><?php echo $a['address_tel'];?></span>

						<?php if($a['is_default']){?>
								<a href="javascript:;" style="position: absolute;right:25px;font-size:15px;" onclick="delAddress(this,<?php echo $a['is_default'];?>)" addressId='<?php echo $a['address_id'];?>'>x</a>
								<!-- <a href="" style="color:#28C0C6;position:absolute;right:60px;">修改</a> -->
								<span style="color:#999;position:absolute;right:140px;" addressId='<?php echo $a['address_id'];?>'>默认地址</span>	
						<?php  }else{ ?>
								<a href="javascript:;" style="position: absolute;right:25px;font-size:15px;" onclick="delAddress(this,<?php echo $a['is_default'];?>)" addressId='<?php echo $a['address_id'];?>'>x</a>
								<!-- <a href="" style="color:#28C0C6;position:absolute;right:60px;">修改</a> -->
								<a style="cursor: pointer;color:#28C0C6;position:absolute;right:120px;" onclick="setAddress(this)" addressId='<?php echo $a['address_id'];?>'>
								设置默认地址</a>
								
						<?php }?>
							</td>
						</tr>
					</table>

	<?php $hd["list"]["a"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>

	    <?php if(!$address){?>
					<table  class="newReceiver" id='adress' style="display:none">
						<tr>
							<td style="position:relative;">
								<span style="color:#E74344;padding-left:15px;">寄送至：</span>
								<b class='cc_order'><?php echo $a['address_order'];?></b>&nbsp;&nbsp;
								<span style="color:#999" class='cc_adress'><?php echo $a['address'];?></span>&nbsp;&nbsp;
								<span style="color:#999">收货人：</span>
								<span style="color:#999" class='cc_order'><?php echo $a['address_order'];?></span>&nbsp;&nbsp;
								<span style="color:#999">电话：</span>
								<span style="color:#999" class='cc_phone'><?php echo $a['address_tel'];?></span>
								<a href="javascript:;" style="position: absolute;right:25px;font-size:15px;" onclick="delAddress(this,1)" addressId='<?php echo $a['address_id'];?>'>x</a>
								<!-- <a href="" style="color:#28C0C6;position:absolute;right:60px;">修改</a> -->
								<span style="color:#999;position:absolute;right:140px;">默认地址</span>	
							</td>
						</tr>
					</table>
			<?php }?>

			</div>
		</div>
<script type="text/javascript">
	//地址确认
	$('a.sure').click(function() {
		var order=$("[name='consignee']").val(),address=$("[name='areaId_select']").val()+$("[name='address']").val(),phone=$("[name='tel']").val();
		if (!order || !address || !phone) {
			alert('信息不完整!');
			return;
		};
		$('#newReceiver').hide();
		$('b.cc_order').html(order);$('span.cc_order').html(order);
		$('span.cc_adress').html(address);$('span.cc_phone').html(phone);
		$('#adress').show();
		//将地址存入表中
		var uid=$('a.sure').attr('uid');
		$.post(CONTROLLER+'&a=address',{address_order:order,address:address,address_tel:phone,uid:uid,is_default:1},function(JSON) {
				if (JSON.status==1) {
					window.location.reload();
				}else{
					alert(JSON.message);
				}
			},'JSON')
	})
	//取消地址
	$('a.cancel').click(function() {
		$('#newReceiver').hide();
	})
	//使用新地址
	$('a.newAdress').click(function() {
		$('#newReceiver').show();	
	})
	//设置默认地址
	function setAddress (obj) {
		$.post(CONTROLLER+'&setDefault',{addressId:$(obj).attr('addressId')},function(JSON) {
			if (JSON.status) {
				window.location.reload();
			}else{
				alert(JSON.message);
			}
		},'JSON');
	}
	//删除地址
	function delAddress (obj,is_default) {
		var addressId=$(obj).attr('addressId');
		if (is_default==1) {
			alert('默认地址不能删除');
		}else{
			if (confirm('确定删除?')) {
				$.post(CONTROLLER+'&delAddress',{addressId:addressId},function(JSON) {
					if (JSON.status==1) {
						$(obj).parents('tr').eq(0).remove();
					}else{
						alert(JSON.message);
					}
				},'JSON');
			};
		}
	}
</script>		

		<div class="row">
			<div class="span1"></div>
			<div class="span10">
				<div class="receiver">
					<dl id="paymentMethod" class="select">
						<dt>支付方式</dt>
							<dd class="selected">
								<label for="paymentMethod_1">
									<input checked="checked" class="selected" id="paymentMethod_1" name="paymentMethodId" value="1" type="radio">
									<span>
											<em style="border-right: none; background: url(http://storage.shopxx.net/demo-image/3.0/payment_method/online.gif) center no-repeat;">&nbsp;</em>
										<strong>网上支付</strong>
									</span>
									<span>支持支付宝、财付通、以及大多数网上银行支付</span>
								</label>
							</dd>
						</dl>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="span1"></div>
					<div class="span10">
						<dl id="shippingMethod" class="select p_select">
							<dt>配送方式</dt>
								<dd class="selected">
									<label for="shippingMethod_2">
										<input checked="checked" id="shippingMethod_2" name="shippingMethodId" value="2" type="radio">
										<span>
												<em style="border-right: none; background: url(http://storage.shopxx.net/demo-image/3.0/shipping_method/shunfeng.gif) center no-repeat;">&nbsp;</em>
											<strong>顺丰速递</strong>
										</span>
										<span>需支付10元配送费用，不享受免运费服务</span>
									</label>
								</dd>
						</dl>
						
						<dl class="select p_select bill clearfix">
							  <dt>发票信息</dt>
							  <dd class="clearfix"> <span class="weight ">开具发票</span>
							    <div class="need">
							      <label id="JReceiptHide1">
							      <input id="fapiao" value="no" type="hidden">
							        <input id="isInvoice11" name="IsFaPiao" value="false" checked="checked" type="radio">
							        <span>不需要发票</span> </label>
							      <label id="JReceiptShow1">
							        <input id="isInvoice22" name="IsFaPiao" value="true" type="radio">
							        <span>需要发票</span> </label>
							    </div>
							  </dd>
							  <br><span id="no_invoice1" style="padding:5px 30px 10px 30px; display:inline-block;">部分服务类商品发票内容由服务提供商决定、开具并寄出，详询客服。<a href="javascript:;" value="false">[详情]</a></span>
						</dl><table>
						  
						</table>
						<table class="product">
							
						</table>						
						<table class="product border_btnone">
							<tbody><tr>
								<th colspan="5" style="border-top-color:#dedede;">商品清单</th>
							</tr>
							<tr class="border_tpnone">
								<th width="60">图片</th>
								<th>商品</th>
								<th>价格</th>
								<th>数量</th>
								<th>小计</th>
							</tr>
		<!-- 购物车商品结算区块 -->
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

							<?php if (!$c['is_checked']) continue; ?>
							<input type="hidden" name="goods_gid[]" value="<?php echo $c['goods_id'];?>" />
								<tr>
									<td>
										<img src="http://localhost/ecshop/<?php echo $c['goods_thumb'];?>">
									</td>
									<td>
										<a href="<?php echo U('detail',array('goods_id'=>$c['goods_id']));?>"  target="_blank"><?php echo $c['goods_name'];?></a>
										<br />
										<span>规格: <?php echo $c['attr'];?></span>
										<input type="hidden" name='attr[]' value="<?php echo $c['attr'];?>" />
									</td>
									<td align="center">
											<?php echo $c['goods_price'];?>
									</td>
									<td align="center">
										<?php echo $c['num'];?>
										<input type="hidden" name="num[]" value="<?php echo $c['num'];?>" />
									</td>
									<td align="center">
											￥<?php echo number_format($c['total_price'],2); ?>
									</td>
								</tr>
						<?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
		<!-- 购物车商品结算区块 -->
						</tbody></table>
					</div>
				</div>
				<div class="row">
					<div class="span1"></div>
					<div class="span5">
						<dl class="memo">
							<dt>附&nbsp;&nbsp;&nbsp;言:</dt>
							<dd>
								<input name="order_note" maxlength="200" type="text">
							</dd>
						</dl>
					</div>
					<div class="span5">
						<ul class="statistic">
						<!-- 	<li>
								<span>您已经选择了：
										HTC 816V轻盈白色4G手...金额：
										<em>￥1799.00</em><br>
										
								</span>
							</li> -->
							<li>
								<span>
									运费: <em id="freight">￥0.00</em>
								</span>
								
							</li>
							<li>
								<span>
									应付金额: <strong id="amountPayable">￥<?php echo number_format($_SESSION['cart']['total'],2); ?></strong>
									<input type="hidden" name='total_money' value="<?php echo $_SESSION['cart']['total'];?>" />
								</span>
							</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="span1"></div>
					<div class="span10">
						<div class="bottom">
							<input id="submit" class="submit" type="submit" value="提交订单" style="cursor:pointer">
						</div>
					</div>
				</div>
			</form>
		</div>
<script type="text/javascript">
	$('form').submit(function() {
		var order=$('span.cc_order').html(order),address=$('span.cc_adress').html(address),
		phone=$('span.cc_phone').html(phone);
		if (!order || !address || !phone) {
			alert('信息不完整');
			return false;
		};
	})
</script>
