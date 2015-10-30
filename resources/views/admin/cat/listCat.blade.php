@extends('layout.admin')
@section('content')
<link href="{{ asset('/').('public/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" type="text/css" rel="stylesheet"/>
<link href="{{ asset('/').('public/admin/bower_components/datatables-responsive/css/dataTables.responsive.css') }}" type="text/css" rel="stylesheet"/>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit / Delete Category
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Category Title</th>
                                            <th>Posted At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cats as $cat)
                                        <tr class="odd gradeX">
                                            <td>{{ $cat->id }}</td>
                                            <td>{{ $cat->catTitle }}</td>
                                            <td>{{ $cat->updated_at }}</td>
                                            <td><a href="{{ URL::to('/editcat/'.$cat->id) }}">Edit </a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <script src="{{ asset('/').('public/admin/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
     <script src="{{ asset('/').('public/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script>
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
@stop