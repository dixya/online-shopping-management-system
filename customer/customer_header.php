<?php session_start();

	$username = $_SESSION['username'];
	$query1="SELECT * FROM customer WHERE username = '$username'";
	$result1=mysql_query($query1);
	while($row1=mysql_fetch_object($result1))
	{
		$name=$row1->username;
		// echo $name;
	} ?> 
<div class="header-top">
</div>
<div class="clear"></div>
<div class="header-menu">
	<div id="header">
		<div class="logo">
			<a href="index.php"><img src="../images/easylogo.png" /></a>
		</div>
<div class="search">
			<table border="0">
			<form name="frm" method="post" action="index.php?page=search&transnum=<?php echo $transnum;?>">
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
						<a href="index.php?page=reviewcart&transnum=<?php echo $transnum;?>&username=<?php echo $name;?>" class="tooltip" ><img src="../images/cart.png" width="73" height="73" style="margin-top: 5px;">
							<?php $cartsql = "SELECT SUM(qty) as qty FROM orders WHERE username='$name'";
							$cartres = executequery($cartsql);
							$cartdata = mysql_fetch_object($cartres);
							$cartdata = $cartdata->qty;
								if($cartdata){
								echo '<div class="cart-data style="width:50px;">'.$cartdata.'</div>';}
								else{
									echo '<div class="cart-data">0</div>';

								}?>
							  <span>
        						<div class="arrow-top" /></div>
        						<strong>VIEW YOUR CART</strong><br />  
							 </span>
									
							

						</a>
					</li>
					<li>
						<a href="index.php?page=reviewwishlist&transnum=<?php echo $transnum;?>&username=<?php echo $name;?>" class="tooltip" ><img src="images/wish.png" width="68" height="68" style="margin-top: 15px;">
							<?php $w_sql = "SELECT count(wid) as count FROM wishist WHERE username='$username'";
								$count_res = executequery($w_sql);
								$row = mysql_fetch_object($count_res);
								    $wid  = $row->count;
								 if($wid){
								echo '<div class="cart-data">'.$wid.'</div>';}
								 else{
									echo '<div class="cart-data">0</div>';
								  }?>

							<span>
        						<div class="arrow-top"/></div>
        						<strong>VIEW YOUR WISHLIST</strong><br />
			 				</span>
						</a>
					</li>
					
				</ul>
		</div>
		<div class="user">
			<ul class="user1">
				<li>WELCOME <?php echo $name; ?></li>
				<li><a id=user class="icon icon-lock" href="do_logoff.php">Log Out</a></li>
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
			<a href="../index.php?page=category&cat_id=<?php echo $cat_id;?>&transnum=<?php echo $transnum;?>"><?php echo $data['cat_name'];?></a>
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
		if($img):?><a href="index.php?page=subcategory&subcatid=<?php echo $subcatid;?>&transnum=<?php echo $transnum;?>">
<img src="../userfiles/catimages/<?php echo $img;?>" title="<?php echo $data_sub['cat_name'];?>&transnum=<?php echo $transnum;?>" width="50px" height="40px" /></a><?php endif; ?></td>
		<td style="padding-left:10px;">		<a href="index.php?page=subcategory&subcatid=<?php echo $subcatid;?>&transnum=<?php echo $transnum;?>">
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