<html>
<head>
<meta http-equiv="refresh" content="10">
<link rel="stylesheet" type="text/css" href="/_component/default.css" >
<style type="text/css">
.welcome{
	margin:0 0 5 20;
	vertical-align:middle;
	font-size:12px;
	color:#333;
	height:50px;
	line-height:20px;
}
</style>


</head>
<body>

<div class="sidebar1">
	<?php
	if($_COOKIE["brs-level"]=='0' || $_COOKIE["brs-level"]=='1' || $_COOKIE["brs-level"]=='2' || $_COOKIE["brs-level"]=='3' || $_COOKIE["brs-level"]=='4' || $_COOKIE["brs-level"]=='5'){
	echo "<div class=\"welcome\">";
	switch ($_COOKIE["brs-level"]){
		case 0: echo "系统管理员你来做什么！唉";break;
		case 1: echo "你好！台长♡".$_COOKIE["brs-user"];break;
		case 2: echo "你好！编委♡".$_COOKIE["brs-user"];break;
		case 3: echo "你好！质检人♡".$_COOKIE["brs-user"];break;
		case 4: echo "你好！亲爱的♡".$_COOKIE["brs-user"];break;
		default: echo "你好！亲爱的♡".$_COOKIE["brs-user"];break;
	}
	echo "。</br><a href=\"/_admin/usr_self_alter.php\" style=\"color:#999\" target=\"showframe\">修改我的密码</a></div>";}
	?>
    <ul class="nav">
      <li><a href="submit.php" target="showframe">提交审批单</a></li>
      <li><a href="check.php" target="showframe">台总编室审批</a></li>
      <li><a href="quality.php" target="showframe">节目质量反馈</a></li>
      <li><a href="cheif.php" target="showframe">台长审查与节目管理</a></li>
      <li><a href="admin.php" target="showframe">系统管理</a></li>
      <li><a href="../logout.php" target="showframe">登陆/注销</a></li>
    </ul>
    <p>&nbsp;</p>
  </div>
</body>
