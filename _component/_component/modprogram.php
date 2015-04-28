<?php //SECURITY CHECK SUITE

//VERIFY USER

	require(dirname(__FILE__).'/'."../_login/identity.php");
	
//PERMISSION CHECK

	$levelarr=[0,1];
	if(in_array($_COOKIE["brs-level"],$levelarr))
		require(dirname(__FILE__).'/'."../db_connect.php");
	else{
		die('<link rel="stylesheet" type="text/css" href="/_component/default.css" >
			<table id="help">
				<tr>
					<td><a class="error">您没有被授权。</a></br>提示：请执行其他操作。</td>
				</tr>
			</table>');
	}
	
?><?php
header("content-type:text/html;charset=utf-8");
require(dirname(__FILE__).'/'."../../_component/db_connect.php");
    //接收表单传递的用户名和密码
    $pid=$_POST['id'];
	$pname=$_POST['name'];
    $priminder=$_POST['reminder'];

	$sqlmodify="update programs set pname='{$pname}',priminder='{$priminder}' where pid='{$pid}'";
	//添加用户信息到数据库
	mysql_query($sqlmodify);
    //释放连接资源
	mysql_close($db_connect);
	
	echo "
	<script language=\"javascript\">
	alert('已修改');
	location.href = 'javascript:history.go(-1);'
	</script>
	";	
?>