@extends('layout.public')
@section('content')
<link href="{{ asset('/').('public/css/offcanvas.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
<script src="{{ asset('/').('public/js/offcanvas.js') }}"></script>
 <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="jumbotron">
            <h2>Hey there !</h2>
            <p>Here you can find the Technologies used in this site. I am developing this section rapidly.. Cheers !</p>
          </div>
          <div class="row">
            <div class="col-xs-6 col-lg-4">
              <h2>Github</h2>
              <p>Fork all the updates in Github at hub <a target='_new' href='https://github.com/sulthanallaudeen/sysaxiom'>Here</a></p>
              <p><a class="btn btn-default" href="https://github.com/sulthanallaudeen/sysaxiom"  target='_new' role="button">View details &raquo;</a></p>
            </div><!--/.col-xs-6.col-lg-4-->
            <div class="col-xs-6 col-lg-4">
              <h2>Applications Used</h2>
              <p>Squirrelmail, phpMyAdmin, Composer and Few via <b>Softaculous</b></p>
              <p><a class="btn btn-default" href="http://www.softaculous.com/" target='new' role="button">View details &raquo;</a></p>
            </div><!--/.col-xs-6.col-lg-4-->
			<div class="col-xs-6 col-lg-4">
              <h2>Sulthan's Admin</h2>
              <p>I designed my Own Admin Panel to access and control many part of website</p>
              <p><a class="btn btn-default" href="http://www.sysaxiom.com/sa" target='new' role="button">Explore Admin Panel &raquo;</a></p>
            </div><!--/.col-xs-6.col-lg-4-->
            
            
            
            <div class="col-xs-6 col-lg-4" style='display:none'>
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            </div><!--/.col-xs-6.col-lg-4-->
          </div><!--/row-->
        </div><!--/.col-xs-12.col-sm-9-->

        
		<?php
		echo htmlspecialchars_decode($sideBar);
		
		?>
      </div><!--/row-->

      

      

    </div><!--/.container-->

  

@stop