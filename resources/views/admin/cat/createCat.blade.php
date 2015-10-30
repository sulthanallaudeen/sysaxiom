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
                            Create Category
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                        {!! Form::open(array('url' => 'catPost', 'name' => 'catPost', 'id' => 'catPost','class' => 'form-horizontal'))!!}
                                        <div class="form-group">
                                            <label>Category Title</label>
                                            <input class="form-control" placeholder='Category Title Here' id="catTitle">
                                        </div>
                                        <div class="form-group">
                                            <label>Category Content</label>
                                            <textarea class="ckeditor" rows="3" name="catContent"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Category Status</label>
                                            <input type="radio" name="catStatus" id="optionsRadios1" value="1" checked>
                                            <input type="radio" name="catStatus" id="optionsRadios2" value="0">
                                        </div>
                                        <p align="center">
                                        <button type="button" class="btn btn-default" id="savecat">Save Category</button>
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

  
  $( "#savecat" ).click(function() {
  var _token = $("input[name=_token]").val();
  var catTitle =  $("#catTitle").val();
  var catContent = CKEDITOR.instances['catContent'].getData();
  var catStatus =   $('input:radio[name=catStatus]:checked').val();
  $.post( "postCat", { _token : _token, catTitle: catTitle, catContent: catContent, catStatus: catStatus })
  .done(function( data ) {
    var result = jQuery.parseJSON(JSON.stringify(data));

    if (result.success==1)
    {
  
      $("#notificationFailure").hide();
      $("#notificationSuccess").html("Category Created successfully.. Category Id is "+result.catId+" !");
      $("#notificationSuccess").show(1000);
      $("#notificationSuccess").hide(2000);
      $('#tagPost').trigger("reset");
      for (instance in CKEDITOR.instances){
     CKEDITOR.instances[instance].setData(" ");
        }


    }
    else
    {
    $("#notificationFailure").html(" ");  
    $("#notificationSuccess").hide();
    $("#notificationFailure").html(result.err.catTitle);
    $("#notificationFailure").append(result.err.catContent);
    $("#notificationFailure").show(1000);
      

    }

  });
});


} );

</script>

@stop