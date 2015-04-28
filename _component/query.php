<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="/_component/default.css" >
</head>

<body>


<?php

$q_uid=-1;
$q_uid=$_GET['q_uid'];


require(dirname(__FILE__).'/'."../_component/db_connect.php");
if ($q_uid==0) {
	$prm = "SELECT * FROM programming where pfdate >= now() - interval 10 day order by pfsbdate asc";
	$prmquery = mysql_query($prm, $db_connect);
}

else if ($q_uid==-1) {
	$prm = "SELECT * FROM programming order by pfsbdate asc";
	$prmquery = mysql_query($prm, $db_connect);
}
else if ($q_uid<-1) {
	
	die("ERROR: variable invalid.");
}

else {
	$prm = "SELECT * FROM programming where pfuname='{$q_uid}' order by pfsbdate asc";
	$prmquery = mysql_query($prm, $db_connect);
}
	
echo "<center><h1>所有已经提交的审批单<div style=\"text-decoration:underline; font-weight:normal; display:inline\">（按照计划播出时间升序排列）</div></h1></center><table width=\"760\" cellpadding=\"0\" cellspacing=\"0\" id=\"defaulttable\">
	<thead>		
		<th>提交时间</td>	
		<!--<th>提交人</td>-->
		<th>节目组</td>
        <th>计划播出</td>
		<th>主题</td>
		<th colspan=\"2\" style=\"border-left:1px solid #fff;border-right:1px solid #fff\">功能</td>
		<th>总编室审查</td>
	</thead>";
$countnum=1;
while($row=mysql_fetch_array($prmquery)){//遍历SQL语句执行结果把值赋给数组

	$countnum++;
	echo "<tr>";
	echo "<td>".$row['pfdate']."</td>";
	/*echo "<td>";
	$unm = "SELECT * FROM users where uid='".$row[pfuname]."'";
	$unmquery = mysql_query($unm, $db_connect);	
	$unmresult = mysql_fetch_array($unmquery);
	echo $unmresult['uname']."</td>";*/
	echo "<td><a style=\"display:block;overflow:hidden;\">";
	$prg = "SELECT * FROM programs where pid='".$row[pfpname]."'";
	$prgquery = mysql_query($prg, $db_connect);	
	$prgresult = mysql_fetch_array($prgquery);
	echo $prgresult['pname']."</a></td>";
	echo "<td style=\"line-height:10px;font-size:14px;background-color:#DDD; color:#333; font-weight:900; letter-spacing:-1px; font-family:Courier New,  Arial, Helveticas, sans-serifs\">".$row['pfsbdate']."</td>";
	echo "<td><div style=\"display:block;overflow:hidden;width:130px\"><marquee  scrollamount=\"2\">".$row['pftopic']."</marquee></div></td>";
	echo "<td><a href=\"alter.php?pfid=".$row['pfid']."\">修改</a></td>";
	echo "<td><a href=\"display.php?pfid=".$row['pfid']."\">查看</a></td>";	

	$unm = "SELECT * FROM users where uid='".$row['pfcheckperson']."'";
	$unmquery = mysql_query($unm, $db_connect);	
	$unmresult = mysql_fetch_array($unmquery);
	
	if($row['pfcheckpass']==1){
		echo "<td style=\"background-color:#3B0;\">";
		echo "<div style=\"color:#fff;display:block;overflow:hidden;width:220px;\">";
		if($row['pfcheckcomment']) echo "<marquee scrollamount=\"2\">同意播送，最后审批".$unmresult['uname']."：".$row['pfcheckcomment']."。</marquee>";
		else echo "同意播送，最后审批".$unmresult['uname']."。";
	}
	else{
		echo "<td style=\"background-color:#C10;\">";
		echo "<div style=\"color:#fff;display:block;overflow:hidden;width:220px\">";
		if($row['pfcheckcomment']) echo "<marquee scrollamount=\"2\">未经通过，最后审批".$unmresult['uname']."：".$row['pfcheckcomment']."。</marquee>";
		else echo "未审批";
	}
		echo "</div></td>";

}
echo "</table>";
mysql_close($db_connect);
?>


</body>
</html>
