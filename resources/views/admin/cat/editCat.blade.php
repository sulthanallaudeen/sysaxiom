@extends('layout.admin')
@section('content')
<script src="{{ asset('/').('public/lib/ckeditor/ckeditor.js') }}"></script>  
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
                            Edit Category
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    {!! Form::open(array('url' => 'blogPost', 'name' => 'blogPost', 'id' => 'blogPost','class' => 'form-horizontal'))!!}
                                    <input type="hidden" name="catId" value="{{ $catData->id }}" id="catId">
                                        <div class="form-group">
                                            <label>Category Title</label>
                                            <input class="form-control" placeholder='Category Title Here' id="catTitle" value="{{ $catData->catTitle }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Category Content</label>
                                            <textarea class="ckeditor" name="catContent" >{{ $catData->catContent }}</textarea>
                                        </div>
                                        <div class="form-group">
                                  <label class="col-lg-4 control-label">Cat Status</label>
                                  <div class="col-lg-8">
                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="catStatus" id="optionsRadios1" value="1" <?php if($catData->catStatus==1) { echo 'checked'; }  ?>>
                                        Publish
                                      </label>
                                    </div>
                                    <div class="radio">
                                      <label>
                                      <input type="radio" name="catStatus" id="optionsRadios1" value="0" <?php if($catData->catStatus==0) { echo 'checked'; }  ?>>
                                        Draft
                                      </label>
                                    </div>
                                  </div>
                                </div>

                                        <p align="center">
                                        <button type="button" class="btn btn-default" id="updateCat">Update Category</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                        </p>
                                        {!! Form::close() !!}
                                        <div class="alert alert-success" id="notificationSuccess" style="display:none"></div>
                                        <div class="alert alert-warning" id="notificationFailures" style="display:none"></div>
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

  

  $( "#updateCat" ).click(function() {


  var _token = $("input[name=_token]").val();
  
  var id =  $("#catId").val();
  var catTitle =  $("#catTitle").val();
  var catContent = CKEDITOR.instances['catContent'].getData();
  var catStatus =   $('input:radio[name=catStatus]:checked').val();
  

  $.post( "../updateCat", { _token : _token, id: id, catTitle, catContent: catContent, catStatus: catStatus })
  .done(function( data ) {
    var result = jQuery.parseJSON(JSON.stringify(data));
    
    if (result.success==1)
    {
  
      $("#notificationFailure").hide();
      $("#notificationSuccess").html("Category Edited successfully.. Cat Id is "+result.catId+" !");
      $("#notificationSuccess").show(1000);
      $("#notificationSuccess").hide(2000);
  
    }
    else
    {
    var _token = $("input[name=_token]").val();
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