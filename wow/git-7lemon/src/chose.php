<?php

include('common/init.php');

$headerData = array(
    'page' => '选择战斗',
    'h1' => '副本信息',
    'intro' => '选择你想挑战的BOSS，然后进入战斗',
    );
get_header($headerData);

?>
<div id="main">
<div class="chose">
<?php
$query = "select
          us.underground_id, us.name,
          bs.boss_id, bs.boss_name, bs.boss_power 
          from underground_sheet as us, boss_sheet as bs  
          where us.underground_id = bs.underground_id 
          order by us.underground_id asc";
$result = $db->query($query);
$underground_id = 0;
$underground_change = TRUE;
$row_num =  $result->num_rows;
$boss_radio = '<input type="radio" name="boss_id" value="';
if ($result){
    echo '<form action="fight.php" method="POST">'."\n<p>";
	for ($i=0; $i < $row_num; $i++){
		$row = $result->fetch_assoc();
		if ($row['underground_id'] != $underground_id){
            		$underground_change = TRUE;
			$underground_id = $row['underground_id'];
       		}
        	else{
            		$underground_change = FALSE;
        	}
        	if ($underground_change){
            		echo "</p>\n<h3>".$row['name']."</h3>\n<p>\n";
            		echo $boss_radio.$row['boss_id'].'" />'.$row['boss_name']."（战斗力：".$row['boss_power']."）<br />\n";
        	}
        	else{
            		echo $boss_radio.$row['boss_id'].'" />'.$row['boss_name']."（战斗力：".$row['boss_power']."）<br />\n";
        	}
	}
    echo "</p>\n<p>".'<input type="submit" class="chose_fight" value="进入战斗" /></p>'."\n";
    echo '</form>';
}

?>
</div><!--End Of chose-->
</div><!--End Of main-->
<?php get_footer();?>
