<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>华为商城</title>
	<link rel="stylesheet" href="http://localhost/ecshop/ECSHOP/Index/View/Index/css/index.css">
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
URL = 'http://localhost/ecshop';
APP = 'http://localhost/ecshop/ECSHOP';
COMMON = 'http://localhost/ecshop/ECSHOP/Common';
HDPHP = 'http://localhost/ecshop/hdphp/hdphp';
HDPHPDATA = 'http://localhost/ecshop/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/ecshop/hdphp/hdphp/Extend';
MODULE = 'http://localhost/ecshop/index.php/Index';
CONTROLLER = 'http://localhost/ecshop/index.php/Index/Index';
ACTION = 'http://localhost/ecshop/index.php/Index/Index/index';
STATIC = 'http://localhost/ecshop/Static';
HDPHPTPL = 'http://localhost/ecshop/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/ecshop/ECSHOP/Index/View';
PUBLIC = 'http://localhost/ecshop/ECSHOP/Index/View/Public';
CONTROLLERVIEW = 'http://localhost/ecshop/ECSHOP/Index/View/Index';
HISTORY = 'http://localhost/ecshop/index.php/Index/Member/index';
</script>
	<script type="text/javascript" src="http://localhost/ecshop/ECSHOP/Index/View/Index/js/jquery172.js"></script>
	<script type="text/javascript" src='http://localhost/ecshop/ECSHOP/Index/View/Index/js/index.js'></script>
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


<!-- 轮播图区块 -->
<div class="lunbo_out">
	<div class="lunbo">
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
							<a href="<?php echo U('lists',array('cid'=>$cd['cid']));?>" target="_blank"><?php echo $cd['cat_name'];?></a>
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

									<a href="<?php echo U('lists',array('cid'=>$cd_cd['cid']));?>" target="_blank"><?php echo $cd_cd['cat_name'];?></a>
								<?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
									<dl>
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

										<dd><a href="<?php echo U('lists',array('cid'=>$cd_cd['cid']));?>" target="_blank"><?php echo $c_d['cat_name'];?></a></dd>
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
	<!-- 轮播图 -->
		<div class="lb_box">
			<a href="" style="display:block"><img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/public/1.jpg" alt=""></a>
			<a href=""><img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/public/2.jpg" alt=""></a>
			<a href=""><img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/public/3.jpg" alt=""></a>
			<a href=""><img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/public/4.jpg" alt=""></a>
			<a href=""><img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/public/5.jpg" alt=""></a>
			<ol>
				<li class="cur"></li><li></li><li></li><li></li><li></li>
			</ol>
		</div>
	<!-- 轮播图结束 -->
	</div>
</div>
<!-- 轮播图区块结束 -->

<!-- 商品大区块 -->
	<!-- 一楼手机热卖区块 -->
