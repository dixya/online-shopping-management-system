<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password']) ) {
	header("location:login.php");
}
include("../admin/dbconnect.php");
$username=$_SESSION['username'];
$sql1="select * from shopuser where username='$username'";
$rs=executequery($sql1);
$data=mysql_fetch_assoc($rs);
$shopno=$data['shopno'];
$sql = "select * from category ORDER BY cat_name";
$result = executequery($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Administration Panel ::</title>
<link rel="stylesheet" type="text/css" href="style.css" />


<?php
#### Ajax dropdown code with php
?>
<script>
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
	}
	
	
	
	function getCat(strURL) {		
		
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('catdiv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
</script>

</head>

<body>
<div class="wrapper">
	<?php include("sidebaruser.php");?>
	<div class="content">
	<form name="frmpage" method="post" action="confirm_product.php" enctype="multipart/form-data">
		<table width="100%" cellpadding="4" cellspacing="4">
		<tr>
			<td>Product name</td>
			<td><input type="text" name="productname" /></td>
		</tr>
		<tr>
			<td>Product Description</td>
			<td>
			<?php
			$basepath = "fckeditor/"; 
			include($basepath."fckeditor.php") ;        
			$oFCKeditor = new FCKeditor('productdesc') ;
			$oFCKeditor->BasePath	= $basepath; //$sBasePath ; 
			$oFCKeditor->Value	= '';
			$oFCKeditor->Height 	= 400; 
			$oFCKeditor->Width 	= 500; 
			$oFCKeditor->Create();
			?>
			</td>
		</tr>
		<tr>
			<td>Price</td>
			<td><input type="text" name="price" /></td>
		</tr>
       
        <tr>
			<td>Quantity</td>
			<td><input type="text" name="qty" /></td>
		</tr>
        <tr>
			<td>Brand</td>
			<td>
			<?php 
			$sqll="select * from brand";
			$ress=executequery($sqll);?>

			<select name="brand">
									<?php while($data=mysql_fetch_assoc($ress)){?>
				<option><?php echo $data['brand_name'];?></option>
			
			<?php }?></select></td>
		</tr>
<tr>
			<td>Model</td>
			<td><input type="text" name="model" /></td>
		</tr>
<tr>
			<td>Configuration</td>
			<td><input type="text" name="config" /></td>
		</tr>
<tr>
			<td>Created-at</td>
			<td><input type="date" name="createdat" /></td>
		</tr>
        <tr >
			<td>image(top view)</td>
			<td><input type="file" name="pict_top"  value=""/></td>
		</tr>
        <tr >
			<td>image(front view)</td>
			<td><input type="file" name="pict_front"  value=""/></td>
		</tr>
        <tr >
			<td>image(left view)</td>
			<td><input type="file" name="pict_left" value="" /></td>
		</tr>
        <tr >
			<td>image(right view)</td>
			<td><input type="file" name="pict_right"  value=""/></td>
		</tr>
       
       
        <tr><td>select category</td>
        <td>
				<select name="category" onChange="getCat('find_subcategoryy.php?cat='+this.value)" >
					<option>select category</option>
					<?php while($data = mysql_fetch_assoc($result)) {
					?>
 						<option  value="<?php echo $data['cat_id'];?>"><?php echo $data['cat_name'];?> </option>
					<?php }//end of while 
					?>
				</select></td>
				<?php $cat_id=$data['cat_id']; echo $cat_id; ?>
                </tr>
                <input type="hidden" name="id" value="<?php echo $data['cat_id']; ?>" /> 

                 <tr><td>select sub-category</td>
        <td>
				<div id="catdiv"><select name="subcategory" >
					<option>select subcategory</option>
					
				</select></div></td>
                </tr>
                
                <tr>
			<td>username</td>
			<td><input type="text" name="username"  value="<?php echo $username;?>"/></td>
		</tr>
        <tr>
			<td>Shop No.</td>
			<td><input type="text" name="shopno"  value="<?php echo $shopno;?>"/></td>
		</tr>

		<tr>
			<td colspan="2"><input type="submit" name="submit" value="ADD PRODUCT" /></td>
		</tr>
		</table>
	</form>
	</div>
	<div class="clear"></div>
</div>

</body>
</html>