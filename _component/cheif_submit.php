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
<?php


$pfid=0;
$pfid=$_GET['pfid'];
if($pfid==0){
	die("ERROR: no variable got.");
}
echo "<h1>质量监督意见反馈".$pfid."</h1>";
mysql_close($db_connect);  
?>
<form>
<table id="submit">
<tr class=>
<td>提交人id 
<?php
header("content-type:text/html;charset=utf-8");
require(dirname(__FILE__).'/'."db_connect.php");
$sql1="select * from programming where pfid='{$pfid}'";
$query1=mysql_query($sql1,$db_connect);   
$result1=mysql_fetch_array($query1); 
echo "<input type=\"text\" name=\"submitter\" tabindex=\"1\" size=\"8\" readonly=\"readonly\" value=\"".$result1['pfuname']."\">";
?>
</td>
<td>节目组 
<?php
header("content-type:text/html;charset=utf-8");
require(dirname(__FILE__).'/'."db_connect.php");
$sql2="select * from programs where pid='{$result1['pfpname']}'";
$query2=mysql_query($sql2,$db_connect);   
$result2=mysql_fetch_array($query2); 
echo "<input type=\"text\" name=\"submitter\" tabindex=\"1\" size=\"8\" readonly=\"readonly\" value=\"".$result2['pname']."\">";
?>
</td>
<td>计划播出 
<?php
header("content-type:text/html;charset=utf-8");
require(dirname(__FILE__).'/'."db_connect.php");
echo "<input type=\"text\" name=\"submitter\" tabindex=\"1\" size=\"8\" readonly=\"readonly\" value=\"".$result1['pfsbdate']."\">";
?>
</td>
</tr>
<tr>
<td>本期编辑 
<?php
header("content-type:text/html;charset=utf-8");
require(dirname(__FILE__).'/'."db_connect.php");
echo "<input type=\"text\" name=\"submitter\" tabindex=\"1\" size=\"8\" readonly=\"readonly\" value=\"".$result1['pfeditor']."\">";
?>
</td>
<td>本期制作 
<?php
header("content-type:text/html;charset=utf-8");
require(dirname(__FILE__).'/'."db_connect.php");
echo "<input type=\"text\" name=\"submitter\" tabindex=\"1\" size=\"8\" readonly=\"readonly\" value=\"".$result1['pfcutter']."\">";
?>
</td>
<td>本期主播
<?php
header("content-type:text/html;charset=utf-8");
require(dirname(__FILE__).'/'."db_connect.php");
echo "<input type=\"text\" name=\"submitter\" tabindex=\"1\" size=\"8\" readonly=\"readonly\" value=\"".$result1['pfanchor']."\">";
?>
</td>
</tr>

<tr>
<td colspan="3">本期主题 
<?php
header("content-type:text/html;charset=utf-8");
require(dirname(__FILE__).'/'."db_connect.php");
echo "<input type=\"text\" name=\"submitter\" tabindex=\"1\" size=\"8\" readonly=\"readonly\" value=\"".$result1['pftopic']."\">";
?>
</td>
</tr>
<tr>
<td colspan="3">脚本 
<?php
header("content-type:text/html;charset=utf-8");
require(dirname(__FILE__).'/'."db_connect.php");
echo "<textarea name=\"script\" tabindex=\"8\" cols=\"100\" rows=\"5\" readonly=\"readonly\"> ".$result1['pfscript']."</textarea>";
?>
</td>
</tr>
</table>
</form>


<form>
<table id="submit">
<tr>
		<td>
        <input type="text" name="pfid" value="<?php echo $pfid;?>" hidden="hidden" disabled="disabled">
        是否通过  <?php
		header("content-type:text/html;charset=utf-8");
		require(dirname(__FILE__).'/'."db_connect.php");
		echo "<input type=\"checkbox\" name=\"pfcheckpass\" tabindex=\"9\" value=\"1\"";
		if ($result1['pfcheckpass']==1){
			echo "checked=\"checked\"";
		}
		echo "\" disabled=\"disabled\">";
		?>
        
        </td>
		<td>总编室成员 
        <?php
