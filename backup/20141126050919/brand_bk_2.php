<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."brand (`bid`,`brand_name`,`brand_logo`,`brand_order`)
						VALUES('1','华为','','50')");
$db->exe("REPLACE INTO ".$db_prefix."brand (`bid`,`brand_name`,`brand_logo`,`brand_order`)
						VALUES('2','华为荣耀','','50')");
