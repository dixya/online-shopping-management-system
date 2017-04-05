<?php



/* Database config */

$db_host		= 'localhost';
$db_user		= 'root';
$db_database	= 'shoppingcart'; 

/* End config */



 mysql_connect($db_host,$db_user,'') or die('Unable to establish a DB connection');

mysql_select_db($db_database);
mysql_query("SET names UTF8");
function executequery($sql) {
	//dbconnect();
	$res = mysql_query($sql);
	return $res;
}

?>