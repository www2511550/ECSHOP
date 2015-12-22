<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>商品属性</title>
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
URL = 'http://localhost/ecshop/index.php/Admin/Attribute/index/cat_id/1';
APP = 'http://localhost/ecshop/ECSHOP';
COMMON = 'http://localhost/ecshop/ECSHOP/Common';
HDPHP = 'http://localhost/ecshop/hdphp/hdphp';
HDPHPDATA = 'http://localhost/ecshop/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/ecshop/hdphp/hdphp/Extend';
MODULE = 'http://localhost/ecshop/index.php/Admin';
CONTROLLER = 'http://localhost/ecshop/index.php/Admin/Attribute';
ACTION = 'http://localhost/ecshop/index.php/Admin/Attribute/index';
STATIC = 'http://localhost/ecshop/Static';
HDPHPTPL = 'http://localhost/ecshop/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/ecshop/ECSHOP/Admin/View';
PUBLIC = 'http://localhost/ecshop/ECSHOP/Admin/View/Public';
CONTROLLERVIEW = 'http://localhost/ecshop/ECSHOP/Admin/View/Attribute';
HISTORY = 'http://localhost/ecshop/index.php/Admin/GoodsType/index';
</script>
</head>
<body>
<div class="warp">
	<div class="menu_list">
		<ul>
			<li><a href="<?php echo U('add',array('cat_id'=>Q('cat_id')));?>">添加属性</a></li>
		</ul>
		<ul>
			<li>
				<select name="cat_id" style="text-align:center" onchange="changeGoodsType(this)">
					<option value="">==商品类型==</option>
				<?php $hd["list"]["gt"]["total"]=0;if(isset($goods_type) && !empty($goods_type)):$_id_gt=0;$_index_gt=0;$lastgt=min(1000,count($goods_type));
$hd["list"]["gt"]["first"]=true;
$hd["list"]["gt"]["last"]=false;
$_total_gt=ceil($lastgt/1);$hd["list"]["gt"]["total"]=$_total_gt;
$_data_gt = array_slice($goods_type,0,$lastgt);
if(count($_data_gt)==0):echo "";
else:
foreach($_data_gt as $key=>$gt):
if(($_id_gt)%1==0):$_id_gt++;else:$_id_gt++;continue;endif;
$hd["list"]["gt"]["index"]=++$_index_gt;
if($_index_gt>=$_total_gt):$hd["list"]["gt"]["last"]=true;endif;?>

				  <option value="<?php echo $gt['cat_id'];?>" <?php if($gt['cat_id']==Q('cat_id')){?>selected=''<?php }?> >
				<?php echo $gt['cat_name'];?></option>
				<?php $hd["list"]["gt"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
				</select>
			</li>
		</ul>
		<script type="text/javascript" src="http://localhost/ecshop/ECSHOP/Admin/View/Attribute/Js/index.js"></script>
	</div>
	<table class="table2">
		<thead>
			<td>ID</td>
			<td>属性名称</td>
			<td>类型</td>
			<td>录入方式</td>
			<td>可选值列表</td>
			<td class="w100">操作</td>
		</thead>
		<tbody>
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

			<tr>
				<td><?php echo $d['attr_id'];?></td>
				<td><?php echo $d['attr_name'];?></td>
				<td><?php echo $d['attr_type_text'];?></td>
				<td><?php echo $d['attr_input_type_text'];?></td>
				<td><?php echo $d['attr_value'];?></td>
				<td>
					<a href="<?php echo U('edit',array('attr_id'=>$d['attr_id']));?>">编辑</a> |
					<a href="<?php echo U('del',array('attr_id'=>$d['attr_id']));?>">删除</a>
				</td>
			</tr>
		<?php $hd["list"]["d"]["first"]=false;
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