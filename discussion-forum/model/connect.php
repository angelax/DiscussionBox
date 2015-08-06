<?php

include ('settings/config.php');

$CONN = mysql_connect(DB_HOST,DB_USER,DB_PASS);
if(!$CONN)
	die('could not connect to db');
	
$DB = mysql_select_db(DB_NAME,$CONN);
if(!$DB)
	die('could not select the db');

?>