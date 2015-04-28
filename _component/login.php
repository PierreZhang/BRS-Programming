<html>
<head>
<link rel="stylesheet" type="text/css" href="default.css" >
<style type="text/css">
#login-title {
	color: #FFF;
	font-size: 14px;
	font-family: Arial, Helveticas, sans-serifs, "黑体", "simhei", "宋体", "simsun";
	padding: 0 0 0 30;
}

#login-tab {
	color: #222;
	font-size: 12px;
	font-family: Arial, Helveticas, sans-serifs, "宋体", "simsun";
	text-align: right;
	font-weight: bold;
}

#login-help {
	color: #999;
	font-size: 12px;
	font-family: Arial, Helveticas, sans-serifs, "宋体", "simsun";
	text-align: left;
	margin: 5 45 3 45;
	border: 1px solid #999;
	padding: 5 15 5 15;
	line-height: 20px;
}
</style>
</head>

<body>

<form method="post" action="_login/login.php" name="login">
<table width="300px" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse; margin: 0 0 0 50;">
	<tr style="background-color: #777;">
		<td colspan="2" style="padding: 0 0 0 0;" width="100"><div id="login-title">身份确认</div></td>
		<td style="padding: 10 20 10 0;" width="200"><div align="RIGHT"><img src="../_images/logo-white.png" height="35"></div></td>
	</tr>
	<tr style="background-color: #E0e0e0;">
		<td width="100" style="padding: 15 5 0 15; text-align: end; letter-spacing: -1px;"><div id="login-tab">您的id</div></td>
		<td width="200" style="padding: 15 0 0 5;" colspan="2"><input type="password" name="id" tabindex="1" size="15" style="padding: 3 6 3 6; border: none; background-color: #f6f6f6;"></td>
	</tr>
	<tr style="background-color: #E0e0e0;">
		<td width="100" style="padding: 10 5 0 15; letter-spacing: -1px;"><div id="login-tab">您的密码</div></td>
		<td width="200" style="padding: 10 0 0 5;" colspan="2"><input type="password" name="password" tabindex="3" size="15" style="padding: 3 6 3 6; border: none; background-color: #f6f6f6;"></td>
	</tr>
	<tr style="background-color: #E0e0e0;">
		<td style="padding: 10 0 10 0;" colspan="3"><div id="login-help">
				<center>
					提醒
				</center>
				1. id或密码丢失请联系总编室。<br/>
				2. id号码仅输入有效位数即可。<br/>
				3. 请保存好您的id和密码。</div></td>
	</tr>
	<tr style="background-color:#E0e0e0;">
		<td colspan="3" style=" text-align:right; padding: 0 20 10 0;"><button type="submit" tabindex="4">嗯，好的</button></td>
	</tr>
</table>
</form>
</body>
