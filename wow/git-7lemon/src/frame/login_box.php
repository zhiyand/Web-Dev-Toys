<div id="login_box">
    <h3>已有账号？请登录：</h3>
<?php 
    if ($error_type['login'] == TRUE)
        echo '<p class="err_msg">'."$error_msg</p>\n";
?>
    <form action="index.php" method="POST">
    <table>
        <tr><td>用户名</td><td><input type="text" name="username" value="" /></td></tr>
        <tr><td>密码</td><td><input type="password" name="password" value="" /></td></tr>
    </table>
    <input type="submit" name="login" class="submit" value="登录" />
    </form>
</div><!--End Of login_box-->
<div id="signup_box">
    <h3>注册成为用户：</h3>
<?php
    if ($error_type['sign'] == TRUE)
    echo '<p class="err_msg">'."$error_msg</p>\n";
?>
    <form action="signup.php" method="POST">
    <table>
        <tr><td>用户名</td><td><input type="text" name="username" value="" /></td></tr>
        <tr><td>昵称</td><td><input type="text" name="name" value="" /></td></tr>
        <tr><td>密码</td><td><input type="password" name="password" value="" /></td></tr>
        <tr><td>邮箱</td><td><input type="text" name="email" value="" /></td></tr>
    </table>
    <input type="submit" name="signup" class="submit" value="注册" />
    </form>
</div><!--End Of signup_box-->
