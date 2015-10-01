<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="GoogleApi in PHP">
    <meta name="author" content="Sulthan Allaudeen">
    <link rel="icon" href="img/favicon.ico">

    <title>Google Maps Api in PHP</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $url;?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="<?php echo $url;?>assets/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo $url;?>assets/css/theme.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo $url;?>assets/js/ie-emulation-modes-warning.js"></script>
    
    <script src="<?php echo $url;?>assets/js/shCore.js"></script>
    <script src="<?php echo $url;?>assets/js/shBrushJScript.js"></script>
    <link href="<?php echo $url;?>assets/css/shCoreDefault.css" rel="stylesheet">
    <script type="text/javascript">SyntaxHighlighter.all();</script>

    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="jshtml5shiv.min.js"></script>
      <script src="assets/js/respond.min.js"></script>
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
          <a class="navbar-brand" href="<?php echo $url;?>index.php">Google Maps Api in PHP</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        <?php

        $PageUrl = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $PageUrl = explode("/", $PageUrl);
        $Count = count($PageUrl);
        $Page = $PageUrl[$Count-1];
        if ($Page=='') 
        {
          $Page = $PageUrl[$Count-2];         
        }
        $Class = 'class="active"';
        ?>
          <ul class="nav navbar-nav">
            <li <?php if($Page=='index.php' || $Page==''){ echo $Class; } ?>><a href="<?php echo $url;?>index.php">Home</a></li>
            <li <?php if($Page=='about.php' || $Page==''){ echo $Class; } ?>><a href="<?php echo $url;?>about.php">About</a></li>
            <li <?php if($Page=='contact.php' || $Page==''){ echo $Class; } ?>><a href="<?php echo $url;?>contact.php">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Know More <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Related Links</a></li>
                <li><a href="#">Technologies Used</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Even More</li>
                <li><a href="#">Stat of this App</a></li>
                <li><a href="#">License followed</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container theme-showcase" role="main">