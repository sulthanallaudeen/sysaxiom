	<?php
    include ('../includes/app.php'); #Including the App
		include ('../assets/header.php'); # Including the common header
	?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
    <script>
function initialize() {
  var mapOptions = {
    zoom: 17,
    center: {lat: 13.0827, lng: 80.2707}
  
  };

  var map = new google.maps.Map(document.getElementById('map-canvas'),
    mapOptions);

  var infowindow = new google.maps.InfoWindow();

  var marker = new google.maps.Marker({
    map: map,
    // Define the place with a location, and a query string.
    place: {
      location: {lat: 13.0827, lng: 80.2707},
      
      query: 'Google, Chennai'

    },
    // Attributions help users find your site again.
    attribution: {
      source: 'Google Maps JavaScript API',
      webUrl: 'https://developers.google.com/maps/'
    }
  });

  // Construct a new InfoWindow.
  var infowindow = new google.maps.InfoWindow({
    content: 'Google Chennai'
  });

  // Opens the InfoWindow when marker is clicked.
  marker.addListener('click', function() {
    infowindow.open(map, marker);
  });
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
      <h3>Distance Matrix : </h3>

      Note : Distance Matrix has been changed by google, It will be updated soon.
      
    </div>


    <div class="well">
      <h3>Output : </h3>
      <div id="map-canvas"></div>
    </div>

    <div class="well">
      <h3>Code : </h3>
      


<pre class="brush: js;">
code here
</pre>



    </div>
            

        

        


    




	  
	<?php
		include ('../assets/footer.php'); #Including the common footer
	?>