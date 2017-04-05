<?php
	session_start();
	if(!isset($_SESSION['username']) && !isset($_SESSION['password']))
	 {
		header("location:login.php");
	  }
	include("dbconnect.php");
	if(isset($_POST['submit'])) 
		{
			$pid = $_POST['id'];
			$prodname = $_POST['productname'];
			$proddesc = $_POST['productdesc'];
			$prodprice = $_POST['price'];
			$prodbrand = $_POST['brand'];
			$prodmodel = $_POST['model'];
			$prodconfig = $_POST['config'];
			if(!empty($_FILES['pict']['name']))
			 {
				$imgname = $_FILES['pict']['name'];
				$rand = rand();
				$imgname = $rand."_".$imgname;
				$tmppath = $_FILES['pict']['tmp_name'];
				$perpath = "../customer/userfiles/catimages/productimg/".$imgname;
				move_uploaded_file($tmppath,$perpath);		
				$sql = "update product set product_name='$prodname',product_desc='$proddesc',product_image='$imgname',
				price='$prodprice',brand='$prodbrand',model='$prodmodel',configuration = '$prodconfig' where product_id='$pid'";
	          }
	else 
		 {
			 $sql = "update product set product_name='$prodname', product_desc='$proddesc',price='$prodprice',
				brand='$prodbrand',model='$prodmodel',configuration ='$prodconfig' where product_id='$pid'";	
		 }//end of else
		$result = executequery($sql);
		header("location:manageproduct.php?msg=product updated");
		}
	else {
	header("location:manageproduct.php?msg=update error");
	}//end of main else
?>