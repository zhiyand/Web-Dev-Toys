<?php
include('db.inc.php');

$r1 = mysql_query("SELECT * FROM undercity");

$uc = array(); $boss = array();

while( $row = mysql_fetch_array($r1) ) $uc[] = $row;

include('header.php');
?>

<h2>请选择你要下的副本</h2>
<form action="enter-city.php" method="post">
	<table>
		<tr>
		<td>副本</td>
		<td><select id="undercity" name="undercity">
			<?php foreach($uc as $c):?>
			<option value="<?php echo $c['id'];?>"><?php echo $c['uc_name']?></option>
			<?php endforeach;?>
		</select></td>
		</tr>
		<tr>
		<td colspan="2"><input type="submit" value="出发" /></td>
		</tr>
	</table>
</form>
<?php include('footer.php');?>
