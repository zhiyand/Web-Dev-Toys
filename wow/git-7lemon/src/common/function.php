<?php
include('config.php');

function get_head($__title_){
    global $__site_name_, $__site_encode_, $__site_url_, $__site_favicon_, $__site_css_;
    echo "<head>\n".
         '<meta http-equiv="Content-Type" content="text/html; charset='.$__site_encode_.'" />'."\n".
         '<title>'.$__title_.'|'.$__site_name_.'</title>'."\n".
         '<link rel="stylesheet" href="'.$__site_url_.$__site_css_.'" type="text/css" />'."\n".
         '<link rel="shortcut icon" href="'.$__site_url_.$__site_favicon_.'" type="image/x-icon" />'."\n".
         "</head>\n"
         ;
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
    echo '<div id="signup_box">'."\n".
         "<h3>注册成为用户：</h3>\n";
    if ($check_error)
        echo '<p class="err_msg">'."$error_msg</p>\n";
    echo '<form action="signup.php" method="POST">'."\n".
         "\t<table>\n".
         "\t".'<tr><td>用户名</td><td><input type="text" name="username" value="" /></td></tr>'."\n".
         "\t".'<tr><td>昵称</td><td><input type="text" name="name" value="" /></td></tr>'."\n".
         "\t".'<tr><td>密码</td><td><input type="password" name="password" value="" /></td></tr>'."\n".
         "\t".'<tr><td>邮箱</td><td><input type="text" name="email" value="" /></td></tr>'."\n".
         "\t</table>\n".
         "\t".'<input type="submit" name="signup" class="submit" value="注册" />'."\n".
         "</form>\n".
         "</div><!--End Of signup_box-->\n"
         ;
}
?>
