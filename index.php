<?php
	session_start();
		if(!empty($_SESSION['username']))
			header("Location:customer/index.php");
		else
			header("Location: main.php");
?>