<div class="footer">	
<div class="footer_content">
	<div class="footer1">
		
		<ul>
			<li><h2>Explore Easy Shop</h2></li>
			<hr>
			<li><a href="">Shops</a></li>
			<li><a href="">Shoes</a></li>
			<li><a href="">Electronics</a></li>	
			<li><a href="">Accessories</a></li>	
			<li><a href="">Fashion</a></li>	
				
		</ul>

	</div>
	<div class="footer2">
		<ul>
			<li><h2>Customer Service</h2></li>
			<hr>
			<li><a href="">Help and Support</a></li>
			<li><a href="">Delivery Information</a></li>
			<li><a href="">Contact Info</a></li>
			<li><a href="">Shipping and Returns</a></li>
			<li><a href="">Secure Shopping</a></li>
		</ul>
	</div>
	<div class="footer3">
		<ul>
			<li><h2>About Easy Shop</h2></li>
			<hr>
			<li><a href="">About US</a></li>
			<li><a href="">The Team</a></li>
			<li><a href="">How To shop</a></li>
			<li><a href="index.php?page=contact">Contact US</a></li>
			<li><a href="">Survey</a></li>
		</ul>
	</div>
	<div class="footer4">
		<div class="footer41">
			<ul>
				<li><h2>Account</h2></li>
				<hr>
				<li><a href="">Login</a></li>
				<li><a href="">Register</a></li>
			</ul>
		</div>
		<div class="footer42">
			<ul>
				<li><h2>Newsletter</h2></li>
				<hr>
				<!-- <li><h5>Subscribe us</h5></li> -->
				<form name="">
					<li><input  type="text" id="first_name" placeholder="Name"></li>
					<li><input  type="text" id="last_name" placeholder="Email"></li>
					<li><input  type="submit" id="" name="submit" name="SUBSCRIBE"></li>
				</form>
			</ul>
		</div>
		
	</div>
	<div class="footer5">
	<div class="contact">
		<ul>
			<li><h2>Contact Us</h2></li>
		</ul>
		<hr>
			<table border="0" cellpadding="0px" cellspacing="5px">
			<tr>
			<td><img src="images/mail.png" /></td>
			<td><a href="mailto:easyshop@mail.com"><span>easyshop@mail.com</span></a></td>
			</tr>
			<tr>
			<td><img src="images/phone.png" /></td>
			<td><span>+977 0123456</span></td>
			</tr>
			<tr>
			<td><img src="images/location.png" /></td>
			<td><span>Sitapaila, Kathmandu</span></td>
			</tr>
		</table>
		
	</div>
	<div class="follow">
		<ul>
			<li><h2>Follow Us</h2></li>
			<hr>
			<a href="http://www.facebook.com/techsperia" target="_blank" title="Facebook Page"><img src="https://lh4.googleusercontent.com/-uL3jsHIxA9k/UfvX5P1YlBI/AAAAAAAABTM/xEEGE8v7bBw/s32/facebook-round-32.png" /></a>
			<a href="http://twitter.com/techsperia" target="_blank" title="Twitter"><img src="https://lh3.googleusercontent.com/-OGPHopL7dmo/UfvX5GHrAoI/AAAAAAAABTI/l8Y2o6GLGuo/s32/twitter-round-32.png" /></a>
			<a href="https://plus.google.com/107015367605965056336" target="_blank" title="Google Plus"><img src="https://lh6.googleusercontent.com/-wES9aPRTEHs/UfvX5AVe79I/AAAAAAAABTU/yVbc5-CwP0Y/s32/google_plus-round-32.png" /></a>		
			<a href="" target="_blank" title="RSS Feed"><img src="images/feed.png" /></a>
			<a href="" target="_blank" title="RSS Feed"><img src="images/twitter_alt.png" /></a>


		</ul>
		</div>
	</div>
</div>

<div class="clear"></div>
<div class="copyright">
	<hr><br>
	<p>Copyright &copy; 2014 All Rights Reserved. | Privacy Policy | Terms of Use </p><br>
	<p>Secure payments by <img src="images/cc.png" ></p>
	
</div>
</div>


<!---HORIZONTAL MENU LINKING---->
	<script src="js/jquery.min.js"></script>
	<script src="js/cbpHorizontalMenu.min.js"></script>	
<!--END	HORIZONTAL MENU -->
<script src="js/modernizr.custom.js"></script>
<!---HORIZONTAL MENU JAVASCRIPT---->
<script>
			$(function() {
				cbpHorizontalMenu.init();
			});
</script>
<!--END HORIZONTAL	MENU JAVASCRIPT-->
<!--below script for two range product search from price slider -->
<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>

  


<!-- SLIDER LINKING(include jQuery + carouFredSel plugin) -->
	<script type="text/javascript" language="javascript" src="js/slider_js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" language="javascript" src="js/slider_js/jquery.carouFredSel-6.2.1-packed.js"></script>
<!--END SLIDER LINKING-->
<!--SLIDER JAVASCRIPT ---->
<!-- fire plugin onDocumentReady -->
<script type="text/javascript" language="javascript">
//	Responsive layout, resizing the items
	$(function() {
	$('#foo4').carouFredSel({
			responsive: true,
			auto: true,//firstly stop if false true then it slides
			width: '100%',
			prev: '#prev2',
			next: '#next2',
			pagination: "#pager2",
			mousewheel: true,
			scroll: 1,
			items: {
				width: 500,
				//	height: '30%',	//	optionally resize item-height
				visible: {
						min: 3,
						max: 6
						}
					}
						});
	});
</script>
<!--END	SLIDER JAVASCRIPT-->
<!--script for zooming product image-->
<script type="text/javascript" src="js/zoomfancyjs/zoomjs"></script>
<script src="js/zoomfancyjs/jquery.elevatezoom.min.js" type="text/javascript"></script>
<script src="js/zoomfancyjs/jquery.fancybox.pack.js" type="text/javascript"></script>


          <script>
          jQuery(".fancybox").fancybox();
          </script>

<script type="text/javascript">
$(document).ready(function() {
$("#img1").elevateZoom({ gallery: 'gallery_01', cursor: 'pointer', galleryActiveClass: "active" });
$("#img1").bind("click", function(e) {
var ez = $('#img1').data('elevateZoom');
ez.closeAll();
$.fancybox(ez.getGalleryList());
return false;
});
});
</script>


<!-- GRID GALLERY JAVASCRIPT-->
<script src="js/imagesloaded.pkgd.min.js"></script>
		<script src="js/masonry.pkgd.min.js"></script>
		<script src="js/classie.js"></script>
		<script src="js/cbpGridGallery.js"></script>
		<script>
			new CBPGridGallery( document.getElementById( 'grid-gallery' ) );
		</script>
<!---END GRID GALLERY JAVASCRIPT----->
		
<!--category with images like menu-->
	<script src="js/fullwidthtabs.js"></script>
	<script>
		new CBPFWTabs( document.getElementById( 'tabs' ) );
	</script>
<!--end category with images like menu-->