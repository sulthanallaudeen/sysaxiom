<!DOCTYPE html>
<html>
  <head>
    <title>Enable sign-in</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <style>
      html, body, #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
    <script>
/*
 * This example enables Sign In by loading the Maps API with the signed_in
 * parameter set to true. For example:
 *
 * https://maps.googleapis.com/maps/api/js?signed_in=true&v=3.exp
 *
 */

function initialize() {
  var mapOptions = {
    zoom: 17,
    center: {lat: -33.8666, lng: 151.1958}
  };
  var map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
  </head>
  <body>
    <div id="map-canvas"></div>
  </body>
</html>