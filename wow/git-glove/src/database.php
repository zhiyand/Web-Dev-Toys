<html>
<head>
<title>wow数据库</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
</head>
<body>
<h1>副本信息&nbsp&nbsp&nbsp<a class="button" href="welcome.php?action=logout">回去看看还有啥</a></h1>


<?php

include('inc/common.inc.php');

$query = "SELECT 
		copy.copy_id, copy.name as copy_name,
		boss.boss_id, boss.name as boss_name,
		boss.hp, equip.equip_id, equip.name as equip_name,
		rel_boss_equip.boss_id, rel_boss_equip.equip_id
	FROM
		copy, boss, equip, rel_boss_equip
	WHERE
		copy.copy_id = boss.copy_id
		and boss.boss_id = rel_boss_equip.boss_id
		and equip.equip_id = rel_boss_equip.equip_id

	ORDER BY
		copy.copy_id asc, boss.boss_id, equip.equip_id
	";


$result = mysql_query($query);	//$result = $db->query($query);

if(!$result){
	echo "fuck~";	
}


$row_num = mysql_num_rows($query);


$copy_flag = 0;
$boss_flag = 0;
$equip_flag = 0;

$count = mysql_num_rows($result);

if ($result)
{
	for($i = 0; $i < $count; $i++)
	{
		$row = mysql_fetch_array($result);
		if($copy_flag == 0)
		{
			echo "<h2>".$row['copy_name']."</h2>".'<p>';
			$copy_flag = 6;		//不知道应该如何解决，水一下这里

		}
		if($boss_flag == 0)
		{
			echo "<h3>".$row['boss_name']. "</h3>".'<p>';
			$boss_flag = 3;		//不知道应该如何解决，水一下这里
		}
		if($copy_id != $row['copy_id'] && $boss_id != $row['boss_id'])
		{
			$copy_flag--;
			$boss_flag--;
		}

			echo $row['equip_name'].'<p>';

	}
    echo "</p>\n";
}
?>



</body>
</html>


