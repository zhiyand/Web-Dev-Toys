<?php
session_start();
include('common/init.php');

if (isset($_SESSION['user'])){
    unset($_SESSION['user']);
    session_destroy();
}
else
    header("location:index.php");
?>

<html>
<?php get_head('登出');?>
<body>
<div id="wrapper">
<h1>您已退出</h1>
<div id="main">
<div class="logout">
<p class="welcome">欢迎下次再来</p>
</div>
</div>
<p class="quit"><a href="index.php">回到首页</a></p>
</div><!--end of wrapper-->
</body>
</html>
