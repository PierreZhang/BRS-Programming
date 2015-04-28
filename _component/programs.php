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

	$levelarr=[0,1,2,3,4,5,6];
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
<?php 
require(dirname(__FILE__).'/'."../_component/db_connect.php");
$sql = "SELECT * FROM programs";
$result = mysql_query($sql); 


echo "<table cellpadding=\"0\" cellspacing=\"0\" id=\"defaulttable\" width=\"760\">
	<thead>
		<th width=\"50\">节目组id</td>
		<th width=\"100\">节目组</td>
        <th width=\"610\">节目定位</td>
	</thead>";

while($row=mysql_fetch_array($result)){//遍历SQL语句执行结果把值赋给数组
	echo "<tr>";
	echo "<td>".$row[pid]."</td>";
	echo "<td>".$row[pname]."</td>";
	echo "<td>".$row[priminder]."</td>";
	echo "</tr>";
	}
echo "</table>";
mysql_close($db_connect);
?>

<br/><center>
<h1>添加节目组</h1>
</center>
<form method="post" action="_component/addprogram.php" name="add">
<table id="submit" width="760">
	<tr class="grey">
    	<td width="75">节目id </td>
		<td width="305"><input type="text" name="id" tabindex="1" size="8"></center></td>
		<td width="75">节目组 </td>
		<td width="305"><input type="text" name="name" tabindex="2" size="8"></center></td>
		</tr>
        <tr>
        <td valign="top">节目定位<br/>与提示</td>
		<td colspan="3"><textarea name="reminder" tabindex="3" cols="95" rows="5"></textarea></td>
	</tr>
	<tr>
		<td colspan="4" align="right"><button type="submit" tabindex="4">添加</button>
		<button type="reset" tabindex="5">重置</button></td>
	</tr>
</table>
</form>

<center>
<h1>修改已有节目组（请务必填写完整）</h1>
</center>
<form method="post" action="_component/modprogram.php" name="modify">
<table id="submit" width="760">
	<tr class="grey">
    	<td width="75">节目名称 </td><td>
    		<input type="text" name="name" tabindex="6" size="8"></td>
        </tr>
        <tr>
        <td valign="top">节目定位  </td><td><textarea name="reminder" tabindex="7" cols="95"></textarea></td>

	</tr>
	<tr>
		<td>ID <input type="text" name="id" tabindex="9" size="1"></td><td align="right">
        <button type="submit" tabindex="10">修改</button>
		<button type="reset" tabindex="11">重置</button></td>
        
	</tr>

</table>
</form>

<center>
<h1>删除节目组</h1>
</center>
<form method="post" action="_component/delprogram.php" name="delete">
<table id="submit" width="760">
	<tr class="grey">
		<td>ID <input type="text" name="id" tabindex="12" size="1"></td>
        <td align="right"><button type="submit" tabindex="15">提交</button></td>
   	</tr>
</table>
</form>

</body>
</html>