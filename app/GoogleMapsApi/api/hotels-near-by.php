	<?php
    include ('../includes/app.php'); #Including the App
		include ('../assets/header.php'); # Including the common header
	?>



    <div class="jumbotron">
      <h3>Find Hotels Near Me : </h3>

      This Demo is about Finding the Hotels near the location. You shall choose the country or leave all, according to your wish.
      
    </div>


<style>
    .google-maps {
        position: relative;
        padding-bottom: 75%; // This is the aspect ratio
        height: 0;
        overflow: hidden;
    }
    .google-maps iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100% !important;
        height: 100% !important;
    }
</style>

    <div class="well">
      <h3>Output : </h3>
      
<div class="google-maps">
    <iframe src="hotels-near-by-frame.php" width="600" height="450" frameborder="0" style="border:0"></iframe>
</div>


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