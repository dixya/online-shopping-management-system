<?php
session_start();
if(!isset($_SESSION['admin_username']) && !isset($_SESSION['password'])) {
	header("location:login.php");
}
$cartno=$_GET['cartno'];
$shopno=$_GET['shopno'];
include("dbconnect.php");
$sql="select * from cart where  shopno='$shopno' and cart_no='$cartno'";
$res=executequery($sql);?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<link rel="stylesheet" type="text/css" href="css/960.css" />
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/text.css" />
<link rel="stylesheet" type="text/css" href="css/blue.css" />
<link type="text/css" href="css/smoothness/ui.css" rel="stylesheet" />  
<link rel="stylesheet" href="css/febe/style.css" type="text/css" media="screen" charset="utf-8">
<!--<link rel="stylesheet" type="text/css" href="style.css" />-->
</head>

<body><div class="container_16" id="wrapper">   
    
        <div class="clear"></div>
    <div class="content">
    <div class="grid_8" id="logo"> WELCOME <?php echo $_SESSION['admin_username'];?></div>
    <div class="grid_8">
<!-- USER TOOLS START -->
      <div id="user_tools"><span><a href="logout.php">Logout</a></span></div>
    </div>
<!-- USER TOOLS END -->    
<div class="grid_16" id="header">
<!-- MENU START -->
<?php include('sidebar.php');?>
<!-- MENU END -->
    <div class="clear"></div>
</div>
     <div class="grid_16" id="content">
    <!--  TITLE START  --> 
    <div class="grid_9">
    <h1 class="dashboard">Dashboard</h1>
    </div>
    <div class="clear">
    </div>
</div>
 <div class="clear"></div>
    <!--THIS IS A WIDE PORTLET-->
        <div class="portlet" >
    <p>Purchased product of shopno:-<?php echo $shopno;?> through Order no:-<?php echo $cartno;?></p>
    <table border="1"  id="box-table-a">
    <tr>
    <td>Product name</td>    
    <td>Price per unit</td>
    <td>Quantity</td>
    <td>Total price</td> 
    </tr>
    <tr>
    <?php while($data=mysql_fetch_assoc($res)){?>
    <?php
	$pid=$data['product_id'];
	$sql1="select * from product where product_id='$pid'";
	$res1=executequery($sql1);
	while($dataprod=mysql_fetch_assoc($res1)){?>
    <td><?php echo $dataprod['product_name'];?></td>
     <td><?php 
	 $price=$dataprod['price'];
	 echo $price;?></td>
    <?php
    }
    ?>
    <td><?php $qty= $data['product_qty'];
	echo $qty;?></td>
    
   
    <?php
    
	$totalprice=$qty * $price;
	?>
    <td><?php echo $totalprice;?></td>
    <?php 
	$nettotal=0;
	$nettotal=$nettotal+$totalprice;?>
    
    </tr>
    
    <?php }?>
    <tr>
    <td colspan="3" align="center">Total amount</td>
    <td><?php echo $nettotal;?></td>
    </tr>
    </table>
    <p align="right" ><a href="calcforshop.php?cartno=<?php echo $cartno;?>">[Back]</a></p>
    </div>
    </div>
    </div>
</body>
</html>