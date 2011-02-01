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

function get_header($__title_, $__intro_){
    global $__site_url_, $__page_;
    echo '<div id="header">'."\n".
         '<div id="header_logo">'."\n".
         "<h1>$__title_</h1>\n".
         '<p class="welcome">'.$__intro_.'</p>'."\n".
         '</div><!--End Of header_logo-->'."\n".
         '<div id="header_menu">'."\n".
         '<ul id="menu" class="menu">'."\n"
         ;
    foreach($__page_ as $row){
        echo '<li><a href="'.$__site_url_.$row['url'].'">'.$row['name'].'</a></li>'."\n";
    }
    echo '</ul>'."\n".
         '</div><!--End Of header_menu-->'."\n".
         '</div><!--End Of header-->'."\n"
         ;
}

function get_footer(){
    echo'<div id="footer">'."\n".
        '<p class="intro">战斗力无限提升版：按照某种算法判定输赢。战斗力越高，胜利的几率越高，但也有可能失败。<br>有可能打败战斗力相对很高的BOSS，也可能被很弱的BOSS狂扁。</p>'."\n".
        '</div>'."\n"
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
