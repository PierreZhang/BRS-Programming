<?php //SECURITY CHECK SUITE

//VERIFY USER

	require(dirname(__FILE__).'/'."../_login/identity.php");
	
//PERMISSION CHECK

	$levelarr=[0,1,3];
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
require(dirname(__FILE__).'/'."../db_connect.php");

$pfid=0;
$pfid=$_GET['pfid'];
if($pfid==0){
	die("ERROR: no variable got.");
}

	
    //接收表单传递的用户名和密码
    $pfinspectperson=$_POST['pfinspectperson'];
	$pfinspectcomment=$_POST['pfinspectcomment'];
	$pfinspectdate=date('Y-m-d H:i:s');

	//通过php进行insert操作
	$sqlinsert="update programming SET pfinspectperson='{$pfinspectperson}',pfinspectdate='{$pfinspectdate}', pfinspectcomment='{$pfinspectcomment}' where pfid='{$pfid}'";
	
	//添加用户信息到数据库
	mysql_query($sqlinsert);
    //释放连接资源
	mysql_close($db_connect);
	
	echo "
	<script language=\"javascript\">
	alert('已添加');
	location.href = 'javascript:history.go(-2);'
	</script>
	";
	
?>
