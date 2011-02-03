<?php
session_start();
include('common/init.php');

$input_error = FALSE;
$login_error = FALSE;
$check_error = FALSE;
$error_msg = "";
if (isset($_GET[ 'check'])){
    $check = $_GET['check'];
    if ($check == 'blank') {
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

$title = array(
    'page' => '首页',
    'h1' => '迷你WOW',
    'intro' => '欢迎来到迷你艾泽拉斯世界',
);

get_header($title);

if(!isset($_SESSION['user'])){
    $error_type = array(
        'login' => $input_error || $login_error,
        'sign' => $check_error,
        );
    echo '<div id="main">'."\n";
    get_login_box($error_type, $error_msg);
    echo '</div><!--End Of main-->'."\n";
}
else{
    echo '<div id="main">'."\n";
    $login_name = $_SESSION['user']['name'];
    echo  '<p class="user_name">'.$login_name.'，欢迎回来</p>'."\n";?>
<p class="info">当前战斗力：<?php echo $_SESSION['user']['user_power']; ?></p>
<div class="actions">
<form action="shop.php" method="POST">
    <p>买装备：<input type="submit" name="enter" value="进入商城" /></p>
</form>
<form action="chose.php" method="POST">
    <p>打怪兽：<input type="submit" name="enter" value="进入地下城" /></p>
</form>
<form action="data.php" method="POST">
    <p>副本信息：<input type="submit" name="enter" value="进入数据库" /></p>
</form>
</div><!--End Of actions-->
<p class="quit"><a href="logout.php">退出</a></p>
<?php
    echo '</div><!--End Of main-->'."\n";
}
?>
<?php get_footer();?>
