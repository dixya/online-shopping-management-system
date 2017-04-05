<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
	header("location:login.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Administration Panel  ::</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript">
function validate(){
var oldpassword=document.frmpwd.oldpwd.value;
var newpassword=document.frmpwd.newpwd.value;
var repassword=document.frmpwd.repwd.value;
if(oldpassword=="" || newpassword=="" || repassword==""){
	alert("any field can't be empty");
	return false;
	}
	return true;
	frmpwd.submit();
}
</script>
</head>
<body>
<div class="wrapper">
	<?php include("sidebaruser.php");?>
	<div class="content">
	<?php
		if(isset($_GET['msg'])) {
		?>
		<p class="msg"><?php echo $_GET['msg'];?></p>
		<?php } ?>
	<h2>Update Password</h2>
		<form name="frmpwd" method="post" action="#">
			<table>
				<tr>
					<td>Old Password</td>
					<td><input type="password" name="oldpwd" value="" />
				</tr>
				<tr>
					<td>New Password</td>
					<td><input type="password" name="newpwd"  value="" />
				</tr>
				<tr>
					<td>Retype Password</td>
					<td><input type="password" name="repwd" value="" />
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="submit" value="change" onclick="return validate()" /></td>
				</tr>
			</table>
		</form>	
	</div>
	<div class="clear"></div>
</div>
<?php
if(isset($_POST['submit'])){
$oldpwd = md5($_POST['oldpwd']);
$newpwd = $_POST['newpwd'];
$repwd = $_POST['repwd'];
$uname = $_SESSION['username'];
include("../admin/dbconnect.php");
$sql = "select * from shopuser where username='$uname'";
$res = executequery($sql);
$data = mysql_fetch_assoc($res);
$pwd = $data['password'];
if($oldpwd==$pwd) {
	if($newpwd==$repwd) {
		$updatepwd = md5($newpwd);
		$sql = "update shopuser set password='$updatepwd' where username='$uname'";
		executequery($sql);
		header("location:logout.php?msg=password changed sucessfully,login with new password");
	}
	else {
		header("location:managepassword.php?msg=new password and retype password does not match");
	}
}
}else {
	die();
	header("location:managepassword.php?msg=old password does not match");
}
?>
</body>
</html>