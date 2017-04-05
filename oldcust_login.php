

<?php
include("admin/dbconnect.php");
if(isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$sql = "select * from customer where username='$username' and password='$password'";
	$result = executequery($sql);
	$rows = mysql_num_rows($result);
	if($rows > 0) {
		session_start();
		$_SESSION['username']=$username;
		$_SESSION['password']=$password;
		if ($_POST[remember] == "yes")			//1 day of remembrance!
		{
			$cookie_name = "valid";
			$cookie_value = "yes";
			$cookie_expire = time()+86400;
			setcookie($cookie_name, $cookie_value, $cookie_expire);

			$cookie_name = "username";
			$cookie_value = $_POST[username];
			$cookie_expire = time()+86400;
			setcookie($cookie_name, $cookie_value, $cookie_expire);

			header("Location: index.php?msg=welcome");
			exit;
		}

		else
		{
			$cookie_name = "valid";
			$cookie_value = "yes";
			$cookie_expire = 0;
			setcookie($cookie_name, $cookie_value, $cookie_expire);

			$cookie_name = "username";
			$cookie_value = $_POST[username];
			$cookie_expire = 0;
			setcookie($cookie_name, $cookie_value, $cookie_expire);

			header("Location: index.php?msg=welcome");
			exit;
		}
	}

		
	else {
		header("location:index.php");
	}
}else {
	die();
}
?>
