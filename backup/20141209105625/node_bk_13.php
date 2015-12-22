<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`name`,`title`,`pid`,`level`)
						VALUES('1','Admin','后台模块','0','1')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`name`,`title`,`pid`,`level`)
						VALUES('2','Brand','品牌控制器','1','2')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`name`,`title`,`pid`,`level`)
						VALUES('3','add','添加品牌','2','3')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`name`,`title`,`pid`,`level`)
						VALUES('4','Goods','商品控制器','1','2')");
$db->exe("REPLACE INTO ".$db_prefix."node (`nid`,`name`,`title`,`pid`,`level`)
						VALUES('5','edit','商品编辑','4','3')");
