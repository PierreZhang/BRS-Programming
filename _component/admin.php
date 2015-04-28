<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/_component/default.css" >
</head>

<body>
<?php //SECURITY CHECK SUITE

//VERIFY USER

	require(dirname(__FILE__).'/'."../_component/_login/identity.php");
	
//PERMISSION CHECK

	$levelarr=[0,1];
	if(in_array($_COOKIE["brs-level"],$levelarr))
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
<table>
<tr>
<td style="padding: 0.5cm 0cm 0cm 0.5cm">
<a href="/_admin/members.php" >
管理员功能1---->成员管理</a>
</td>
</tr>
<tr>
<td style="padding: 0cm 0cm 0cm 0.5cm">

<a href="../_admin/db_reset.php" onclick="return confirm('确定重置数据库吗？警告：这将造成无法恢复的损失。重置数据库无法逆转。')">管理员功能2---->重置数据库（只允许系统管理员操作）</a>

</td>
</tr>

</table>

</body>
</html>