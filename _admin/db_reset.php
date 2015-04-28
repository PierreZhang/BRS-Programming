<?php //SECURITY CHECK SUITE

//VERIFY USER

	require(dirname(__FILE__).'/'."../_component/_login/identity.php");
	
//PERMISSION CHECK

	if($_COOKIE["brs-level"]=='0')
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
header("content-type:text/html;charset=utf-8");

if (mysqli_connect_errno($db_connect))
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$sql = "
SET character_set_client = utf8 ;
SET character_set_connection = utf8 ;
SET character_set_database = utf8 ;
SET character_set_results = utf8 ;
SET character_set_server = utf8 ;

drop database programming;
create database programming;
use programming;

create table users(
uid smallint(2) zerofill primary key auto_increment,
uname varchar(10) NOT NULL unique,
ugroup tinyint(2) NOT NULL,
upass char(32) NOT NULL
)default charset=utf8 default collate=utf8_general_ci;
insert into users values (0,'root',0,'root');

create table programs(
pid smallint(2) zerofill primary key auto_increment,
pname varchar(20) NOT NULL unique,
preminder char(100)
)default charset=utf8 default collate=utf8_general_ci;
insert into programs values (11,'新闻ing','报道校内外新闻。');


create table programming(
pfid int(4) unsigned zerofill primary key auto_increment,
pfpname varchar(20) NOT NULL,
pfuname varchar(10) NOT NULL,
pfdate datetime NOT NULL,
pfsbdate date,
pfeditor VARCHAR(10) NOT NULL,
pfanchor VARCHAR(10) NOT NULL,
pfcutter VARCHAR(10) NOT NULL,
pftopic VARCHAR(30) NOT NULL,
pfscript text,
pfcheckpass bool,
pfcheckperson VARCHAR(10),
pfcheckdate datetime,
pfcheckcomment VARCHAR(100),
pfinspectperson VARCHAR(10),
pfinspectdate datetime,
pfinspectcomment VARCHAR(100),
pfcheif VARCHAR(10),
pfcheifdate datetime,
pfcheifcomment VARCHAR(100)
)default charset=utf8 default collate=utf8_general_ci;

create table comments(
cid int(3) not null primary key AUTO_INCREMENT,
cname varchar(10),
ctime datetime,
comment text)default charset=utf8 default collate=utf8_general_ci;
";

// Execute multi query
mysqli_multi_query($db_connecti,$sql);


	echo "
	<script language=\"javascript\">
	alert('数据库已被重置。系统管理员用户名/密码：root/root。');
	location.href = 'javascript:history.go(-1);'
	</script>
	";
	
?>