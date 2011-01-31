<?php
include('function.php');
$db = new mysqli($__host_, $__user_, $__password_, $__database_);
if (mysqli_connect_errno()){
	echo "Error: Could not connect to database.";
	exit;
}
$db->query("SET NAMES 'utf8'");
$db->query("SET CHARACTER_SET_CLIENT=utf8");
$db->query("SET CHARACTER_SET_RESULTS=uft8");

?>
