<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php 
require(dirname(__FILE__).'/'."config.php");
$db_root_connect=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
if (!$db_root_connect){
	die('<br/>WARNING: Could not access database, please contact administrator to solve this problem. Till then, you cant make any move.');
	}
mysql_select_db('programming', $db_root_connect);

mysql_query("set names utf8");
?>