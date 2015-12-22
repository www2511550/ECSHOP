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

