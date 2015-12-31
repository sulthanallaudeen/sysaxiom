@extends('layout.admin')
@section('content')
<link href="{{ asset('/').('public/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" type="text/css" rel="stylesheet"/>
<link href="{{ asset('/').('public/admin/bower_components/datatables-responsive/css/dataTables.responsive.css') }}" type="text/css" rel="stylesheet"/>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Logs</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Sysaxiom User Logs
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
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
                                        <tr class="odd gradeX">
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