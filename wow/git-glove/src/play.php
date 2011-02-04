<html>
<head>
<title>PK:</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
</head>
<body>

<h1>看看结果：</h1>
</br>

<?php

session_start();

include('inc/common.inc.php');

$sql = "
	select users.hp as users_hp, boss.hp as boss_hp from boss users
	";
$result = mysql_query($sql);

if($result)
{
	$row = mysql_fetch_array($result);
	$final = (users_hp / boss.hp) + rand(0)(1);
}
else
	echo "sorry, failed to connect to the database~";

if(final > 1)
{
	
}

?>
</body>
</html>

