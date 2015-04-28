<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../_component/default.css" >
</head>

<body>
<?php //PERMISSION CHECK

//VERIFY USER

	require(dirname(__FILE__).'/'."../_component/_login/identity.php");
	
//PERMISSION CHECK

$levelarr=[0,1,2,3,4,5,6];
	if(in_array($_COOKIE["brs-level"],$levelarr))
		require(dirname(__FILE__).'/'."../_component/db_connect.php");
	else{
		die('<link rel="stylesheet" type="text/css" href="../_component/default.css" >
			<table id="help">
				<tr>
					<td><a class="error">您没有被授权。</a></br>提示：请执行其他操作。</td>
				</tr>
			</table>');
	}
	
?>
<h1>修改个人密码</h1>
<form method="post" action="_component/usr_self_alter.php" name="modify">
<table id="submit" width="800px">
	<tr class="grey">
	<td>目前ID 
<?php
echo $_COOKIE["brs-id"];

?></td>
    	<td>用户名 <?php echo $_COOKIE["brs-user"];?></td>
		<td>授权级别 <?php echo $_COOKIE["brs-level"]."级";
						switch ($_COOKIE["brs-level"]){
					case 0:
					echo "（管理员）";
					break;
					case 1:
					echo "（台长）";
					break;
					case 2:
					echo "（总编室成员）";
					break;
					case 3:
					echo "（质量监督成员）";
					break;
					case 4:
					echo "（普通成员）";
					break;
					default:
					echo "ERROR";}?>
		
		
        <td>设置密码 <input type="password" name="password" tabindex="7" size="10" value="<?php echo $_COOKIE["brs-password"];?>"></td>
	</tr>
	<tr>
		<td colspan="4" align="right"><button type="submit" tabindex="10">修改</button>
        
</td>
        
	</tr>
	<tr>
		<td></td>
	</tr>
</table>
</form>

</body>
</html>