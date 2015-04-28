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
?>

<table id="submit" width="760">
<tr>
<td colspan="6">
<a href='javascript:history.go(-1)'> <<后退</a>
</td>
</tr>
<tr>
<td colspan="6">
<center><h1>节目信息一览</h1></center>
</td>
</tr>
<tr class="grey">
<td width="125">提交人 </td>
<td width="125">
<?php
require(dirname(__FILE__).'/'."db_connect.php");
	$prg="select * from programming where pfid='".$pfid."'";   
    $prgquery=mysql_query($prg, $db_connect);   
    $prgresult=mysql_fetch_array($prgquery); 
	$prgu="select * from users where uid='".$prgresult['pfuname']."'";   
    $prguquery=mysql_query($prgu, $db_connect);   
    $prguresult=mysql_fetch_array($prguquery);   
echo $prguresult['uname'];


?>
</td>
<td width="125">节目组 </td>
<td width="125">
<?php
header("content-type:text/html;charset=utf-8");
require(dirname(__FILE__).'/'."db_connect.php");
	$prg1="select * from programs where pid='{$prgresult['pfpname']}'";   
    $prg1query=mysql_query($prg1, $db_connect);   
    $prg1result=mysql_fetch_array($prg1query);   
	echo $prg1result['pname'];
	mysql_close($db_connect);
?>
</td>
<td width="130"> 计划播出 </td>
<td width="130"><?php echo $prgresult['pfsbdate'];?></td>
</tr>
<tr>
<td>本期编辑 </td>
<td>
<?php
echo $prgresult['pfeditor'];

?>
</td>
<td>本期制作 </td>
<td>
<?php
echo $prgresult['pfcutter'];

?></td>
<td>本期主播 </td>
<td>
<?php
echo $prgresult['pfanchor'];

?></td>
</tr>

<tr class="grey">
<td>本期主题 </td>
<td colspan="5"><?php echo $prgresult['pftopic']; ?></td>
</tr>
<tr>
<td valign="top">脚本</br></td>
<td colspan="5"><textarea name="script" readonly="readonly" cols="95" rows="20" style="background:transparent;border-style:none;">
<?php echo $prgresult['pfscript'];?></textarea></td>
</tr>
<tr>
<td colspan="6">
<center><h1>总编室意见反馈</h1></center>
</td>
</tr>
<tr class="grey">
<td colspan="2">
        <input type="text" name="pfid" value="<?php echo $pfid;?>" hidden="hidden" disabled="disabled">
        是否通过  <?php

		require(dirname(__FILE__).'/'."db_connect.php");
		echo "<input type=\"checkbox\" name=\"pfcheckpass\" tabindex=\"9\" value=\"1\"";
		if ($prgresult['pfcheckpass']==1){
			echo "checked=\"checked\"";
		}
		echo "\" disabled=\"disabled\">";
		?>
        
        </td>
		<td colspan="2">总编室成员 
        <?php
require(dirname(__FILE__).'/'."db_connect.php");
	$unm = "SELECT * FROM users where uid='".$prgresult[pfcheckperson]."'";
	$unmquery = mysql_query($unm, $db_connect);	
	$unmresult = mysql_fetch_array($unmquery);
echo $unmresult['uname'];
?>
        </td>
        <td colspan="2">时间 
               <?php
require(dirname(__FILE__).'/'."db_connect.php");
echo $prgresult['pfcheckdate'];
?>
        </td>
        
	</tr>
    <tr>
		<td valign="top">
        总编室意见 </td>
		<td colspan="5" valign="top" align="left"><?php
require(dirname(__FILE__).'/'."db_connect.php");
echo "<textarea name=\"script\" tabindex=\"8\" cols=\"95\" rows=\"2\" readonly=\"readonly\" style=\"background:transparent;border-style:none;\">".$prgresult['pfcheckcomment']."</textarea>";
?>
		</td>
		</tr>
<tr>
<td colspan="6"><center><h1>质量意见反馈</h1></center></td></tr>
<tr class="grey">
<td>成员 </td><td>
<?php
require(dirname(__FILE__).'/'."db_connect.php");
	$prgu="select * from users where uid='".$prgresult['pfinspectperson']."'";   
    $prguquery=mysql_query($prgu, $db_connect);   
    $prguresult=mysql_fetch_array($prguquery);   

if($prgresult['pfinspectperson']){
	echo $prguresult['uname'];
	}
?></td>
        <td>时间 </td><td colspan="3">
        <?php 
        require(dirname(__FILE__).'/'."db_connect.php");
		if($prgresult['pfinspectdate']){
		echo $prgresult['pfinspectdate'];}
		?></td>
</tr>

<tr>
		<td valign="top">
        质量监督<br/>评价与意见 </td><td colspan="5"> 
        <?php
        require(dirname(__FILE__).'/'."db_connect.php");
        echo "<textarea name=\"pfinspectcomment\" tabindex=\"12\" readonly=\"readonly\" cols=\"95\" rows=\"2\" style=\"background:transparent;border-style:none;\">";
		if($prgresult['pfinspectcomment']){
			echo $prgresult['pfinspectcomment'];
		}
		?>
</textarea></td></tr>
<tr>
<td colspan="6">
<center><h1>台长意见</h1></center>
</td>
</tr>
<tr class="grey">
<td>台长 </td><td>
<?php
require(dirname(__FILE__).'/'."db_connect.php");
	$prgu="select * from users where uid='".$prgresult['pfcheif']."'";   
    $prguquery=mysql_query($prgu, $db_connect);   
    $prguresult=mysql_fetch_array($prguquery);   
if($prgresult['pfcheif']){
	echo $prguresult['uname'];
	}
?>
</td>
        <td>时间 </td><td colspan="3">
        <?php 
        require(dirname(__FILE__).'/'."db_connect.php");
		if($prgresult['pfcheifdate']){
		echo $prgresult['pfcheifdate'];}
		?>
</td></tr>

<tr>
		<td valign="top">台长评价<br/>与意见 </td><td colspan="5">
        <?php
        require(dirname(__FILE__).'/'."db_connect.php");
        echo "<textarea name=\"pfcheifcomment\" tabindex=\"3\" readonly=\"readonly\" cols=\"95\" rows=\"2\" style=\"background:transparent;border-style:none;\">";
		if($prgresult['pfcheifcomment']){
			echo $prgresult['pfcheifcomment'];
		}
		echo "</textarea>";
		?>
	</td></tr>
</table>

    
</body>
</html>