<div class="first">
	<!-- 左 -->
	<div class="first_l">
		<ul>
			<li style="background:#FFFCE7">
				<i><img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/is_hot.png" alt=""></i>
				<div class="li_div div_border">
					<div class="li_img">
						<a href="<?php echo U('detail',array('goods_id'=>1));?>" target="_blank"><img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/index/hot_1.png" alt="" width="156px" height="252px"></a>
					</div>
					<div class="p_name">华为 P7</div>
					<div class="p_des">
						<span style='color:#777777'>纤薄机身，玻璃背纹</span>
					</div>
					<div class="p_price">
						<em>¥</em><span>2588</span>
						<a href="<?php echo U('detail',array('goods_id'=>1));?>" class="buy" target="_blank">立即抢购</a>
					</div>
				</div>
			</li>
			<li style="background:#FFFCE7">
				<i><img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/is_hot.png" alt=""></i>
				<div class="li_div div_border">
					<div class="li_img">
						<a href="<?php echo U('detail',array('goods_id'=>9));?>" target="_blank"><img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/index/hot_2.png" alt=""></a>
					</div>
					<div class="p_name">荣耀3C畅玩版</div>
					<div class="p_des">
						<span style='color:#777777'>四核5寸屏 送父母好选择</span>
						<span style='color:#E01D20'>实用配件套装，比单买更优惠</span>
					</div>
					<div class="p_price">
						<em>¥</em><span>699</span>
						<a href="<?php echo U('detail',array('goods_id'=>9));?>" class="buy" target="_blank">立即抢购</a>
					</div>
				</div>
			</li>
			<li style="background:#FFFCE7">
				<i><img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/is_hot.png" alt=""></i>
				<div class="li_div div_border">
					<div class="li_img">
						<a href="<?php echo U('detail',array('goods_id'=>3));?>" target="_blank"><img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/index/hot_3.png" alt=""></a>
					</div>
					<div class="p_name">荣耀6</div>
					<div class="p_des">
						<span style='color:#777777'>全球首款八核4G Cat6手机</span>
						<span style='color:#E01D20'>限量赠送豪华配件套装</span>
					</div>
					<div class="p_price">
						<em>¥</em><span>2039</span>
						<a href="<?php echo U('detail',array('goods_id'=>3));?>" class="buy" target="_blank">立即抢购</a>
					</div>
				</div>
			</li>
			<li style="border-left:none;background:#FFFCE7">
				<i><img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/is_hot.png" alt=""></i>
				<div class="li_div div_border">
					<div class="li_img">
						<a href="<?php echo U('detail',array('goods_id'=>8));?>" target="_blank"><img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/index/hot_4.png" alt=""></a>
					</div>
					<div class="p_name">华为秘盒</div>
					<div class="p_des">
						<span style='color:#777777'>互联网迄今真正发烧的盒子</span>
						<span style='color:#E01D20'>11月12日～11月30日 限时特价388</span>
					</div>
					<div class="p_price">
						<em>¥</em><span>488</span>
						<a href="<?php echo U('detail',array('goods_id'=>8));?>" class="buy" target="_blank">立即抢购</a>
					</div>
				</div>
			</li>
		</ul>
	</div>
	<!-- 右 -->
	<div class="first_r">
		<div class="r_div">
			<ul>
				<li>
					<a href="<?php echo U('detail',array('goods_id'=>36));?>" target="_blank">
						<img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/index/r1.jpg" alt="">
					</a>
				</li>
				<li>
					<a href="<?php echo U('detail',array('goods_id'=>11));?>" target="_blank">
						<img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/index/f1.jpg" alt="">
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>
	<!-- 一楼手机热卖区块结束 -->

<div class="floor1">
	<a href="<?php echo U('detail',array('goods_id'=>27));?>" target="_blank">
		<img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/index/floor1.jpg" alt=""></a>
</div>

	<!-- 二楼精选手机区块 -->
