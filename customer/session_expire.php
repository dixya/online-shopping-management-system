<?php
	if(isset($_SESSION['expiretime'])) 
		{
			if($_SESSION['expiretime'] < time()) 
				{
					//logged out
					session_destroy();
					header("Location: ../session_exp.php");
				}
			else 
				{
					$_SESSION['expiretime'] = time() + 2000;
				}
		}
	//maybe add some login procedures and than execute the following line
	$_SESSION['expiretime'] = time() + 2000;
?>