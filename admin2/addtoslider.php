<?php
$pid=$_GET['pid'];
$status=$_GET['status'];
include("../admin/dbconnect.php");
$sql="update product set sliderstatus='$status' where product_id='$pid'";
$res=executequery($sql);
if($res){
	echo " success";
}
else{
	echo "error";
}
?>

