<?php
session_start();
if(!isset($_SESSION['admin_username']) && !isset($_SESSION['password'])) {
	header("location:login.php");
}
include("dbconnect.php");
$cartno=$_GET['cartno'];
$sql="select * from product group by shopno having cart_no='$cartno'";
$res=executequery($sql);?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>calculation for shop</title>
<link rel="stylesheet" type="text/css" href="css/960.css" />
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/text.css" />
<link rel="stylesheet" type="text/css" href="css/blue.css" />
<link type="text/css" href="css/smoothness/ui.css" rel="stylesheet" />  
<link rel="stylesheet" href="css/febe/style.css" type="text/css" media="screen" charset="utf-8">
<!--<link rel="stylesheet" type="text/css" href="style.css">-->
</head>

<body>
<div class="container_16" id="wrapper">	
	
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
    <table border="1"  id="box-table-a">
<tr>
<td>Shop No</td>
<td>View product in Order - no <?php echo $cartno;?></td>
</tr>
<?php
while($data=mysql_fetch_assoc($res)){?>
<tr>
<td><?php echo $data['shopno'];?></td>
<td><a href="finalproductview.php?cartno=<?php echo $cartno;?>&shopno=<?php echo $data['shopno'];?>">View products</a></td></tr>
<?php }?>
</table>
<p align="right"><a href="viewcart.php?pid=<?php echo $cartno;?>">[Back]</a></p>
</div>
</div>
</div>
</body>
</html>