<?php $country=$_GET['country'];
require "connect.php";
$query="SELECT * FROM paymentm WHERE dmethodid='$country'";
$result=mysql_query($query);

?>
<!-- <select name="state">
<?php while($row=mysql_fetch_array($result)) { ?>
<option value="<?php echo $row['methodname']?>"><?php echo $row['methodname']?></option>
<?php } ?>
</select>
 -->