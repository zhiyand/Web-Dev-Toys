<?php
session_start();
include('common/init.php');
?>
<html>
<head>
<title>战斗</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
</head>
<body>
<?php
echo '<h1>战斗结果</h1>';
$user_id = $_SESSION['user']['userid'];
$post_boss_id = $_POST['boss_id'];
$victory = FALSE;

$query = "select boss_sheet.boss_power, users.user_power 
          from boss_sheet, users 
          where boss_sheet.boss_id = $post_boss_id 
          and users.userid = $user_id";
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
          boss_sheet.boss_id, boss_sheet.boss_name, equipment_sheet.equipment_id,
          equipment_sheet.equipment_name, equipment_sheet.power 
          from boss_sheet, equipment_sheet, eq_relate
          where boss_sheet.boss_id = $post_boss_id and eq_relate.boss_id = $post_boss_id
          and eq_relate.equipment_id = equipment_sheet.equipment_id
          and eq_relate.rate1 <= $rate and eq_relate.rate2 > $rate";
    $result = $db->query($query);

    if ($result){
        $row = $result->fetch_assoc();
        echo "<h3>你打败了".$row['boss_name']."</h3>\n";
        echo "<p>获得战利品：".$row['equipment_name']."</p>\n";
        echo "<p>战斗力提升". $row['power'] ."点</p>\n";
        echo '<p><a href="index.php">返回首页</a></p>';
        $user_power += $row['power'];
        $_SESSION['user']['user_power'] = $user_power;
        $equipment_id = $row['equipment_id'];
    }
    else
        echo "<p>数据库访问出错，代码003</p>";
    $query = "update users 
              set user_power = $user_power 
              where userid = $user_id";
    $result = $db->query($query);
    if (!$result)
        echo "<p>数据库访问出错，代码005</p>";    
}
else{
    echo '<p>很不幸，战斗失败。<a href="index.php">返回首页</a></p>';
}

?>

</body>
</html>
