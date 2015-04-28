<?php
header("content-type:text/html;charset=utf-8");
require(dirname(__FILE__).'/'."db_connect.php");
    //接收表单传递的用户名和密码
	
    $cname=$_POST['name'];
    $comment=$_POST['comment'];
	$ctime=date('Y-m-d H:i:s');
	//通过php进行insert操作
	$sqlinsert="insert into comments values(NULL,'{$cname}','{$ctime}','{$comment}')";
	//添加用户信息到数据库
	mysql_query($sqlinsert);
    //释放连接资源
	
	echo "
	<script language=\"javascript\">
	alert('感谢您的支持！');
	location.href = 'javascript:history.go(-1);'
	</script>
	";
	
?>