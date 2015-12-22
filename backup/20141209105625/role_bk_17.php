<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."role (`rid`,`rname`)
						VALUES('1','管理员')");
$db->exe("REPLACE INTO ".$db_prefix."role (`rid`,`rname`)
						VALUES('3','编辑')");
