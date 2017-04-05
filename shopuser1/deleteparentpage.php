<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
	header("location:login.php");
}
$id = $_GET['pid'];
include("../admin/dbconnect.php");
		$sql = "select * from product where product_id='$id'";
		$result = executequery($sql);
		$data = mysql_fetch_assoc($result);
		$imgname = $data['product_top'];
				$imgname1 = $data['product_front'];
		$imgname = $data['product_left'];
		$imgname = $data['product_right'];
		if(!empty($imgname)||!empty($imgname1)||!empty($imgname2)||!empty($imgname3)) {
			unlink("../customer/userfiles/catimages/productimg".$imgname);
						unlink("../userfiles/catimages/productimg".$imgname1);
			unlink("../customer/userfiles/catimages/productimg".$imgname2);
			unlink("../customer/userfiles/catimages/productimg".$imgname3);
		}
		$sql = "delete from product where product_id='$id'";
		$result = executequery($sql);
		header("location:manageproduct.php?msg=product deleted successfully");
?>
