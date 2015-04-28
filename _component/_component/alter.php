<?php //SECURITY CHECK SUITE

//VERIFY USER

	require(dirname(__FILE__).'/'."../_login/identity.php");
	
//PERMISSION CHECK

	$levelarr=[0,1,2,3,4,5,6];
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
	
?>

<?php
header("content-type:text/html;charset=utf-8");
require(dirname(__FILE__).'/'."../db_connect.php");
    //接收表单传递的用户名和密码
    $pfid=$_POST['pfid'];
	$pfsbdate=$_POST['scheduled'];
    $pfeditor=$_POST['editor'];
    $pfcutter=$_POST['cutter'];
	$pfanchor=$_POST['anchor'];
	$pftopic=$_POST['topic'];
	$pfscript=$_POST['script'];


if(!preg_match("/^([0-9]{3}[1-9]|[0-9]{2}[1-9][0-9]{1}|[0-9]{1}[1-9][0-9]{2}|[1-9][0-9]{3})-(((0[13578]|1[02])-(0[1-9]|[12][0-9]|3[01]))|((0[469]|11)-(0[1-9]|[12][0-9]|30))|(02-(0[1-9]|[1][0-9]|2[0-8])))$/s",$pfsbdate)){
die("
	<script language=\"javascript\">
	alert('日期输入不正确！正确格式：2015-01-01');
	location.href = 'javascript:history.go(-1)';
	</script>
	");
}

/*
if(!preg_match("/^\d$/s",$pfeditor)){
die("
	<script language=\"javascript\">
	alert('编辑是谁？');
	location.href = 'javascript:history.go(-1)';
	</script>
	");
}

if(!preg_match("/^\d$/s",$pfcutter)){
die("
	<script language=\"javascript\">
	alert('剪辑是谁？');
	location.href = 'javascript:history.go(-1)';
	</script>
	");
}


if(!preg_match("/^\d$/s",$pfanchor)){
die("
	<script language=\"javascript\">
	alert('主播是谁？');
	location.href = 'javascript:history.go(-1)';
	</script>
	");
}
if(!preg_match("/^\d$/s",$pftopic)){
die("
	<script language=\"javascript\">
	alert('没有主题？');
	location.href = 'javascript:history.go(-1)';
	</script>
	");
}
if(!preg_match("/^\d$/s",$pfscript)){
die("
	<script language=\"javascript\">
	alert('没有脚本？');
	location.href = 'javascript:history.go(-1)';
	</script>
}
*/


	$sqlmodify="update programming set pfsbdate='{$pfsbdate}', pfeditor='{$pfeditor}', pfcutter='{$pfcutter}', pfanchor='{$pfanchor}', pftopic='{$pftopic}', pfscript='{$pfscript}' where pfid='{$pfid}'";
	//添加用户信息到数据库
	mysql_query($sqlmodify);
    //释放连接资源
	mysql_close($db_connect);
	
	echo "
	<script language=\"javascript\">
	alert('已修改');
	location.href = 'javascript:history.go(-2);'
	</script>
	";	
?>
	");