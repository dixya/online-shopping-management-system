<?php 
include("admin/dbconnect.php");
$custid=$_GET['custid'];
$prodid=$_GET['prodid'];
$prodqty=$_GET['prodqty'];
$sql="insert into cart(cust_id, product_id, product_qty) values ('$custid','$prodid','$prodqty')";
$res=executequery($sql);
if($res){
	echo "product inserted into cart";

}
else{
	echo "error inserting in cart";
}

?>