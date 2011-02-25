<?php

include('common/init.php');
$headerData = array(
    'page' => '战斗结果',
    'h1' => '战斗结果',
    'intro' => '你们这是自寻死路！',
    );
get_header($headerData);
?>
<div id="main">
<div class="fight">
<?php
if (isset($_POST['boss_id'])){
    $user_id = $_SESSION['user']['userid'];
    $post_boss_id = $_POST['boss_id'];
    $victory = FALSE;

    $query = "select bs.boss_power, u.user_power 
          from boss_sheet as bs, users as u 
          where bs.boss_id = $post_boss_id 
          and u.userid = $user_id";
    $result = $db->query($query);
    if($result){
        $row = $result->fetch_assoc();
        $v = (float)$row['user_power']/((float)$row['boss_power'] + (float)$row['user_power']);
        $user_power = $row['user_power'];
    }
    else
        echo "数据库访问错误，代码004";
    $rate = (float)rand(0,999) / 1000;

    if($v > $rate) $victory = TRUE;

    if($victory){
        $rate = (float)rand(0,99) / 100;
        $query = "select
          bs.boss_id, bs.boss_name, es.equipment_id,
          es.equipment_name, es.power 
          from boss_sheet as bs, equipment_sheet as es, eq_relate as er 
          where bs.boss_id = $post_boss_id and er.boss_id = $post_boss_id
          and er.equipment_id = es.equipment_id
          and er.rate1 <= $rate and er.rate2 > $rate";
        $result = $db->query($query);

        if ($result){
            $row = $result->fetch_assoc();
            echo "<h3>你打败了".$row['boss_name']."</h3>\n";
            echo "<p>获得战利品：".$row['equipment_name']."</p>\n";
            echo "<p>战斗力提升". $row['power'] ."点</p>\n";
            $user_power += $row['power'];
            $_SESSION['user']['user_power'] = $user_power;
            $equipment_id = $row['equipment_id'];
            $query = "update users 
                      set user_power = $user_power 
                      where userid = $user_id";
            $result2 = $db->query($query);
            if (!$result2)
                echo "<p>数据库访问出错，代码005</p>";    
        }
        else
            echo "<p>数据库访问出错，代码003</p>";
    }
    else
        echo '<p>很不幸，战斗失败。</p>';
}
else
    echo '<p>请先选择要挑战的BOSS。返回后重试。</p>';
?>

</div><!--End Of fight-->
</div><!--End Of main-->
<?php get_footer();?>
