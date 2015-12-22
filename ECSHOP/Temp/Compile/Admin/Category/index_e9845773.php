<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>栏目列表</title>
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
URL = 'http://localhost/ecshop/index.php/Admin/Category/index';
APP = 'http://localhost/ecshop/ECSHOP';
COMMON = 'http://localhost/ecshop/ECSHOP/Common';
HDPHP = 'http://localhost/ecshop/hdphp/hdphp';
HDPHPDATA = 'http://localhost/ecshop/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/ecshop/hdphp/hdphp/Extend';
MODULE = 'http://localhost/ecshop/index.php/Admin';
CONTROLLER = 'http://localhost/ecshop/index.php/Admin/Category';
ACTION = 'http://localhost/ecshop/index.php/Admin/Category/index';
STATIC = 'http://localhost/ecshop/Static';
HDPHPTPL = 'http://localhost/ecshop/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/ecshop/ECSHOP/Admin/View';
PUBLIC = 'http://localhost/ecshop/ECSHOP/Admin/View/Public';
CONTROLLERVIEW = 'http://localhost/ecshop/ECSHOP/Admin/View/Category';
HISTORY = 'http://localhost/ecshop/index.php/Admin/Index/index';
</script>
	<script type="text/javascript" src='http://localhost/ecshop/ECSHOP/Admin/View/Category/Js/js.js'></script>
</head>
<body>
<div class="warp">
	<div class="menu_list">
		<ul>
			<li><a href="<?php echo U('add');?>">添加栏目</a></li>
			<li><a href="<?php echo U('updateCache');?>">更新缓存</a></li>
			<li>
				<select name="pid" style="text-align:center;" onchange="changeCategory(this)">
					<option value="0">**选择栏目**</option>
				<?php $hd["list"]["c"]["total"]=0;if(isset($topCategory) && !empty($topCategory)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($topCategory));
$hd["list"]["c"]["first"]=true;
$hd["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$hd["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($topCategory,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$hd["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$hd["list"]["c"]["last"]=true;endif;?>

					<option value="<?php echo $c['cid'];?>" <?php if($c['cid']==Q('pid')){?>selected=''<?php }?>><?php echo $c['cat_name'];?></option>
				<?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
				</select>
			</li>
		</ul>
	</div>
	<table class="table2">
		<thead>
			<td class="w100">CID</td>
			<td>栏目名称</td>
			<td>显示</td>
			<td class="w100">操作</td>
		</thead>
		<tbody>
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

			<tr>
				<td><?php echo $c['cid'];?></td>
				<td><?php echo $c['_name'];?></td>
				<td><?php echo $c['is_show_text'];?></td>
				<td>
					<a href="<?php echo U('edit',array('cid'=>$c['cid']));?>">编辑</a> |
					<a href="<?php echo U('del',array('cid'=>$c['cid']));?>" onclick="return confirm('子栏目也将一起删除')">删除</a>
				</td>
			</tr>
		<?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
		</tbody>
	</table>
	<div class="page" style="text-align:right">
		<?php echo $page;?>
	</div>
	
</div>
</body>
</html>