<link rel="stylesheet" type="text/css" href="css/master.css">
<?php
$address=$_POST['$address'];
$recipient=$_POST['$recipient'];
$ccname=$_POST['$ccname'];
$cctype=$_POST['$cctype'];
$ccdate=$_POST['ccdate'];
include("admin/dbconnect.php");
include("header.php");
$sql="select * from cart where cust_id=56";
$res=executequery($sql);
while($data=mysql_fetch_assoc($res)){
	$cust_id=$data['cust_id'];
	$product_id=$data['product_id'];
	$product_qty=$data['product_qty'];
	$order_time=$data['order_time'];
	$order_date=$data['order_date'];
	$sql1="insert into orders(cust_id,product_id,product_qty,order_time,order_date,shipping_address) values('$cust_id','$product_id','$product_qty','$order_time','$order_date','$address')";
	$res1=executequery($sql1);


if($res1){
	echo "order received ";
}
}