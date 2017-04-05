<?php
session_start();
if(!isset($_SESSION['admin_username']) && !isset($_SESSION['password'])) {
	header("location:login.php");
}
include("dbconnect.php");
$sql = "select * from pages ";
$result = executequery($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Administration Panel ::</title>

<link rel="stylesheet" type="text/css" href="css/960.css" />
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/text.css" />
<link rel="stylesheet" type="text/css" href="css/blue.css" />
<link type="text/css" href="css/smoothness/ui.css" rel="stylesheet" />  
<link rel="stylesheet" href="css/febe/style.css" type="text/css" media="screen" charset="utf-8">
<!--<link rel="stylesheet" type="text/css" href="style.css" />-->
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
		<?php
		if(isset($_GET['msg'])) {
		?>
		<p class="msg"><?php echo $_GET['msg'];?></p>
		<?php } ?>
		<p><a href="addnewpage.php">Add New Parent Page</a></p>
<!-- 		<p><a href="addnewchildpage.php">Add New Child Page</a></p>
 -->		<table width="100%" cellpadding="4"  cellspacing="4" border="1"  id="box-table-a">
			<tr>
				<th>Page Title</th>
				<th>Status</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			<?php
			while($datapages = mysql_fetch_assoc($result)) {
			?>
			<tr>
			  <td><?php echo $datapages['page_title'];?></td>
				<td>
					<?php if($datapages['status']==1) {?>
						<a href="updatestatus.php?pid=<?php echo $datapages['page_id'];?>&status=0&page=parent">Active</a>
					<?php } else { ?>
						<a href="updatestatus.php?pid=<?php echo $datapages['page_id'];?>&status=1&page=parent">In Active</a>
					<?php }//end of else ?>
				</td>
				<td><a href="editparent.php?pid=<?php echo $datapages['page_id'];?>">Edit</a></td>
				<td><a href="deleteparentpage.php?pid=<?php echo $datapages['page_id'];?>&p=1">Delete</a></td>
			</tr>
			<?php 
			$pid =  $datapages['page_id'];	
			$sqlc = "select * from childpages where page_id='$pid'";
			$resultc = executequery($sqlc);
			$rowsc = mysql_num_rows($resultc);
			if($rowsc > 0) {
				while($datapagesc = mysql_fetch_assoc($resultc)){
			
			?>
			<tr class="childpage">
				<td style="padding:0 0 0 20px;"><?php echo $datapagesc['cpage_title'];?></td>
				<td>
					<?php if($datapagesc['status']==1) {?>
						<a href="updatestatus.php?pid=<?php echo $datapagesc['cpage_id'];?>&status=0&page=child">Active</a>
					<?php } else { ?>
						<a href="updatestatus.php?pid=<?php echo $datapagesc['cpage_id'];?>&status=1&page=child">In Active</a>
					<?php }//end of else ?>
				</td>
				<td><a href="editchildpage.php?pid=<?php echo $datapagesc['cpage_id'];?>">Edit</a></td>
				<td><a href="deleteparentpage.php?pid=<?php echo $datapagesc['cpage_id'];?>&p=2">Delete</a></td>
			</tr>
			<?php
				}
			}//end of if for child page listing
		
			}//end of while 
			?>
		</table>
		
	</div>
	<div class="clear"></div>
</div>
</div>
</body>
</html>