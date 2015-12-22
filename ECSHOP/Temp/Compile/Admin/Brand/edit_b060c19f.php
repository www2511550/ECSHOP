<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>编辑品牌</title>
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
URL = 'http://localhost/ecshop/index.php/Admin/Brand/edit/bid/1';
APP = 'http://localhost/ecshop/ECSHOP';
COMMON = 'http://localhost/ecshop/ECSHOP/Common';
HDPHP = 'http://localhost/ecshop/hdphp/hdphp';
HDPHPDATA = 'http://localhost/ecshop/hdphp/hdphp/Data';
HDPHPEXTEND = 'http://localhost/ecshop/hdphp/hdphp/Extend';
MODULE = 'http://localhost/ecshop/index.php/Admin';
CONTROLLER = 'http://localhost/ecshop/index.php/Admin/Brand';
ACTION = 'http://localhost/ecshop/index.php/Admin/Brand/edit';
STATIC = 'http://localhost/ecshop/Static';
HDPHPTPL = 'http://localhost/ecshop/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/ecshop/ECSHOP/Admin/View';
PUBLIC = 'http://localhost/ecshop/ECSHOP/Admin/View/Public';
CONTROLLERVIEW = 'http://localhost/ecshop/ECSHOP/Admin/View/Brand';
HISTORY = 'http://localhost/ecshop/index.php/Admin/Brand/index';
</script>	
</head>
<body>
<div class="wrap">
	<div class="title-header">商品编辑</div>
	<form action="" method="post">	
		<input type="hidden" name='bid' value="<?php echo $data['bid'];?>">
		<table class="table2 hd-form">
			<tr>
				<th class="w100">品牌名称</th>
				<td><input type="text" name="brand_name" value="<?php echo $data['brand_name'];?>"></td>
			</tr>
			<tr>
				<th class="w100">品牌logo</th>
				<td>
					<link rel="stylesheet" type="text/css" href="http://localhost/ecshop/hdphp/hdphp/Extend/Org/Uploadify/uploadify.css" />
            <script type="text/javascript" src="http://localhost/ecshop/hdphp/hdphp/Extend/Org/Uploadify/jquery.uploadify.min.js"></script>
            <script type="text/javascript">
            var HDPHP_CONTROL         = "http://localhost/ecshop/index.php?m=Admin&c=Brand&bid=1&a=hd_uploadify";
            var UPLOADIFY_URL    = "http://localhost/ecshop/hdphp/hdphp/Extend/Org/Uploadify/";
            var HDPHP_UPLOAD_THUMB    ="";
HDPHP_UPLOAD_TOTAL = 0</script>
            <script type="text/javascript" src="http://localhost/ecshop/hdphp/hdphp/Extend/Org/Uploadify/hd_uploadify.js"></script>
<script type="text/javascript">
    $(function() {
        hd_uploadify_options.removeTimeout  =0;//提示框消息时间
        hd_uploadify_options.fileSizeLimit  ="2MB";
        hd_uploadify_options.fileTypeExts   ="*.jpg;*.jpeg;*.png;*.gif";
        hd_uploadify_options.showalt        =0;
        hd_uploadify_options.uploadLimit    =1;
        hd_uploadify_options.input_type    ="input";
        hd_uploadify_options.elem_id    ="";
        hd_uploadify_options.success_msg    ="正在上传...";//上传成功提示文字
        hd_uploadify_options.formData ={type:"*.jpg;*.jpeg;*.png;*.gif",water : "0",fileSizeLimit:2097152, someOtherKey:1,PHPSESSID:"jj6pa7q39b39oq6j9ju23k6272",upload_dir:"",hdphp_upload_thumb:""};
        hd_uploadify_options.thumb_width =200;
        hd_uploadify_options.thumb_height          =150;
        hd_uploadify_options.uploadsSuccessNums = 0;
        $("#hd_uploadify_brand_logo").uploadify(hd_uploadify_options);
        });
</script>
<input type="file" name="up" id="hd_uploadify_brand_logo"/><div class="hd_uploadify_brand_logo_msg num_upload_msg"><span></span>单文件最大<strong>2MB，允许上传类型*.jpg;*.jpeg;*.png;*.gif</strong></div><div id="hd_uploadify_brand_logo_queue"></div>
        <div class="hd_uploadify_brand_logo_files uploadify_upload_files" input_file_id ="hd_uploadify_brand_logo">
            <ul><?php
            $_uploadImageData=$data['brand_logo'];
            $_uploadStr="";//编译文件需要的PHP字符串表示
            $upFileId=0;//第几张图片
            if(!empty($_uploadImageData)){
            //读取图片数据
            foreach ($_uploadImageData as $f) {
                //图片不存在
                if(empty($f["path"]) || !is_file($f["path"]))continue;
                $upFileId++;
                $url = 'http://localhost/ecshop/' . $f["path"];
        $_uploadStr.="<li><div class='delUploadFile'></div>";
        $_uploadStr.="<img src=" . $url . " path=" . $f["path"] . " width='200px' height='150px'/>";
        //显示图片alt
        if(isset($f["alt"])){
        $_uploadStr.="<div class='upload_title'>
<input type='text'  value='".$f["alt"]."' name='brand_logo[".$upFileId."][alt]'>
</div>";
        }
        //显示原图
                $_uploadStr.="<input t='file' type='hidden' name='brand_logo[".$upFileId."][path]' value='" . $f["path"] . "'/>";
                //缩略图
                if(isset($f["thumb"])){
                    foreach($f["thumb"] as $thumbFile){
                        $_uploadStr.="<input t='file' type='hidden' name='brand_logo[".$upFileId."][thumb][]' value='" . $thumbFile. "'/>";
                    }
                }
                $_uploadStr.="</li>";
            }
            }
        echo $_uploadStr;
        ;
        ?></ul>
            <div style="clear:both;"></div>
        </div>
				</td>
			</tr>
			<tr>
				<th class="w100">品牌序号</th>
				<td><input type="text" name="brand_order" value="<?php echo $data['brand_order'];?>"></td>
			</tr>
		</table>
		<input type="submit" class="hd-success" value="添加">
	</form>
</div>
</body>
</html>