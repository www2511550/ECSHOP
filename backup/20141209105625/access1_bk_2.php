<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."access1 (`aid`,`rid`,`module`,`controller`,`action`)
						VALUES('22','1','Admin','Brand','add')");
$db->exe("REPLACE INTO ".$db_prefix."access1 (`aid`,`rid`,`module`,`controller`,`action`)
						VALUES('23','1','Admin','Goods','add')");
$db->exe("REPLACE INTO ".$db_prefix."access1 (`aid`,`rid`,`module`,`controller`,`action`)
						VALUES('24','1','Admin','Index','index')");
