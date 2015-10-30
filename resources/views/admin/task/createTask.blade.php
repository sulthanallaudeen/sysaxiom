@extends('layout.admin')
@section('content')
<script src="{{ asset('/').('public/lib/ckeditor/ckeditor.js') }}"></script>  
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Task</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Create Task
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                        {!! Form::open(array('url' => 'taskPost', 'name' => 'taskPost', 'id' => 'taskPost','class' => 'form-horizontal'))!!}
                                        <div class="form-group">
                                            <label>Task Title</label>
                                            <input class="form-control" placeholder='Task Title Here' id="taskTitle">
                                        </div>
                                        <div class="form-group">
                                            <label>Task Content</label>
                                            <textarea class="ckeditor" rows="3" name="taskContent"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Task Status</label>
                                            <input type="radio" name="taskStatus" id="optionsRadios1" value="1" checked>
                                            <input type="radio" name="taskStatus" id="optionsRadios2" value="0">
                                        </div>
                                        <div class="form-group">
                                            <label>Category Tags </label><br>
                                            @foreach($cats as $cat)
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="catTags" value="{{ $cat->id}}">{{$cat->catTitle}}
                                            </label> 
                                            @endforeach
                                        </div>
                                        <p align="center">
                                        <button type="button" class="btn btn-default" id="saveTask">Save Task</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                        </p>
                                        {!! Form::close() !!}
                                        <div class="alert alert-success" id="notificationSuccess" style="display:none"></div>
                                    <div class="alert alert-warning" id="notificationFailure" style="display:none"></div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<script>
$(document).ready(function() {

  
  $( "#saveTask" ).click(function() {
  var _token = $("input[name=_token]").val();
  var taskTitle =  $("#taskTitle").val();
  var taskContent = CKEDITOR.instances['taskContent'].getData();
  var taskStatus =   $('input:radio[name=taskStatus]:checked').val();
  var catTags = [];
  $('input[name=catTags]:checked').map(function() {
              catTags.push($(this).val());
  });
  $.post( "postTask", { _token : _token, taskTitle: taskTitle, taskContent: taskContent, taskStatus: taskStatus ,catTags : catTags})
  .done(function( data ) {
    var result = jQuery.parseJSON(JSON.stringify(data));

    if (result.success==1)
    {
  
      $("#notificationFailure").hide();
      $("#notificationSuccess").html("Task Created successfully.. Task Id is "+result.taskId+" !");
      $("#notificationSuccess").show(1000);
      $("#notificationSuccess").hide(2000);
      $('#taskPost').trigger("reset");
      for (instance in CKEDITOR.instances){
     CKEDITOR.instances[instance].setData(" ");
        }


    }
    else
    {
    $("#notificationFailure").html(" ");  
    $("#notificationSuccess").hide();
    $("#notificationFailure").html(result.err.taskTitle);
    $("#notificationFailure").append(result.err.taskContent);
    $("#notificationFailure").show(1000);
      

    }

  });
});


} );

</script>

@stop