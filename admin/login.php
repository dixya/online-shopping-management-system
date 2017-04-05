<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Administration Panel - ACME Project ::</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div class="whole">
	<div class="login">
		<?php if(isset($_GET['msg'])) {?>
		<p class="msg"><?php echo $_GET['msg'];?></p>
		<?php } ?>
		<p class="title">		<img src="../images/logo.jpg" width="200" height="50" align="middle" ><br>
Administrator Login panel<hr></p>
		<form name="frmlogin" method="post" action="#">
			<p class="username">Username: <input type="text" name="username" /></p>
			<p class="password">Password: <input type="password" name="password" /></p>
			<p><select name="level">
							<option value="main">Main administrator</option>
							<option value="shopuser">Shopuser</option>
							</select></p>
			<p class="remember"><input type="checkbox" name="remember"  >Remember me</p>
			<p class="forget" align="center"><a href="forgetpassword.php">Forget password ?</a></p>
			<p><input type="submit" name="submit" value="LOGIN" /></p>
		</form>
	</div>
	</div>

<?php
include("dbconnect.php");
if(isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$level=$_POST['level'];
	if($level=="main"){
	$sql = "select * from admin where admin_username='$username' and password='$password'";
	$result = executequery($sql);
	$rows = mysql_num_rows($result);
	if($rows > 0) {
		session_start();
		$_SESSION['admin_username']=$username;
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

			header("Location: index.php");
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

			header("Location: index.php");
			exit;
		}
	}
}
else if($level=="shopuser"){
	$sql1 = "select * from shopuser where username='$username' and password='$password'";
	$result1 = executequery($sql1);
	$rows1 = mysql_num_rows($result1);
	if($rows1 > 0) {
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

			header("Location:../shopuser/index.php");
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

			header("Location:../shopuser/index.php");
			exit;
		}
	}

}

		
	else {
		header("location:login.php?msg=Invalid username or password");
	}
}else {
	die();
}
?>
</body>
</html>