<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    header("location:login.php");
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shop Overview</title>

<link rel="stylesheet" type="text/css" href="css/960.css" />
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/text.css" />
<link rel="stylesheet" type="text/css" href="css/blue.css" />
<link type="text/css" href="css/smoothness/ui.css" rel="stylesheet" />  
<link rel="stylesheet" href="css/febe/style.css" type="text/css" media="screen" charset="utf-8">
<!--<link rel="stylesheet" type="text/css" href="style.css" />-->
</head>
<?php 
$sid=$_GET['sid'];
$username=$_GET['username'];
include("dbconnect.php");

?><div class="container_16" id="wrapper">   
    
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
	<tr> <td colspan=10 align="center">Product details of shop no- <?php echo $sid ;?></td></tr>
<table border="1" id="box-table-a">
<th>User-name</th>
<th>Product-id </th>
<th>Product-name</th>
<th>price</th>
<th>Product-top</th>
<th>Product-front</th>
<th>Product-left</th>
<th>Product-right</th>
<th>Rating</th>
<th>Status</th>
	
    <?php 
	$sql="select * from product where username='$username'";
	$res=executequery($sql);
	 while($data=mysql_fetch_assoc($res)){?>
    <tr>
    
    	<td><?php echo $data['username']; ?></td>
            	<td><?php echo $data['product_id']; ?></td>
    	<td><?php echo $data['product_name']; ?></td>
    	<td><?php echo $data['price']; ?></td>
        <?php if(!empty($data['product_top'])) {?>
                <td><img src="../userfiles/catimages/productimg/<?php echo $data['product_top']; ?>" height="40" width="60"></td><?php } else{?><td>No Image</td><?php }?>
                <?php if(!empty($data['product_front'])) {?>
                                <td><img src="../userfiles/catimages/productimg/<?php echo $data['product_front']; ?>" height="40" width="60"></td><?php } else{?><td>No Image</td><?php }?>
                               
                               <?php if(!empty($data['product_left'])) {?>
                <td><img src="../userfiles/catimages/productimg/<?php echo $data['product_left']; ?>" height="40" width="60"></td><?php } else{?><td>No Image</a></td><?php }?>
                                               <?php if(!empty($data['product_right'])) {?>
                <td><img src="../userfiles/catimages/productimg/<?php echo $data['product_right']; ?>" height="40" width="60" ></td><?php } else{?><td>No Image</a></td><?php }?>  
        
     <td><?php echo $data['rating']; ?></td>
     <td>
					<?php if($data['status']==1) {?>
						<a href="updatestatus.php?pid=<?php echo $data['product_id'];?>&status=0&page=shopproduct">Active</a>
					<?php } else { ?>
						<a href="updatestatus.php?pid=<?php echo $data['product_id'];?>&status=1&page=shopproduct&sid=<?php echo $sid; ?>&us=<?php echo $username; ?> ">In Active</a>
					<?php }//end of else ?>
                   </td>
                
                
                
                
                
		
		
		</tr>
        <?php }?>



</table>

</div>
</div>
</div>




<body>
</body>
</html>