<?php

include('inc/common.inc.php');

if(isset($_POST['go']))
{
	$name = $_POST['name'];
	$password = $_POST['password'];
	
	$sql = "
		SELECT 
		*
		FROM
		users 
		WHERE name='$name' and password = '$password'
		";
	$r = mysql_query($sql);
	
	$user = mysql_fetch_array($r);

	if($user)
	{
		$_SESSION['logged_user'] = $user;
		header('Location: welcome.php');
	}
	else
		echo '&nbsp&nbsp Sorry,your "Name" or "Password" is worng, please try again or register.';
}
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html charset=utf8"/>
	<link rel="stylesheet" href="css/login.style.css" type="text/css"/>
</head>
<title>注册</title>

<body>
	<form action="" method="post">
	<body background="images/1.jpg">
<div id = "login">
<h1>Login</h1>
<div id = "register">
	<h2 class = "register"><a href="register.php">Register</a></h2>
</div>
<table>
	<tr><th>Name</th><td><input type="text" name="name" /></td></tr>
	<tr><th>Password</th><td><input type="password" name="password" /></td></tr>
	<tr><td colspan="2" align="center"><input type="submit" name="go" value="Submit" /></td></tr>
</table>
</form>
</div>
</body>

</html>
















