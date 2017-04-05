h<link rel="stylesheet" type="text/css" href="css/master.css">
<?php
include("admin/dbconnect.php");
include("header.php");
$prodid=$_GET['prodid'];
$sql="delete from cart where product_id='$prodid'";
$res=executequery($sql);
if($res){
	echo "successfully deleted";

}
else
{
	echo "can't delete";
}
?>