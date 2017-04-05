<?php//Start session
 include("admin/dbconnect.php");
$sql="SELECT * FROM customer";
$res = executequery($sql);
$data = mysql_fetch_assoc($res);
$username = $data['username'];
session_start();
	if(isset($_SESSION['username']))
	$_SESSION['SESS_FIRST_NAME'] =$username;

	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '') || (!isset($_SESSION['SESS_FIRST_NAME']))){
		header("location:http://localhost/online_shopt/#login_form");
		exit();
	}
	?>