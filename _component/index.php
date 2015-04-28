<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/_component/default.css" >
</head>

<body>

<?php //SECURITY CHECK SUITE


	
//PERMISSION CHECK

	$levelarr=[0,1,2,3,4,5,6];
	if(in_array($_COOKIE["brs-level"],$levelarr)){
		require(dirname(__FILE__).'/'."_login/identity.php");//VERIFY USER
		require(dirname(__FILE__).'/'."db_connect.php");
	}
	else{
		die('<link rel="stylesheet" type="text/css" href="default.css" >
			<table id="help">
				<tr>
					<td><a class="error">您没有被授权。</a></br>提示：请执行其他操作。</td>
				</tr>
			</table>');
	}
	
?>

<?php
require(dirname(__FILE__).'/'."indexcontent.txt");
?>


</body>
</html>