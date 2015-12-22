<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>货品</title>
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
URL = 'http://localhost/ecshop/index.php/Admin/Product/manage/goods_id/27';
APP = 'http://localhost/ecshop/ECSHOP';
COMMON = 'http://localhost/ecshop/ECSHOP/Common';
HDPHP = 'http://localhost/ecshop/hdphp/hdphp';
HDPHPDATA = 'http://localhost/ecshop/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/ecshop/hdphp/hdphp/Extend';
MODULE = 'http://localhost/ecshop/index.php/Admin';
CONTROLLER = 'http://localhost/ecshop/index.php/Admin/Product';
ACTION = 'http://localhost/ecshop/index.php/Admin/Product/manage';
STATIC = 'http://localhost/ecshop/Static';
HDPHPTPL = 'http://localhost/ecshop/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/ecshop/ECSHOP/Admin/View';
PUBLIC = 'http://localhost/ecshop/ECSHOP/Admin/View/Public';
CONTROLLERVIEW = 'http://localhost/ecshop/ECSHOP/Admin/View/Product';
HISTORY = 'http://localhost/ecshop/index.php/Admin/Goods/index/page/2';
</script>
    <script type="text/javascript" src="http://localhost/ecshop/ECSHOP/Admin/View/Product/Js/js.js"></script>
</head>
<body>
<div class='menu_list'>
    <ul>
        <li>
            <a href="#">货品管理</a>
        </li>
        <li>
            <a href="<?php echo U('Goods/index');?>">商品列表</a>
        </li>
    </ul>
</div>

<form action="" method="post">
    <input type="hidden" name="goods_gid" value="<?php echo $_GET['goods_id'];?>">
    <table class="table2 hd-form">
    	<thead>
            <tr>
            <?php $hd["list"]["a"]["total"]=0;if(isset($attr) && !empty($attr)):$_id_a=0;$_index_a=0;$lasta=min(1000,count($attr));
$hd["list"]["a"]["first"]=true;
$hd["list"]["a"]["last"]=false;
$_total_a=ceil($lasta/1);$hd["list"]["a"]["total"]=$_total_a;
$_data_a = array_slice($attr,0,$lasta);
if(count($_data_a)==0):echo "";
else:
foreach($_data_a as $key=>$a):
if(($_id_a)%1==0):$_id_a++;else:$_id_a++;continue;endif;
$hd["list"]["a"]["index"]=++$_index_a;
if($_index_a>=$_total_a):$hd["list"]["a"]["last"]=true;endif;?>

                 <td><?php echo $a[0]['attr_name'];?></td>
            <?php $hd["list"]["a"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                <td>货号</td>
                <td>库存数量</td>
                <td>操作</td>
            </tr>
        </thead>
        <tbody>
        <?php $hd["list"]["p"]["total"]=0;if(isset($product) && !empty($product)):$_id_p=0;$_index_p=0;$lastp=min(1000,count($product));
$hd["list"]["p"]["first"]=true;
$hd["list"]["p"]["last"]=false;
$_total_p=ceil($lastp/1);$hd["list"]["p"]["total"]=$_total_p;
$_data_p = array_slice($product,0,$lastp);
if(count($_data_p)==0):echo "";
else:
foreach($_data_p as $key=>$p):
if(($_id_p)%1==0):$_id_p++;else:$_id_p++;continue;endif;
$hd["list"]["p"]["index"]=++$_index_p;
if($_index_p>=$_total_p):$hd["list"]["p"]["last"]=true;endif;?>

            <tr>
            <?php $hd["list"]["pa"]["total"]=0;if(isset($p['attr_string']) && !empty($p['attr_string'])):$_id_pa=0;$_index_pa=0;$lastpa=min(1000,count($p['attr_string']));
$hd["list"]["pa"]["first"]=true;
$hd["list"]["pa"]["last"]=false;
$_total_pa=ceil($lastpa/1);$hd["list"]["pa"]["total"]=$_total_pa;
$_data_pa = array_slice($p['attr_string'],0,$lastpa);
if(count($_data_pa)==0):echo "";
else:
foreach($_data_pa as $key=>$pa):
if(($_id_pa)%1==0):$_id_pa++;else:$_id_pa++;continue;endif;
$hd["list"]["pa"]["index"]=++$_index_pa;
if($_index_pa>=$_total_pa):$hd["list"]["pa"]["last"]=true;endif;?>

                <td><?php echo $pa;?></td>
            <?php $hd["list"]["p"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                <td><?php echo $p['product_sn'];?></td>
                <td><?php echo $p['product_number'];?></td>
                <td><a href="<?php echo U('del',array('product_id'=>$p['product_id']));?>" onclick="return confirm('确定删除？')">删除</a></td>
            </tr>
        <?php $hd["list"]["pa"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
        	<tr>
            <?php $hd["list"]["a"]["total"]=0;if(isset($attr) && !empty($attr)):$_id_a=0;$_index_a=0;$lasta=min(1000,count($attr));
$hd["list"]["a"]["first"]=true;
$hd["list"]["a"]["last"]=false;
$_total_a=ceil($lasta/1);$hd["list"]["a"]["total"]=$_total_a;
$_data_a = array_slice($attr,0,$lasta);
if(count($_data_a)==0):echo "";
else:
foreach($_data_a as $key=>$a):
if(($_id_a)%1==0):$_id_a++;else:$_id_a++;continue;endif;
$hd["list"]["a"]["index"]=++$_index_a;
if($_index_a>=$_total_a):$hd["list"]["a"]["last"]=true;endif;?>
  
        		<td>
                    <select name="attr[<?php echo $a[0]['id'];?>][]">
                        <option value="0">**选择属性**</option>
                    <?php $hd["list"]["d"]["total"]=0;if(isset($a) && !empty($a)):$_id_d=0;$_index_d=0;$lastd=min(1000,count($a));
$hd["list"]["d"]["first"]=true;
$hd["list"]["d"]["last"]=false;
$_total_d=ceil($lastd/1);$hd["list"]["d"]["total"]=$_total_d;
$_data_d = array_slice($a,0,$lastd);
if(count($_data_d)==0):echo "";
else:
foreach($_data_d as $key=>$d):
if(($_id_d)%1==0):$_id_d++;else:$_id_d++;continue;endif;
$hd["list"]["d"]["index"]=++$_index_d;
if($_index_d>=$_total_d):$hd["list"]["d"]["last"]=true;endif;?>

                        <option value="<?php echo $d['id'];?>"><?php echo $d['attr_value'];?></option>
                    <?php $hd["list"]["a"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </select>      
                </td>
            <?php $hd["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                <td><input type="text" name="product_sn[]" value=""></td>
                <td><input type="text" name="product_number[]" value=""></td>
                <td><a href="javascript:;" onclick="addTr(this)">[+]</a></td>
        	</tr>
        </tbody>
    </table>	
    <input type="submit" class="hd-success" value="确定">
</form>
</body>
</html>