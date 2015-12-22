<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>手机详情</title>
	<link rel="stylesheet" href="http://localhost/ecshop/ECSHOP/Index/View/Index/css/detail.css">
	<link rel="stylesheet" href="http://localhost/ecshop/ECSHOP/Index/View/Index/css/header_bottom.css">
	<script type="text/javascript" src="http://localhost/ecshop/ECSHOP/Index/View/Index/js/jquery172.js"></script>
	<script type="text/javascript" src='http://localhost/ecshop/ECSHOP/Index/View/Index/js/detail.js'></script>
	<script type="text/javascript" src='http://localhost/ecshop/ECSHOP/Index/View/Index/js/index.js'></script>
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
URL = 'http://localhost/ecshop/index.php/Index/Index/detail/goods_id/16';
APP = 'http://localhost/ecshop/ECSHOP';
COMMON = 'http://localhost/ecshop/ECSHOP/Common';
HDPHP = 'http://localhost/ecshop/hdphp/hdphp';
HDPHPDATA = 'http://localhost/ecshop/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/ecshop/hdphp/hdphp/Extend';
MODULE = 'http://localhost/ecshop/index.php/Index';
CONTROLLER = 'http://localhost/ecshop/index.php/Index/Index';
ACTION = 'http://localhost/ecshop/index.php/Index/Index/detail';
STATIC = 'http://localhost/ecshop/Static';
HDPHPTPL = 'http://localhost/ecshop/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/ecshop/ECSHOP/Index/View';
PUBLIC = 'http://localhost/ecshop/ECSHOP/Index/View/Public';
CONTROLLERVIEW = 'http://localhost/ecshop/ECSHOP/Index/View/Index';
HISTORY = 'http://localhost/ecshop/index.php/Index/Index/lists/cid/15/order/0/s/0-0-0';
</script>
</head>
<body>
<!-- 头部区块 -->
<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?>

