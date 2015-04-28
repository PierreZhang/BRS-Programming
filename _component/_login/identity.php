<?php
header("content-type:text/html;charset=utf-8");
require(dirname(__FILE__).'/'."../db_connect.php");

$user=$_COOKIE["brs-user"];
$pass=$_COOKIE["brs-password"];
$id=$_COOKIE["brs-id"];
$group=$_COOKIE["brs-level"];
$identitysql = "SELECT * FROM users where uid='{$id}' and ugroup='{$group}' and uname='{$user}' and upass='{$pass}'";
$identityquery = mysql_query($identitysql);
$identityresult = mysql_fetch_array($identityquery);


if($identityresult){;}
else{
echo "
	<script language=\"javascript\">
	//alert('验证失败，请重新登陆！');
	location.href = '../../logout.php'
	</script>
	";
	mysql_close($db_connect);
}
?>
