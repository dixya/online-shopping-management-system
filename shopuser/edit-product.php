<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password']) ) {
	header("location:login.php");
}
$id = $_GET['pid'];
include("../admin/dbconnect.php");
$username=$_SESSION['username'];
$sqla="select * from shopuser where username='$username'";
$rs=executequery($sqla);
$data=mysql_fetch_assoc($rs);
$shopno=$data['shopno'];
$sql = "SELECT * FROM product WHERE product_id='$id'";
$res=executequery($sql);
$data = mysql_fetch_assoc($res);
?>
<html>
<head>
<title>Product edit</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body><div class="wrapper">
	<?php include("sidebaruser.php");?>
	<div class="content">
	<form name="frmpage" method="post" enctype="multipart/form-data" action="#" >
    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 

		<table width="100%" cellpadding="4" cellspacing="4" border="1">
		<tr>
			<td>Product Title</td>
			<td><input type="text" name="productname"  value="<?php echo $data['product_name'];?>"/></td>
		</tr>
		<tr>
			<td>Product Description</td>
			<td>
				<?php
				$pagedesc = $data['product_desc'];
				$basepath = "fckeditor/"; 
				include($basepath."fckeditor.php") ;
				$oFCKeditor = new FCKeditor('productdesc') ;
				$oFCKeditor->BasePath	= $basepath; //$sBasePath ; 
				$oFCKeditor->Value	= $pagedesc;
				$oFCKeditor->Height 	= 400; 
				$oFCKeditor->Width 	= 500; 
				$oFCKeditor->Create() ;
				?>
			</td>
		</tr>
		
		<tr>
			<td>Price</td>
			<td><input type="text" name="price" value="<?php echo $data['price']; ?>"></td>
		</tr>
		<tr>
			<td>Brand</td>
			<td><input type="text" name="brand" value="<?php echo $data['brand']; ?>"></td>
		</tr><tr>
			<td>Model</td>
			<td><input type="text" name="model" value="<?php echo $data['model']; ?>"></td>
		</tr><tr>
			<td>Configuration</td>
			<td><input type="text" name="config" value="<?php echo $data['configuration']; ?>"></td>
		</tr>
		<tr>
			
		
		</table>
        <table border="1">
        <tr>
			<td colspan="4">Product Image</td></tr>
			<tr>
            <td>
			<?php if(!empty($data['product_top'])) {?>
			<img src="../customer/userfiles/catimages/productimg/<?php echo $data['product_top'];?>" width="100" height="75" />
			<a href="deleteimage.php?prid=<?php echo $id; ?>&p=1">delete</a>
			<?php }else { ?>
			<input type="file" name="pict_top" />
			<?php } ?>
			</td>
            
            	<td>
			<?php if(!empty($data['product_front'])) {?>
			<img src="../customer/userfiles/catimages/productimg/<?php echo $data['product_front'];?>" width="100" height="75" />
			<a href="deleteimage.php?prid=<?php echo $id; ?>&p=2">delete</a>
			<?php }else { ?>
			<input type="file" name="pict_front" />
			<?php } ?>
			</td>
            
            
            <td>
			<?php if(!empty($data['product_left'])) {?>
			<img src="../customer/userfiles/catimages/productimg/<?php echo $data['product_left'];?>" width="100" height="75" />
			<a href="deleteimage.php?prid=<?php echo $id; ?>&p=3">delete</a>
			<?php }else { ?>
			<input type="file" name="pict_left" />
			<?php } ?>
			</td>
            
            <td>
			<?php if(!empty($data['product_right'])) {?>
			<img src="../customer/userfiles/catimages/productimg/<?php echo $data['product_right'];?>" width="100" height="75" />
			<a href="deleteimage.php?prid=<?php echo $id; ?>&p=4">delete</a>
			<?php }else { ?>
			<input type="file" name="pict_right" />
			<?php } ?>
			</td>
		</tr>  
        <tr>
			<td colspan="2"><input type="submit" name="submit" value="UPDATE PAGE" /></td>
            <td colspan="2"><input type="reset" name="reset" value="clear"></td></tr>
        </table>
	</form>
	</div>
	<div class="clear"></div>
