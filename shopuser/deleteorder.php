<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
	header("location:login.php");
}
$id=$_GET['orderid'];
include("../admin/dbconnect.php");

$sql="delete from orders where id='$id'";
$res=executequery($sql);
if($res){
	header('location:managecart.php?id=1');
}
else{
	echo "error in deletion";
}
?>

