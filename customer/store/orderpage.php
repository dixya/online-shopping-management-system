<?php
session_start();
$id=$_GET['pid'];
$username = $_SESSION['username'];
echo $username;
if(isset($_GET['transnum'])){
        $transnum = $_GET['transnum'];
   echo $transnum;
  }
 
include('../../admin/dbconnect.php');

$result2 = mysql_query("SELECT * FROM product WHERE product_id='$id'");
while($row2 = mysql_fetch_array($result2))
	{
	$price=$row2['price'];
	$name=$row2['product_name'];
	echo '<img src="../userfiles/catimages/productimg/'.$row2['product_top'].'" alt="Wall-E" title="Wall-E" /><br>';
	echo '<span style="color:#B80000; font-size:16px; font-weight:bold; font-family:Arial, Helvetica, sans-serif;">'.$row2['product_name'].'</span><br>';
	//echo '<span style="font-size:11px; font-family:Arial, Helvetica, sans-serif; text-align:left; line-height:17px;color:#000000;">'.$row2['description'].'</span>';
	}
?>
<script type="text/javascript" language="Javascript">
	var sum=0;
	price = document.frmOne.select1.value;
	document.frmOne.txtDisplay.value = price;
    function OnChange(value){
		
		price = document.frmOne.select1.value;
		quantity = document.frmOne.select2.value;
    sum = price * quantity;
		
		document.frmOne.txtDisplay.value = sum;
    }
</script>
<SCRIPT language=Javascript>
			  <!--
			  function isNumberKey(evt)
			  {
				 var charCode = (evt.which) ? evt.which : event.keyCode
				 if (charCode > 31 && (charCode < 48 || charCode > 57))
					return false;

				 return true;
			  }
			  //-->
		</SCRIPT>
<form NAME = "frmOne" action="initiateorder.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="transnum" value="<?php echo $transnum; ?>" />
	<input type="hidden" name="username" value="<?php echo $username; ?>" />
	
  <?php echo $transnum.$username; ?>

  <INPUT TYPE = "Text" name = "select1" size = "35" value ="<?php echo $price ?>" style="display:none;">
	<INPUT TYPE = "Text" name = "pname" size = "35" value ="<?php echo $name; ?>" style="display:none;">

    <br>
    <span style="font-size:11px; font-family:Arial, Helvetica, sans-serif; text-align:left; line-height:17px;color:#000000;">Quantity : </span>
	<input type="text" name="select2" onkeyup="OnChange(this.value)" onKeyPress="return isNumberKey(event)" style="width:60px;" /> 
	
	 <span style="color:#B80000; font-size:16px; font-weight:bold; font-family:Arial, Helvetica, sans-serif;">=</span> 
    <INPUT TYPE = "Text" name = "txtDisplay" size = "35" value ="" style="border:#999999 solid 1px; background-color:#FFF; width:100px; height:20px;" readonly><br>
    <span style="font-size:10px; font-family:Arial, Helvetica, sans-serif; text-align:left; line-height:17px;color:#000000;">
    In the note area you can specify what you want(example format)
    <br />
  
    </span>
    Note:<input type="text" name="note" class="ed">
	<br>
	Shop No:<select name="shop">
    
      <?php
        $sql="SELECT * FROM shopuser GROUP BY shopno";
          $res=executequery($sql);
          while($data=mysql_fetch_assoc($res))
          {?>
 
           <option><?php  echo $data['shopno'];

          }
 ?>
 </option>
   
  </select>

	<br>
      <INPUT TYPE = "hidden" name ="username" size = "35" value ="<?php echo $username;?>" >
<br>
	<input type="submit" value="Add To Cart" style="padding:10px; border-radius:15px; background-color:green; border:none; color:#ffffff; font-weight:bold; border: 1px solid #000000"/>
</form>