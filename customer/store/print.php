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
width:680px;
margin:0 auto;
}
#print_content a {text-decoration: none; font-weight: 200; margin: 2px;}


</style>

	<?php //include("../customer_header.php");?>
<div id="print_content">

<img src="../images/easylogo.png" width="200" height="80" align="left" style="margin-right:25px;">
<strong>Easy Shopping System</strong><br>Sitapaila, Kathmandu,Nepal<br>Email Us: easyshopping@yahoo.com.<br>Contact: (1800)777-111 )<br>(+977)014284670
<br><br><br><br>
<?php echo "<h2 style='color:blue;'>Thank You. Your order has been received.</h2><br>";?>
<?php include('../../admin/dbconnect.php');
		$transnum=$_GET['transnum'];
		//$username=$_GET['username'];
		echo $transnum;
		$result = mysql_query("SELECT * FROM reservation WHERE confirmation='$transnum'");
		while($row = mysql_fetch_array($result))
			{
				echo 'Order: #'.$row['reservation_id'].'<br>';
				echo 'Date: '.$row['date'].'<br>';
				echo 'Name: '.$row['firstname'].' '.$row['lastname'].'<br>';
				echo 'Address: '.$row['address'].' '.$row['city'].' '.$row['country'].'<br>';
				if($row['delivery']){
				echo 'Shipping Address: '.$row['delivery'].'<br>';

			}
				echo 'Email: '.$row['email'].'<br>';
				echo 'Contact number: '.$row['contact'].'<br>';
				echo 'Confirmation: '.$row['confirmation'].'<br>';
				echo 'Payment Method: Cash On Delivery<br>';		
	?> 
	<h2>ORDER DETAILS</h2>
<table cellpadding="5" cellspacing="0" id="resultTable" border="1" width="100%">
		<tr>
			<td> <strong>Product Name</strong> </td>
			<td> <strong>Quantity</strong> </td>
		</tr>
	<?php

		
		$transnum=$_GET['transnum'];
		$results = mysql_query("SELECT * FROM orders WHERE confirmation='$transnum'");
		while($rows = mysql_fetch_array($results))
			{
				echo '<tr class="record">';
				echo '<td>'.$rows['product_name'].'</td>';
				echo '<td>'.$rows['qty'].'</td>';
				echo '</tr>';
			}?>
			<tr>
				<td>Total Amount</td>
				<td> <?php echo $row['payable'];?> </td>
			</tr>
	
	<?php
		// $transnum=$_GET['transnum'];
		// $resulta = mysql_query("SELECT * FROM reservation WHERE confirmation='$transnum'");
		// while($rowa = mysql_fetch_array($resulta))
		// 	{
		// 		echo '<tr class="record">';
		// 		echo '<td><strong>Total Payable</strong></td>';
		// 		echo '<td>'.$rowa['payable'].'</td>';
		// 		echo '</tr>';
		// 	}
	?> 
	
</table>

<?php
	}
	?>
<h2 style="color:blue;"><a href="javascript:Clickheretoprint()">Print</a>
<a id=user class="icon icon-lock" href="../do_logoff.php">&nbsp;&nbsp;&nbsp;&nbsp;Log Out</a></h2>

</div>
