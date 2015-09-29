@extends('layout.admin')
@section('content')

    <!-- Main bar -->
    <div class="mainbar">

      <!-- Page heading -->
      <div class="page-head">
        <!-- Page heading -->
        <h2 class="pull-left">Tag
          <!-- page meta -->
        </h2>


        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right" style='display:none'>
          <a href="index.html"><i class="icon-home"></i> Home</a>
          <!-- Divider -->
          <span class="divider">/</span>
          <a href="#" class="bread-current">New Tag</a>
        </div>

        <div class="clearfix"></div>

      </div>
      <!-- Page heading ends -->



      <!-- Matter -->

      <div class="matter">
        <div class="container">

          <div class="row">

            <div class="col-md-12">


              <div class="widget wgreen">

                <div class="widget-head">
                  <div class="pull-left">Add Tag</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>
                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <div class="padd">


                    <!-- Form starts.  -->
                      {!! Form::open(array('url' => 'tagPost', 'name' => 'tagPost', 'id' => 'tagPost','class' => 'form-horizontal'))!!}
                      <input type="hidden", "_token"  name="_token" value="{{ csrf_token()}}" >
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">Tag Title</label>
                                  <div class="col-lg-8">
                                    <input type="text" class="form-control" placeholder="Tag Title" id="tagTitle">
                                  </div>
                                </div>


                                <div class="form-group">
                                  <label class="col-lg-4 control-label">Tag Content</label>
                                  <div class="col-lg-8">
                                    <textarea class="ckeditor" name="tagpost"></textarea>
                                  </div>
                                </div>

                                  <div class="form-group">
                                  <label class="col-lg-4 control-label">Tag Status</label>
                                  <div class="col-lg-8">
                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="tagStatus" id="optionsRadios1" value="1" checked>
                                        Publish
                                      </label>
                                    </div>
                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="tagStatus" id="optionsRadios2" value="0">
                                        Draft
                                      </label>
                                    </div>
                                  </div>
                                </div>



                                    <hr />
                                    <div class="alert alert-success" id="tagPostSuccess" style="display:none"></div>
                                    <div class="alert alert-warning" id="tagPostFailure" style="display:none"></div>
                                <div class="form-group" align="center">
                                  <div class="col-lg-offset-1 col-lg-9">
                                    <button type="button" class="btn btn-primary" id="tagBlog">Post</button>
                                  </div>
                                </div>
                              {!! Form::close() !!}
                  </div>
                </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
              </div>

            </div>

          </div>

        </div>
      </div>

    <!-- Matter ends -->

    </div>

  <!-- Mainbar ends -->
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