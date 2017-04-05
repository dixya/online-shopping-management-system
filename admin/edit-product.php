<?php
session_start();
if(!isset($_SESSION['admin_username']) && !isset($_SESSION['password'])) {
	header("location:login.php");
}
$id = $_GET['pid'];
include("dbconnect.php");
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
	<?php include("sidebar.php");?>
	<div class="content1">
	<form name="frmpage" method="post" enctype="multipart/form-data" action="#" >
    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 

		<table width="100%" cellpadding="4" cellspacing="4">
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
			<td>Product Image</td>
			<td>
			<?php if(!empty($data['product_image'])) {?>
			<img src="../customer/userfiles/catimages/productimg/<?php echo $data['product_image'];?>" width="100" height="75" />
			<a href="deleteimage.php?prid=<?php echo $id; ?>&p=5">delete</a>
			<?php }else { ?>
			<input type="file" name="pict" />
			<?php } ?>
			</td>
		</tr>
		<tr>
			<td>Price</td>
			<td><input type="text" name="price" value="<?php echo $data['price']; ?>"</td>
		</tr>
		<tr>
			<td>Brand</td>
			<td><input type="text" name="brand" value="<?php echo $data['brand']; ?>"</td>
		</tr><tr>
			<td>Model</td>
			<td><input type="text" name="model" value="<?php echo $data['model']; ?>"</td>
		</tr><tr>
			<td>Configuration</td>
			<td><input type="text" name="config" value="<?php echo $data['configuration']; ?>"</td>
		</tr>
		<tr>
			<?php 
			//$sql = "SELECT * FROM category WHERE category_id='$id'";
			//$res=executequery($sql);
			//$data = mysql_fetch_assoc($res); 
			?>
			<td><select name=category>
					<option> </option>
			    </select>
			</td>
		</tr>
		<tr>
			<td><input type="submit" name="submit" value="UPDATE PAGE" /></td>
            <td><input type="reset" name="reset" value="clear"></td>
		</tr
		></table>
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
		die();
			header("location:manageproduct.php?msg=update error");
	}//end of main else
?>
</body>
</html>
