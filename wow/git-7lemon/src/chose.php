<?php
session_start();
include('common/init.php');

$title = array(
    'page' => '选择战斗',
    'h1' => '副本信息',
    'intro' => '选择你想挑战的BOSS，然后进入战斗',
    );
get_header($title);

?>
<div id="main">
<div class="chose">
<?php
$query = "select
          underground_sheet.underground_id, underground_sheet.name,
          boss_sheet.boss_id, boss_sheet.boss_name, boss_sheet.boss_power 
          from underground_sheet, boss_sheet 
          where underground_sheet.underground_id = boss_sheet.underground_id 
          order by underground_sheet.underground_id asc";
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
<p class="quit"><a href="index.php">返回首页</a></p>
</div><!--End Of main-->
<?php get_footer();?>
