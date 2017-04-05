<?php
include("dbconnect.php");
if(isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$sql = "select * from admin where admin_username='$username' and password='$password'";
	$result = executequery($sql);
	$rows = mysql_num_rows($result);
	if($rows > 0) {
		session_start();
		$_SESSION['admin_username']=$username;
		$_SESSION['password']=$password;
		header("location:index.php");
	}
	else {
		header("location:login.php?msg=Invalid username or password");
	}
}else {
	header("location:login.php");
}
?>