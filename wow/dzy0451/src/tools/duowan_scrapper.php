<?php
/*
 * 从多玩(wow.duowan.com)抓取副本信息
 */

include(dirname(__FILE__) . '/../db.inc.php');
include('Crawler.class.php');


// 读取副本页面

if(isset($_POST['undercity_url']))
{
	$undercity_name = addslashes($_POST['undercity_name']);
	$undercity_url = strval($_POST['undercity_url']);

	mysql_query("INSERT INTO `undercity` (uc_name) VALUES('$undercity_name')");

	$city_id = mysql_insert_id();

	$crawler = new Crawler();

	$page = $crawler->get_page($undercity_url);

	$pattern = '/<tr><td>([^<]+)<\/td>
			<td><a href=\"([^\"]+)\"[^>]*>[^<]*<\/a><\/td>
			<td><a href=\"([^\"]+)\"[^>]*>[^<]*<\/a><\/td>
			<td><a href=\"([^\"]+)\"[^>]*>[^<]*<\/a><\/td>
			<\/tr>/i';
	$vars = array('boss', 'detail', 'dropping');

	$result = $crawler->get_vars($page, $pattern, $vars);

	$c = 0;
	foreach($result['boss'] as $one)
	{
		list($desc, $boss) = mb_split('：', $one);

		$query = "INSERT INTO `boss`(undercity_id, boss_name, boss_description) 
			VALUES('$city_id', '$boss', '$desc')";

		mysql_query($query);

		$boss_id = mysql_insert_id();

		$eq_page = $crawler->get_page($result['dropping'][$c]);

		$eq_pattern = '/var\ dropItem_data=(.*);Table\.create\(\"dropItem\"\);/i';
		$vars = array('droppings');

		$eq_result = $crawler->get_vars(
			$eq_page,
			$eq_pattern,
			$vars);

		$equipments = json_decode($eq_result['droppings'][0]);

		foreach($equipments as $one)
		{
			$name = preg_replace('/^[\d]+/i', '', $one[1]);
			$find = "SELECT id, eq_name FROM `equipment` WHERE eq_name = '$name'";
			$r = mysql_query($find);

			if(mysql_num_rows($r) > 0)
			{
				$row = mysql_fetch_array($r);
				$equipment_id = $row['id'];
			}else{
				$query = "INSERT INTO `equipment`(eq_name) VALUES('{$name}')";
				mysql_query($query);
				$equipment_id = mysql_insert_id();
			}

			$dropping_rel = "INSERT INTO `equipment_dropping`(equipment_id, boss_id, chance) 
				VALUES('$equipment_id', '$boss_id', '{$one[6]}')";
			mysql_query($dropping_rel);
		}

		$c++;
	}
}

header('Content-Type: text/html; charset=utf-8');
?>

<form action="" method="post">
<table>
<tr>
	<td>副本名称</td><td><input type="text" name="undercity_name" /></td>
	<td>副本信息页URL</td><td><input type="text" name="undercity_url" /></td>
</tr>
<tr>
	<td colspan="2" align="center">
		<input type="submit" value="抓取" />
	</td>
</tr>
</table>
</form>
