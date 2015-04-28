<?php
header("content-type:text/html;charset=utf-8");

$uid=$_GET['id'];
$uname=$_GET['username'];
$upass=$_GET['password'];
$level=$_GET['level'];

setcookie("brs-user", $uname, time()+3600, "/", "192.168.53.199");
setcookie("brs-id", $uid, time()+3600, "/", "192.168.53.199");
setcookie("brs-password", $upass, time()+3600, "/", "192.168.53.199");
setcookie("brs-level", $level, time()+3600, "/", "192.168.53.199");

echo "<script language=\"javascript\">
	location.href = '/_component/index.php'; </script>";
?>