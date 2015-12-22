<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."access (`rid`,`nid`)
						VALUES('3','1')");
$db->exe("REPLACE INTO ".$db_prefix."access (`rid`,`nid`)
						VALUES('3','4')");
$db->exe("REPLACE INTO ".$db_prefix."access (`rid`,`nid`)
						VALUES('3','5')");
$db->exe("REPLACE INTO ".$db_prefix."access (`rid`,`nid`)
						VALUES('1','1')");
$db->exe("REPLACE INTO ".$db_prefix."access (`rid`,`nid`)
						VALUES('1','2')");
$db->exe("REPLACE INTO ".$db_prefix."access (`rid`,`nid`)
						VALUES('1','3')");
$db->exe("REPLACE INTO ".$db_prefix."access (`rid`,`nid`)
						VALUES('1','4')");
$db->exe("REPLACE INTO ".$db_prefix."access (`rid`,`nid`)
						VALUES('1','5')");
