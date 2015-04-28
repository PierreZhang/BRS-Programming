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
<table width="350">
<tr>
<td style="padding: 0.5cm 0cm 0cm 0.5cm">
<a href="cheif_check.php" >
台长功能1---->节目批复</a>
</td>
</tr>
<tr>
<td style="padding: 0.1cm 0cm 0cm 0.5cm">
<a href="programs.php">
台长功能2---->节目管理</a></td>
</tr>
<td style="padding: 0.1cm 0cm 0cm 0.5cm">
<a href="indexalter.php">
台长功能3---->台长公示（首页显示的内容）</a></td>
</tr>
</table>

</body>
</html>