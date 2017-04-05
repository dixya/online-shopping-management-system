<div class="header-top"></div>
<div class="header-menu">
	<div id="header">
		<div class="logo">
			<a href="index.php"><img src="images/easylogo.png" width="200px" height="80px" /></a>
		</div>
		<div class="search">
			<table border="0">
			<form name="frm" method="post" action="index.php?page=search">
				<tr>
					<td><input type="text" placeholder="search..." type="text" value="" name="search" class="search-input" ></td>
					<td><input type="submit" class="search-submit" value=""></td>
			</form>
			</table>
		</div>
		<div class="shortcut">
			<ul class="ul_tooltip">
				<!--<li><p><a href="#">recently viewed</a> | <a href="#">my account</a> | <a href="#">contact</a> </p></li>
				<li><a href="cart.html" class="cart" ><img src="images/shopping-bag.png"></a></li>-->
				<li>
					<a href="reviewcart.php" class="tooltip" ><img src="images/shopping-bag.png">
	  		  			<span>
	        				<div class="arrow-top" /></div>
	        				<strong>CART IS EMPTY</strong><br />
	        				you have no products in cart!!!   
						</span>
					</a>
				</li>
				<li>
					<a href="wishlist.html" class="tooltip" ><img src="images/wishlist.png">
						<span>
        					<div class="arrow-top"/></div>
        					<strong>WISHLIST IS EMPTY</strong><br />
							you have no wishlist items!!!   
			 			</span>
					</a>
				</li>
				<li>
					<a href="notification.html" class="tooltip" ><img src="images/notification-bell-2.png">
						<span>
        					<div class="arrow-top"/></div>
        					<strong>NO NOTIFICATIONS</strong><br />
							you have no NOTIFICATIONS!!!   
			 			</span>							
					</a>
				</li>
			</ul>
		</div>
		<div class="user">
			<ul class="user1">
					<li><a href="#login_form" id="login_pop">Login</a></li>
					<li><a href="#join_form" id="join_pop">Register</a></li>
					<!--<li><a href="#forgotpw_form" id="forgotpw_pop">forgot</a></li>-->
			</ul>
					
		</div>
	</div>
	<div class="clear"></div>
	<nav id="cbp-hrmenu" class="cbp-hrmenu">
		<ul>
			<?php $sql="SELECT * FROM category WHERE status='1'";
			$result=executequery($sql);
			while($data=mysql_fetch_assoc($result)):
			$cat_id=$data['cat_id'];?>
			<!--<li><a href="index.php?page=shop">Shop</a></li>-->
			<li>
				<a href="index.php?page=category&cat_id=<?php echo $cat_id;?>"><?php echo $data['cat_name'];?></a>
				<div class="cbp-hrsub">
					<div class="cbp-hrsub-inner"> 
						<div>
							<?php $sql1="SELECT * FROM subcategory WHERE cat_id=$cat_id AND status='1'";
							$result_sub=executequery($sql1);
							while($data_sub=mysql_fetch_array($result_sub)):
							$subcatid=$data_sub['subcat_id'];?>
							<section id="section-3">
								<div class="mediabox">
									<table>
										<tr>
											<td><?php $img= $data_sub['subcat_image']; 
											if($img):?><a href="index.php?page=subcategory&subcatid=<?php echo $subcatid;?>">
											<img src="userfiles/catimages/<?php echo $img;?>" title="<?php echo $data_sub['cat_name'];?>" width="50px" height="40px" /></a><?php endif; ?></td>
											<td style="padding-left:10px;">		<a href="index.php?page=subcategory&subcatid=<?php echo $subcatid;?>">
											<h3><?php echo $data_sub['subcat_name'];?></h3></a>
											</td>
										</tr>
									</table>
								</div>
							</section>
							<?php endwhile;?>
						</div>
					</div><!-- /cbp-hrsub-inner -->
				 </div><!-- /cbp-hrsub -->
			 </li>
			<?php endwhile;?>
		</ul>
	</nav>
	<div class="clear"></div>
