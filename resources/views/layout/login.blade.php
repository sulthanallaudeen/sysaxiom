<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <!-- Title and other stuffs -->
  <title>Sysaxiom - Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">

  <!-- Stylesheets -->
  <link href="{{ asset('/').('public/admin/style/bootstrap.css') }}" type="text/css" rel="stylesheet"/>
  <link href="{{ asset('/').('public/admin/style/font-awesome.css') }}" type="text/css" rel="stylesheet"/>
  <link href="{{ asset('/').('public/admin/style/style.css') }}" type="text/css" rel="stylesheet"/>
  <!-- HTML5 Support for IE -->
  <!--[if lt IE 9]>
  <script src="assets/js/html5shim.js"></script>
  <![endif]-->

  <!-- Favicon -->
  <link rel="icon" href="{{ asset('/').('favicon.ico') }}">
</head>

<body>
@yield('content')
<!-- JS -->
<script src="{{ asset('/').('public/admin/js/jquery.js') }}"></script>
<script src="{{ asset('/').('public/admin/js/bootstrap.js') }}"></script>
</body>
</html>