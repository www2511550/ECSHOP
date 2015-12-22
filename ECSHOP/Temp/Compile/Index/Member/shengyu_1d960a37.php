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