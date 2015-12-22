<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>品牌展示</title>
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
URL = 'http://localhost/ecshop/index.php/Admin/Brand/index';
APP = 'http://localhost/ecshop/ECSHOP';
COMMON = 'http://localhost/ecshop/ECSHOP/Common';
HDPHP = 'http://localhost/ecshop/hdphp/hdphp';
HDPHPDATA = 'http://localhost/ecshop/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/ecshop/hdphp/hdphp/Extend';
MODULE = 'http://localhost/ecshop/index.php/Admin';
CONTROLLER = 'http://localhost/ecshop/index.php/Admin/Brand';
ACTION = 'http://localhost/ecshop/index.php/Admin/Brand/index';
STATIC = 'http://localhost/ecshop/Static';
HDPHPTPL = 'http://localhost/ecshop/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/ecshop/ECSHOP/Admin/View';
PUBLIC = 'http://localhost/ecshop/ECSHOP/Admin/View/Public';
CONTROLLERVIEW = 'http://localhost/ecshop/ECSHOP/Admin/View/Brand';
HISTORY = 'http://localhost/ecshop/index.php/Admin/Index/index';
</script>
</head>
<body>
<div class="warp">
	<div class="menu_list">
		<ul>
			<li><a href="<?php echo U('add');?>">添加品牌</a></li>
		</ul>
		<ul>
			<li><a href="<?php echo U('updateCache');?>">更新缓存</a></li>
		</ul>
	</div>
	<table class="table2">
		<thead>
			<td>BID</td>
			<td>品牌</td>
			<td>品牌logo</td>
			<td>品牌排序</td>
			<td class="w100">操作</td>
		</thead>
		<tbody>
		<?php $hd["list"]["b"]["total"]=0;if(isset($brand) && !empty($brand)):$_id_b=0;$_index_b=0;$lastb=min(1000,count($brand));
$hd["list"]["b"]["first"]=true;
$hd["list"]["b"]["last"]=false;
$_total_b=ceil($lastb/1);$hd["list"]["b"]["total"]=$_total_b;
$_data_b = array_slice($brand,0,$lastb);
if(count($_data_b)==0):echo "";
else:
foreach($_data_b as $key=>$b):
if(($_id_b)%1==0):$_id_b++;else:$_id_b++;continue;endif;
$hd["list"]["b"]["index"]=++$_index_b;
if($_index_b>=$_total_b):$hd["list"]["b"]["last"]=true;endif;?>

			<tr>
				<td><?php echo $b['bid'];?></td>
				<td><?php echo $b['brand_name'];?></td>
				<td><?php if($b['brand_logo']){?><img src="http://localhost/ecshop/<?php echo $b['brand_logo'];?>" class="w50 h50"><?php  }else{ ?>暂无图片<?php }?></td>
				<td><?php echo $b['brand_order'];?></td>
				<td>
					<a href="<?php echo U('edit',array('bid'=>$b['bid']));?>">编辑</a> |
					<a href="<?php echo U('del',array('bid'=>$b['bid']));?>">删除</a>
				</td>
			</tr>
		<?php $hd["list"]["b"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
		</tbody>
	</table>
</div>
</body>
</html>