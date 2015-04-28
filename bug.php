<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/_component/default.css" >
<title>无标题文档</title>
</head>
<h1>已知BUG</h1>
1、键入文本正则表达式确认</br>
2、单一页面1个SQL查询</br>
3、大量信息工作依靠改代码</br></br>
<?php 
if($_COOKIE["brs-level"]=='0' || $_COOKIE["brs-level"]=='1' || $_COOKIE["brs-level"]=='2' || $_COOKIE["brs-level"]=='3' || $_COOKIE["brs-level"]=='4' || $_COOKIE["brs-level"]=='5' || $_COOKIE["brs-level"]=='6')
{require(dirname(__FILE__).'/'."_component/db_connect.php");
$commentresult=mysql_query("SELECT * FROM comments");

echo "<h1>提交的意见</h1></br><table width=\"600\" cellpadding=\"0\" cellspacing=\"0\" id=\"defaulttable\">
	<thead>
		<th width=\"20\">编号</td>
		<th width=\"45\">提交人</td>
		<th width=\"110\">提交时间</td>
        <th>意见与建议</td>
	</thead>";
while($comment=mysql_fetch_array($commentresult)){
echo "
	<tr>
	<td>$comment[cid]</td><td>$comment[cname]</td><td>$comment[ctime]</td><td>$comment[comment]</td>
	</tr>
	";}
echo "</table></br>";
}
?>
<h1>提交意见</h1>
<form method="post" action="_component/comment_submit.php" name="add">
<table id="submit" width="600">
	<tr class="grey">
		<td>提交人 <input type="text" name="name" tabindex="1" size="8" placeholder="张三"></td></tr><tr>
		<td>意见 <textarea name="comment" tabindex="8" cols="75" rows="5" placeholder="请留下意见与联系方式"></textarea></td>
	</tr>
	<tr>
		<td><button type="submit" tabindex="4">好了，提交</button>
		<button type="reset" tabindex="5">重置</button></td>
	</tr>
</table>
</form>

<?php
echo microtime(true);
echo $HeaderTime;
printf(" total run: %.2f days<br>". 
"memory usage: %.2f M<br> ", 
microtime(true)-$HeaderTime,
memory_get_usage() / 1024 / 1024 ); 
?>


<body>
</body>
</html>
