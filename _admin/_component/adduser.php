<?php //SECURITY CHECK SUITE

//VERIFY USER

	require(dirname(__FILE__).'/'."../../_component/_login/identity.php");
	
//PERMISSION CHECK

	if($_COOKIE["brs-level"]=='0' || $_COOKIE["brs-level"]=='1')
		require(dirname(__FILE__).'/'."../../_component/db_connect.php");
	else{
		die('<link rel="stylesheet" type="text/css" href="/_component/default.css" >
			<table id="help">
				<tr>
					<td><a class="error">您没有被授权。</a></br>提示：请执行其他操作。</td>
				</tr>
			</table>');
	}
	
?>
<?php
	header("content-type:text/html;charset=utf-8");
	require(dirname(__FILE__).'/'."../../_component/db_connect.php");
    //接收表单传递的用户名和密码

    $uname=$_POST['username'];
    $upass=$_POST['password'];
    $ugroup=$_POST['group'];
	//通过php进行insert操作
	$sqlinsert="insert into users values(NULL,'{$uname}','{$ugroup}','{$upass}')";
	//添加用户信息到数据库
	mysql_query($sqlinsert);

	echo "
	<script language=\"javascript\">
	alert('已添加');
	location.href = 'javascript:history.go(-1);'
	</script>
	";
	
?>