<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password']) ) {
	header("location:login.php");
}
include("../admin/dbconnect.php");

$p=$_GET['p'];
$prid=$_GET['prid'];
if ($p==1) {
$sql = "select product_top from product where product_id = '$prid'";
$res = executequery($sql);
$data = mysql_fetch_assoc($res);
$img = $data['product_top'];
unlink("../customer/userfiles/catimages/productimg/".$img);
$sql = "update product set product_top=null where product_id='$prid'";
$res = executequery($sql);
header("location:edit-product.php?pid=$prid");
}
elseif($p==2){
$sql = "select product_front from product where product_id = '$prid'";
$res = executequery($sql);
$data = mysql_fetch_assoc($res);
$img = $data['product_front'];
unlink("../customer/userfiles/catimages/productimg/".$img);
$sql = "update product set product_front=null where product_id='$prid'";
$res = executequery($sql);
header("location:edit-product.php?pid=$prid");
}
elseif($p==3){
$sql = "select product_left from product where product_id = '$prid'";
$res = executequery($sql);
$data = mysql_fetch_assoc($res);
$img = $data['product_left'];
unlink("../customer/userfiles/catimages/productimg/".$img);
$sql = "update product set product_left=null where product_id='$prid'";
$res = executequery($sql);
header("location:edit-product.php?pid=$prid");
}
elseif($p==4){
$sql = "select product_right from product where product_id = '$prid'";
$res = executequery($sql);
$data = mysql_fetch_assoc($res);
$img = $data['product_right'];
unlink("../customer/userfiles/catimages/productimg/".$img);
$sql = "update product set product_right=null where product_id='$prid'";
$res = executequery($sql);
header("location:edit-product.php?pid=$prid");
}
else
{
	header("locaion:edit-product.php");
}
	
	
?>