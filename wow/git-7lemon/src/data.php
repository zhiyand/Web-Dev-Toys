<?php

include('common/init.php');
$headerData = array(
    'page' => '数据库',
    'h1' => '副本信息',
    'intro' => '副本中的BOSS，以及装备掉落',
    );
get_header($headerData);
?>
<div id="main">
<div class="data">
<?php
$query = "select
          us.underground_id, us.name,
          bs.boss_id, bs.boss_name, es.equipment_name,
          es.power 
          from underground_sheet as us, boss_sheet as bs, equipment_sheet as es, eq_relate as er
          where us.underground_id = bs.underground_id 
	      and bs.boss_id = er.boss_id
	      and es.equipment_id = er.equipment_id
          order by us.underground_id asc, bs.boss_id asc,
          es.equipment_id asc";
$result = $db->query($query);
$underground_id = 0;
$underground_change = FALSE;
$boss_id = 0;
$boss_change = FALSE;
$row_num =  $result->num_rows;
if ($result){
	for ($i=0; $i < $row_num; $i++){echo "copy_id 1 2==" . $copy_id. $row['copy_id'];
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
</div><!--End Of main-->
<?php get_footer();?>
