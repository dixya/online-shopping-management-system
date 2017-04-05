<?php
session_start();
$username=$_SESSION['username'];
echo "<h1>Welcome, $username</h1>";
echo "<h1>Payment Canceled</h1>";
?>