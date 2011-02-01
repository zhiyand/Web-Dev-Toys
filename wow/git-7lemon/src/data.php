<?php
session_start();
include('common/init.php');
?>
<?php get_head('数据库');?>
<html>
<body>

<div id="wrapper">
<?php get_header('副本信息','装备掉落数据库');?>
<div id="main">
<div class="data">
<?php
$query = "select
          underground_sheet.underground_id, underground_sheet.name,
          boss_sheet.boss_id, boss_sheet.boss_name, equipment_sheet.equipment_name,
          equipment_sheet.power 
          from underground_sheet, boss_sheet, equipment_sheet, eq_relate
          where underground_sheet.underground_id = boss_sheet.underground_id 
	      and boss_sheet.boss_id = eq_relate.boss_id
	      and equipment_sheet.equipment_id = eq_relate.equipment_id
          order by underground_sheet.underground_id asc, boss_sheet.boss_id asc,
          equipment_sheet.equipment_id asc";
$result = $db->query($query);
$underground_id = 0;
$underground_change = FALSE;
$boss_id = 0;
$boss_change = FALSE;
$row_num =  $result->num_rows;
if ($result){
	for ($i=0; $i < $row_num; $i++){
		$row = $result->fetch_assoc();
		if ($row['underground_id'] != $underground_id){
            	$underground_change = TRUE;
			    $underground_id = $row['underground_id'];
       		}
        	else
            	$underground_change = FALSE;
        	if ($row['boss_id'] != $boss_id){
        	    $boss_change = TRUE;
        	    $boss_id = $row['boss_id'];
        	}
        	else
        	    $boss_change = FALSE;
        	if ($underground_change)
            	echo "</p>\n<h2>".$row['name']."</h2>\n<p>";
        	if ($boss_change){
        	    echo "</p>\n<h3>".$row['boss_name']."</h3>\n<p>";
        	    echo $row['equipment_name']."(".$row['power'].")";
        	}
        	else
        	    echo ','.$row['equipment_name']."(".$row['power'].")";
	}
    echo "</p>\n";
}
?>

</div><!--End Of data-->
<p class="quit"><a href="index.php">返回首页</a></p>
</div><!--End Of main-->
<?php get_footer()?>
</div><!--end of wrapper-->
</body>
</html>
