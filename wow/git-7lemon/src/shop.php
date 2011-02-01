<?php
session_start();
include('common/init.php');

$title = array(
    'page' => '商城',
    'h1' => '精良装备店',
    'intro' => '时间就是金钱我的朋友',
    );
get_header($title);

?>
<div id="main">
<p>正在装修…</p>
<a href="index.php">返回首页</a>
</div><!--End Of main-->
<?php get_footer();?>