<div class="second">
	<div class="s_title">
		<h2><a href="">手机</a></h2>
	</div>
	<div class="phone">
		<ul>
		<?php
				$pid='1';
				$row='7';
				$data=K('Goods')->limit($row)->where('is_index=1')->getAll($pid);
				foreach ($data as $k=>$field){
					$url=U('Index/Index/detail',array('goods_id'=>$field['goods_id']));
				?>
			<?php if(!$k){?>
			<li class="li1">
				<div class="li1_dv div_border">
					<div class="p_li1">
						<a href="<?php echo $url;?>"><img src="http://localhost/ecshop/<?php echo $field['goods_img'];?>" alt=""></a>
					</div>
					<div class="p_name"><a href="<?php echo $url;?>"><?php $title=explode('_',$field['goods_index_title']);echo $title[0]; ?></a> </div>
					<div class="p_des">
						<span style='color:#777777'><?php echo $title[1];?></span>
						<span style='color:#E01D20'></span>
					</div>
					<div class="p_price">
						<em>¥</em><span><?php echo $field['goods_price'];?></span>
						<a href="<?php echo $url;?>" class="buy">立即抢购</a>
					</div>
				</div>
			</li>
			<?php  }else{ ?>
			<li class="li2" style="border-left: 1px solid #DFDFDF;">
				<?php if($field['is_new']){?>
					<i><img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/is_new.png" alt=""></i>
				<?php }?>
				<?php if($field['is_best']){?>
					<i><img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/is_best.png" alt=""></i>
				<?php }?>
				
				<div class="li2_dv div_border" 
				<?php if($k==1){?> style="background:#E2F9FB"<?php }?>
				<?php if($k==2){?> style="background:#FFECEF"<?php }?>
				>
					<div class="li2_img">
						<a href="<?php echo $url;?>" target="_blank"><img src="http://localhost/ecshop/<?php echo $field['goods_img'];?>" alt=""></a>
					</div>
					<div class="li2_name">
						<a href="<?php echo $url;?>" target="_blank"><?php $title=explode('_',$field['goods_index_title']);echo $title[0]; ?>
						<span><?php echo $title[1];?></span></a>
					</div>
					<div class="li2_price">
						<em>¥</em><span><?php echo $field['goods_price'];?></span>
					</div>
				</div>
			</li>
			<?php }?>
	<?php  }; ?>

		</ul>
	</div>
</div>
	<!-- 二楼精选手机区块结束 -->

	<!-- 三楼平板电脑区 -->
<div class="third">
	<div class="s_title">
		<h2><a href="">平板电脑</a></h2>
	</div>
	<div class="phone">
		<ul>
		<?php
				$pid='2';
				$row='3';
				$data=K('Goods')->limit($row)->where('is_index=1')->getAll($pid);
				foreach ($data as $k=>$field){
					$url=U('Index/Index/detail',array('goods_id'=>$field['goods_id']));
				?>
			<?php if(!$k){?>
			<li class="li1"  style="border-right: 1px solid #DFDFDF;">
				<?php if($field['is_new']){?>
					<i><img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/is_new.png" alt=""></i>
				<?php }?>
				<?php if($field['is_best']){?>
					<i><img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/is_best.png" alt=""></i>
				<?php }?>
				<?php if($field['is_hot']){?>
					<i><img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/is_hot.png" alt=""></i>
				<?php }?>

				<div class="li1_dv div_border">
					<div class="p_li1">
						<a href="<?php echo $url;?>" target="_blank"><img src="http://localhost/ecshop/<?php echo $field['goods_img'];?>" alt=""></a>
					</div>
					<div class="p_name"><a href="<?php echo $url;?>"  target="_blank">荣耀平板</a> </div>
					<div class="p_des">
						<span style='color:#777777'><?php $title=explode('_',$field['goods_index_title']);echo $title[0]; ?></span>
						<span style='color:#E01D20'><?php echo $title[1];?></span>
					</div>
					<div class="p_price">
						<em>¥</em><span><?php echo $field['goods_price'];?></span>
						<a href="<?php echo $url;?>" class="buy" target="_blank">立即抢购</a>
					</div>
				</div>
			</li>
			<?php  }else{ ?>
			<li class="li2">
				<?php if($field['is_new']){?>
					<i><img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/is_new.png" alt=""></i>
				<?php }?>
				<?php if($field['is_best']){?>
					<i><img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/is_best.png" alt=""></i>
				<?php }?>
				<?php if($field['is_hot']){?>
					<i><img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/is_hot.png" alt=""></i>
				<?php }?>

				<div class="li2_dv div_border" 
				<?php if($k==1){?> style="background:#FCEFFF"<?php }?>
				<?php if($k==2){?> style="background:#FFFCE7"<?php }?>
				>
					<div class="li2_img">
						<a href="<?php echo $url;?>"  target="_blank"><img src="http://localhost/ecshop/<?php echo $field['goods_img'];?>" alt=""></a>
					</div>
					<div class="li2_name">
						<a href="<?php echo $url;?>"  target="_blank"><?php $title=explode('_',$field['goods_index_title']);echo $title[0]; ?><span><?php echo $title[1];?></span></a>
					</div>
					<div class="li2_price">
						<em>¥</em><span><?php echo $field['goods_price'];?></span>
					</div>
				</div>
			</li>
			<?php }?>
		<?php  }; ?>

		</ul>
	</div>
