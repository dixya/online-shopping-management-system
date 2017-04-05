<?php
$did = $_GET['pid'];
$status = $_GET['status'];
include("../admin/dbconnect.php");
$sql = "update orders set status = '$status' where id = '$did' ";
$res=executequery($sql);
if($res){
	header("location:managecart.php");
}
else{
	header("location:index.php");
}
?>
