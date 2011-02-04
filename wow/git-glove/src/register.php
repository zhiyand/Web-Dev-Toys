<?php

include('inc/common.inc.php');


if(isset($_POST['go']))
{
	$name = $_POST['name'];
	$password = $_POST['password'];
	$email = $_POST['email'];

	$sql = "INSERT INTO
			users
				(name, password, email)
			VALUES(
				'$name', '$password', '$email'
				)";


	$r = mysql_query($sql);

	if($r)
		header('Location: index.php');
	else
		echo 'fuck';
}

?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf8"/>
</head>
<body>

<form action="" method="post">
<table>
	<tr><th>Name</th><td><input type="text" name="name" /></td></tr>
	<tr><th>password</th><td><input type="text" name="password" /></td></tr>
	<tr><th>Email</th><td><input type="text" name="email" /></td></tr>
	<tr><td colspan="2" align="center"><input type="submit" name="go" value="Submit" /></td></tr>
</table>
</form>

</body>
</html>
