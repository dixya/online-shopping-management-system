<?php
	//session_start();
    include("admin/dbconnect.php");
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
	$sql = "INSERT INTO customer (cust_id,username,password,email,fname,lname,address,phone,country,gender,postal,image) 
			VALUES (null,'$username','$password','$email','$fname','$lname',$address','$phone','$country','$gender','$postal','$imgname')";
	}
	else
	{
	$sql ="INSERT INTO customer (cust_id,username,password,email,fname,lname,address,phone,country,gender,postal) 
			VALUES (null,'$username','$password','$email','$fname','$lname','$address','$phone','$country','$gender','$postal')";
	}
	$result = executequery($sql);
	header("location:index.php?msg=Welcome ! You are logged in as $fname.$lname");
	}
	else{
	header("location:signup.php");
	}
?>