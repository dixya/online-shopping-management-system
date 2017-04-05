<?php
####  Ajax dropdown code with php
?>

<?php $cat_id=$_REQUEST['cat'];
$link = mysql_connect('localhost', 'root', ''); //changet the configuration in required
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('shop_online');
$query="select * from subcategory where cat_id= $cat_id";
$result=mysql_query($query);
?>
<select name="subcategory">
<option>Select Subcategory</option>
<?php while($row=mysql_fetch_array($result)) { ?>

<option value="<?php echo $row['subcat_id']; ?>"><?php echo $row['subcat_name']; ?></option>
<?php } ?>
</select>
