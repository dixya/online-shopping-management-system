<link rel="stylesheet" type="text/css" href="style.css" />
<?php
include("../admin/dbconnect.php");
if(isset($_POST['submit'])) {
	$shopno=$_POST['shopno'];
	$username=$_POST['username'];
	$subcat= $_POST['subcategory'];
	$productname = $_POST['productname'];
	$productdesc=$_POST['productdesc'];
	$price = $_POST['price'];
	$qty = $_POST['qty'];
	$brand= $_POST['brand'];
	$model = $_POST['model'];
	$config = $_POST['config'];
	$createdat = $_POST['createdat'];
	if(isset($_FILES['pict_top']['name'])) {
	$imgname = $_FILES['pict_top']['name'];
	$rand = rand();
	$imgname = $rand."_".$imgname;
	$tmppath = $_FILES['pict_top']['tmp_name'];
	$perpath = "../customer/userfiles/catimages/productimg/".$imgname;
	move_uploaded_file($tmppath,$perpath);
			if(isset($_FILES['pict_front']['name'])){
					$imgname1 = $_FILES['pict_front']['name'];
					$rand1= rand();
					$imgname1 = $rand1."_".$imgname1;
					$tmppath1 = $_FILES['pict_front']['tmp_name'];
					$perpath1= "../customer/userfiles/catimages/productimg/".$imgname1;
					move_uploaded_file($tmppath1,$perpath1);
							
							if(isset($_FILES['pict_left']['name'])){
							$imgname2 = $_FILES['pict_left']['name'];
							$rand2= rand();
							$imgname2 = $rand2."_".$imgname2;
							$tmppath2 = $_FILES['pict_left']['tmp_name'];
							$perpath2= "../customer/userfiles/catimages/productimg/".$imgname2;
							move_uploaded_file($tmppath2,$perpath2);
									
									if(isset($_FILES['pict_right']['name'])){
									$imgname3 = $_FILES['pict_right']['name'];
									$rand3= rand();
									$imgname3 = $rand3."_".$imgname3;
									$tmppath3 = $_FILES['pict_rightt']['tmp_name'];
									$perpath3= "../customer/userfiles/catimages/productimg/".$imgname3;
									move_uploaded_file($tmppath3,$perpath3);
										
$sql = "insert into product (product_id,product_name,subcat_id,product_top,product_front,product_left,product_right,price,qty,brand,model,configuration,created_at,product_desc,username,shopno) 
	values (null,'$productname','$subcat','$imgname','$imgname1','$imgname2','$imgname3','$price','$qty','$brand','$model' ,'$config','$createdat','$productdesc','$username','$shopno')";
	}// right if closing
	else{
		$sql = "insert into product (product_id,product_name,subcat_id,product_top,product_front,product_left,price,qty,brand,model,configuration,created_at,product_desc,username,shopno) 
	values (null,'$productname','$subcat','$imgname','$imgname1','$imgname2','$price','$qty','$brand','$model' ,'$config','$createdat','$productdesc','$username','$shopno')";
		
	}
							}//left if closing
							
	else{
		$sql = "insert into product (product_id,product_name,subcat_id,product_top,product_front,price,qty,brand,model,configuration,created_at,product_desc,username,shopno) 
	values (null,'$productname','$subcat','$imgname','$imgname1','$price','$qty','$brand','$model' ,'$config','$createdat','$productdesc','$username','$shopno')";
		
	}
			}//front if closing
			else{
				$sql = "insert into product (product_id,product_name,subcat_id,product_top,price,qty,brand,model,configuration,created_at,product_desc,username,shopno) 
	values (null,'$productname','$subcat','$imgname','$price','$qty','$brand','$model' ,'$config','$createdat','$productdesc','$username','$shopno')";
		
	}
	}//top if closing
			
	else {
	$sql = "insert into product (product_id,product_name,price,qty,brand,model,configuration,created_at,product_desc,subcat_id,username,shopno) 
	values (null,'$productname','$price','$qty','$brand','$model', '$config','$createdat','$productdesc','$subcat','$username','$shopno')";
	}//end of else
	$result = executequery($sql);
		header("location:manageproduct.php?msg=product successfully added");
}else {
	header("location:login.php");
}//end of main else
?>