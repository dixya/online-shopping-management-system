<?php
	include("../admin/dbconnect.php");
 if(isset($_POST['save'])){
	 $name = $_POST['name-com'];

	 $mail = $_POST['mail-com'];
	 $prodid = $_POST['prodid'];
	 $msg = $_POST['the-new-com'];
	$query = "insert into comments(name, email, comment, id_post) values('$name', '$mail', '$msg',  '$prodid')";
	$res = executequery($query);
	if($res){
		header("location:index.php?pid=$prodid");
	}


else{
	echo "error";
}
}?>