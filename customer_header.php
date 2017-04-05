<?php 
	$username = $_SESSION['username'];
	include("../admin/dbconnect.php");
	$query1="SELECT * FROM customer WHERE username = '$username'";
	$result1=mysql_query($query1);
	while($row1=mysql_fetch_assoc($result1))
	{
		$name=$row1['username'];
		echo $name;
	}
	$cart_item = 8; 
	if($cart_item!=0)
		$cart_msg = "Dear $name, you have $cart_item items in your cart! ";
	else
		$cart_msg = "Your cart is empty!";
?> 
<div class="header-top">
		<!--<div class="header-top-cnt">
			<div class="customer">
				<ul>
					<li><p>24/7 Customer Service</a></p></li>

				</ul>
			</div>
			<div class="user">
				<ul class="user1">
				<li><a href="#login_form" id="login_pop">Login</a></li>
				<li><a href="#join_form" id="join_pop">Register</a></li>
				<!--<li><a href="#forgotpw_form" id="forgotpw_pop">forgot</a></li>
				</ul>	
			</div>
		</div>-->
</div>
<div class="clear"></div>
<div class="header-menu">
	<div id="header">
		<div class="logo">
			<a href="index.php"><img src="../images/logomain.jpg" /></a>
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
						<a href="reviewcart.php" class="tooltip" ><img src="../images/shopping-bag.png">
  		  					<span>
        						<div class="arrow-top" /></div>
        						<strong>CART IS EMPTY</strong><br />
								you have no products in cart!!!   
							 </span>
						</a>
					</li>
					<li>
						<a href="wishlist.html" class="tooltip" ><img src="../images/wishlist.png">
							<span>
        						<div class="arrow-top"/></div>
        						<strong>WISHLIST IS EMPTY</strong><br />
								you have no wishlist items!!!   
			 				</span>
						</a>
					</li>
					<li>
						<a href="notification.html" class="tooltip" ><img src="../images/notification-bell-2.png">
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
				<li>Welcome <?php print $name; ?></li>
				<li>Logout</a></li>
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
		<!--<li>
			<a href="index.php?page=shop">Shop</a>
		</li>-->
		<li>
			<a href="index.php?page=category&cat_id=<?php echo $cat_id;?>"><?php echo $data['cat_name'];?></a>
			<div class="cbp-hrsub">
				<div class="cbp-hrsub-inner"> 
					<div>
						<?php $sql1="SELECT * FROM subcategory WHERE cat_id=$cat_id AND status='1'";
						$result_sub=executequery($sql1);
						while($data_sub=mysql_fetch_array($result_sub)):
						$subcatid=$data_sub['subcat_id'];
					 /*<<ul>
						 <?php// $sql2="SELECT * FROM product WHERE subcat_id=$subcatid AND status='1'";
						// $result_prod=executequery($sql2);
						// while($data_prod=mysql_fetch_array($result_prod)):
						// $prodid=$data_prod['product_id'];?>
						<li>
						<a href="index.php?page=single&prodid=<?php echo $prodid;?>"><?php echo $data_prod['product_name'];?></a>

 </li>
							<?php endwhile;?>
					</ul>*/?>


	<section id="section-3">
		<div class="mediabox">
		<table>
		<tr>
		
		<td><?php $img= $data_sub['subcat_image']; 
		if($img):?><a href="index.php?page=subcategory&subcatid=<?php echo $subcatid;?>">
<img src="../userfiles/catimages/<?php echo $img;?>" title="<?php echo $data_sub['cat_name'];?>" width="50px" height="40px" /></a><?php endif; ?></td>
		<td style="padding-left:10px;">		<a href="index.php?../page=subcategory&subcatid=<?php echo $subcatid;?>">
<h3><?php echo $data_sub['subcat_name'];?></h3></a>

</td></tr>
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