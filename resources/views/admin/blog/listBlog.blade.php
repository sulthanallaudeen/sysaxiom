@extends('layout.admin')
@section('content')

    <!-- Main bar -->
    <div class="mainbar">

      <!-- Page heading -->
      <div class="page-head">
        <h2 class="pull-left"><i class="icon-table"></i> Tables</h2>

        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right">
          <a href="index.html"><i class="icon-home"></i> Home</a> 
          <!-- Divider -->
          <span class="divider">/</span> 
          <a href="#" class="bread-current">Dashboard</a>
        </div>

        <div class="clearfix"></div>

      </div>
      <!-- Page heading ends -->

      <!-- Matter -->

      <div class="matter">
        <div class="container">

          <!-- Table -->

            <div class="row">

              <div class="col-md-12">

                <div class="widget">

                <div class="widget-head">
                  <div class="pull-left">Tables</div>
                  <div class="widget-icons pull-right">
                    <a  class="wminimize"><i class="icon-chevron-up"></i></a> 
                    <a class="wclose"><i class="icon-remove"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>

                  <div class="widget-content">

                    <table id="listTaskTable"  cellspacing="0" width="100%" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Posted At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          @foreach($blogs as $blog)
            <tr>
                <td>{{ $blog->id }}</td>
                <td>{{ $blog->blogTitle }}</td>
                <td>{{ $blog->blogDate }}</td>
                <td>

                  <a href="{{ URL::to('/editblog/'.$blog->id) }}">Edit </a> / <a href="{{ URL::to('/blog/'.$blog->blogUrl) }}">View</a>


                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


                  </div>

                </div>


              </div>

            </div>


      

        </div>
      </div>

    <!-- Matter ends -->

    </div>

   <!-- Mainbar ends -->        
   <div class="clearfix"></div>

</div>
<!-- Content ends -->
<script>
$(document).ready(function() {
    $('#listTaskTable').DataTable();
} );
</script>
@stop