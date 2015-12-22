<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加商品</title>
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
URL = 'http://localhost/ecshop/index.php/Admin/Goods/add';
APP = 'http://localhost/ecshop/ECSHOP';
COMMON = 'http://localhost/ecshop/ECSHOP/Common';
HDPHP = 'http://localhost/ecshop/hdphp/hdphp';
HDPHPDATA = 'http://localhost/ecshop/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/ecshop/hdphp/hdphp/Extend';
MODULE = 'http://localhost/ecshop/index.php/Admin';
CONTROLLER = 'http://localhost/ecshop/index.php/Admin/Goods';
ACTION = 'http://localhost/ecshop/index.php/Admin/Goods/add';
STATIC = 'http://localhost/ecshop/Static';
HDPHPTPL = 'http://localhost/ecshop/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/ecshop/ECSHOP/Admin/View';
PUBLIC = 'http://localhost/ecshop/ECSHOP/Admin/View/Public';
CONTROLLERVIEW = 'http://localhost/ecshop/ECSHOP/Admin/View/Goods';
HISTORY = 'http://localhost/ecshop/index.php/Admin/Goods/index';
</script>	
</head>
<body>
<div class="tab">
	<ul class="tab_menu">
		<li lab="base">
			<a> 基本设置 </a>
		</li>
		<li lab="other" class="action">
			<a>其他</a>
		</li>
		<li lab="detail">
			<a>详情</a>
		</li>
		<li lab="img">
			<a>图片列表</a>
		</li>
		<li lab="goods">
			<a>商品属性</a>
		</li>
	</ul>
