<?php
include("dbconnect.php");
if(isset($_POST['submit'])) {
	$subcat= $_POST['subcategory'];
	$productname = $_POST['productname'];
	$productdesc=$_POST['productdesc'];
	$price = $_POST['price'];
	$qty = $_POST['qty'];
	$brand= $_POST['brand'];
	$model = $_POST['model'];
	$config = $_POST['config'];
	$createdat = $_POST['createdat'];
	if(isset($_FILES['pict']['name'])) {
	$imgname = $_FILES['pict']['name'];
	$rand = rand();
	$imgname = $rand."_".$imgname;
	$tmppath = $_FILES['pict']['tmp_name'];
	$perpath = "../customer/userfiles/catimages/productimg/".$imgname;
	move_uploaded_file($tmppath,$perpath);
	$sql = "insert into product (product_id,product_name,subcat_id,product_image,price,qty,brand,model,configuration,created_at,product_desc) 
	values (null,'$productname','$subcat','$imgname','$price','$qty','$brand','$model' ,'$config','$createdat','$product_desc')";
	}else {
	$sql = "insert into product (product_id,product_name,price,qty,brand,model,configuration,created_at,product_desc,subcat_id) 
	values (null,'$productname','$price','$qty','$brand','$model', '$config','$createdat','$product_desc','$subcat')";
	}//end of else
	$result = executequery($sql);
	header("location:manageproduct.php?msg=product successfully added");
}else {
	header("location:login.php");
}//end of main else
?>