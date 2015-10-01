	<?php
    include ('../includes/app.php'); #Including the App
		include ('../assets/header.php'); # Including the common header
	?>

<script src="http://maps.googleapis.com/maps/api/js"></script>


   <script>
var myCenter=new google.maps.LatLng(51.508742,-0.120850);

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:5,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker=new google.maps.Marker({
  position:myCenter,
  icon:'http://sysaxiom.com/wp-content/uploads/2015/05/Sulthan-Allaudeen-150x150.jpg'
  });

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>

     <style>
      #map-canvas {
        height:500px;
        margin: 0px;
        padding: 0px
      }
  </style>

    <div class="jumbotron">
      <h3>Custom Marker Icon : </h3>

      This Demo is about using Custom Icon instead of deafult Google Marker
      
    </div>


    <div class="well">
      <h3>Output : </h3>
      <div id="googleMap" style="width:500px;height:380px;"></div>
    </div>

    <div class="well">
      <h3>Code : </h3>
      


<pre class="brush: js;">
var myCenter=new google.maps.LatLng(51.508742,-0.120850);

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:5,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker=new google.maps.Marker({
  position:myCenter,
  icon:'pinkball.png'
  });

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);

</pre>



    </div>
            

        

        


    




	  
	<?php
		include ('../assets/footer.php'); #Including the common footer
	?>