<form action="" method="post" enctype="multipart/form-data">
	<div class="tab_content">
		<!-- 基本设置 -->
		 <div id="base">
			 <table class="table1 hd-form">
				<tr>
				 	<th class="w100">商品名称</th>
				 	<td>
				 		<input type="text" name="goods_name"/>
				 	</td>
				</tr>
				<tr>
				 	<th class="w100">商品标题</th>
				 	<td>
				 		<input type="text" name="goods_title"/>
				 	</td>
				</tr>
				<tr>
				 	<th class="w100">首页标题</th>
				 	<td>
				 		<input type="text" name="goods_index_title"/>
				 		<span color='#999'>首页标题与描述用"_"隔开</span>
				 	</td>
				</tr>
				<tr>
				 	<th class="w100">栏目</th>
					<td>
					 	<select name="category_cid" style="text-align:center">
					 		<option value="0">**选择栏目**</option>
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

					 		<option value="<?php echo $c['cid'];?>"><?php echo $c['_name'];?></option>
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
				 	<th class="w100">商品货号</th>
				 	<td>
				 		<input type="text" name="goods_sn"/>
				 	</td>
				</tr>
				<tr>
				 	<th class="w100">属性</th>
				 	<td>
				 		<label><input type="checkbox" name="is_new" value="1" />新品</label>
				 		<label><input type="checkbox" name="is_hot" value="1" />热销</label>
				 		<label><input type="checkbox" name="is_best" value="1" />精品</label>
				 		<label><input type="checkbox" name="is_index" value="1" />首页</label>
				 	</td>
				</tr>
				<tr>
				 	<th class="w100">图片</th>
				 	<td>
				 		<input type="file" name="original_img">
				 	</td>
				</tr>
				<tr>
				 	<th class="w100">状态</th>
				 	<td>
				 		<label><input type="radio" name="is_on_sale" value="1" checked="" />上架</label>
				 		<label><input type="radio" name="is_on_sale" value="0" />下架</label>
				 	</td>
				</tr>
				<tr>
				 	<th class="w100">商城价</th>
				 	<td>
				 		<input type="text" name="goods_price"/>
				 	</td>
				</tr>
				<tr>
				 	<th class="w100">市场价</th>
				 	<td>
				 		<input type="text" name="market_price"/>
				 	</td>
				</tr>
			</table>
		 </div>
		 <!-- 基本设置结束 -->
		 <!-- 其他 -->
		 <div id="other">
		 	<table class="table1 hd-form">
		 		<tr>
		 			<th class="w100">重量</th>
		 			<td>
		 				<input type="text" name="goods_weight">
		 				<select name="weight_unit">
		 					<option value="0">千克</option>
		 					<option value="1">克</option>
		 					<option value="2">市斤</option>
		 				</select>
		 			</td>
		 		</tr>
		 		<tr>
		 			<th class="w100">上架时间</th>
		 			<td>
		 				<input type="text" readonly="readonly" id="sale_time" name="sale_time"
						value="<?php echo date('Y/m/d h:i:s');?>" class="w150"/>
						<script>
						$('#sale_time').calendar({format: 'yyyy/MM/dd HH:mm:ss'});
						</script>
		 			</td>
		 		</tr>
		 		<tr>
		 			<th class="w100">品牌</th>
		 			<td>
		 				<select name="brand_bid" style="text-align:center">
		 					<option value="0">**选择品牌**</option>
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

		 					<option value="<?php echo $b['bid'];?>"><?php echo $b['brand_name'];?></option>
		 				<?php $hd["list"]["b"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
		 				</select>
		 			</td>
		 		</tr>
		 		<tr>
		 			<th class="w100">商品数量</th>
		 			<td>
		 				<input type="text" name="goods_number">
		 			</td>
		 		</tr>
		 		<tr>
		 			<th class="w100">查看</th>
		 			<td>
		 				<input type="text" name="goods_click">次
		 			</td>
		 		</tr>
		 	</table>
		 </div>
		 <!-- 其他结束 -->
		 <!-- 详情 -->
		 <div id="detail">
		 	<table class="table1 hd-form">
		 		<tr>
		 			<th class="w100">关键字</th>
		 			<td>
		 				<input type="text" name="goods_key">
		 			</td>
		 		</tr>
		 		<tr>
		 			<th class="w100">描述</th>
		 			<td>
		 				<textarea name="goods_desc" class="w200 h80"></textarea>
		 			</td>
		 		</tr>
		 		<tr>
		 			<th class="w100">详情</th>
		 			<td>
		 				<script type="text/javascript" charset="utf-8" src="http://localhost/ecshop/hdphp/hdphp/Extend/Org/Ueditor/ueditor.config.js"></script><script type="text/javascript" charset="utf-8" src="http://localhost/ecshop/hdphp/hdphp/Extend/Org/Ueditor/ueditor.all.min.js"></script><script type="text/javascript">UEDITOR_HOME_URL="http://localhost/ecshop/hdphp/hdphp/Extend/Org/Ueditor/"</script><script id="hd_goods_body" name="goods_body" type="text/plain"></script>
        <script type='text/javascript'>
        $(function(){
                var ue = UE.getEditor('hd_goods_body',{
                serverUrl:'http://localhost/ecshop/index.php?m=Admin&c=Goods&a=ueditor_upload&water='//图片上传脚本
                ,zIndex : 1000
                ,initialFrameWidth:"800" //宽度1000
                ,catchRemoteImageEnable:false//关闭远程图片自动保存到本地
                ,initialFrameHeight:"150" //宽度1000
                ,imagePath:''//图片修正地址
                ,autoHeightEnabled:false //是否自动长高,默认true
                ,autoFloatEnabled:false //是否保持toolbar的位置不动,默认true
                ,toolbars:[
            ['fullscreen', 'source', '|', 'undo', 'redo', '|',
            'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'removeformat', 'formatmatch', 'autotypeset',
            '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', '|',
            'lineheight', '|','paragraph', 'fontfamily', 'fontsize', '|',
             'indent','justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|',
            'link', 'unlink', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
            'insertimage', 'emotion',   'map',  'insertcode',  'pagebreak','horizontal', '|',
            'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow',  'insertcol',  'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols']
            ]//工具按钮
                ,enableAutoSave: false//关闭自动保存
                ,initialStyle:'p{line-height:1em; font-size: 14px; }'
            });
        })
        </script>
		 			</td>
		 		</tr>
		 	</table>
		 </div>
		 <!-- 详情结束 -->
		 <!-- 图片列表 -->
		 <div id="img">
		 	<table class="table1 hd-form">
		 		<tr class="detail_tr">
		 			<th class="w100">详情页图片</th>
		 			<td>
		 				<a href="javascript:;" class="detail_add">[+]</a>
		 				<input type="file" name="img_original[]">
		 			</td>
		 		</tr>
		 	</table>
		 </div>
		 <!-- 图片列表结束 -->
		 <!-- 商品属性 -->
		 <div id="goods">
		 	<table class="table1 hd-form">
		 		<tr>
		 			<th class="w100">商品类型</th>
		 			<td>
		 				<select name="goods_type" style="text-align:center" onchange="GoodsAttr();">
		 					<option value="0">**选择类型**</option>
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

		 					<option value="<?php echo $gt['cat_id'];?>"><?php echo $gt['cat_name'];?></option>
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
		 			<th>属性</th>
		 			<td>
		 				<div class="attr">
		 		
			 			</div>
		 			</td>
		 		</tr>
		 	</table>
		 	
		 </div>
		<style>
			span.title{display: inline-block;width: 120px;}
		</style>
		 <!-- 商品属性结束 --> 
	</div>
	<input type="submit" value="确认" class="hd-success">
</form>
<script type="text/javascript" src="http://localhost/ecshop/ECSHOP/Admin/View/Goods/Js/add.js"></script>
</div>

</body>
</html>