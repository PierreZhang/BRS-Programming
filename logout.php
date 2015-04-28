<?php
header("content-type:text/html;charset=utf-8");
setcookie("brs-user", '==XXXerasedXXX==');
setcookie("brs-id", '==XXXerasedXXX==');
setcookie("brs-password", '==XXXerasedXXX==');
setcookie("brs-level", '-1');
	echo "
	<script language=\"javascript\">
	location.href = '_component/login.php' </script>";
?>