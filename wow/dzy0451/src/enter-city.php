<?php
include('db.inc.php');

$city_id = intval($_POST['undercity']);

$r1 = mysql_query("SELECT * FROM boss WHERE undercity_id = '$city_id'");

$boss = array();

while( $row = mysql_fetch_array($r1) ) $boss[] = $row;

include('header.php');
?>

<h2>请选择你要击杀的boss</h2>
<form action="do-fight.php" method="post">
	<table>
		<tr>
		<td>Boss</td>
		<td><select id="boss" name="boss">
			<?php foreach($boss as $c):?>
			<option value="<?php echo $c['id'];?>"><?php echo $c['boss_name']?></option>
			<?php endforeach;?>
		</select></td>
		</tr>
		<tr>
		<td colspan="2"><input type="submit" value="代表月亮消灭他" /></td>
		</tr>
	</table>
</form>
<?php include('footer.php');?>
