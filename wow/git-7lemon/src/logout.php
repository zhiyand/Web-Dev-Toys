<?php

include('common/init.php');

if (isset($_SESSION['user'])){
    unset($_SESSION['user']);
    session_destroy();
}
else
    header("location:index.php");

$title = array(
    'page' => '退出',
    'h1' => '您已登出',
    'intro' => '愿风指引你的道路',
    );
get_header($title);

?>
<div id="main">
<div class="logout">
<p class="welcome">欢迎下次再来</p>
</div>
</div><!--End Of main-->
<?php get_footer();?>
