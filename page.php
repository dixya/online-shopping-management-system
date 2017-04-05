<?php
include("admin/dbconnect.php");
include("function.php");
$sqlmenu = "select * from pages where status='1'";
$resultmenu = executequery($sqlmenu);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Easy shop</title>
<meta name="description" content="easy online shopping " />
<meta name="keywords" content="ecommerce websites" />
<link rel="stylesheet" type="text/css" href="css/master.css" />
</head>

<body>
	<div class="main_container">
		<?php include("header.php"); ?>
	</div>
	<div class="main_container">
		<?php 
		$page = $_REQUEST["page"];

		include_once("page/".$page.".php");
?>


		if($_GET['type']=='parent') { 
		$data = getPageById($_GET['id']);
		} 
		else
		 { 
		$data = getChildPageById($_GET['id']);
		} ?>
		<h2><?php echo $data['page_title'];?></h2>
		<p><?php echo $data['page_desc'];?></p>
			</div>
		
    
<?php include("footer.php"); ?>
</body>
</html>
