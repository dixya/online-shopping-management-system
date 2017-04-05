<?php
include('../../admin/dbconnect.php');
	 if(isset($_GET['transnum'])){
			 	$transnum = $_GET['transnum'];	}
if($_GET['pid'])
{
$pid=$_GET['pid'];
 $sql = "DELETE from orders WHERE id='$pid'";
 header("location: index.php?transnum=$transnum&pid=$pid");
 mysql_query( $sql);
}

?>