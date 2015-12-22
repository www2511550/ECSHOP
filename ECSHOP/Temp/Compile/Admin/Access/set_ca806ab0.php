<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>权限设置</title>
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
URL = 'http://localhost/ecshop/index.php/Admin/Access/set';
APP = 'http://localhost/ecshop/ECSHOP';
COMMON = 'http://localhost/ecshop/ECSHOP/Common';
HDPHP = 'http://localhost/ecshop/hdphp/hdphp';
HDPHPDATA = 'http://localhost/ecshop/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/ecshop/hdphp/hdphp/Extend';
MODULE = 'http://localhost/ecshop/index.php/Admin';
CONTROLLER = 'http://localhost/ecshop/index.php/Admin/Access';
ACTION = 'http://localhost/ecshop/index.php/Admin/Access/set';
STATIC = 'http://localhost/ecshop/Static';
HDPHPTPL = 'http://localhost/ecshop/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/ecshop/ECSHOP/Admin/View';
PUBLIC = 'http://localhost/ecshop/ECSHOP/Admin/View/Public';
CONTROLLERVIEW = 'http://localhost/ecshop/ECSHOP/Admin/View/Access';
HISTORY = 'http://localhost/ecshop/index.php/Admin/Index/index';
</script>
</head>
<body>
<div class="wrap">
	<div class="title-header">权限设置</div>
<form method="post">
	<input type="hidden" name='rid' value="<?php echo $_SESSION['rid'];?>">
	<table class="table2 hd-form">
	<?php $hd["list"]["n"]["total"]=0;if(isset($node) && !empty($node)):$_id_n=0;$_index_n=0;$lastn=min(1000,count($node));
$hd["list"]["n"]["first"]=true;
$hd["list"]["n"]["last"]=false;
$_total_n=ceil($lastn/1);$hd["list"]["n"]["total"]=$_total_n;
$_data_n = array_slice($node,0,$lastn);
if(count($_data_n)==0):echo "";
else:
foreach($_data_n as $key=>$n):
if(($_id_n)%1==0):$_id_n++;else:$_id_n++;continue;endif;
$hd["list"]["n"]["index"]=++$_index_n;
if($_index_n>=$_total_n):$hd["list"]["n"]["last"]=true;endif;?>

		<tr>
			<td><input type="checkbox" name='access[]' value="<?php echo $n['nid'];?>" <?php if($n['rid']==$rid){?>checked=''<?php }?>
			> <?php echo $n['title'];?></td>
		</tr>
		<?php $hd["list"]["nd"]["total"]=0;if(isset($n['_data']) && !empty($n['_data'])):$_id_nd=0;$_index_nd=0;$lastnd=min(1000,count($n['_data']));
$hd["list"]["nd"]["first"]=true;
$hd["list"]["nd"]["last"]=false;
$_total_nd=ceil($lastnd/1);$hd["list"]["nd"]["total"]=$_total_nd;
$_data_nd = array_slice($n['_data'],0,$lastnd);
if(count($_data_nd)==0):echo "";
else:
foreach($_data_nd as $key=>$nd):
if(($_id_nd)%1==0):$_id_nd++;else:$_id_nd++;continue;endif;
$hd["list"]["nd"]["index"]=++$_index_nd;
if($_index_nd>=$_total_nd):$hd["list"]["nd"]["last"]=true;endif;?>

		<tr>
			<td><input type="checkbox" name='access[]' value="<?php echo $nd['nid'];?>" <?php if($nd['rid']==$rid){?>checked=''<?php }?>
			> <?php echo $nd['title'];?></td>
		</tr>
		<tr>
			<td>
				<ul  style="margin-left:15px;">
				<?php $hd["list"]["nd2"]["total"]=0;if(isset($nd['_data']) && !empty($nd['_data'])):$_id_nd2=0;$_index_nd2=0;$lastnd2=min(1000,count($nd['_data']));
$hd["list"]["nd2"]["first"]=true;
$hd["list"]["nd2"]["last"]=false;
$_total_nd2=ceil($lastnd2/1);$hd["list"]["nd2"]["total"]=$_total_nd2;
$_data_nd2 = array_slice($nd['_data'],0,$lastnd2);
if(count($_data_nd2)==0):echo "";
else:
foreach($_data_nd2 as $key=>$nd2):
if(($_id_nd2)%1==0):$_id_nd2++;else:$_id_nd2++;continue;endif;
$hd["list"]["nd2"]["index"]=++$_index_nd2;
if($_index_nd2>=$_total_nd2):$hd["list"]["nd2"]["last"]=true;endif;?>

					<li style="margin-right:10px;float:left">
						<input type="checkbox" name='access[]' value="<?php echo $nd2['nid'];?>" <?php if($nd2['rid']==$rid){?>checked=''<?php }?> 
						> <?php echo $nd2['title'];?>
					</li>
				<?php $hd["list"]["n"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
				</ul>
			</td>
		</tr>
		<?php $hd["list"]["nd"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
	<?php $hd["list"]["nd2"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
		<tr>
			<td><input type="submit" value="确认" class="hd-success"></td>
		</tr>
	</table>
</form>
</div>
</body>
</html>