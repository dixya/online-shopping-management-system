<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
	header("location:login.php");
}

$oldpwd = md5($_POST['oldpwd']);
$newpwd = $_POST['newpwd'];
$repwd = $_POST['repwd'];
$uname = $_SESSION['username'];
include("dbconnect.php");

$sql = "select * from admin where username='$uname'";
$res = executequery($sql);
$data = mysql_fetch_assoc($res);
$pwd = $data['password'];
if($oldpwd==$pwd) {
	if($newpwd==$repwd) {
		$updatepwd = md5($newpwd);
		$sql = "update admin set password='$updatepwd' where username='$uname'";
		executequery($sql);
		header("location:logout.php?msg=password changed sucessfully,login with new password");
	}
	else {
		header("location:managepassword.php?msg=new password and retype password does not match");
	}
}else {
	header("location:managepassword.php?msg=old password does not match");
}


	









?>