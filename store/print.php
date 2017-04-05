<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,widtd=900, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>List of Passer</title>'); 
   docprint.document.write('</head><body onLoad="self.print()" style="widtd: 900px; font-size:16px; font-family:arial;">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
<style>
#print_content{
width:434px;
margin:0 auto;
}
</style>
<a href="javascript:Clickheretoprint()">Print</a>
<div id="print_content">
<img src="../images/logo.png" width="100" height="100" style="float:left;"><strong>Genesis Trading Online Ordering System</strong><br>Balete Batangas City<br>Email Us: GENESIS_PS@YAHOO.COM.PH<br>Contact: <a href="#">(1800)777-111</a> and call on <a href="#">(+6343)3005704</a>
<br><br><br><br>
<?php
include('connect.php');
		$id=$_GET['id'];
		$result = mysql_query("SELECT * FROM reservation WHERE confirmation='$id'");
		while($row = mysql_fetch_array($result))
			{
				echo 'Date: '.$row['date'].'<br>';
				echo 'Name: '.$row['firstname'].' '.$row['lastname'].'<br>';
				echo 'Address: '.$row['address'].' '.$row['city'].' '.$row['country'].'<br>';
				echo 'Email: '.$row['email'].'<br>';
				echo 'Contact number: '.$row['contact'].'<br>';
				echo 'Confirmation: '.$row['confirmation'].'<br>';
				echo 'Payment Method: '.$row['payment'].'<br>';
				echo 'Delivery Type: '.$row['delivery_type'].'<br>';
				echo 'note: if the Delivery Type is Outside Batangas It has an 500 delivery charge ';
			
	?> 
<table cellpadding="5" cellspacing="0" id="resultTable" border="1" width="100%">
		<tr>
			<td> <strong>Name</strong> </td>
			<td> <strong>Quantity</strong> </td>
		</tr>
	<?php
		
		$id=$_GET['id'];
		$results = mysql_query("SELECT * FROM orders WHERE confirmation='$id'");
		while($rows = mysql_fetch_array($results))
			{
				echo '<tr class="record">';
				echo '<td>'.$rows['product'].'</td>';
				echo '<td>'.$rows['qty'].'</td>';
				echo '</tr>';
			}
	?>
	<?php
		$id=$_GET['id'];
		$resulta = mysql_query("SELECT * FROM reservation WHERE confirmation='$id'");
		while($rowa = mysql_fetch_array($resulta))
			{
				echo '<tr class="record">';
				echo '<td><strong>Total Payable</strong></td>';
				echo '<td>'.$rowa['payable'].'</td>';
				echo '</tr>';
			}
	?> 
	<?php
	}
	?>
</table>

</div>
<a href="../index.php">Back</a>