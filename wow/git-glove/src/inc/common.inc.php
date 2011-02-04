<?php
//连接到数据库服务器

$link = mysql_connect('localhost', 'root', 'shoutao');

//选择数据库

mysql_select_db('wow1', $link);

/*
//选用函数库
$db = new mysqli('localhost','root','shoutao','wow')
if(mysqli_connect_errno()){
	echo "Sorry,Could not connect to the database~";
	exit;
}*/
//设置utf8编码
mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER_SET_CLIENT=utf8");
mysql_query("SET CHARACTER_SET_RESULTS=uft8");

?>
