	
  <?php
    #Let's Sharp the Blade before we Turn on the Lights
    include ('includes/app.php'); #Including the App
		include ('assets/header.php'); # Including the common header
	?>
    <div class="container theme-showcase" role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h3>Google Maps Api in PHP</h3>
        <p>This is the application which implements (mostly) all the Api's Provided by Google Map Api in PHP.</p>
        <h4>Note : </h4>
        Please allow the access to locate the GPS as the Application is fully depend on it.
        <h5><b>S.A. Sulthan Allaudeen</b></h5>
        
	  </div>


	  <div class="well">
        <div class="page-header">
        <h2>Here are the List of Api's</h2>
      </div>

      <div class="row">
        <div class="col-sm-4">
          <div class="list-group">
            <a href="#" class="list-group-item active">
              Basics
            </a>
            <a href="<?php echo $url.'api/loadingsimplemap.php'?>" class="list-group-item">Loading Simple Map</a>
            <a href="<?php echo $url.'api/geocoding.php'?>" class="list-group-item">Geocoding</a>
            <a href="<?php echo $url.'api/geolocation.php'?>" class="list-group-item">GeoLocation</a>
            <a href="<?php echo $url.'api/localizingmap.php'?>" class="list-group-item">Localizing Map</a>
            <a href="<?php echo $url.'api/mapprojection.php'?>" class="list-group-item" style="display:none">Map Projection</a>
            <a href="<?php echo $url.'api/enablesignin.php'?>" class="list-group-item">Enable Signin</a>
            <a href="<?php echo $url.'api/savecontrol.php'?>" class="list-group-item">Save Control</a>
            <a href="<?php echo $url.'api/markmap.php'?>" class="list-group-item">Map Marker</a>
            <a href="<?php echo $url.'api/markmapanimate.php'?>" class="list-group-item">Map Marker Animate</a>
            <a href="<?php echo $url.'api/custommarkmap.php'?>" class="list-group-item">Custom Map Marker</a>
            
          </div>
        </div><!-- /.col-sm-4 -->
        <div class="col-sm-4">
          <div class="list-group">
            <a href="#" class="list-group-item active">
              Api's
            </a>
            <a href="<?php echo $url.'api/hotels-near-by.php'?>" class="list-group-item">Find Hotels Near me</a>
            
          </div>
        </div><!-- /.col-sm-4 -->
        <div class="col-sm-4" style="display:none">
          <div class="list-group">
            <a href="#" class="list-group-item active">
              Cras justo odio
            </a>
            <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
            <a href="#" class="list-group-item">Morbi leo risus</a>
            <a href="#" class="list-group-item">Porta ac consectetur ac</a>
            <a href="#" class="list-group-item">Vestibulum at eros</a>
          </div>
        </div><!-- /.col-sm-4 -->

      </div>
      
	  </div>

	<?php
		include ('assets/footer.php'); #Including the common footer
	?>