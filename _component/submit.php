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

</br><center><h1>提交新的审批单（全部为必填项）</h1></center>
<form method="post" action="_component/submit.php" name="submit">
<table id="submit" width="760">
<tr class="grey">
<td>提交人id <input type="text" name="submitter" tabindex="1" size="3" readonly="readonly" value="
<?php
echo $_COOKIE["brs-id"];
?>
"></td>
<td>节目组 <select name="program" tabindex="2">
<?php
header("content-type:text/html;charset=utf-8");
require(dirname(__FILE__).'/'."db_connect.php");
for($i=1;$i<=99;$i++){
	$prg="select * from programs where pid='{$i}'";   
    $prgquery=mysql_query($prg, $db_connect);   
    $prgresult=mysql_fetch_array($prgquery);   
	if($prgresult){
	echo '<option value="';
	echo $i;
	echo '">';
	echo $prgresult['pname'];
	echo '</option>';
	}
}
/*	$prg="select * from programs where pid='{$i}'";   
    $prgquery=mysql_query($prg, $db_connect);   
    $prgresult=mysql_fetch_array($prgquery);   
switch($_COOKIE["brs-id"]){
	case 11: echo "<input type=\"text\" name=\"program\" tabindex=\"2\" size=\"8\" readonly=\"readonly\" value="*/

	mysql_close($db_connect);
?>
</select></td>
<td>计划播出 <input type="text" name="scheduled" tabindex="3" size="8" placeholder="2015-01-01"></td>
</tr>
<tr>
<td>本期编辑 <input type="text" name="editor" tabindex="4" size="8" placeholder="张三，李四"></td>
<td>本期制作 <input type="text" name="cutter" tabindex="5" size="8" placeholder="张三，李四"></td>
<td>本期主播 <input type="text" name="anchor" tabindex="6" size="8" placeholder="张三，李四"></td>
</tr>

<tr>
<td colspan="3">本期主题/标题 <input type="text" name="topic" tabindex="7" size="40" placeholder="毕业季特别节目——《毕业，不说再见》"></td>
</tr>
<tr>
<td colspan="3">脚本<textarea name="script" id="script" tabindex="8" cols="105" rows="5" placeholder="例如："></textarea></td>
</tr>
<tr>
<td colspan="2">
注意：请确认节目组是否填写正确，节目组是无法修改的。</td>
		<td style="text-align:right; padding: 0 20 10 0;">
		<button type="submit" tabindex="9" style="padding:30 30 30 30">提交呢</button>
		<button type="reset" tabindex="10">重新填写</button>
        </td>
	</tr>

</table>
</form>
</br><a href="query.php?q_uid=-1">查询所有审批单</a>
|
<?php
echo "<a href=\"query.php?q_uid=".$_COOKIE['brs-id']."\">查询或修改我提交的所有审批单</a>";
?>
|
<a href="query.php?q_uid=0">查询近10天提交的所有审批单</a>

</body>
</html>