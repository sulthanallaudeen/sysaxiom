@extends('layout.admin')
@section('content')
<link href="{{ asset('/').('public/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" type="text/css" rel="stylesheet"/>
<link href="{{ asset('/').('public/admin/bower_components/datatables-responsive/css/dataTables.responsive.css') }}" type="text/css" rel="stylesheet"/>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Messages</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Messages
                        </div>
						{!! Form::open(array('url' => 'blogPost', 'name' => 'blogPost', 'id' => 'blogPost','class' => 'form-horizontal'))!!}
						{!! Form::close() !!}
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
											<th>From</th>
											<th>Status</th>
											<th>Received At</th>
											<th>Read</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($mails as $mail)
                                        <tr class="odd gradeX">
                                            <td>{{ $mail-> id}}</td>
											<td>{{ $mail-> userEmail}}</td>
											<td>{{ $mail-> messageStatus}}</td>
											<td>{{ $mail-> created_at}}</td>
											<td>
											<button type="button" class="btn btn-success" id='{{ $mail->id }}' data-toggle="modal" data-target="#myModal">Read</button>
                                            <?php
                                            if($mail->messageStatus==0)
                                            {
                                            ?>
                                            <button type="button" class="btnunread btn-info btn-circle" id='{{ $mail->id }}'><i class="fa fa-check"></i></button>
                                            <?php
                                            }
                                            else
                                            {
                                            ?>
                                            <button type="button" class="btnread btn btn-info btn-circle" id='{{ $mail->id }}' style="background-color: grey;border-color:grey"><i class="fa fa-check"></i></button>
                                            <?php
                                            }
                                            ?>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
								
								
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="mailTitle"></h4>
                                        </div>
                                        <div class="modal-body" id='mailContent'></div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" id='mailId' style='display:none'>Mark as Read</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
							
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
	
<script>
$(document).ready(function() {





$( ".btn-success" ).click(function() {
var id = $(this).attr('id')
var _token = $("input[name=_token]").val();
$.post( "getMessage", { _token : _token, id : id})
  .done(function( data ) {
    var result = jQuery.parseJSON(JSON.stringify(data));

    if (result.success==1)
    {
		$("#mailTitle").html('<font color="green">From : </font>'+result.mailData.userEmail+' <font color="green">Receied at</font> : '+result.mailData.created_at);
		$("#mailContent").html('<font color="green">Message : </font>'+result.mailData.userMessage);
    }
    else
    {
		$("#mailTitle").html('Error');
		$("#mailContent").html('Something goes Wrong !!');
    }
  });
} );


$( ".btnunread" ).click(function() {
var id = $(this).attr('id')
var _token = $("input[name=_token]").val();
$.post( "messageMarkAsRead", { _token : _token, id : id})
  .done(function( data ) {
    var result = jQuery.parseJSON(JSON.stringify(data));

    if (result.success==1)
    {
    $('#dataTables-example').html(result.updatedMessage);
    }
    else
    {        
    }
  });
});

$( ".btnread" ).click(function() {
var id = $(this).attr('id')
var _token = $("input[name=_token]").val();
$.post( "messageMarkAsUnRead", { _token : _token, id : id})
  .done(function( data ) {
    var result = jQuery.parseJSON(JSON.stringify(data));

    if (result.success==1)
    {
    $('#dataTables-example').html(result.updatedMessage);
    }
    else
    {        
    }
  });
});




});
</script>


@stop
