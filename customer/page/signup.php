    <div class="main_container">
    	<div class="center_content">
    	  <table>
    		<p class="title">Customer Sign-Up</p>
			<form name="frmsignup" method="post" action="chkcustsignup.php">
			<table border="0">
			<tr><td>Your Name:</td><td>First&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			 Middle&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Last </td>
			<tr><td></td><td> <input type="text" name="fname" value=""/>
							  <input type="text" name="mname" value=""/>
							  <input type="text" name="lname"  value=""/></td></tr>
            <tr><td>Username: </td>
            	<td><input type="text" style="BORDER:1px solid #349534; width:150px;" name="username" id="username"size="30" maxlength="20"  value="">
		Status:<span id="msgbox" style="display:none; font-size:9px;"></span></td></tr>
			<tr><td>Password: </td><td><input type="password" name="password" style="BORDER:1px solid #349534; width:150px;" class="password" /></td></tr>
			<tr><td>Retype Password: </td><td><input type="password" name="repassword" style="BORDER:1px solid #349534; width:150px;" class="password" /></td></tr>
            <tr><td>E-mail: </td><td><input type="text" name="email"  value="" /></td></tr>
			<tr><td>Retype E-mail: </td><td><input type="text" name="reemail"  value="" /></td></tr>
			<tr><td>Gender:</td><td> <input type="radio" name="gender" value="male" />Male
									 <input type="radio" name="gender" value="female" />Female</td></tr>
			<tr><td>Address:</td><td> <input type="text" name="address"  value="" /></td></tr>
		    <tr><td>Phone: </td><td><input type="text" name="phone"  value=""/></td></tr>
			<tr><td>Country:</td><td> <input type="text" name="country"  value="" /></td></tr>
			<tr><td>City:</td><td> <input type="text" name="city"  value="" /></td></tr>
			<tr><td>Postal:</td><td> <input type="text" name="postal"  value="" /></td></tr>
			<tr><td>Image:</td><td><input type="file" name="pict" /></td></tr>
		    <tr><td><img src="admin/captcha.php" /></td></tr>
		    <tr> <td> Enter Image Text</td><td><input name="captcha" type="text">
            </td></tr>
			<tr><td>
			<input type="submit" name="submit" value="Register" />
			</td></tr>
    	  </table>
    	</div>	
      </div>
