<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`title`,`name`,`value`,`type`,`info`,`isshow`,`orderlist`)
						VALUES('1','网站名称','WEBNAME','华为','text','','1','50')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`title`,`name`,`value`,`type`,`info`,`isshow`,`orderlist`)
						VALUES('2','关键字','KEYWORDS','后盾网','text','','1','50')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`title`,`name`,`value`,`type`,`info`,`isshow`,`orderlist`)
						VALUES('3','网站描述','DESCRIPTION','华为','textarea','','1','50')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`title`,`name`,`value`,`type`,`info`,`isshow`,`orderlist`)
						VALUES('4','网站开启','WEBSTATUS','0','radio','1|是，0|否','1','50')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`title`,`name`,`value`,`type`,`info`,`isshow`,`orderlist`)
						VALUES('5','开启伪静态','WEB_REWRITE','1','radio','1|开启，0|关闭','1','50')");
$db->exe("REPLACE INTO ".$db_prefix."config (`id`,`title`,`name`,`value`,`type`,`info`,`isshow`,`orderlist`)
						VALUES('6','关闭提示信息','WEB_CLOSE_MSG','网站维护中。。。','textarea','','1','50')");
