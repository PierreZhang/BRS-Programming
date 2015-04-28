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

	$levelarr=[0,1,3];
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
$prm = "SELECT * FROM programming";
$prmquery = mysql_query($prm, $db_connect);



echo "<table width=\"760\" cellpadding=\"0\" cellspacing=\"0\" id=\"defaulttable\">
	<thead>
		<th width=\"30\">序号</td>
		<th width=\"30\">查看</td>
		<th width=\"40\">提交时间</td>		
		<th width=\"30\">提交人</td>
		<th>节目组</td>
        <th width=\"40\">计划播出时间</td>
		<th>主题</td>
		<th>总编室意见</td>
		<th>质量监督意见</td>
		<th>台长意见</td>
	</thead>";

while($row=mysql_fetch_array($prmquery)){//遍历SQL语句执行结果把值赋给数组
	echo "<tr>";
	echo "<td>".$row['pfid']."</td>";
	echo "<td><a href=\"display.php?pfid=".$row['pfid']."\">查看</a></td>";	
	echo "<td>".$row['pfdate']."</td>";
	echo "<td>";
	$unm = "SELECT * FROM users where uid='".$row[pfuname]."'";
	$unmquery = mysql_query($unm, $db_connect);	
	$unmresult = mysql_fetch_array($unmquery);
	echo $unmresult['uname']."</td>";
	echo "<td>";
	$prg = "SELECT * FROM programs where pid='".$row[pfpname]."'";
	$prgquery = mysql_query($prg, $db_connect);	
	$prgresult = mysql_fetch_array($prgquery);
	echo $prgresult['pname']."</td>";
	echo "<td>".$row['pfsbdate']."</td>";
	echo "<td>".$row['pftopic']."</td>";
	echo "<td>";
	$checkperson = "SELECT * FROM users where uid='".$row['pfcheckperson']."'";
	$checkpersonquery = mysql_query($checkperson, $db_connect);	
	$checkpersonresult = mysql_fetch_array($checkpersonquery);
	if ($row['pfcheckpass']==1 && $row['pfcheckcomment']){
	echo "<a>同意播送，".$checkpersonresult['uname']."：".$row['pfcheckcomment']."</a>";}
	else if ($row['pfcheckpass']==1 && !$row['pfcheckcomment']) {
	echo "<a>同意播送，".$checkpersonresult['uname']."。</a>";}
	else if ($row['pfcheckpass']==0){
	echo "<a>未经审批</a>";}
	echo "</td><td>";
	if ($row['pfinspectcomment']){
		$inspectperson = "SELECT * FROM users where uid=".$row['pfinspectperson'];
	$inspectpersonquery = mysql_query($inspectperson, $db_connect);	
	$inspectpersonresult = mysql_fetch_array($inspectpersonquery);
	echo "<a style=\"color:black\" href=\"quality_submit.php?pfid=".$row['pfid']."\">".$inspectpersonresult['uname']."：".$row['pfinspectcomment']."</a>";}
	else{echo "<a style=\"color:red\" href=\"quality_submit.php?pfid=".$row['pfid']."\">无反馈。</a>";}
	echo "<td>";
	if ($row['pfcheifcomment']){
	echo "<a style=\"color:black\">".$row['pfcheifcomment']."</a></td>";}
	else{echo "<a style=\"color:black\">无反馈。</a></td>";}
	}
echo "</table>";
mysql_close($db_connect);
?>

</form>
</body>
</html>