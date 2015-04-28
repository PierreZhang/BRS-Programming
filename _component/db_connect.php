<?php 
require(dirname(__FILE__).'/'."../_component/config.php");
$db_connect=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
if (!$db_connect){
	die('<br/>WARNING: Could not access database, please contact administrator to solve this problem. Till then, you cant make any move.');
	}
mysql_select_db(DB_NAME, $db_connect);
mysql_query("set names utf8");
?>