</div>
	<!-- 三楼平板电脑区结束 -->

	<!-- 四楼宽带网络 -->
<div class="four">
	<div class="s_title">
		<h2><a href="">宽带网络</a></h2>
	</div>
	<div class="phone">
		<ul>
		<?php
				$pid='3';
				$row='7';
				$data=K('Goods')->limit($row)->where('is_index=1')->getAll($pid);
				foreach ($data as $k=>$field){
					$url=U('Index/Index/detail',array('goods_id'=>$field['goods_id']));
				?>
			<?php if(!$k){?>
			<li class="li1">
				<?php if($field['is_new']){?>
					<i><img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/is_new.png" alt=""></i>
				<?php }?>
				<?php if($field['is_best']){?>
					<i><img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/is_best.png" alt=""></i>
				<?php }?>
				<?php if($field['is_hot']){?>
					<i><img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/is_hot.png" alt=""></i>
				<?php }?>


				<div class="li1_dv div_border" style="background:#FFECEF;">
					<div class="p_li1">
						<a href="<?php echo $url;?>" target="_blank"><img src="http://localhost/ecshop/<?php echo $field['goods_img'];?>" alt=""></a>
					</div>
					<div class="p_name"><a href="<?php echo $url;?>" target="_blank"><?php $title=explode('_',$field['goods_index_title']);echo $title[0]; ?></a> </div>
					<div class="p_des">
						<span style='color:#777777'><?php echo $title[1];?></span>
						<!-- <span style='color:#E01D20'>11月14日10:08准点开售</span> -->
					</div>
					<div class="p_price">
						<em>¥</em><span><?php echo $field['goods_price'];?></span>
						<a href="<?php echo $url;?>" class="buy" target="_blank">立即抢购</a>
					</div>
				</div>
			</li>
			<?php  }else{ ?>
			<li class="li2" style="border-left:1px solid #DFDFDF;">
				<?php if($field['is_new']){?>
					<i><img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/is_new.png" alt=""></i>
				<?php }?>
				<?php if($field['is_best']){?>
					<i><img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/is_best.png" alt=""></i>
				<?php }?>
				<?php if($field['is_hot']){?>
					<i><img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/is_hot.png" alt=""></i>
				<?php }?>

				<div class="li2_dv div_border"
				<?php if($k==1){?> style="background:#F6F6F6"<?php }?>
				<?php if($k==2){?> style="background:#E2F9FB"<?php }?>
				>
					<div class="li2_img">
						<a href="<?php echo $url;?>" target="_blank"><img src="http://localhost/ecshop/<?php echo $field['goods_img'];?>" alt=""></a>
					</div>
					<div class="li2_name">
						<a href="<?php echo $url;?>" target="_blank"><?php $title=explode('_',$field['goods_index_title']);echo $title[0]; ?><span><?php echo $title[1];?></span></a>
					</div>
					<div class="li2_price">
						<em>¥</em><span><?php echo $field['goods_price'];?></span>
					</div>
				</div>
			</li>
			<?php }?>
		<?php  }; ?>
		</ul>
	</div>
</div>
	<!-- 四楼宽带网络结束 -->
	
	<!-- 五楼必备配件 -->
