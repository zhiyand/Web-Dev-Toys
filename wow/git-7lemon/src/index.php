<?php
session_start();
include('common/init.php');

$input_error = FALSE;
$login_error = FALSE;
$check_error = FALSE;
$error_msg = "";
if (isset($_GET[ 'check'])){
    $check = $_GET['check'];
    if ($check = 'blank') {
        $error_msg = '用户名或密码不能为空'; 
        $check_error = TRUE;
    } 
    else if ($check == 'exist') {
        $error_msg = '用户名或邮箱被占用'; 
        $check_error = TRUE;
    }
}

if(isset($_POST[ 'username']) && isset($_POST[ 'password'])){
    if ($_POST[ 'username'] != "" && $_POST[ 'password'] != "")
        $input_error = FALSE;
    else{
        $input_error = TRUE;
        $error_msg = '请输入用户名和密码';
    }

    if($input_error == FALSE){
        $username = addslashes(trim($_POST['username']));
        $password = sha1($_POST['password']);
        
        $query = 'select * from users '
             ."where username = '".$username."' "
             ."and password = '".$password."'";
        $result = $db->query($query);
        if ($result)
        {
            $row = $result->fetch_assoc();
            $row['username'] = stripslashes($row['username']);
            $row['name'] = stripslashes($row['name']);
            $row['email'] = stripslashes($row['email']);
            $_SESSION['user'] = $row;
            $login_error = FALSE;
        }
        else{
            $login_error = TRUE;
            $error_msg = '用户名或密码错误';
        }
        $db->close();
    }
}
?>
<html>
<?php get_head('首页'); ?>
<body>
<div id="wrapper">
<h1>迷你WOW</h1>
<p class="welcom">欢迎来到迷你艾泽拉斯世界</p>
<?php if(!isset($_SESSION['user'])){
    echo '<div id="main">'."\n";
    get_login_box(($input_error || $login_error), $error_msg);
    get_signup_box($check_error, $error_msg);
    echo '</div><!--End Of main-->'."\n";
}
else{
    $login_name = $_SESSION['user']['name'];
    echo  '<p>'.$login_name.'，欢迎回来。</p>'."\n";?>
<p>当前战斗力：<?php echo $_SESSION['user']['user_power']; ?></p>
<form action="shop.php" method="POST">
    <p>买装备：<input type="submit" name="enter" value="进入商城" /></p>
</form>
<form action="chose.php" method="POST">
    <p>打怪兽：<input type="submit" name="enter" value="进入地下城" /></p>
</form>
<form action="data.php" method="POST">
    <p>副本信息：<input type="submit" name="enter" value="进入数据库" /></p>
</form>
<p><a href="logout.php">退出</a></p>
<?php }?>
<p>战斗力无限提升版：按照某种算法判定输赢。战斗力越高，胜利的几率越高，但也有可能失败。<br>有可能打败战斗力相对很高的BOSS，也可能被很弱的BOSS狂扁。</p>
</div><!--end of wrapper-->
</body>
</html>
