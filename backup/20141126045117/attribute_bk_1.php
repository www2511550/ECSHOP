<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES('1','选择制式','1','a:8:{i:0;s:9:\"电信4G\";i:1;s:9:\"移动4G\";i:2;s:9:\"联通4G\";i:3;s:14:\"移动/联通\";i:4;s:10:\"全网通\";i:5;s:9:\"移动3G\";i:6;s:9:\"联通3G\";i:7;s:8:\"电信3G\";}','1','1')");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES('2','选择颜色','1','a:4:{i:0;s:7:\"黑色\";i:1;s:7:\"白色\";i:2;s:7:\"黑白\";i:3;s:9:\"月光银\";}','1','1')");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES('3','屏幕尺寸','0','','0','1')");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES('4','屏幕分辨率','0','','0','1')");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES('5','运行内存','0','a:3:{i:0;s:4:\"1GB\";i:1;s:4:\"2GB\";i:2;s:3:\"3GB\";}','1','1')");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES('6','机身内存','0','a:5:{i:0;s:3:\"4G\";i:1;s:3:\"8G\";i:2;s:4:\"16G\";i:3;s:4:\"32G\";i:4;s:3:\"64G\";}','1','1')");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES('8','选择颜色','1','a:2:{i:0;s:7:\"黑色\";i:1;s:6:\"白色\";}','1','3')");