<script type="text/javascript" src="http://localhost/ecshop/ECSHOP/Index/View/Index/js/header.js"></script>
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
		<a href="<?php echo U('index');?>"><img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/public/logo.png" alt=""></a>
	</div>
	<!-- 搜索 -->
	<div class="search">
		<div class="ipt">
			<!-- <form action="<?php echo U('Index/search');?>"> -->
				<label><input type="text" class="s_txt" name="keyword"></label>
				<label><input type="submit" class="s_sbt" value="搜索"></label>		
			<!-- </form> -->
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
					<li><a href="<?php echo U('Member/order');?>">待付款</a><span></span></li>
					<li><a href="<?php echo U('Member/order');?>">待评论</a><span></span></li>
					<li><a href="<?php echo U('Member/index');?>">优惠券</a><span></span></li>
					<li><a href="<?php echo U('Member/index');?>">站内信</a><span></span></li>
				</ul>
			</div>
			<a href="<?php echo U('Member/index');?>">我的商城</a>
			<b></b>
		</div>
		<div class="gouwu">
		<?php if(!$_SESSION['cart']['goods']){?>
			<b class="b_num">0</b>
		<?php  }else{ ?>
			<b class="b_num" style='width:auto;'><?php echo $_SESSION['cart']['total_num'];?></b>
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
							<p><a href="<?php echo U('detail',array('goods_id'=>$c['goods_id']));?>"><?php echo $c['goods_name'];?></a></p>
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
						<a href="<?php echo U('acount');?>" class="a_jiesuan">结算</a>
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
			<a href="<?php echo U('detail',array('goods_id'=>3));?>" target="_blank">荣耀6</a>
		</div>
	</div>
</div>
<!-- 导航条区块结束 -->


<!-- 头部区块结束 -->

<!-- 路径 -->
<div class="position">
	<a href="http://localhost/ecshop">首页</a><span> > </span><?php echo $goods_data['goods_key'];?>
</div>
<!-- 路径 -->
 

 <!-- 手机展示区块 -->
<div class="p_box">
	<!-- 左边区块 -->

	<div class="left_area">
		<ul class="l_img">
		<!-- 图片展示 -->
		<?php $hd["list"]["g"]["total"]=0;if(isset($goods_gallery) && !empty($goods_gallery)):$_id_g=0;$_index_g=0;$lastg=min(1000,count($goods_gallery));
$hd["list"]["g"]["first"]=true;
$hd["list"]["g"]["last"]=false;
$_total_g=ceil($lastg/1);$hd["list"]["g"]["total"]=$_total_g;
$_data_g = array_slice($goods_gallery,0,$lastg);
if(count($_data_g)==0):echo "";
else:
foreach($_data_g as $key=>$g):
if(($_id_g)%1==0):$_id_g++;else:$_id_g++;continue;endif;
$hd["list"]["g"]["index"]=++$_index_g;
if($_index_g>=$_total_g):$hd["list"]["g"]["last"]=true;endif;?>

			<li  <?php if($hd['list']['g']['first']){?> style='display:block'<?php }?> >
				<img src="http://localhost/ecshop/<?php echo $g['img_url'];?>">
			</li>
		<?php $hd["list"]["g"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
		</ul>
		
		<ol class="ol_min_img">
		<?php $hd["list"]["g"]["total"]=0;if(isset($goods_gallery) && !empty($goods_gallery)):$_id_g=0;$_index_g=0;$lastg=min(1000,count($goods_gallery));
$hd["list"]["g"]["first"]=true;
$hd["list"]["g"]["last"]=false;
$_total_g=ceil($lastg/1);$hd["list"]["g"]["total"]=$_total_g;
$_data_g = array_slice($goods_gallery,0,$lastg);
if(count($_data_g)==0):echo "";
else:
foreach($_data_g as $key=>$g):
if(($_id_g)%1==0):$_id_g++;else:$_id_g++;continue;endif;
$hd["list"]["g"]["index"]=++$_index_g;
if($_index_g>=$_total_g):$hd["list"]["g"]["last"]=true;endif;?>

			<li <?php if($hd['list']['g']['first']){?> class="ol_img_cur"<?php }?> >
				<a href="javascript:;"><img src="http://localhost/ecshop/<?php echo $g['thumb_url'];?>"></a>
			</li>
		<?php $hd["list"]["g"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
		</ol>
	
		<span class='ol_span_l'></span><span class='ol_span_r'></span>
	</div>
	<!-- 左边区块结束 -->
	<!-- 右边区块 -->
	<div class="right_area">
		<!-- 标题 -->
		<h1><?php echo $data['goods_name'];?></h1>
		<div class="t_red">
			<?php echo $data['goods_title'];?>
		</div>
		<div class="h_10"></div> 
		<!-- 价格区块 -->
		<div class="r_price">
			<label for="">华 为&nbsp;  价：</label>
			<b>¥ <?php echo $data['goods_price'];?></b>
		</div>
		<div class="bianma">
			<label>商品编码：</label>
			<span>&nbsp;<?php echo $data['goods_sn'];?></span>
		</div>
		<div class="bianma">
			<label>商品评分 :</label>
			<span>&nbsp;<b></b>（共 <?php echo $data['goods_number'];?> 条评论）</span>
		</div>
		<div class="bianma">
			<label>运&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;费 :</label>
			<span>&nbsp;满 100 免运费</span>
		</div>
		<div class="bianma">
			<label>服&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;务 :</label>
			<span>&nbsp;由华为商城负责发货，并提供售后服务</span>
		</div>
		<div class="h_10"></div>
		<!-- 参数区块 -->
	<form id="form_buy">
		<div class="select">
		<?php $hd["list"]["ga"]["total"]=0;if(isset($goods_attr) && !empty($goods_attr)):$_id_ga=0;$_index_ga=0;$lastga=min(1000,count($goods_attr));
$hd["list"]["ga"]["first"]=true;
$hd["list"]["ga"]["last"]=false;
$_total_ga=ceil($lastga/1);$hd["list"]["ga"]["total"]=$_total_ga;
$_data_ga = array_slice($goods_attr,0,$lastga);
if(count($_data_ga)==0):echo "";
else:
foreach($_data_ga as $key=>$ga):
if(($_id_ga)%1==0):$_id_ga++;else:$_id_ga++;continue;endif;
$hd["list"]["ga"]["index"]=++$_index_ga;
if($_index_ga>=$_total_ga):$hd["list"]["ga"]["last"]=true;endif;?>

				<dl class="sel_txt">
					<dt><?php echo $ga['attr_name'];?>  :&nbsp;&nbsp;&nbsp;</dt>
					<dd>
						<ol>
						<?php $hd["list"]["v"]["total"]=0;if(isset($ga['value']) && !empty($ga['value'])):$_id_v=0;$_index_v=0;$lastv=min(1000,count($ga['value']));
$hd["list"]["v"]["first"]=true;
$hd["list"]["v"]["last"]=false;
$_total_v=ceil($lastv/1);$hd["list"]["v"]["total"]=$_total_v;
$_data_v = array_slice($ga['value'],0,$lastv);
if(count($_data_v)==0):echo "";
else:
foreach($_data_v as $key=>$v):
if(($_id_v)%1==0):$_id_v++;else:$_id_v++;continue;endif;
$hd["list"]["v"]["index"]=++$_index_v;
if($_index_v>=$_total_v):$hd["list"]["v"]["last"]=true;endif;?>

							<li>
								<a href="javascript:;" onclick='addCur(this)' id='<?php echo $v['id'];?>'><?php echo $v['attr_value'];?><i></i></a>
							</li>
						<?php $hd["list"]["ga"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
						</ol>
					</dd>
				</dl>
		<?php $hd["list"]["v"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>	
		</div>
		<div class="buy_num">
			<dl>
				<dt>购买数量 :&nbsp;&nbsp;&nbsp;</dt>
				<dd> 
					<a href="javascript:;" onclick="changeNum(this)" tp="1">-</a>
					<input type="text" value="1" class="num_ipt" name="num" onkeyup="changeNum(this)"  onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" proNum='1'>
					<a href="javascript:;" onclick="changeNum(this)" tp="2">+</a>
				</dd>
			</dl>
		</div>
		<!-- 购买 -->
		<div class="r_buy">
			<p>您选择了<span class='you_select0'></span><span class='you_select1'></span><span class='you_select2'></span></p>
			<input type="submit" value="加入购物车"><span class='msg'></span>
		</div>
		<!-- 购买成功 -->
		<div class="hd_buy_success">
			<a href="javascript:;" class="success_close">x</a>
			<dl>
				<dt><b></b></dt>
				<dd>
					<p><?php echo mb_substr($data['goods_name'],0,15,'utf8'); ?></p>
					<div class="succuss_msg">成功加入购物车!</div>
					<div class="success_total">
						购物车中共 <span class='sp_num'>0</span> 件商品，金额合计 <span class='sp_total'>0.00</span>
					</div>
					<div class="success_botton">
						<a href="<?php echo U('Index/acount');?>" class="ipt_suan">去结算</a>
						<a href="javascript:;" class="ipt_buy">继续购物 >></a>
					</div>
				</dd>
			</dl>	
		</div>
	</form>
	</div>
	<!-- 右边区块结束 -->
</div>

<!-- 手机展示区块结束 -->

<!-- 产品详情介绍区块 -->


<div class="big">
<!-- 浏览记录 -->
	<div class="l_box">
		<div class="l_title">浏览记录</div>
		<ul>
		<?php $hd["list"]["h"]["total"]=0;if(isset($history) && !empty($history)):$_id_h=0;$_index_h=0;$lasth=min(1000,count($history));
$hd["list"]["h"]["first"]=true;
$hd["list"]["h"]["last"]=false;
$_total_h=ceil($lasth/1);$hd["list"]["h"]["total"]=$_total_h;
$_data_h = array_slice($history,0,$lasth);
if(count($_data_h)==0):echo "";
else:
foreach($_data_h as $key=>$h):
if(($_id_h)%1==0):$_id_h++;else:$_id_h++;continue;endif;
$hd["list"]["h"]["index"]=++$_index_h;
if($_index_h>=$_total_h):$hd["list"]["h"]["last"]=true;endif;?>

			<li>
				<img src="http://localhost/ecshop/<?php echo $h['goods_thumb'];?>" alt="" width="60px" height="60px">
				<p class="l_p_title">
					<a href="<?php echo U('detail',array('goods_id'=>$h['goods_id']));?>" target="_blank">
						<?php $t=explode('_',$h['goods_index_title']);echo $t[0]; ?>
						<?php  echo mb_substr($t[1],0,15,'utf8');?>
					</a>
				</p>
				<p class="l_p_price">
					¥<b><?php echo $h['goods_price'];?></b>
				</p>
			</li>
		<?php $hd["list"]["h"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
		</ul>
	</div>
<!-- 浏览记录结束 -->

<!-- 右边区块 -->
	<div class="r_box">
		<!-- big的标题 -->
		<div class="b_title">
			<ul>
				<li class="b_cur"><a href="javascript:;">商品详情</a></li>
				<li><a href="javascript:;">规格参数</a></li>
				<li><a href="javascript:;">包装清单</a></li>
				<li><a href="javascript:;">售后服务</a></li>
				<li><a href="javascript:;">用户评价(233)</a></li>
			</ul>
		</div>
	<!-- 产品介绍区块 -->
		<div class="box">
		<!-- 商品详情 -->
			<div class="pro_detail">
				<?php echo $goods_data['goods_body'];?>

				<div class="word">
					<p>
					※本网站尽可能地提供准确的信息。本网站内所涉及的产品图片与实物可能有细微区别，效果演示图和示意图仅供参考（图片为合成图、模拟演示图），有关产品的外观（包括但不限于颜色）请以实物为准。
					</p>
					<p>
					※限于篇幅，本网站中所包含的信息（包括但不限于产品规格、功能说明等）可能不完整，请以有关产品使用说明书的具体信息为准。	
					</p>
				</div>	
			</div>
		<!-- 商品详情结束 -->

		<!-- 规格参数 -->
			<div class="canshu">
				<table>
					<tr>
						<th>主体</th>
						<td></td>
					</tr>
					<tr>
						<td class="td_title">商品</td>
						<td><?php echo $data['goods_name'];?></td>
					</tr>
				<?php $hd["list"]["cs"]["total"]=0;if(isset($canshu) && !empty($canshu)):$_id_cs=0;$_index_cs=0;$lastcs=min(1000,count($canshu));
$hd["list"]["cs"]["first"]=true;
$hd["list"]["cs"]["last"]=false;
$_total_cs=ceil($lastcs/1);$hd["list"]["cs"]["total"]=$_total_cs;
$_data_cs = array_slice($canshu,0,$lastcs);
if(count($_data_cs)==0):echo "";
else:
foreach($_data_cs as $key=>$cs):
if(($_id_cs)%1==0):$_id_cs++;else:$_id_cs++;continue;endif;
$hd["list"]["cs"]["index"]=++$_index_cs;
if($_index_cs>=$_total_cs):$hd["list"]["cs"]["last"]=true;endif;?>

					<tr>
						<td class="td_title"><?php echo $cs['attr_name'];?></td>
						<td><?php echo $cs['attr_value'];?></td>
					</tr>
				<?php $hd["list"]["cs"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
				</table>
			</div>
		<!-- 规格参数结束 -->

		<!-- 包装清单 -->
			<div class="qingdan">
				<p>手机（含内置电池） x 1，充电器 x 1，USB线 x 1，耳机 x 1，卡座捅针 x 1，快速指南 x 1，安全说明 x 1，保修卡 x 1</p>
			</div>
		<!-- 包装清单结束 -->

		<!-- 售后服务 -->
			<div class="shouhou">
				<p>本产品全国联保，享受三包服务，质保期为：一年质保 </p>
				<p>如因质量问题或故障，凭厂商维修中心或特约维修点的质量检测证明，7日内退/换货或维修，15日内换货或维修，15日以上在质保期内享</p>
				<p>受免费保修等三包服务！</p>
				<p>售后服务电话：400-830-8300</p>
				<p>华为消费者BG官网： http://consumer.huawei.com/cn/</p>
			</div>
		<!-- 售后服务结束 -->
		<!-- 用户评价 -->
			<div class="pingjia">
				暂无评价...
			</div>
		<!-- 用户评价结束 -->
		</div>
	<!-- 产品介绍区块结束 -->
	</div>
</div>

<!-- 产品详情介绍区块结束 -->

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