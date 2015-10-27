@extends('layout.public')
@section('content')
<link href="{{ asset('/').('public/css/offcanvas.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
<script src="{{ asset('/').('public/js/offcanvas.js') }}"></script>
<script src="{{ asset('/').('public/js/jquery.dataTables.min.js') }}"></script>  
<link href="{{ asset('/').('public/css/offcanvas.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
<link href="{{ asset('/').('public/css/dataTables.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
 <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="jumbotron">
            
			<table id="accessLogServer" class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Ip</th>
                <th>Platform - OS</th>
                <th>Browser</th>
				<th>Version</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody>
		@foreach($userLog as $Log)
            <tr>
                <td>{{ $Log-> id}}</td>
                <td>{{ $Log-> ip}}</td>
                <td>{{ $Log-> platform}}</td>
                <td>{{ $Log-> browser}}</td>
				<td>{{ $Log-> version}}</td>
                <td>{{ $Log-> created_at}}</td>
            </tr>
		@endforeach
        </tbody>
    </table>
          </div>
          
        </div><!--/.col-xs-12.col-sm-9-->

        
		<?php
		echo htmlspecialchars_decode($sideBar);
		
		?>
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; Company 2014</p>
      </footer>

    </div><!--/.container-->

  
<script>
$(document).ready(function() {
    $('#accessLogServer').DataTable({
		"aaSorting": []
		}
	);
} );
</script>
@stop