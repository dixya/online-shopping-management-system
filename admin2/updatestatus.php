<?php
$pid = $_GET['pid'];
$status = $_GET['status'];
include("dbconnect.php");

if($_GET['page']=='parent') 
$sql = "update pages set status = '$status' where page_id = '$pid' ";

elseif($_GET['page']=='child') 
$sql = "update childpages set status = '$status' where cpage_id = '$pid' ";

elseif($_GET['page']=='parentcat')
$sql = "update  category set status = '$status' where cat_id = '$pid' ";

elseif($_GET['page']=='subcat')
$sql = "update subcategory set status = '$status' where subcat_id = '$pid' ";

elseif($_GET['page']=='product')
$sql = "update product set status = '$status' where product_id = '$pid' ";

elseif($_GET['page']=='cart')
$sql = "update cart set status = '$status' where cart_no = '$pid' ";

elseif($_GET['page']=='shop')
$sql = "update shops set status = '$status' where shopno = '$pid' ";

elseif($_GET['page']=='shopproduct')
$sql = "update product set status = '$status' where product_id = '$pid' ";


$res = executequery($sql);

if($_GET['page']=='parentcat'||$_GET['page']=='subcat'){
header("location:managecategory.php");
}
elseif($_GET['page']=='product'){
header("location:manageproduct.php");
}
elseif($_GET['page']=='cart') {
header("location:managecart.php");
}
elseif($_GET['page']=='shop'){
header("location:manageshop.php");
}

elseif($_GET['page']=='shopproduct'){
	$sid= $_GET['sid'];
	$username=$_GET['us'];
header("location:viewshop.php?sid=$sid&username=$username");
}
else
header("location:managepages.php");
?>