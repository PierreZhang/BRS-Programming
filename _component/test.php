<?php 
header("content-type:text/html;charset=utf-8");
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
