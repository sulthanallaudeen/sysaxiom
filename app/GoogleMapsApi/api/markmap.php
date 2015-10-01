	<?php
    include ('../includes/app.php'); #Including the App
		include ('../assets/header.php'); # Including the common header
	?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
    <script>
function initialize() {
  var mapOptions = {
    zoom: 8,
    center: new google.maps.LatLng(13.0827,80.2707)
  };
  var map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);

  google.maps.event.addListener(map, 'click', function(e) {
    placeMarker(e.latLng, map);
  });
}

function placeMarker(position, map) {
  var marker = new google.maps.Marker({
    position: position,
    map: map
  });
  map.panTo(position);
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
      <h3>Marker in Map : </h3>

      This Demo is about using Marker in Map
      
    </div>


    <div class="well">
      <h3>Output : </h3>
      <div id="map-canvas"></div>
    </div>

    <div class="well">
      <h3>Code : </h3>
      


<pre class="brush: js;">
function initialize() {
  var mapOptions = {
    zoom: 8,
    center: new google.maps.LatLng(13.0827,80.2707)
  };
  var map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);

  google.maps.event.addListener(map, 'click', function(e) {
    placeMarker(e.latLng, map);
  });
}

function placeMarker(position, map) {
  var marker = new google.maps.Marker({
    position: position,
    map: map
  });
  map.panTo(position);
}

google.maps.event.addDomListener(window, 'load', initialize);

</pre>



    </div>
            

        

        


    




	  
	<?php
		include ('../assets/footer.php'); #Including the common footer
	?>