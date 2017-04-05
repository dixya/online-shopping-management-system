<link rel="stylesheet" type="text/css" href="style.css" />
<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password']) ) {
	header("location:login.php");
}
include("../admin/dbconnect.php");
?>
<<div class="wrapper">
	<?php include("sidebaruser.php");?>
	<div class="content">
		<?php
		if(isset($_GET['msg'])) {
		?>
		<p class="msg"><?php echo $_GET['msg'];?></p>
		<?php } ?>
		<p><a href="addbrand.php">Add New Product Brand</a></p>
		<table>
		<tr>
		<th>Brand name</th>
		<th>Brand image</th>
		</tr>
		<tr>
		<td></td>
		</tr>
		</table>
