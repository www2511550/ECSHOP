<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES('1','选择制式','1','','0','1')");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES('2','选择颜色','1','','0','1')");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES('3','屏幕尺寸','0','','0','1')");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES('4','屏幕分辨率','0','a:3:{i:0;s:9:\"1280X720\";i:1;s:10:\"1920X1080\";i:2;s:9:\"1920X1200\";}','1','1')");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES('5','选择颜色','1','','0','2')");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES('6','选择制式','1','','0','2')");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES('7','选择内存','1','','0','2')");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES('8','选择颜色','1','','0','3')");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES('9','内存容量','0','','0','3')");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES('10','选择颜色','1','','0','4')");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES('11','选择颜色','1','','0','5')");
$db->exe("REPLACE INTO ".$db_prefix."attribute (`attr_id`,`attr_name`,`attr_type`,`attr_value`,`attr_input_type`,`cat_id`)
						VALUES('12','选择颜色','1','','0','6')");
