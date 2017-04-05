<?php
$pid = $_GET['pid'];
$status = $_GET['status'];
include("../admin/dbconnect.php");

if($_GET['page']=='product')
$sql = "update product set status = '$status' where product_id = '$pid' ";
elseif($_GET['page']=='cart')
$sql = "update cart set status = '$status' where cart_no = '$pid' ";
$res = executequery($sql);
if($_GET['page']=='product'){
header("location:manageproduct.php");
}
elseif($_GET['page']=='cart') {
header("location:managecart.php");
}
else
header("location:index.php");
?>