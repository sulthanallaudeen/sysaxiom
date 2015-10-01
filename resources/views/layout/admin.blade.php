<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <!-- Title and other stuffs -->
  <title>Sysaxiom - Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">


  <!-- Stylesheets -->
  <link href="{{ asset('/').('public/admin/style/bootstrap.css') }}" type="text/css" rel="stylesheet"/>
  <!-- Font awesome icon -->
  <link href="{{ asset('/').('public/admin/style/font-awesome.css') }}" type="text/css" rel="stylesheet"/>
  <!-- jQuery UI -->
  <link href="{{ asset('/').('public/admin/style/jquery-ui.css') }}" type="text/css" rel="stylesheet"/>
  <!-- Calendar -->
  <link href="{{ asset('/').('public/admin/style/fullcalendar.css') }}" type="text/css" rel="stylesheet"/>
  <!-- prettyPhoto -->
  <link href="{{ asset('/').('public/admin/style/prettyPhoto.css') }}" type="text/css" rel="stylesheet"/>
  <!-- Star rating -->
  <link href="{{ asset('/').('public/admin/style/rateit.css') }}" type="text/css" rel="stylesheet"/>
  <!-- Date picker -->
  <link href="{{ asset('/').('public/admin/style/bootstrap-datetimepicker.min.css') }}" type="text/css" rel="stylesheet"/>
  
  <!-- Uniform 
  <link rel="stylesheet" href="public/admin/style/uniform.default.css"> 
  -->
  <!-- Bootstrap toggle -->
  <link href="{{ asset('/').('public/admin/style/bootstrap-switch.css') }}" type="text/css" rel="stylesheet"/>
  <!-- Main stylesheet -->
  <link href="{{ asset('/').('public/admin/style/style.css') }}" type="text/css" rel="stylesheet"/>
  <!-- Widgets stylesheet -->
  <link href="{{ asset('/').('public/admin/style/widgets.css') }}" type="text/css" rel="stylesheet"/>
  <script src="{{ asset('/').('public/admin/js/jquery.js') }}"></script>  
  <script src="{{ asset('/').('public/js/jquery.dataTables.min.js') }}"></script>  
  <script src="{{ asset('/').('public/lib/ckeditor/ckeditor.js') }}"></script>  
  
  <!-- HTML5 Support for IE -->
  <!--[if lt IE 9]>
  <script src="public/admin/style/js/html5shim.js"></script>
  <![endif]-->

  <!-- Favicon -->
  <link rel="icon" href="{{ asset('/').('favicon.ico') }}">
</head>

<body>

<div class="navbar navbar-fixed-top bs-docs-nav" role="banner">
  
    <div class="conjtainer">
      <!-- Menu button for smallar screens -->
      <div class="navbar-header">
      <button class="navbar-toggle btn-navbar" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
      <span>Menu</span>
      </button>
      <!-- Site name for smallar screens -->
      <a href="index.html" class="navbar-brand hidden-lg">MacBeth</a>
    </div>
      
      

      <!-- Navigation starts -->
      <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">         

        <ul class="nav navbar-nav">  

          <!-- Upload to server link. Class "dropdown-big" creates big dropdown -->
          <li class="dropdown dropdown-big">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-success"><i class="icon-cloud-upload"></i></span> Upload to Cloud</a>
            <!-- Dropdown -->
            <ul class="dropdown-menu">
              <li>
                <!-- Progress bar -->
                <p>Photo Upload in Progress</p>
                <!-- Bootstrap progress bar -->
                <div class="progress progress-striped active">
          <div class="progress-bar progress-bar-info"  role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
            <span class="sr-only">40% Complete</span>
          </div>
          </div>

                <hr />

                <!-- Progress bar -->
                <p>Video Upload in Progress</p>
                <!-- Bootstrap progress bar -->
                <div class="progress progress-striped active">
          <div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
            <span class="sr-only">80% Complete</span>
          </div>
          </div> 

                <hr />             

                <!-- Dropdown menu footer -->
                <div class="drop-foot">
                  <a href="#">View All</a>
                </div>

              </li>
            </ul>
          </li>

          <!-- Sync to server link -->
          <li class="dropdown dropdown-big">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-danger"><i class="icon-refresh"></i></span> Sync with Server</a>
            <!-- Dropdown -->
            <ul class="dropdown-menu">
              <li>
                <!-- Using "icon-spin" class to rotate icon. -->
                <p><span class="label label-info"><i class="icon-cloud"></i></span> Syncing Members Lists to Server</p>
                <hr />
                <p><span class="label label-warning"><i class="icon-cloud"></i></span> Syncing Bookmarks Lists to Cloud</p>

                <hr />

                <!-- Dropdown menu footer -->
                <div class="drop-foot">
                  <a href="#">View All</a>
                </div>

              </li>
            </ul>
          </li>

        </ul>

        <!-- Search form -->
        <form class="navbar-form navbar-left" role="search">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
    </form>
        <!-- Links -->
        <ul class="nav navbar-nav pull-right">
          <li class="dropdown pull-right">            
            <a data-toggle="dropdown" class="dropdown-toggle">
              <i class="icon-user"></i> Admin <b class="caret"></b>              
            </a>
            
            <!-- Dropdown menu -->
            <ul class="dropdown-menu">
              <li><a href="#"><i class="icon-user"></i> Profile</a></li>
              <li><a href="#"><i class="icon-cogs"></i> Settings</a></li>
              <li><a href="{{ URL::to('/logout') }}"><i class="icon-off"></i> Logout</a></li>
            </ul>
          </li>
          
        </ul>
      </nav>

    </div>
  </div>


