<?php //SECURITY CHECK SUITE

//VERIFY USER

	require(dirname(__FILE__).'/'."../_component/_login/identity.php");
	
//PERMISSION CHECK

	if($_COOKIE["brs-level"]=='0' || $_COOKIE["brs-level"]=='1')
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
	
?>
<?php
header("content-type:text/html;charset=utf-8");

?>