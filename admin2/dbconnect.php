<?php
/*define(HOSTNAME,"localhost");
define(USERNAME,"root");
define(PASSWORD,"");
define(DBNAME,"shop_online");

function dbconnect() {
	mysql_connect(HOSTNAME,USERNAME,PASSWORD);
	mysql_select_db(DBNAME);
}*/
$link =mysql_connect('localhost','root','');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('shop_online');
function executequery($sql) {
	//dbconnect();
	$res = mysql_query($sql);
	return $res;
}
?>