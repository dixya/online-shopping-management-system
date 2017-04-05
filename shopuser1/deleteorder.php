<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
	header("location:login.php");
}
$custid=$_GET['custid'];
include("../admin/dbconnect.php");

$sql="delete from orders where cust_id='$custid'";
$res=executequery($sql);
if($res){
	echo "deleted ";
}
else{
	echo "error in deletion";
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Customer Bill</title>
<link rel="stylesheet" type="text/css" href="style.css" />

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
        <p>Details of customer no.<?php echo $custid;?></p>


    </div>
    </div>

</body>
</html>