<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Administration Panel - junior administrator ::</title>
<link rel="stylesheet" type="text/css" href="style.css" />

</head>

<body>
<!--<div class="wrapper">-->
	<div class="login">
		<?php if(isset($_GET['msg'])) {?>
		<p class="msg"><?php echo $_GET['msg'];?></p>
		<?php } ?>
        <table border="0" width="300px">
		<tr><td colspan="2"><p class="title">Junior admin Login panel</p></td></tr>
        
		<form name="frmlogin" method="post" action="#">
			<tr><td class="username">Username :</td><td> <input type="text" name="username"  width="100%"/></td></tr>
			<tr><td class="password">Password :</td><td> <input type="password" name="password"  width="100%"/></td></tr>
			<tr><td colspan="2" align="left"><input type="checkbox" name="remember"  >Remember me</td></tr>

			<tr><td colspan="2" class="submit" align="center"><input type="submit" name="submit" value="login" /></td></tr>

		</form>
        </table>
        						<p class="forget" align="center"><a href="forgetpassword.php">Forget password ?</a></p>

	<!--</div>-->
</div>
<?php
include("../admin/dbconnect.php");
if(isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$sql = "select * from shopuser where username='$username' and password='$password' ";
	$result = executequery($sql);
	$shopno=mysql_fetch_assoc($result);

	$rows = mysql_num_rows($result);
	if($rows > 0) {
		session_start();
		$_SESSION['username']=$username;
		$_SESSION['password']=$password;
		$_SESSION['shopno']=$shopno['shopno'];
		header("location:index.php");
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