<div class="five">
	<div class="s_title">
		<h2><a href="">必备配件</a></h2>
	</div>
	<div class="phone">
		<ul>
		<?php
				$pid='6';
				$row='7';
				$data=K('Goods')->limit($row)->where('is_index=1')->getAll($pid);
				foreach ($data as $k=>$field){
					$url=U('Index/Index/detail',array('goods_id'=>$field['goods_id']));
				?>
			<?php if(!$k){?>
			<li class="li1">
				<?php if($field['is_new']){?>
					<i><img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/is_new.png" alt=""></i>
				<?php }?>
				<?php if($field['is_best']){?>
					<i><img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/is_best.png" alt=""></i>
				<?php }?>
				<?php if($field['is_hot']){?>
					<i><img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/is_hot.png" alt=""></i>
				<?php }?>

				<div class="li1_dv div_border">
					<div class="p_li1">
						<a href="<?php echo $url;?>" target="_blank"><img src="http://localhost/ecshop/<?php echo $field['goods_img'];?>" alt=""></a>
					</div>
					<div class="p_name"><a href="<?php echo $url;?>" target="_blank">华为降噪耳机 </a> </div>
					<div class="p_des">
						<span style='color:#777777'><?php $title=explode('_',$field['goods_index_title']);echo $title[0]; ?></span>
						<span style='color:#E01D20'><?php echo $title[1];?></span>
					</div>
					<div class="p_price">
						<em>¥</em><span><?php echo $field['goods_price'];?></span>
						<a href="<?php echo $url;?>" class="buy" target="_blank">立即抢购</a>
					</div>
				</div>
			</li>
			<?php  }else{ ?>
			<li class="li2" style="border-left: 1px solid #DFDFDF;">
				<?php if($field['is_new']){?>
					<i><img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/is_new.png" alt=""></i>
				<?php }?>
				<?php if($field['is_best']){?>
					<i><img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/is_best.png" alt=""></i>
				<?php }?>
				<?php if($field['is_hot']){?>
					<i><img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/is_hot.png" alt=""></i>
				<?php }?>

				<div class="li2_dv div_border" 
				<?php if($k==1){?> style="background:#E2F9FB"<?php }?>
				<?php if($k==2){?> style="background:#FFECEF"<?php }?>
				>
					<div class="li2_img">
						<a href="<?php echo $url;?>" target="_blank"><img src="http://localhost/ecshop/<?php echo $field['goods_img'];?>" alt=""></a>
					</div>
					<div class="li2_name">
						<a href="<?php echo $url;?>" target="_blank"><?php $title=explode('_',$field['goods_index_title']);echo $title[0]; ?><span><?php echo $title[1];?></span></a>
					</div>
					<div class="li2_price">
						<em>¥</em><span><?php echo $field['goods_price'];?></span>
					</div>
				</div>
			</li>
			<?php }?>
		<?php  }; ?>

		<?php
				$pid='4';
				$row='4';
				$data=K('Goods')->limit($row)->where('is_index=1')->getAll($pid);
				foreach ($data as $k=>$field){
					$url=U('Index/Index/detail',array('goods_id'=>$field['goods_id']));
				?>
			<li class="li2">
				<?php if($field['is_new']){?>
					<i><img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/is_new.png" alt=""></i>
				<?php }?>
				<?php if($field['is_best']){?>
					<i><img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/is_best.png" alt=""></i>
				<?php }?>
				<?php if($field['is_hot']){?>
					<i><img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/is_hot.png" alt=""></i>
				<?php }?>

				<div class="li2_dv div_border">
					<div class="li2_img">
						<a href="<?php echo $url;?>" target="_blank"><img src="http://localhost/ecshop/<?php echo $field['goods_img'];?>" alt=""></a>
					</div>
					<div class="li2_name">
						<a href="<?php echo $url;?>" target="_blank"><?php $title=explode('_',$field['goods_index_title']);echo $title[0]; ?><span><?php echo $title[1];?></span></a>
					</div>
					<div class="li2_price">
						<em>¥</em><span><?php echo $field['goods_price'];?></span>
					</div>
				</div>
			</li>
		<?php  }; ?>
		</ul>
	</div>
</div>

<!-- 商品大区块结束 -->


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