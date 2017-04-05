<?php
include('../admin/dbconnect.php');
	$transnum=$_POST['transnum'];
	$qty=$_POST['select2'];
	$pid=$_POST['pid'];
	echo $pid;
	$pname=$_POST['pname'];
	$note=$_POST['note'];
	$total=$_POST['txtDisplay'];
	$shopno=$_POST['shop'];
	$username=$_POST['username'];
	$sql="INSERT INTO orders (product_name, qty, confirmation, total, note, username, shopno) VALUES('$pname', '$qty', '$transnum', '$total', '$note', '$username', '$shopno'";
	$res=executequery($sql);
	if($res){
		header("location:index.php?pid=$pid");
	}
?>
<meta http-equiv="refresh" content="1; url=index.php?pid=$pid">

