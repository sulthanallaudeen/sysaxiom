<!DOCTYPE html>
<html lang="en" ng-app="myApp">
  <head>
    <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
          <title>Sysaxiom - Task Manager App</title>
          <!-- Bootstrap -->
		  <script src="public/admin/js/angular/jquery.min.js"></script>
		  <script>
$(document).ready(function(){

    $(".dropdown-toggle").click(function(){
        $("#menuArea").toggle();
		console.log('clicked')
    });
});
</script>
              </head>
	<body ng-cloak="">
           <div data-ng-view="" id="ng-view" class="slide-animation"></div>
    </body>
  <!-- Libs -->
  
  <script src="public/admin/js/angular/angular.min.js"></script>
  <script src="public/admin/js/angular/angular-route.min.js"></script>
  <script src="public/admin/js/angular/angular-animate.min.js" ></script>
  <script src="public/admin/js/angular/toaster.js"></script>
  <script src="public/admin/app/js/app.js"></script>
  <script src="public/admin/app/js/data.js"></script>
  <script src="public/admin/app/js/directives.js"></script>
  <script src="public/admin/app/js/authCtrl.js"></script>
</html>