<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."product (`product_id`,`goods_attr`,`product_sn`,`product_number`,`goods_gid`)
						VALUES('1','1-3','2616','15615','9')");
$db->exe("REPLACE INTO ".$db_prefix."product (`product_id`,`goods_attr`,`product_sn`,`product_number`,`goods_gid`)
						VALUES('2','2-4','2616','15615','9')");
$db->exe("REPLACE INTO ".$db_prefix."product (`product_id`,`goods_attr`,`product_sn`,`product_number`,`goods_gid`)
						VALUES('3','9','96196','15','8')");
$db->exe("REPLACE INTO ".$db_prefix."product (`product_id`,`goods_attr`,`product_sn`,`product_number`,`goods_gid`)
						VALUES('4','10','96196','15','8')");
