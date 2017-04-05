<div class="contact-first">
<div class="mesg">
  <?php
  if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email']; 
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  $data = mysql_query("INSERT INTO contact (fname, email, lname, msg) VALUES ('$name','$email','$subject','$message')");
if($data){
  echo "Your message has been received!!!!";
}
  else{
    echo "Error sending message. RETRY.";
  }
}
?>
</div>
	<div class="title-wrapper">
	        <h2 style="font-size:24pt; color:navy; padding:5; align:center;" >GIVE US A FEEDBACK</h2>
	        <p style="font-size:15pt;">our team would love to hear from you. Get in touch with us.</p>
	</div>
  <div class="clear"></div>
  <div class="banner">
	   <div class="contact-form">
	       <form method="post" action="#" name="contact-form" id="contact-form">	
	        <table>
            <tr >
              <td><label>Name:</label></td>&nbsp;&nbsp;&nbsp;
              <td><input type="text" name="name" id="name" size="50" /></td>
            </tr>
            <tr>
              <td><label>Email:</label></td>
              <td><input type="text" name="email" id="email" size="50" /></td>
            </tr>
            <tr>
              <td><label>Subject:</label></td>
              <td><input type="text" name="subject" id="subject" size="50" /></td>
            </tr>
            <tr>
              <td><label>Message:</label></td>
              <td><textarea name="message" id="message" cols="40" rows="10"></textarea></td>
            </tr>
            <tr>
              <td colspan="2" class="btn">
	            <input type="submit" name="submit" id="submit" value="Send" />
              </td>
            </tr>
	        </table>
      </div>
      <div class="contact-form">

        <table>
          <tr>
            <td><label><img src="images/mail.png" /></label></td>
            <td><a href="mailto:easyshop@mail.com"><label>easyshop@mail.com</label></a></td>
          </tr>
          <tr>
            <td><label><img src="images/phone.png" /></label></td>
            <td><label>+977 0123456</label></td>
          </tr>
          <tr>
            <td><label><img src="images/location.png" /></label></td>
            <td><label>Sitapaila, Kathmandu</label></td>
          </tr>
      </table>
	   </form>
     <div class="follow1">
    <ul>
      <li><h2 style="font-size:15pt;  color: navy;">Follow Us</h2></li>
      <hr>
      <a href="http://www.facebook.com/techsperia" target="_blank" title="Facebook Page"><img src="https://lh4.googleusercontent.com/-uL3jsHIxA9k/UfvX5P1YlBI/AAAAAAAABTM/xEEGE8v7bBw/s32/facebook-round-32.png" /></a>
      <a href="http://twitter.com/techsperia" target="_blank" title="Twitter"><img src="https://lh3.googleusercontent.com/-OGPHopL7dmo/UfvX5GHrAoI/AAAAAAAABTI/l8Y2o6GLGuo/s32/twitter-round-32.png" /></a>
      <a href="https://plus.google.com/107015367605965056336" target="_blank" title="Google Plus"><img src="https://lh6.googleusercontent.com/-wES9aPRTEHs/UfvX5AVe79I/AAAAAAAABTU/yVbc5-CwP0Y/s32/google_plus-round-32.png" /></a>   
      <a href="" target="_blank" title="RSS Feed"><img src="images/feed.png" /></a>
      <a href="" target="_blank" title="RSS Feed"><img src="images/twitter_alt.png" /></a>


    </ul>
  </div>
      </div> 
  </div><!-- end of banner-->
<div class="clear"></div>


<!--map start-->
<div class="location" id="map-canvas">
  <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
 <script>
      function initialize() {
      var myLatlng = new google.maps.LatLng(28.0,84.0);
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
}
</style>
</div>
</div>