</div>
<?php
		if(isset($_POST['submit'])) 
		{
			$pid = $_POST['id'];
			$prodname = $_POST['productname'];
			$proddesc = $_POST['productdesc'];
			$prodprice = $_POST['price'];
			$prodbrand = $_POST['brand'];
			$prodmodel = $_POST['model'];
			$prodconfig = $_POST['config'];
			$category=$_POST['category'];
			$subcategory=$_POST['subcategory'];
			if(!empty($_FILES['pict_top']['name']))
			 {
				$imgname = $_FILES['pict_top']['name'];
				$rand = rand();
				$imgname = $rand."_".$imgname;
				$tmppath = $_FILES['pict_top']['tmp_name'];
				$perpath = "../customer/userfiles/catimages/productimg/".$imgname;
				move_uploaded_file($tmppath,$perpath);		
	      

	         			 if(!empty($_FILES['pict_front']['name']))
	         			 {
	          			$imgname1 = $_FILES['pict_front']['name'];
						$rand = rand();
						$imgname1 = $rand."_".$imgname1;
						$tmppath = $_FILES['pict_front']['tmp_name'];
						$perpath = "../customer/userfiles/catimages/productimg/".$imgname1;
						move_uploaded_file($tmppath,$perpath);		
	          					
	          						         			 if(!empty($_FILES['pict_left']['name']))
	          						         			 	{
	          										$imgname2 = $_FILES['pict_left']['name'];
													$rand = rand();
													$imgname2 = $rand."_".$imgname2;
													$tmppath = $_FILES['pict_left']['tmp_name'];
													$perpath = "../customer/userfiles/catimages/productimg/".$imgname2;
													move_uploaded_file($tmppath,$perpath);		

																if(!empty($_FILES['pict_right']['name']))
	          						         			 	{
	          										$imgname3= $_FILES['pict_right']['name'];
													$rand = rand();
													$imgname3 = $rand."_".$imgname3;
													$tmppath = $_FILES['pict_right']['tmp_name'];
													$perpath = "../customer/userfiles/catimages/productimg/".$imgname3;
													move_uploaded_file($tmppath,$perpath);	
													$sql = "update product set product_name='$prodname',product_top='$imgname',product_front='$imgname1',product_left='$imgname2',product_right='$imgname3', product_desc='$proddesc',price='$prodprice',
				brand='$prodbrand',model='$prodmodel',configuration ='$prodconfig' where product_id='$pid'";
							} //right if closing
							else{
						$sql = "update product set product_name='$prodname',product_top='$imgname',product_front='$imgname1',product_left='$imgname2', product_desc='$proddesc',price='$prodprice',

				brand='$prodbrand',model='$prodmodel',configuration ='$prodconfig' where product_id='$pid'";


							}
						}// left if closing
							else{
								$sql = "update product set product_name='$prodname',product_top='$imgname',product_front='$imgname1', product_desc='$proddesc',price='$prodprice',

				brand='$prodbrand',model='$prodmodel',configuration ='$prodconfig' where product_id='$pid'";



							}
						} //front if closing

						else{
							$sql = "update product set product_name='$prodname',product_top='$imgname', product_desc='$proddesc',price='$prodprice',

				brand='$prodbrand',model='$prodmodel',configuration ='$prodconfig' where product_id='$pid'";

						}
					} // top if closing
	else 
		 {
			 $sql = "update product set product_name='$prodname', product_desc='$proddesc',price='$prodprice',
				brand='$prodbrand',model='$prodmodel',configuration ='$prodconfig' where product_id='$pid'";	
		 }//end of else
		$result = executequery($sql);
		header("location:manageproduct.php?msg=product updated");
		}
	else {
		die();
			header("location:manageproduct.php?msg=update error");
	}//end of main else
?>
</body>
</html>
			
			
			
			