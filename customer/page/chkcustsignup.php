<?php
    include("../admin/dbconnect.php");
	if(isset($_POST['submit'])) {
	$fname= $_POST['fname'];
	$lname= $_POST['lname'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$country = $_POST['country'];
	$postal = $_POST['postal'];
	if(isset($_FILES['pict']['name']))
	 {
	$imgname = $_FILES['pict']['name'];
	$rand = rand();
	$imgname = $rand."_".$imgname;
	$tmppath = $_FILES['pict']['tmp_name'];
	$perpath = "Customer_image/".$imgname;
	move_uploaded_file($tmppath,$perpath);
	$sql = "insert into customer (cust_id,username,password,email,fname,lname,email,address,phone,country,gender,postal,image) 
			values(null,'$username','$password','$email','$fname','$lname','$email,'$address','$phone','$country','$gender','$postal','$imgname')";
	}
	else{

	$result = executequery($sql);
	//below codes validate captcha
session_start();
if(isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$_SESSION["code"]==$_POST["captcha"])
{
header("location:login.php?msg=WelCome now login");
}
else
{
header("location:signup.php?msg=Wrong captcha Code Entered");
}
}
else{
			header("location:signup.php?msg=Sign up error");

}	
?>