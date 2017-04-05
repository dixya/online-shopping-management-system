
<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
	header("location:index.php");
}
error_reporting(7); //prevents from occurence of the error notice or warning
include("admin/dbconnect.php");
include("function.php");
$sqlmenu = "SELECT * FROM pages WHERE status='1'";
$resultmenu = executequery($sqlmenu);
$page = htmlspecialchars($_REQUEST["page"]);  //prevents from hacking
if(!$page) 
$page = "home";
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Easy Shopping</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- Basic Page Needs-->
	<meta name="description" content="">
	<meta name="author" content="">

<!-- Mobile Specific Metas-->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS-->
	<link rel="stylesheet" type="text/css" href="css/master.css" />
	<!--<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css?v=2.1.5" media="screen" />-->
	<link href="js/zoomfancyjs/jQuery.fancybox.css" rel="stylesheet" type="text/css" />

        
		
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"> 
    <meta name="keywords" content="carousel, jquery, responsive, fluid, elastic, resize, thumbnail, slider" />
	<meta name="author" content="Codrops" />
	<link rel="shortcut icon" href="images/logomain.jpg"> 


	

</head>

<body>


<div class="main_container">
	<?php include("header1.php");?>
	

<?php if(file_exists("page/".$page.".php")):
  include_once("page/".$page.".php");
else:
  include_once("page/home.php");
endif;?>
</div>

<?php include("footer.php");?>
	

     

	
    
 
</body>



</html>

