<?php
include ('../../includes/app.php'); #Including the App



   $GoogleApiResult = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?origins=chennai&destinations=coimbatore&language=en");
    $GoogleApiResultDecoded = json_decode($GoogleApiResult);
    


// $GoogleApiResult = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?origins=chennai&destinations=coimbatore&language=en");
// $GoogleApiResultDecoded = json_decode($GoogleApiResult);











##

#$RequestUrl = "https://maps.googleapis.com/maps/api/geocode/json?latlng=".$DriverData[0]->Lat.','.$DriverData[0]->Long."&key=AIzaSyC2pESdfUbnL2i1eHrJY4v6cWLI9EJePCo";  
