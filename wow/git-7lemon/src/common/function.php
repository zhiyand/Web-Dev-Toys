<?php
include('config.php');

function get_header($title){
    global $__page_,$__site_name_, $__site_encode_, $__site_url_, $__site_favicon_, $__site_css_;
    if (isset($title))
        require_once('header.php');
    else{
        $title = array(
            'page' => '页面',
            'h1' => '神秘小屋',
            'intro' => '刚刚有一个神奇的声音穿过你的耳洞',
            );
        require_once('header.php');
    }
}

function get_footer(){
    require_once('footer.php');
}

function get_login_box($login_error, $error_msg){
    echo '<div id="login_box">'."\n".
         '<h3>已有账号？请登录：</h3>'."\n";
    if ($login_error)
        echo '<p class="err_msg">'."$error_msg</p>\n";
    echo '<form action="index.php" method="POST">'."\n".
         "\t".'<table>'."\n".
         "\t".'<tr><td>用户名</td><td><input type="text" name="username" value="" /></td></tr>'."\n".
         "\t".'<tr><td>密码</td><td><input type="password" name="password" value="" /></td></tr>'."\n".
         "\t".'</table>'."\n".
         "\t".'<input type="submit" name="login" class="submit" value="登录" />'."\n".
         '</form>'."\n".
         '</div><!--End Of login_box-->'."\n"
         ;
}

function get_signup_box($check_error, $error_msg){
echo <<< signup_box
<div id="signup_box">
    <h3>注册成为用户：</h3>\n
signup_box;
if ($check_error)
    echo '<p class="err_msg">'."$error_msg</p>\n";
echo <<< signup_box
    <form action="signup.php" method="POST">
    <table>
        <tr><td>用户名</td><td><input type="text" name="username" value="" /></td></tr>
        <tr><td>昵称</td><td><input type="text" name="name" value="" /></td></tr>
        <tr><td>密码</td><td><input type="password" name="password" value="" /></td></tr>
        <tr><td>邮箱</td><td><input type="text" name="email" value="" /></td></tr>
    </table>
    <input type="submit" name="signup" class="submit" value="注册" />
    </form>
</div><!--End Of signup_box-->\n
signup_box;
}
?>
