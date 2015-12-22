<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>商品展示</title>
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
URL = 'http://localhost/ecshop/index.php/Admin/GoodsType/index';
APP = 'http://localhost/ecshop/ECSHOP';
COMMON = 'http://localhost/ecshop/ECSHOP/Common';
HDPHP = 'http://localhost/ecshop/hdphp/hdphp';
HDPHPDATA = 'http://localhost/ecshop/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/ecshop/hdphp/hdphp/Extend';
MODULE = 'http://localhost/ecshop/index.php/Admin';
CONTROLLER = 'http://localhost/ecshop/index.php/Admin/GoodsType';
ACTION = 'http://localhost/ecshop/index.php/Admin/GoodsType/index';
STATIC = 'http://localhost/ecshop/Static';
HDPHPTPL = 'http://localhost/ecshop/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/ecshop/ECSHOP/Admin/View';
PUBLIC = 'http://localhost/ecshop/ECSHOP/Admin/View/Public';
CONTROLLERVIEW = 'http://localhost/ecshop/ECSHOP/Admin/View/GoodsType';
HISTORY = 'http://localhost/ecshop/index.php/Admin/Index/index';
</script>
</head>
<body>
<div class="warp">
	<div class="menu_list">
		<ul>
			<li><a href="<?php echo U('GoodsType/add');?>">添加类型</a></li>
		</ul>
		<ul>
			<li><a href="<?php echo U('updateCache');?>">更新缓存</a></li>
		</ul>
	</div>
	<table class="table2">
		<thead>
			<td>ID</td>
			<td>商品名称</td>
			<td class="w100">操作</td>
		</thead>
		<tbody>
		<?php $hd["list"]["g"]["total"]=0;if(isset($goodsType) && !empty($goodsType)):$_id_g=0;$_index_g=0;$lastg=min(1000,count($goodsType));
$hd["list"]["g"]["first"]=true;
$hd["list"]["g"]["last"]=false;
$_total_g=ceil($lastg/1);$hd["list"]["g"]["total"]=$_total_g;
$_data_g = array_slice($goodsType,0,$lastg);
if(count($_data_g)==0):echo "";
else:
foreach($_data_g as $key=>$g):
if(($_id_g)%1==0):$_id_g++;else:$_id_g++;continue;endif;
$hd["list"]["g"]["index"]=++$_index_g;
if($_index_g>=$_total_g):$hd["list"]["g"]["last"]=true;endif;?>

			<tr>
				<td><?php echo $g['cat_id'];?></td>
				<td><?php echo $g['cat_name'];?></td>
				<td>
					<a href="<?php echo U('attribute/index',array('cat_id'=>$g['cat_id']));?>">属性</a> |
					<a href="<?php echo U('edit',array('cat_id'=>$g['cat_id']));?>">编辑</a> |
					<a href="<?php echo U('del',array('cat_id'=>$g['cat_id']));?>">删除</a>
				</td>
			</tr>
		<?php $hd["list"]["g"]["first"]=false;
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