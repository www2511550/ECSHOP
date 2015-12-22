<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加属性</title>
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
URL = 'http://localhost/ecshop/index.php/Admin/Attribute/add/cat_id/6';
APP = 'http://localhost/ecshop/ECSHOP';
COMMON = 'http://localhost/ecshop/ECSHOP/Common';
HDPHP = 'http://localhost/ecshop/hdphp/hdphp';
HDPHPDATA = 'http://localhost/ecshop/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/ecshop/hdphp/hdphp/Extend';
MODULE = 'http://localhost/ecshop/index.php/Admin';
CONTROLLER = 'http://localhost/ecshop/index.php/Admin/Attribute';
ACTION = 'http://localhost/ecshop/index.php/Admin/Attribute/add';
STATIC = 'http://localhost/ecshop/Static';
HDPHPTPL = 'http://localhost/ecshop/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/ecshop/ECSHOP/Admin/View';
PUBLIC = 'http://localhost/ecshop/ECSHOP/Admin/View/Public';
CONTROLLERVIEW = 'http://localhost/ecshop/ECSHOP/Admin/View/Attribute';
HISTORY = 'http://localhost/ecshop/index.php/Admin/Attribute/index&cat_id=6';
</script>	
</head>
<body>
<div class="wrap">
	<div class='menu_list'>
		<ul>
			<li>
				<a href="<?php echo U('index');?>">属性列表</a>
			</li>
		</ul>
	</div>
	<div class="title-header">添加属性</div>
	<form action="" method="post">	
		<table class="table2 hd-form">
			<tr>
				<th class="w100 h20">属性名称</th>
				<td><input type="text" name="attr_name"></td>
			</tr>
			<tr>
				<th class="w100">商品类型</th>
				<td>
					<select name="cat_id" class="w100 h20" style="text-align:center">
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
				</td>
			</tr>
			<tr>
				<th class="w100">属性类型</th>
				<td>
					<label><input type="radio" value="0" name="attr_type" checked="">普通属性</label>
					<label><input type="radio" value="1" name="attr_type">规格属性</label>
					<span style='color:#aaa'>普通属性只能录入值，规格属性可以设置价格比如颜色、尺码 </span>
				</td>
			</tr>
			<tr>
				<th class="w100">录入方式</th>
				<td>
					<label><input type="radio" value="0" name="attr_input_type" checked="">文本输入</label>
					<label><input type="radio" value="1" name="attr_input_type">下拉列表框</label>
					<label><input type="radio" value="2" name="attr_input_type">文本框</label>
					<span style='color:#aaa'>选择下拉列表框时必须输入默认值 </span>
				</td>
			</tr>
			<tr>
				<th class="w100">属性值</th>
				<td>
					<textarea name="attr_value" class="w200 h80" disabled=""></textarea>
					<span>一行输入一个值</span>
				</td>
			</tr>
		</table>
		<input type="submit" class="hd-success" value="添加">
	</form>
	<script type="text/javascript" src="http://localhost/ecshop/ECSHOP/Admin/View/Attribute/Js/js.js"></script>
</div>
</body>
</html>