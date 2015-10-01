	<?php
    include ('../includes/app.php'); #Including the App
		include ('../assets/header.php'); # Including the common header
	?>

<script src="http://maps.googleapis.com/maps/api/js"></script>


    <script>
var myCenter=new google.maps.LatLng(51.508742,-0.120850);
var marker;

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
  animation:google.maps.Animation.BOUNCE
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
      <h3>Animated Marker : </h3>

      This Demo is about using Animated Marker in Map
      
    </div>


    <div class="well">
      <h3>Output : </h3>
      <div id="googleMap" style="width:500px;height:380px;"></div>
    </div>

    <div class="well">
      <h3>Code : </h3>
      


<pre class="brush: js;">
var myCenter=new google.maps.LatLng(51.508742,-0.120850);
var marker;

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
  animation:google.maps.Animation.BOUNCE
  });

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);

</pre>



    </div>
            

        

        


    




	  
	<?php
		include ('../assets/footer.php'); #Including the common footer
	?>