<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Sysaxiom - Sulthan Allaudeen's Personal Lab & Blog">
    <meta name="author" content="Sulthan Allaudeen">
    <link rel="icon" href="{{ asset('/').('favicon.ico') }}">

    <title>Sysaxiom | Sulthan Allaudeen&#039;s Personal Lab &amp; Blog</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/').('public/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <!-- Bootstrap theme -->
    <link href="{{ asset('/').('public/css/bootstrap-theme.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>

    <!-- Custom styles for this template -->
    <link href="{{ asset('/').('public/css/theme.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="{{ asset('/').('public/js/ie-emulation-modes-warning.js') }}"></script>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body role="document">

    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand">Sysaxiom</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="<?php if ($_SERVER['REQUEST_URI']=='/') { echo 'active'; } ?>"><a href="{{ URL::to('/') }}">Home </a></li>
            <li class="<?php if (preg_match('/blog/',$_SERVER['REQUEST_URI']))  { echo 'active'; } ?>"><a href="{{ URL::to('/') }}/blog">Blog</a></li>
            <li class="<?php if ($_SERVER['REQUEST_URI']=='/contact') { echo 'active'; } ?>"><a href="{{ URL::to('/') }}/contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">More <span class="caret"></span></a>
              <ul class="dropdown-menu" >
                <li><a href="{{ URL::to('/') }}/gallery">Gallery</a></li>
                <li><a href="{{ URL::to('/') }}/project">Projects</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header" >About this website</li>
                <li><a href="{{ URL::to('/') }}/technology">Technology used</a></li>
              </ul>
			  
            </li>
          </ul>
		  <?php
		  if (Auth::check())
		{
		?>
		  <!-- If Sulthan Logged in Then,, -->
		  <ul class="nav navbar-nav navbar-right">
			<?php
			if(isset($data->id))
			{
			?>
            <li><a href="{{ URL::to('/editblog/'.$data->id) }}">Edit Blog</a></li>
			<?php
			}
			?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
              <ul class="dropdown-menu" >
                <li><a href="{{ URL::to('/') }}/gallery">Profile</a></li>
                <li><a href="{{ URL::to('/') }}/project">Settings</a></li>
				<li><a href="{{ URL::to('/logout') }}">Logout</a></li>
              </ul>
			  
            </li>
          </ul>
		  <!-- End of My Menu-->
		  <?php
		  }
		  ?>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
 @yield('content')
    <div class="container footer">
    <footer>
      <p class="text-muted">&copy; 2012 - 2015 <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/"><img alt="Creative Commons License" src="{{ asset('/').('public/images/cc.png') }}" /></a>
      <span class="pull-right">Created using <a href="laravel.com/">Laravel 5 </a> with the help of <a href="http://getbootstrap.com">Twitter Bootstrap</a> and <a href="http://fontawesome.io">Font Awesome</a>. <a href="/feeds/atom.xml"><i class="fa fa-rss fa-fw"></i></a></span>
      <br><i class="fa fa-code fa-fw"></i> Sulthan Allaudeen
      <br><i class="fa fa-envelope fa-fw"></i> <a href="mailto:sa@sysaxiom.com">sa@sysaxiom.com</a>
      <br><i class="fa fa-phone-square fa-fw"></i> 904.244.5010</p>
    </footer>
  </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="{{ asset('/').('public/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/').('public/js/docs.min.js') }}"></script>
    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ asset('/').('public/js/ie10-viewport-bug-workaround.js') }}"></script>
  </body>
</html>