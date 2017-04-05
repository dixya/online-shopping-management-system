<?php
	session_start();
	include("admin/dbconnect.php");
if(isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$sql = "SELECT * FROM customer WHERE username = '$username' AND password = '$password'";
	$result = executequery($sql);
	while($row1=mysql_fetch_assoc($result))
	{
	$username=$row1['username'];
	$transnum = rand();
	}

	$num = mysql_num_rows($result);

	if ($num != 0)
	{
		$_SESSION['username'] = $username;
		header("Location:customer/index.php?transnum=$transnum");
	}
}
	else
		header("Location:main.php#login_form");


?>