<!-- Header starts -->
  <header>
    <div class="container">
      <div class="row">

        <!-- Logo section -->
        <div class="col-md-4">
          <!-- Logo. -->
          <div class="logo">
            <h1><a href="{{ URL::to('/dashboard') }}">Sysaxiom<span class="bold"></span></a></h1>
            <p class="meta">Allaudeen's Panel</p>
          </div>
          <!-- Logo ends -->
        </div>

        <!-- Button section -->
        <div class="col-md-4">

          <!-- Buttons -->
          <ul class="nav nav-pills">

            <!-- Comment button with number of latest comments count -->
            <li class="dropdown dropdown-big">
              <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                <i class="icon-comments"></i> Chats <span   class="label label-info">6</span> 
              </a>

                <ul class="dropdown-menu">
                  <li>
                    <!-- Heading - h5 -->
                    <h5><i class="icon-comments"></i> Chats</h5>
                    <!-- Use hr tag to add border -->
                    <hr />
                  </li>
                  <li>
                    <!-- List item heading h6 -->
                    <h6><a href="#">Hi :)</a> <span class="label label-warning pull-right">10:42</span></h6>
                    <div class="clearfix"></div>
                    <hr />
                  </li>
                  <li>
                    <h6><a href="#">How are you?</a> <span class="label label-warning pull-right">20:42</span></h6>
                    <div class="clearfix"></div>
                    <hr />
                  </li>
                  <li>
                    <h6><a href="#">What are you doing?</a> <span class="label label-warning pull-right">14:42</span></h6>
                    <div class="clearfix"></div>
                    <hr />
                  </li>                  
                  <li>
                    <div class="drop-foot">
                      <a href="#">View All</a>
                    </div>
                  </li>                                    
                </ul>
            </li>

            <!-- Message button with number of latest messages count-->
            <li class="dropdown dropdown-big">
              <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                <i class="icon-envelope-alt"></i> Inbox <span class="label label-primary">6</span> 
              </a>

                <ul class="dropdown-menu">
                  <li>
                    <!-- Heading - h5 -->
                    <h5><i class="icon-envelope-alt"></i> Messages</h5>
                    <!-- Use hr tag to add border -->
                    <hr />
                  </li>
                  <li>
                    <!-- List item heading h6 -->
                    <h6><a href="#">Hello how are you?</a></h6>
                    <!-- List item para -->
                    <p>Quisque eu consectetur erat eget  semper...</p>
                    <hr />
                  </li>
                  <li>
                    <h6><a href="#">Today is wonderful?</a></h6>
                    <p>Quisque eu consectetur erat eget  semper...</p>
                    <hr />
                  </li>
                  <li>
                    <div class="drop-foot">
                      <a href="#">View All</a>
                    </div>
                  </li>                                    
                </ul>
            </li>

            <!-- Members button with number of latest members count -->
            <li class="dropdown dropdown-big">
              <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                <i class="icon-user"></i> Users <span   class="label label-success">6</span> 
              </a>

                <ul class="dropdown-menu">
                  <li>
                    <!-- Heading - h5 -->
                    <h5><i class="icon-user"></i> Users</h5>
                    <!-- Use hr tag to add border -->
                    <hr />
                  </li>
                  <li>
                    <!-- List item heading h6-->
                    <h6><a href="#">Ravi Kumar</a> <span class="label label-warning pull-right">Free</span></h6>
                    <div class="clearfix"></div>
                    <hr />
                  </li>
                  <li>
                    <h6><a href="#">Balaji</a> <span class="label label-important pull-right">Premium</span></h6>
                    <div class="clearfix"></div>
                    <hr />
                  </li>
                  <li>
                    <h6><a href="#">Kumarasamy</a> <span class="label label-warning pull-right">Free</span></h6>
                    <div class="clearfix"></div>
                    <hr />
                  </li>                  
                  <li>
                    <div class="drop-foot">
                      <a href="#">View All</a>
                    </div>
                  </li>                                    
                </ul>
            </li> 

          </ul>

        </div>

        <!-- Data section -->

        <div class="col-md-4">
          <div class="header-data">

            <!-- Traffic data -->
            <div class="hdata">
              <div class="mcol-left">
                <!-- Icon with red background -->
                <i class="icon-signal bred"></i> 
              </div>
              <div class="mcol-right">
                <!-- Number of visitors -->
                <p><a href="#">7000</a> <em>visits</em></p>
              </div>
              <div class="clearfix"></div>
            </div>

            <!-- Members data -->
            <div class="hdata">
              <div class="mcol-left">
                <!-- Icon with blue background -->
                <i class="icon-user bblue"></i> 
              </div>
              <div class="mcol-right">
                <!-- Number of visitors -->
                <p><a href="#">3000</a> <em>users</em></p>
              </div>
              <div class="clearfix"></div>
            </div>

            <!-- revenue data -->
            <div class="hdata">
              <div class="mcol-left">
                <!-- Icon with green background -->
                <i class="icon-money bgreen"></i> 
              </div>
              <div class="mcol-right">
                <!-- Number of visitors -->
                <p><a href="#">5000</a><em>orders</em></p>
              </div>
              <div class="clearfix"></div>
            </div>                        

          </div>
        </div>

      </div>
    </div>
  </header>