</div>
<!-- popup login form #1 -->
<a href="#x" class="overlay" id="login_form"></a>
<div class="popup">
<h2>Login</h2>
	<div class="first_popup">
		<div>
			<form name="frmlogin" method="post" action="cust_login.php">
			<input type="text" id="login" name="username" placeholder="Username" />
		</div>
		<div>
			<a href="#forgotpw_form" id="forgotpw_pop"></a>
			<a href="#forgotpw_form" rel="register" class="linkform" id="forgotpw_pop">Forgot your password?</a>
		</div>
		<div>
			<input type="password" id="password" name="password" placeholder="Password" />
		</div>
		<div class="bottom">	
			<div class="remember">
				<input type="checkbox" /><span class="text">Keep me logged in</span>
			</div>
			<div class="clear"></div>
			<div>
				<input type="submit" name="submit" value="Login" >
				</form>
			</div>
			<a href="#join_form" rel="register" class="linkform">Don't have an account? Register here</a>
			<div class="clear"></div>
		</div>
	</div>
	<div class="vertical_line">
		<span class="divider"></span>
		<div class="or">OR</div>
		<span class="divider"></span>
	</div>
	<div class="second_popup">
		<img src="images/fbconnect.png" width="220px" >
	</div>
	<a class="close" href="#close"></a>
</div>
<!-- popup register form #2 -->
<a href="#x" class="overlay" id="join_form"></a>
<div class="popup">
<h2>Sign Up</h2>
	<div class="first_popup">
		<div>
			<form name="frmsignup" method="post" action="cust_signup.php">
			<input type="text" id="firstname" placeholder="First name" name="fname" />
		</div>
		<div>
			<input type="text" id="lastname" placeholder="Last name" name="lname"/>
		</div>
		<div>
			<input type="text" id="username" placeholder="Username" name="username"/>
		</div>
		<div>
			<input type="text" id="email"  placeholder="Enter your email address"  name="email" />
		</div>
		<div>
			<input type="password" id="pass" placeholder="Password" name="password"/>
		</div>
		<div>
			<input type="text" id="phone" placeholder="Phone" name="phone" />
		</div>
		<div>
			<input type="text" id="country" placeholder="Country" name="country"/>
		</div>
		<div>
			<input type="radio" name="gend" value="male" />Male
			<input type="radio" name="gend" value="female"/>Female
		</div>
		<div>
			<input type="text" id="address" placeholder="Address" name="address"/>
		</div>
		<div>
			<input type="submit" value="Sign Up" name="submit">
		</form>
		</div> 
		<a href="#login_form" id="login_pop"><span class="text">Log In</span></a>
		<div class="clear"></div>
	</div>
	<div class="vertical_line">
		<span class="divider"></span>
		<div class="or">OR</div>
		<span class="divider"></span>
	</div>
	<div class="second_popup">
		<img src="images/fbconnect.png" width="220px" >
	</div>
	<a class="close" href="#close"></a>
</div>
<!-- popup forgot password form #3-->
<a href="#x" class="overlay" id="forgotpw_form"></a>
<div class="popup">
<h2>Forgot Password</h2>
	<div class="first_popup">
		<div class="bottom">	
		<div>
				<input type="text" placeholder="Enter your email address" />
		</div>
		<div >
			<input type="submit" value="Send reminder">
		</div>
			<a href="#login_form" id="login_pop" class="linkform">Suddenly remebered? Log in here</a>
			<a href="#join_form" rel="register" class="linkform">Don't have an account? Register here</a>
		</div>
	<div class="clear"></div>
	</div>
	<div class="vertical_line">
		<span class="divider"></span>
		<div class="or">OR</div>
		<span class="divider"></span>
	</div>
	<div class="second_popup">
		<img src="images/fbconnect.png" width="220px" >
	</div>
	<a class="close" href="#close"></a>
</div>