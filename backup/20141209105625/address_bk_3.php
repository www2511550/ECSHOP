<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."address (`address_id`,`uid`,`address_order`,`address`,`address_tel`,`is_default`)
						VALUES('3','9','程聪','北京市朝阳区小营路','13297011119','1')");
$db->exe("REPLACE INTO ".$db_prefix."address (`address_id`,`uid`,`address_order`,`address`,`address_tel`,`is_default`)
						VALUES('4','9','cc','湖北省孝感市毛陈镇','15652121113','0')");
$db->exe("REPLACE INTO ".$db_prefix."address (`address_id`,`uid`,`address_order`,`address`,`address_tel`,`is_default`)
						VALUES('5','13','cc','台湾省高雄市','123456789','1')");
