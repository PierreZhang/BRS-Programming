<html>
<head>
<link rel="stylesheet" type="text/css" href="/_component/default.css" >
<style type="TEXT/CSS">
a:hover img{filter: gray;filter:alpha(Opacity=80);-moz-opacity:0.8;opacity: 0.8;}
a img{ -webkit-filter: grayscale(100%);     -moz-filter: grayscale(100%);     -ms-filter: grayscale(100%);     -o-filter: grayscale(100%);          filter: grayscale(100%); 	     filter:alpha(Opacity=50);-moz-opacity:0.5;opacity: 0.5;} 
</style>
</head>
<body>
  <div class="footer">
  <div style="float:left"><p>版本号：V1.0(20150313)</br>更好的兼容以WebKit（<a href="http://www.google.cn/intl/zh-CN/chrome/browser/" target="_blank">Chrome</a>，Safari等）为核心的浏览器。</br>最小屏幕尺寸：1024X768。理想分辨率：1366X768。调整分辨率使大于最小屏幕尺寸以收到更加美观效果。</p></div>
  <div style="float:right; text-align:right; ">
  <div style="float:left; padding:0 10 0 0;"><a href="http://en.wikipedia.org/wiki/Open_Source_Initiative" target="_blank" style=""><img src="../_images/Opensource1.png" width="51" height="53" style="vertical-align:center;"></a></div><div style="float:right;">
  	<p style="vertical-align:middle; color:#888;">本软件开源，因技术限制如希望共同修改本软体</br>（<a href="/bug.php" style="vertical-align:middle; color:#888;" target="showframe">点击了解缺陷，或提出意见</a>）请向我们索取代码。</br>©2015 校园之声广播台</p></div>
   
  </div>
  </div>
</body>

<div style="color:#F00; font-size:11px; font-weight:bold; font-family:'Courier New', Courier, monospace; ">
<?php

require 'config.php';

$conn=mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
if (!$conn)	{
	die('<br/>WARNING: Could not access database, please contact administrator to solve this problem. Till then, you cant make any move.');
	}
	
mysql_close($conn);
/*
do{
	echo '<br/>ERROR: still connected!';
	mysql_close($conn);
	}while (!$conn=0)
	*/
?>
</div>

