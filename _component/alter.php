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
$pfid=0;
$pfid=$_GET['pfid'];
if($pfid==0){
	die("ERROR: no variable got.");
}

echo "<center><h1>修改审批单 NO.".$pfid."</h1></center>";

header("content-type:text/html;charset=utf-8");
require(dirname(__FILE__).'/'."db_connect.php");
$sql1="select * from programming where pfid='{$pfid}'";
$query1=mysql_query($sql1,$db_connect);   
$result1=mysql_fetch_array($query1); 

	$unm = "SELECT * FROM users where uid='".$result1[pfuname]."'";
	$unmquery = mysql_query($unm, $db_connect);	
	$unmresult = mysql_fetch_array($unmquery);

if($_COOKIE["brs-level"]!=1)
{
if($result1['pfuname']!=$_COOKIE["brs-id"])
{
	
	echo "
	<script language=\"javascript\">
	alert('没有被授权执行。');
	location.href = 'javascript:history.go(-1);'
	</script>
	";
}
}
	
echo "<form method=\"post\" action=\"_component/alter.php\" name=\"submit\">";
echo "<input type=\"text\" name=\"pfid\" size=\"1\" value=\"".$pfid."\" hidden=\"hidden\">";
echo "<table id=\"submit\">";
echo "<tr class=\"grey\">";
echo "<td>提交人";	

echo "<input type=\"text\" name=\"submitter\" size=\"8\" disabled=\"disabled\" value=\"".$unmresult[uname]."\">";
?>
</td>
<td>节目组 
<?php
header("content-type:text/html;charset=utf-8");
require(dirname(__FILE__).'/'."db_connect.php");
$sql2="select * from programs where pid='{$result1['pfpname']}'";
$query2=mysql_query($sql2,$db_connect);   
$result2=mysql_fetch_array($query2); 
echo "<input type=\"text\" name=\"program\" size=\"8\" disabled=\"disabled\" value=\"".$result2['pname']."\">";
?>
</td>
<td>计划播出 
<?php
header("content-type:text/html;charset=utf-8");
require(dirname(__FILE__).'/'."db_connect.php");
echo "<input type=\"text\" name=\"scheduled\" tabindex=\"1\" size=\"8\" value=\"".$result1['pfsbdate']."\"";
if($result1.[pfcheckpass]=='1')
{echo "disabled=\"disabled\">";}
else {echo ">";}

?>
</td>
</tr>
<tr>
<td>本期编辑 
<?php
header("content-type:text/html;charset=utf-8");
require(dirname(__FILE__).'/'."db_connect.php");
echo "<input type=\"text\" name=\"editor\" tabindex=\"2\" size=\"8\" value=\"".$result1['pfeditor']."\">";
?>
</td>
<td>本期制作 
<?php
header("content-type:text/html;charset=utf-8");
require(dirname(__FILE__).'/'."db_connect.php");
echo "<input type=\"text\" name=\"cutter\" tabindex=\"3\" size=\"8\" value=\"".$result1['pfcutter']."\">";
?>
</td>
<td>本期主播
<?php
header("content-type:text/html;charset=utf-8");
require(dirname(__FILE__).'/'."db_connect.php");
echo "<input type=\"text\" name=\"anchor\" tabindex=\"4\" size=\"8\" value=\"".$result1['pfanchor']."\">";
?>
</td>
</tr>

<tr class="grey">
<td colspan="3">本期主题 
<?php
header("content-type:text/html;charset=utf-8");
require(dirname(__FILE__).'/'."db_connect.php");
echo "<input type=\"text\" name=\"topic\" tabindex=\"5\" size=\"8\" value=\"".$result1['pftopic']."\">";
?>
</td>
</tr>
<tr>
<td colspan="3" valign="top">脚本 
<?php
header("content-type:text/html;charset=utf-8");
require(dirname(__FILE__).'/'."db_connect.php");
echo "<textarea name=\"script\" tabindex=\"6\" cols=\"90\" rows=\"20\">".$result1['pfscript']."</textarea>";
?>
</td>
</tr>
<tr>
		<td colspan="3" align="right"><button type="submit" tabindex="7">写好了，提交</button>
</td>
	</tr>


</table>
</form>
</body>
</html>