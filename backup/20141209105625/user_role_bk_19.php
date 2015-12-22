<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."user_role (`uid`,`rid`)
						VALUES('1','1')");
