<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."goods_type (`cat_id`,`cat_name`)
						VALUES('1','手机 ')");
$db->exe("REPLACE INTO ".$db_prefix."goods_type (`cat_id`,`cat_name`)
						VALUES('2','平板电脑 ')");
$db->exe("REPLACE INTO ".$db_prefix."goods_type (`cat_id`,`cat_name`)
						VALUES('3','宽带网络 ')");
$db->exe("REPLACE INTO ".$db_prefix."goods_type (`cat_id`,`cat_name`)
						VALUES('4','必备配件 ')");
$db->exe("REPLACE INTO ".$db_prefix."goods_type (`cat_id`,`cat_name`)
						VALUES('5','基础配件 ')");
$db->exe("REPLACE INTO ".$db_prefix."goods_type (`cat_id`,`cat_name`)
						VALUES('6','潮流配件 ')");
$db->exe("REPLACE INTO ".$db_prefix."goods_type (`cat_id`,`cat_name`)
						VALUES('7','应用市场 ')");
