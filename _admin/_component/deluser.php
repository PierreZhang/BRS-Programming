<?php //SECURITY CHECK SUITE

//VERIFY USER

	require(dirname(__FILE__).'/'."../../_component/_login/identity.php");
	
//PERMISSION CHECK

	if($_COOKIE["brs-level"]=='0' || $_COOKIE["brs-level"]=='1')
		require(dirname(__FILE__).'/'."../_component/db_connect.php");
	else{
		die('<link rel="stylesheet" type="text/css" href="/_component/default.css" >
			<table id="help">
				<tr>
					<td><a class="error">您没有被授权。</a></br>提示：请执行其他操作。</td>
				</tr>
			</table>');
	}
	
?>
	
?>
<?php
header("content-type:text/html;charset=utf-8");
require(dirname(__FILE__).'/'."../../_component/db_connect.php");
    //接收表单传递的用户名和密码
    $uid=$_POST['id'];
	//通过php进行delete操作
	$sqlinsert="delete from users where uid='{$uid}'";
	//添加用户信息到数据库
	mysql_query($sqlinsert);
    //释放连接资源
	mysql_close($conn);
	
	echo "
	<script language=\"javascript\">
	alert('已删除');
	location.href = 'javascript:history.go(-1);'
	</script>
	";
	
?>