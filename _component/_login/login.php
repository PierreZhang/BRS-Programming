<?php
header("content-type:text/html;charset=utf-8");
require(dirname(__FILE__).'/'."../db_connect.php");

	$upass=$_POST['password'];
	$uid=$_POST['id'];

	$sqllogin = "select * from users where upass='$upass' AND uid='$uid'";
	$loginquery = mysql_query($sqllogin,$db_connect);
	$loginresult = mysql_fetch_array($loginquery);
	$username123=$loginresult['uname'];
	$level123=$loginresult['ugroup'];
	
if(!$loginresult){
echo "
	<script language=\"javascript\">
	//alert('LOGIN FAILED');
	location.href = 'javascript:history.go(-1);'
	</script>
	";
}
else {
	echo "
	<script language=\"javascript\">
	location.href = '../../write_cookies.php?username=".$username123."&password=".$upass."&id=".$uid."&level=".$level123."'</script>";
}	
?>