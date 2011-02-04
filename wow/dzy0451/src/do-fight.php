<?php
include('db.inc.php');

$boss_id = intval($_POST['boss']);

$bq = "SELECT * FROM boss WHERE id = '$boss_id'";
$boss = mysql_fetch_array(mysql_query($bq));

$query = "
	SELECT * FROM 
	equipment_dropping AS ed
	LEFT JOIN
	equipment AS e ON ed.equipment_id = e.id
	WHERE boss_id = '$boss_id'

";

$r1 = mysql_query($query);

$droppings = array();

while( $row = mysql_fetch_array($r1) ) $droppings[] = $row;

$max = mt_getrandmax();
mt_srand(time());

foreach($droppings as &$one)
{
	$value = mt_rand() / $max;

	if($value < $one['chance'] / 100)
	{
		$one['hit'] = 1;
	}
}

include('header.php');
?>

<h2>你已经代表月亮消灭了<?php echo $boss['boss_name']?>, 月亮对你表示感谢。</h2>
<h2>你获得了：</h2>
<table>
	<tr>
	<th>装备</th>
	<th>爆率</th>
	<th>是否爆出</th>
	</tr>
	<?php foreach($droppings as $one): ?>
	<tr style="<?php echo $one['hit'] ? 'background:#360;color:#fff;' : '' ?>">
		<td><?php echo $one['eq_name'];?></td>
		<td><?php echo $one['chance'];?></td>
		<td><?php echo $one['hit'] ? '是' : ''?></td>
	</tr>
	<?php endforeach;?>
</table>
<?php include('footer.php')?>
