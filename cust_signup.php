<html>
<head>


</head>

<body>


<?php
include("admin/dbconnect.php");

if(isset($_POST['submit'])) {
	$username = $_POST['username'];
	$fname= $_POST['fname'];
	$lname= $_POST['lname'];

	$password = md5($_POST['password']);
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$country=$_POST['country'];
	$gender=$_POST['gend'];
	$address=$_POST['address'];
	
	$sql1 = "insert into customer (username,fname,lname,email,password,phone,country,address,gender) 
			values('$username','$fname','$lname','$email','$password','$phone','$country','$address','$gender')";
	$result = executequery($sql1);
	header("location:index.php");
}




?>
	

</body>
</html>