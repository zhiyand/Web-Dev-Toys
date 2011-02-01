<?php

$db = new mysqli('localhost', 'root', 'root', 'web_test');
if (mysqli_connect_errno()){
	echo "Error: Could not connect to database.";
	exit;
}
$db->query("SET NAMES 'utf8'");
$db->query("SET CHARACTER_SET_CLIENT=utf8");
$db->query("SET CHARACTER_SET_RESULTS=uft8");

?>
