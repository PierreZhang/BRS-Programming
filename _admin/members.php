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

<?php //GET SOMETHING FROM MYSQL

require(dirname(__FILE__).'/'."../_component/db_connect.php");
$unsql = "SELECT * FROM USERS";
$unresult = mysql_query($unsql); 

?>

<table>
	<tr>
		<td width="265px" valign="top"><center><h1>所有用户</h1></center>
		<table width="265px" cellpadding="0" cellspacing="0" id="defaulttable">
			<thead>
				<th>id</th>
				<th>用户名</th>
				<th>隶属于用户组</th>
				<th>密码</th>
			</thead>
			<?php
				while($un=mysql_fetch_array($unresult)){
				echo "<tr><td>".$un[uid]."</td>";
				echo "<td>".$un[uname]."</td>";
				echo "<td>";
				switch ($un[ugroup]){
					case 0:
					echo "管理员";
					break;
					case 1:
					echo "台长";
					break;
					case 2:
					echo "总编室成员";
					break;
					case 3:
					echo "质量监督成员";
					break;
					case 4:
					echo "普通成员";
					break;
					default:
					echo "ERROR";
				}
				echo "</td>";
				echo "<td><input type=password disabled=disabled size=5 readonly=readonly value=".$un[upass]."></td></tr>";
				}
			?>
		</table>
		</td>
		<td width="450px" valign="top"><h1>添加用户</h1>
		<form method="post" action="_component/adduser.php" name="add">
		<table id="submit" width="450px">
			<tr class="grey">
				<td>用户名 <input type="text" name="username" tabindex="1" size="8"></center></td>
				<td>密码 <input type="password" name="password" tabindex="2" size="10"></center></td>
				<td>隶属于 
				<select name="group" tabindex="3">
					<option value="0">管理员</option>
					<option value="1">台长</option>
					<option value="2">总编室成员</option>
					<option value="3">质量监督</option>
					<option value="4" selected="selected">普通成员</option>
				</select>
				</td>
			</tr>
			<tr>
				<td colspan="3"><button type="submit" tabindex="4">注册</button>
				<button type="reset" tabindex="5">重置</button></td>
			</tr>
		</table>
		</form>

		<h1>修改已有用户资料（请务必填写完整）</h1>
		<form method="post" action="_component/moduser.php" name="modify">
		<table id="submit" width="450px">
			<tr class="grey">
				<td>用户名 <input type="text" name="username" tabindex="6" size="8"></td>
				<td>密码 <input type="password" name="password" tabindex="7" size="10"></td>
				<td>隶属于 
				<select name="group" tabindex="8">
					<option value="0">管理员</option>
					<option value="1">台长</option>
					<option value="2">总编室成员</option>
					<option value="3">质量监督</option>
					<option value="4" selected="selected">普通成员</option>
				</select>
				</td>
			</tr>
			<tr>
				<td colspan="3">ID <input type="text" name="id" tabindex="9" size="1">
				<button type="submit" tabindex="10">修改</button>
				<button type="reset" tabindex="11">重置</button></td>
				
			</tr>
		
		</table>
		</form>

		<h1>删除用户</h1>
		<form method="post" action="_component/deluser.php" name="delete">
		<table id="submit" width="450px">
			<tr class="grey">
				<td>ID <input type="text" name="id" tabindex="12" size="1"></td>
				<td><button type="submit" tabindex="15">提交</button></td>
			</tr>
		</table>
		</form>

		</td>
	</tr>
</table>

</body>
</html>