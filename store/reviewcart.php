<html>
<head><?php  require_once('../auth.php'); 
include("../admin/dbconnect.php");
$transnum=$_SESSION['SESS_MEMBER_ID'];
?>
<link rel="stylesheet" href="../css/master.css" type="text/css" media="screen" charset="utf-8">
<script language="javascript" type="text/javascript">
// If you have any problem contact me at http://roshanbh.com.np
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }
	
	function getState(countryId) {		
		
		var strURL="findState.php?country="+countryId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('statediv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}
	function getCity(countryId,stateId) {		
		var strURL="findCity.php?country="+countryId+"&state="+stateId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('citydiv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
</script>
<style>
	/*#orderlist{
	background-color: #fff;
	padding:0px;
	width:1020px;
	margin:5px 0 5px -10px;
		border-style: solid;
}*/
.main_container{
	width:980px;
	height:auto;
	margin-left:auto;
	margin-right:auto;
	margin-top: 10px;
}
.clear{clear:both;}
 table {
    border-collapse: collapse;
    border-spacing: 0;
    border-color: #47A3DA;
    opacity: 5%;
}
</style>
</head>
<body>
<?php include("../header.php");?>
<div class="main_container">


			<div id="orderlist">
			<table width="100%" border="1" cellpadding="2" cellspacing="2">
				<tr>
				  <td></td>
				  <td width="25"><div align="center"><strong>Qty</strong></div></td>
				  <td width="150"><div align="left"><strong>Name</strong></div></td>
				  <td width="25"><div align="center"><strong>Total</strong></div></td>
				</tr>
				<?php
				$result3 = mysql_query("SELECT * FROM orders WHERE confirmation='$transnum'");
					while($row3 = mysql_fetch_array($result3))
						{
						echo '<tr>';
						echo '<td><a href="deleteorder.php?id='.$row3['id'].'" id="'.$row3['id'].'" class="delbutton" title="Click To Delete"><img src="img/delete.png"></a></td>';
						echo '<td><div align="center">'.$row3['qty'].'</div></td>';
					
						echo '<td>'.$row3['product_name'].'</td>';
						echo '<td><div align="center">'.$row3['total'].'</div></td>';
						echo '</tr>';
						}
				?>
				<tr>
				  <td colspan="3"><div align="right"><span style="color:#B80000; font-size:13px; font-weight:bold; font-family:Arial, Helvetica, sans-serif;">Grand Total: </span></div></td>
				  <td><div align="center">
				  <?php
				  $result5 = mysql_query("SELECT sum(total) FROM orders WHERE confirmation='$transnum'");
					while($row5 = mysql_fetch_array($result5))
					  { 
						echo $row5['sum(total)']; 
						$sfdddsdsd=$row5['sum(total)'];
					  }
				  ?>
				  
				  
				  </div>
				  </td>
				</tr>
			</table>
			<form method="post" action="personalinfo.php" name="form1" onsubmit="return validateForm()">
			<input type="hidden" name="transnumber" value="<?php echo $transnum ?>" />
			<input type="hidden" name="total" value="<?php echo $sfdddsdsd ?>" />
			<input type="hidden" name="totalqty" value="
			<?php
				  $result5 = mysql_query("SELECT sum(qty) FROM orders WHERE confirmation='$transnum'");
					while($row5 = mysql_fetch_array($result5))
					  { 
						echo $row5['sum(qty)']; 
					  }
				  ?>
			" />
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td width="150">Delivery Method</td>
				<td  width="150"><select name="country" onChange="getState(this.value)">
				<option value="0">Select Method</option>
				<option value="1">Cash On delivery</option>
				<!-- <option value="2">Shipping Inside Batangas</option>
				<option value="3">Shipping Outside Batangas</option> -->
				</select></td>
			  </tr>
			  <tr style="">
				<td>Payment Method</td>
				<td ><div id="statediv"><select name="state" >
					</select></div></td>
			  </tr>
			</table>
			<input type="submit" value="Check Out">
			</form>
		</div>
		<div class="clearfix"></div>
	</div>







		
		<div class="clear"></div>
		<?php include("../footer.php");?>
		</body>
		</html>