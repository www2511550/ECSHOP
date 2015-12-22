<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>编辑栏目</title>
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
URL = 'http://localhost/ecshop/index.php/Admin/Category/edit/cid/1';
APP = 'http://localhost/ecshop/ECSHOP';
COMMON = 'http://localhost/ecshop/ECSHOP/Common';
HDPHP = 'http://localhost/ecshop/hdphp/hdphp';
HDPHPDATA = 'http://localhost/ecshop/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/ecshop/hdphp/hdphp/Extend';
MODULE = 'http://localhost/ecshop/index.php/Admin';
CONTROLLER = 'http://localhost/ecshop/index.php/Admin/Category';
ACTION = 'http://localhost/ecshop/index.php/Admin/Category/edit';
STATIC = 'http://localhost/ecshop/Static';
HDPHPTPL = 'http://localhost/ecshop/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/ecshop/ECSHOP/Admin/View';
PUBLIC = 'http://localhost/ecshop/ECSHOP/Admin/View/Public';
CONTROLLERVIEW = 'http://localhost/ecshop/ECSHOP/Admin/View/Category';
HISTORY = 'http://localhost/ecshop/index.php/Admin/Category/index';
</script>	
</head>
<body>
<div class="wrap">
	<div class="title-header">栏目编辑</div>
	<form action="" method="post">	
		<input type="hidden" name='cid' value="<?php echo $data['cid'];?>">
		<table class="table2 hd-form">
			<tr>
				<th class="w100">名称</th>
				<td><input type="text" name="cat_name" value="<?php echo $data['cat_name'];?>"></td>
			</tr>
			<tr>
				<th class="w100">父级</th>
				<td>
					<select name="pid">
						<option value="0" selected=''>顶级</option>
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

						<option value="<?php echo $c['cid'];?>" <?php if($c['cid']==$data['pid']){?>selected=''<?php }?>><?php echo $c['_name'];?></option>
					<?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
					</select>
				</td>
			</tr>
			<tr>
				<th class="w100">栏目类型</th>
				<td>
					<select name="cat_id">
						<option value="0">**选择栏目**</option>
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

						<option value="<?php echo $gt['cat_id'];?>" <?php if($gt['cat_id']==$data['cat_id']){?>selected=''<?php }?>><?php echo $gt['cat_name'];?></option>
					<?php $hd["list"]["gt"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
					</select>
				</td>
			</tr>
			<tr>
				<th class="w100">状态</th>
				<td>
					<label><input type="radio" name="is_show" value="1" <?php if($data['is_show']==1){?>checked=''<?php }?> >显示</label>
					<label><input type="radio" name="is_show" value="0" <?php if($data['is_show']==0){?>checked=''<?php }?> >隐藏</label>
				</td>
			</tr>
			<tr>
				<th class="w100">单位</th>
				<td><input type="text" name="measure_unit" value="<?php echo $data['measure_unit'];?>"></td>
			</tr>
			<tr>
				<th class="w100">价格区间</th>
				<td><input type="text" name="grade" value="<?php echo $data['grade'];?>"></td>
			</tr>
			<tr>
				<th class="w100">关键字</th>
				<td><input type="text" name="cat_key" value="<?php echo $data['cat_key'];?>"></td>
			</tr>
			<tr>
				<th class="w100">描述</th>
				<td><textarea name="cat_desc" class="w200 h80"><?php echo $data['cat_desc'];?></textarea></td>
			</tr>
		</table>
		<input type="submit" class="hd-success" value="确认">
	</form>
</div>
</body>
</html>