<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>列表页</title>
	<link rel="stylesheet" href="http://localhost/ecshop/ECSHOP/Index/View/Index/css/lists.css">
	<link rel="stylesheet" href="http://localhost/ecshop/ECSHOP/Index/View/Index/css/header_bottom.css">
	<script type="text/javascript" src="http://localhost/ecshop/ECSHOP/Index/View/Index/js/jquery172.js"></script>
	<script type="text/javascript" src='http://localhost/ecshop/ECSHOP/Index/View/Index/js/list.js'></script>
	<script type="text/javascript" src='http://localhost/ecshop/ECSHOP/Index/View/Index/js/index.js'></script>
</head>
<body>
<!-- 头部区块	 -->
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
	<a href="http://localhost/ecshop">首页</a><span> > </span><?php echo $cate['cat_name'];?>
</div>
<!-- 路径 -->
<!-- 分类排序 -->
<?php $hd["list"]["a"]["total"]=0;if(isset($attr) && !empty($attr)):$_id_a=0;$_index_a=0;$lasta=min(1000,count($attr));
$hd["list"]["a"]["first"]=true;
$hd["list"]["a"]["last"]=false;
$_total_a=ceil($lasta/1);$hd["list"]["a"]["total"]=$_total_a;
$_data_a = array_slice($attr,0,$lasta);
if(count($_data_a)==0):echo "";
else:
foreach($_data_a as $key=>$a):
if(($_id_a)%1==0):$_id_a++;else:$_id_a++;continue;endif;
$hd["list"]["a"]["index"]=++$_index_a;
if($_index_a>=$_total_a):$hd["list"]["a"]["last"]=true;endif;?>

<div class="pro_cat" <?php if($hd['list']['a']['index']!=1){?>style="border-top: none;"<?php }?>  >
	<dl>
		<dt><?php echo $a['attr_name'];?> :</dt>
		<dd><?php echo getAttrLink($hd['list']['a']['index'],0,'全部');?></dd>
	<?php $hd["list"]["a2"]["total"]=0;if(isset($a['_value']) && !empty($a['_value'])):$_id_a2=0;$_index_a2=0;$lasta2=min(1000,count($a['_value']));
$hd["list"]["a2"]["first"]=true;
$hd["list"]["a2"]["last"]=false;
$_total_a2=ceil($lasta2/1);$hd["list"]["a2"]["total"]=$_total_a2;
$_data_a2 = array_slice($a['_value'],0,$lasta2);
if(count($_data_a2)==0):echo "";
else:
foreach($_data_a2 as $key=>$a2):
if(($_id_a2)%1==0):$_id_a2++;else:$_id_a2++;continue;endif;
$hd["list"]["a2"]["index"]=++$_index_a2;
if($_index_a2>=$_total_a2):$hd["list"]["a2"]["last"]=true;endif;?>

		<dd><?php echo getAttrLink($hd['list']['a']['index'],$a2['id'],$a2['attr_value']);?></dd>
	<?php $hd["list"]["a"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
	</dl>
</div>
<?php $hd["list"]["a2"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
<div class="pro_cat" style="border-top: none;">
	<dl>
		<dt>排序 :</dt>
		<dd>
			<a href="<?php echo U('lists',array('cid'=>Q('cid'),'order'=>'0'));?>" <?php if(!Q('order')){?> class="dd_a1" <?php }?> >默认</a>
		</dd>
		<dd>
			<a href="<?php echo U('lists',array('cid'=>Q('cid'),'order'=>'1'));?>" <?php if(Q('order')==1){?> class="dd_a1" <?php }?>>价格</a>
		</dd>
		<dd>
			<a href="<?php echo U('lists',array('cid'=>Q('cid'),'order'=>'2'));?>" <?php if(Q('order')==2){?> class="dd_a1" <?php }?>>上架时间</a>
		</dd>
	</dl>
</div>

<!-- 分类排序结束 -->

<!-- 产品列表 -->
<div class="list_out">
	<div class="list">
		<ul>
		<?php $hd["list"]["d"]["total"]=0;if(isset($data) && !empty($data)):$_id_d=0;$_index_d=0;$lastd=min(1000,count($data));
$hd["list"]["d"]["first"]=true;
$hd["list"]["d"]["last"]=false;
$_total_d=ceil($lastd/1);$hd["list"]["d"]["total"]=$_total_d;
$_data_d = array_slice($data,0,$lastd);
if(count($_data_d)==0):echo "";
else:
foreach($_data_d as $key=>$d):
if(($_id_d)%1==0):$_id_d++;else:$_id_d++;continue;endif;
$hd["list"]["d"]["index"]=++$_index_d;
if($_index_d>=$_total_d):$hd["list"]["d"]["last"]=true;endif;?>

			<li>
				<div class="list_pro">
				<?php if($d['is_hot']){?>
					<i><img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/is_hot.png" alt=""></i>
				<?php }?>
				<?php if($d['is_new']){?>
					<i><img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/is_new.png" alt=""></i>
				<?php }?>
				<?php if($d['is_best']){?>
					<i><img src="http://localhost/ecshop/ECSHOP/Index/View/Index/images/is_best.png" alt=""></i>
				<?php }?>
					<p class="pimg"><a href="<?php echo U('detail',array('goods_id'=>$d['goods_id']));?>"><img src="http://localhost/ecshop/<?php echo $d['goods_thumb'];?>" alt=""></a></p>
					<p class="pname"><a href="<?php echo U('detail',array('goods_id'=>$d['goods_id']));?>"><?php echo $d['goods_name'];?></a></p>
					<p class="pprice"><b>¥<?php echo $d['goods_price'];?></b></p>
					<div class="p_btn">
						<a href="">加入购物车</a><span><?php echo $d['goods_click'];?></span>评价
					</div>
				</div>
			</li>
		<?php $hd["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>

		</ul>
		<!-- 页码 -->
		<div class="page">
			<?php echo $page;?>
		</div>
	</div>

</div>
<!-- 产品列表结束 -->

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