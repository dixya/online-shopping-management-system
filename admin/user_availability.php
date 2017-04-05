<?php
//codes for username validation
include("dbconnect.php");

	$username = $_POST['username'];
	$sql="select admin_username from admin where admin_username='$username'";
	$result=executequery($sql);
	$num=mysql_fetch_assoc($result);
	if($num!=0)
{
	//user name is not availble
	echo "no";
} 
else
{
	//user name is available
	echo "yes";
}
?>