<!-- Header ends -->
<!-- Main content starts -->

<div class="content">

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-dropdown"><a href="#">Navigation</a></div>

        <!--- Sidebar navigation -->
        <!-- If the main navigation has sub navigation, then add the class "has_sub" to "li" of main navigation. -->
        <ul id="nav">
          <!-- Main menu with font awesome icon -->
          <li><a href="{{ URL::to('/dashboard') }}" class="open"><i class="icon-home"></i> Dashboard</a>
            <!-- Sub menu markup 
            <ul>
              <li><a href="#">Submenu #1</a></li>
              <li><a href="#">Submenu #2</a></li>
              <li><a href="#">Submenu #3</a></li>
            </ul>-->
          </li>
      <li class="has_sub"><a ><i class="icon-list-alt"></i> Blog  <span class="pull-right"><i class="icon-chevron-right"></i></span></a>
            <ul>
              <li><a href="{{ URL::to('/writeblog') }}">Write Blog</a></li>
              <li><a href="{{ URL::to('/listblog') }}">Edit / Delete Blog</a></li>
              <li></li>
              <li><a href="{{ URL::to('/writetag') }}">Create Tag</a></li>
              <li><a href="{{ URL::to('/listtag') }}">Edit / Delete Tag</a></li>
            </ul>
          </li> 
          <li><a href="{{ URL::to('/appconfig') }} "><i class="icon-bar-chart"></i> App Config</a></li> 
        </ul>
    </div>

    <!-- Sidebar ends -->
@yield('content')

<!-- Footer starts -->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
            <!-- Copyright info -->
            <p class="copy">Copyright &copy; 2012 - 2015 | <a>Sysaxiom Admin</a> - Theme by <a href="https://github.com/inhies">inhies</a></p>
      </div>
    </div>
  </div>
</footer>   

<!-- Footer ends -->

<!-- Scroll to top -->
<span class="totop"><a href="#"><i class="icon-chevron-up"></i></a></span> 

<!-- JS -->
<script src="{{ asset('/').('public/admin/js/bootstrap.js') }}"></script>
<script src="{{ asset('/').('public/admin/js/jquery-ui-1.9.2.custom.min.js') }}"></script>
<script src="{{ asset('/').('public/admin/js/fullcalendar.min.js') }}"></script>
<script src="{{ asset('/').('public/admin/js/jquery.rateit.min.js') }}"></script>
<script src="{{ asset('/').('public/admin/js/jquery.prettyPhoto.js') }}"></script>

<!-- jQuery Flot -->
<script src="{{ asset('/').('public/admin/js/excanvas.min.js') }}"></script>
<script src="{{ asset('/').('public/admin/js/jquery.flot.js') }}"></script>
<script src="{{ asset('/').('public/admin/js/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('/').('public/admin/js/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('/').('public/admin/js/jquery.flot.stack.js') }}"></script>


<!-- jQuery Notification - Noty -->
<script src="{{ asset('/').('public/admin/js/jquery.noty.js') }}"></script><!-- jQuery Notify -->
<script src="{{ asset('/').('public/admin/js/themes/default.js') }}"></script>
<script src="{{ asset('/').('public/admin/js/layouts/bottom.js') }}"></script>
<script src="{{ asset('/').('public/admin/js/layouts/topRight.js') }}"></script>
<script src="{{ asset('/').('public/admin/js/layouts/top.js') }}"></script>
<!-- jQuery Notification ends -->


<script src="{{ asset('/').('public/admin/js/sparklines.js') }}"></script>

<script src="{{ asset('/').('public/admin/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('/').('public/admin/js/jquery.uniform.min.js') }}"></script>
<script src="{{ asset('/').('public/admin/js/bootstrap-switch.min.js') }}"></script>
<script src="{{ asset('/').('public/admin/js/filter.js') }}"></script>
<script src="{{ asset('/').('public/admin/js/custom.js') }}"></script>



</body>
</html>