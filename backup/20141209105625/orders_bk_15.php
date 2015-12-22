<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."orders (`order_id`,`order_sn`,`user_id`,`consignee`,`address`,`amount`,`order_status`,`add_time`,`tel`,`order_note`,`goods_gid`,`is_fapiao`)
						VALUES('82','1418053469','9','程聪','北京市朝阳区小营路','370712','0','1418053469','13297011119','','1','1')");
$db->exe("REPLACE INTO ".$db_prefix."orders (`order_id`,`order_sn`,`user_id`,`consignee`,`address`,`amount`,`order_status`,`add_time`,`tel`,`order_note`,`goods_gid`,`is_fapiao`)
						VALUES('83','1418053677','13','cc','台湾省高雄市','370712','0','1418053677','123456789','','1','1')");
