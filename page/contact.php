<div class="header-menu">
	<div class="title-wrapper">
	        <h2>GIVE US A FEEDBACK</h2>
	        <p>our team would love to hear from you
	        <span>get in touch with us</span></p>
	</div>
	<div class="contact-form">
	        <form method="post" action="#" name="contact-form" id="contact-form">	
			<div id="response"></div>
	        <div id="main">
	            <div class="one-third">
	                <label>Name:</label>
	                <p><input type="text" name="name" id="name" size="30" /></p>
	            </div>
	            <div class="one-third">
	                <label>Email:</label>
	                <p><input type="text" name="email" id="email" size="30" /></p>
	            </div>
	            <div class="one-third-last">
	                <label>Subject:</label>
	                <p><input type="text" name="subject" id="subject" size="30" /></p>
	            </div>
	            <label>Message:</label>
	            <p><textarea name="message" id="message" cols="30" rows="10"></textarea></p>
	            <p><input  class="contact_button button" type="submit" name="submit" id="submit" value="Send" /></p>
	        </div>
	        </form>
	</div> 
    <div class="contact-detail">
    	<ul>
    		<li>Address: kdsfsdj</li>
    		<li>E-MAil: xcbvnbxcmv</li>
    		<li>Telephone:6e6r6r7</li>
    		<li>Fax: +76455787</li>
    		<li>Foloow us:
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
			</li>
    	</ul>
    </div>
    </div>
    <!--map start-->
      <div class="location" id="map-canvas">
          <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script>
      function initialize() {
  var myLatlng = new google.maps.LatLng(-25.363882,131.044922);
  var mapOptions = {
    zoom: 4,
    center: myLatlng
  };

  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  var contentString = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading">Uluru</h1>'+
      '<div id="bodyContent">'+
      '<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
      'sandstone rock formation in the southern part of the '+
      'Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) '+
      'south west of the nearest large town, Alice Springs; 450&#160;km '+
      '(280&#160;mi) by road. Kata Tjuta and Uluru are the two major '+
      'features of the Uluru - Kata Tjuta National Park. Uluru is '+
      'sacred to the Pitjantjatjara and Yankunytjatjara, the '+
      'Aboriginal people of the area. It has many springs, waterholes, '+
      'rock caves and ancient paintings. Uluru is listed as a World '+
      'Heritage Site.</p>'+
      '<p>Attribution: Uluru, <a href="http://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+
      'http://en.wikipedia.org/w/index.php?title=Uluru</a> '+
      '(last visited June 22, 2009).</p>'+
      '</div>'+
      '</div>';

  var infowindow = new google.maps.InfoWindow({
      content: contentString
  });

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Uluru (Ayers Rock)'
  });
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });
}

google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <style>
     #map-canvas {
 max-width: 200px;
 height: 500px;
}</style>
</div><!--main container end-->
<?php
	include('admin/dbconnect.php');
	$name = $_POST['name'];
	$email = $_POST['email'];	
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	mysql_query("INSERT INTO message (name, email, subject, message) VALUES ('$name','$email','$subject','$message')");
	header("location: sending.php");
?>