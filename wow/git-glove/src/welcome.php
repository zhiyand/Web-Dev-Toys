<?php

session_start();

include('inc/common.inc.php');

$sql = "SELECT 
		*
	FROM 
		users";

$result = mysql_query($sql);

$items = array();

if($result)
{
	while( ($row = mysql_fetch_array($result) ) )
	{
		$items[] = $row;
	}
}


?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<h2>欢迎, <?php echo $_SESSION['logged_user']['name']?>!</h2>
<div class="meta">
<ul>
	<li><a class="button" href="index.php?action=logout">没劲，闪人了</a></li>
	</br>
	<li><a class="button" href="play.php">随便玩玩</a></li>
	</br>
	<li><a class="button" href="status.php">查看我的状态</a></li>
	</br>
	<li><a class="button" href="database.php">查看数据库</a></li>
	</br>
	<li><a class="button" href="register.php">太好玩了，再注册个帐号</a></li>
	</br>
</ul>
</div>
</body>
</html>
