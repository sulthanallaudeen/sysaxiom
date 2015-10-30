@extends('layout.admin')
@section('content')
<script src="{{ asset('/').('public/lib/ckeditor/ckeditor.js') }}"></script>  
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tag</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Create Tag
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                        {!! Form::open(array('url' => 'tagPost', 'name' => 'tagPost', 'id' => 'tagPost','class' => 'form-horizontal'))!!}
                                        <div class="form-group">
                                            <label>Tag Title</label>
                                            <input class="form-control" placeholder='Tag Title Here' id="tagTitle">
                                        </div>
                                        <div class="form-group">
                                            <label>Tag Content</label>
                                            <textarea class="ckeditor" rows="3" name="tagpost"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Tag Status</label>
                                            <input type="radio" name="tagStatus" id="optionsRadios1" value="1" checked>
                                            <input type="radio" name="tagStatus" id="optionsRadios2" value="0">
                                        </div>
                                        <p align="center">
                                        <button type="button" class="btn btn-default" id="tagBlog">Post Blog</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                        </p>
                                        {!! Form::close() !!}
                                        <div class="alert alert-success" id="tagPostSuccess" style="display:none"></div>
                                    <div class="alert alert-warning" id="tagPostFailure" style="display:none"></div>
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

  
  $( "#tagBlog" ).click(function() {
  var _token = $("input[name=_token]").val();
  var tagTitle =  $("#tagTitle").val();
  var tagContent = CKEDITOR.instances['tagpost'].getData();
  var tagStatus =   $('input:radio[name=tagStatus]:checked').val();
  $.post( "postTag", { _token : _token, tagTitle: tagTitle, tagContent: tagContent, tagStatus: tagStatus })
  .done(function( data ) {
    var result = jQuery.parseJSON(JSON.stringify(data));

    if (result.success==1)
    {
  
      $("#tagPostFailure").hide();
      $("#tagPostSuccess").html("Tag Posted successfully.. Tag Id is "+result.tagId+" !");
      $("#tagPostSuccess").show(1000);
      $("#tagPostSuccess").hide(2000);
      $('#tagPost').trigger("reset");
      for (instance in CKEDITOR.instances){
     CKEDITOR.instances[instance].setData(" ");
        }


    }
    else
    {
    $("#tagPostFailure").html(" ");  
    $("#tagPostSuccess").hide();
    $("#tagPostFailure").html(result.err.blogTitle);
    $("#tagPostFailure").append(result.err.blogUrl);
    $("#tagPostFailure").append(result.err.blogContent);
    $("#tagPostFailure").show(1000);
      

    }

  });
});


} );

</script>

@stop