header("content-type:text/html;charset=utf-8");
require(dirname(__FILE__).'/'."db_connect.php");
echo "<input type=\"text\" name=\"submitter\" tabindex=\"1\" size=\"8\" readonly=\"readonly\" value=\"".$result1['pfcheckperson']."\">";
?>
        </td>
        <td>时间 
               <?php
header("content-type:text/html;charset=utf-8");
require(dirname(__FILE__).'/'."db_connect.php");
echo "<input type=\"text\" name=\"submitter\" tabindex=\"1\" size=\"8\" readonly=\"readonly\" value=\"".$result1['pfcheckdate']."\">";
?>
        </td>
        
	</tr>
    <tr>
		<td colspan="3">
        总编室意见 
<?php
header("content-type:text/html;charset=utf-8");
require(dirname(__FILE__).'/'."db_connect.php");
echo "<textarea name=\"script\" tabindex=\"8\" cols=\"100\" rows=\"5\" readonly=\"readonly\"> ".$result1['pfcheckcomment']."</textarea>";
?>
	</tr>
</table>
</form>
<form>
<table id="submit">
<tr CLASS>
<td>成员 
<?php
header("content-type:text/html;charset=utf-8");
require(dirname(__FILE__).'/'."db_connect.php");
echo "<input type=\"text\" name=\"pfinspectname\" tabindex=\"1\" size=\"8\" readonly=\"readonly\"";
if($result1['pfinspectname']){
	echo "value=\"".$result1['pfinspectname']."\">";
	}
else{echo ">";
	}	
?>
</td>
        <td>时间 
        <?php 
		header("content-type:text/html;charset=utf-8");
        require(dirname(__FILE__).'/'."db_connect.php");
		echo "<input type=\"text\" name=\"pfinspectdate\" tabindex=\"11\" value=";
		if($result1['pfinspectdate']){
		echo $result1['pfinspectdate'];}
		else{
		echo date('Y-m-d H:i:s');}
		echo " readonly=\"readonly\" size=\"10\"></td>";
		?>
</tr>

<tr>
		<td colspan="2">
        评价与意见 
        <?php
		header("content-type:text/html;charset=utf-8");
        require(dirname(__FILE__).'/'."db_connect.php");
        echo "<textarea name=\"pfinspectcomment\" tabindex=\"12\" readonly=\"readonly\">";
		if($result1['pfinspectcomment']){
			echo $result1['pfinspectcomment'];
		}
		echo "</textarea></td></tr>";
		?>
        </table>
</form>






<?php
echo "<form method=\"post\" action=\"_component/cheif_submit.php?pfid=".$pfid."\" name=\"submit\">";
?>
<table id="submit">
<tr class="grey">
<td>台长 
<?php
header("content-type:text/html;charset=utf-8");
require(dirname(__FILE__).'/'."db_connect.php");
echo "<input type=\"text\" name=\"pfcheif\" tabindex=\"1\" size=\"8\" ";
if($result1['pfcheifname']){
	echo "value=\"".$result1['pfcheif']."\">";
	}
else{
	$a=$_COOKIE["brs-id"];
	echo "value=\"".$a."\">";}	
?>
</td>
        <td>时间 
        <?php 
		header("content-type:text/html;charset=utf-8");
        require(dirname(__FILE__).'/'."db_connect.php");
		echo "<input type=\"text\" name=\"pfcheifdate\" tabindex=\"2\" value=";
		if($result1['pfcheifdate']){
		echo $result1['pfcheifdate'];}
		else{
		echo date('Y-m-d H:i:s');}
		echo " readonly=\"readonly\" size=\"10\"></td>";
		?>
</tr>

<tr class="grey">
		<td colspan="2">
        评价与意见 
        <?php
		header("content-type:text/html;charset=utf-8");
        require(dirname(__FILE__).'/'."db_connect.php");
        echo "<textarea name=\"pfcheifcomment\" tabindex=\"3\" >";
		if($result1['pfcheifcomment']){
			echo $result1['pfcheifcomment'];
		}
		echo "</textarea></td>";
		?>
	</tr>
    <tr class="grey">
		<td colspan="3"><input type="submit" value="写好了，提交" tabindex="4">
		<input type="reset" value="重新填写" tabindex="5"></td>
	</tr>
    </table>



    
    
</body>
</html>