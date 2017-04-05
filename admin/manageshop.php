<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
  header("location:login.php");
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shop Management</title>

<link rel="stylesheet" type="text/css" href="css/960.css" />
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/text.css" />
<link rel="stylesheet" type="text/css" href="css/blue.css" />
<link type="text/css" href="css/smoothness/ui.css" rel="stylesheet" />  
<link rel="stylesheet" href="css/febe/style.css" type="text/css" media="screen" charset="utf-8">
<!--<link rel="stylesheet" type="text/css" href="style.css" />-->
</head>
<body>
<?php
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
<table width="100%" cellpadding="4" cellspacing="4"border="1" id="box-table-a" >
<tr><td colspan="5" align="center" style="background-color:#BCBCBB; font-weight:bold; font-size:22px; color:navy;">Shop Details</td></tr>
<tr>
  <th>Shop no</th>
    <th>View shop</th>
    <th>Username</th>
    <th>Shop_Status</th>
 </tr>
 <?php 
 $sql="select shopno,username,status from shopuser";
 $res=executequery($sql);
    while($data=mysql_fetch_assoc($res)){
  ?>
  <tr>
  <td><?php echo $data['shopno'];?></td>
  <td><a href="viewshop.php?sid=<?php echo $data['shopno'];?>&username=<?php echo $data['username'];?>&id=0&s=1">View Shop products</a>
  <td><?php echo $data['username'];?></td>
  <td><?php if($data['status']==1) {?>
            <a href="updatestatus.php?pid=<?php echo $data['shopno'];?>&status=0&page=shop">Active</a>
          <?php } else { ?>
            <a href="updatestatus.php?pid=<?php echo $datapages['shopno'];?>&status=1&page=shop">In Active</a>
          <?php }//end of else ?></td>
<?php }?>
</table>

</div>
</div>
</div>

</body>
</html>