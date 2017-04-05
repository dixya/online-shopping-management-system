<?php
include('../admin/dbconnect.php');
if($_GET['id'])
{
$id=$_GET['id'];
 $sql = "DELETE from orders WHERE id='$id'";
 header("location: index.php");
 mysql_query( $sql);
}

?>