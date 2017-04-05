<?php
$pid=$_GET['pid'];
$status=$_GET['status'];
include("../admin/dbconnect.php");
$sql="update product set sliderstatus;
$res=executequery($sql);

