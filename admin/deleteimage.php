<?php
session_start();
if(!isset($_SESSION['admin_username']) && !isset($_SESSION['password'])) {
	header("location:login.php");
}
include("dbconnect.php");
$p=$_GET['p'];
if($p==1){
$pid = $_GET['pid'];
$sql = "select page_image from pages where page_id = '$pid'";
$res = executequery($sql);
$data = mysql_fetch_assoc($res);
$img = $data['page_image'];
unlink("../customer/userfiles/".$img);
$sql = "update pages set page_image=null where page_id='$pid'";
$res = executequery($sql);
header("location:editparent.php?pid=$pid");
}
elseif($p==2){
$cpid = $_GET['cpid'];
$sql = "select cpage_image from childpages where cpage_id = '$cpid'";
$res = executequery($sql);
$data = mysql_fetch_assoc($res);
$img = $data['cpage_image'];
unlink("../customer/userfiles/".$img);
$sql = "update childpages set cpage_image=null where cpage_id='$cpid'";
$res = executequery($sql);
header("location:editchildpage.php?pid=$cpid");
}
elseif($p==3){
$catid = $_GET['catid'];
$sql = "select cat_image from category where cat_id = '$catid'";
$res = executequery($sql);
$data = mysql_fetch_assoc($res);
$img = $data['cat_image'];
unlink("../customer/userfiles/catimages/".$img);
$sql = "update category set cat_image=null where cat_id='$catid'";
$res = executequery($sql);
header("location:editcategory.php?pid=$catid");
}
elseif($p==4){
$scatid = $_GET['scatid'];
$sql = "select subcat_image from subcategory where subcat_id = '$scatid'";
$res = executequery($sql);
$data = mysql_fetch_assoc($res);
$img = $data['subcat_image'];
unlink("../customer/userfiles/catimages/".$img);
$sql = "update subcategory set subcat_image=null where subcat_id='$scatid'";
$res = executequery($sql);
header("location:editsubcategory.php?pid=$scatid");
}
elseif ($p=5) {
$prid=$_GET['prid'];
$sql = "select product_image from product where product_id = '$prid'";
$res = executequery($sql);
$data = mysql_fetch_assoc($res);
$img = $data['product_image'];
unlink("../customer/userfiles/catimages/productimg/".$img);
$sql = "update product set product_image=null where product_id='$prid'";
$res = executequery($sql);
header("location:edit-product.php?pid=$prid");
}
else{}
?>