<?php
include('dbconnect.php');
$cid=$_GET['cid'];
$sql="delete from contact where contact_id='$cid'";
$res=executequery($sql);
if($res){
	header("location:manageinquiry.php");
}


?>