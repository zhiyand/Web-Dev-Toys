<?php
include('db.inc.php');

$query = "
SELECT * FROM
	undercity as uc
LEFT JOIN
	boss as b on uc.id = b.undercity_id 
LEFT JOIN
	equipment_dropping as ed on b.id = ed.boss_id
LEFT JOIN 
	equipment as e on ed.equipment_id = e.id
";

$r = mysql_query($query);

$results = array();
while( $row = mysql_fetch_array($r) )
{
	$results[] = $row;
}
include('header.php');
?>

<table>
	<thead>
	<tr>
		<th>副本</th>
		<th>Boss</th>
		<th>Boss描述</th>
		<th>装备</th>
		<th>爆率</th>
	</tr>
	</thead>
	<tbody>
<?php if(is_array($results) && count($results) > 0):foreach($results as $one):

?>
	<tr>
		<td><?php echo $undercity == $one['uc_name'] ? '' : $one['uc_name'] ?></td>
		<td><?php echo $boss == $one['boss_name'] ? '' : $one['boss_name']?></td>
		<td><?php echo $boss_desc == $one['boss_description'] ? '' : $one['boss_description']?></td>
		<td><?php echo $one['eq_name'];?></td>
		<td><?php echo $one['chance'];?></td>
	</tr>
<?php
$undercity = $one['uc_name'];
$boss = $one['boss_name'];
$boss_desc = $one['boss_description'];
?>
<?php endforeach;endif;?>
	</tbody>
</table>
<?php include('footer.php'); ?>
