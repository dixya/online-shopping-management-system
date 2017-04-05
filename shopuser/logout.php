<?php
session_start();
session_destroy();
if(isset($_GET['msg'])){
header("location:login.php?msg=$_GET[msg]");
}
else
header("location:login.php?msg=Thanks! visit again");


?>