@extends('layout.admin')
@section('content')

    <!-- Main bar -->
    <div class="mainbar">

      <!-- Page heading -->
      <div class="page-head">
        <!-- Page heading -->
        <h2 class="pull-left">Blog
          <!-- page meta -->
        </h2>


        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right" style='display:none'>
          <a href="index.html"><i class="icon-home"></i> Home</a>
          <!-- Divider -->
          <span class="divider">/</span>
          <a href="#" class="bread-current">Edit Blog Post</a>
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
                  <div class="pull-left">Forms</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>
                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <div class="padd">


                    <!-- Form starts.  -->
                      {!! Form::open(array('url' => 'blogPost', 'name' => 'blogPost', 'id' => 'blogPost','class' => 'form-horizontal'))!!}
                      <input type="hidden" name="blogId" value="{{ $blogData->id }}" id="blogId">
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">Blog Title</label>
                                  <div class="col-lg-8">
                                    <input type="text" class="form-control" placeholder="Blog Title" id="blogTitle" value="{{ $blogData->blogTitle }}">
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="col-lg-4 control-label">Blog URL</label>
                                  <div class="col-lg-8">
                                    <input type="text" class="form-control" placeholder="Blog URL" id="blogUrl" value="{{ $blogData->blogUrl }}">
                                  </div>
                                </div>


                                <div class="form-group">
                                  <label class="col-lg-4 control-label">Blog Tags</label>
                                  <div class="col-lg-8">
                                    @foreach($allTags as $tag)
                                    <label class="checkbox-inline">
                                      <input type="checkbox" name="blogTags" value="{{ $tag->id}}" 

                                      <?php 
                                      foreach ($blogTag as $key) 
                                      {
                                      if($tag->id==$key['tag_id'])
                                      {
                                        echo 'checked';
                                      }  
                                      }
                                      ?>
                                      >
                                       {{ $tag->tagTitle}}
                                    </label>
                                    @endforeach
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="col-lg-4 control-label">Blog Content</label>
                                  <div class="col-lg-8">
                                    <textarea class="ckeditor" name="blogpost">{{ $blogData->blogContent }}</textarea>
                                  </div>
                                </div>

<?php
#Blog Time Parsing 
$blogFullDate = $blogData->blogDate;
$blogDate = date('Y-m-d', strtotime($blogFullDate));
$blogTime = date('H:i:s', strtotime($blogFullDate));

?>
                                 <div class="form-group">
                                  <label class="col-lg-4 control-label">Post Date</label>
                                  <div class="col-lg-8">
                                    <div id="datetimepicker1" class="input-append">
                        <input data-format="yyyy-MM-dd" type="text" class="form-control dtpicker" id="blogDate" name="postDate" value="{{$blogDate}}">
                        <span class="add-on">
                          <i data-time-icon="icon-time" data-date-icon="icon-calendar" class="btn btn-info btn-lg"></i>
                        </span>
                      </div>
                                    
                                  </div>
                                </div>


                                <div class="form-group">
                                  <label class="col-lg-4 control-label">Post Time</label>
                                  <div class="col-lg-8">
                                    <div id="datetimepicker2" class="input-append">
                        <input data-format="hh:mm:ss" class="form-control dtpicker" type="text" id="blogTime" name="postTime" value="{{$blogTime}}">
                        <span class="add-on">
                          <i data-time-icon="icon-time" data-date-icon="icon-calendar" class="btn btn-info btn-lg"></i>
                        </span>
                      </div>
                                    
                                  </div>
                                </div>




                                <div class="form-group">
                                  <label class="col-lg-4 control-label">Blog Status</label>
                                  <div class="col-lg-8">
                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="blogStatus" id="optionsRadios1" value="1" <?php if($blogData->blogStatus==1) { echo 'checked'; }  ?>>
                                        Publish
                                      </label>
                                    </div>
                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="blogStatus" id="optionsRadios2" value="0" <?php if($blogData->blogStatus==0) { echo 'checked'; }  ?>>
                                        Draft
                                      </label>
                                    </div>
                                  </div>
                                </div>


                                    <hr />
                                    <div class="alert alert-success" id="blogPostSuccess" style="display:none"></div>
                                    <div class="alert alert-warning" id="blogPostFailure" style="display:none"></div>
                                <div class="form-group" align="center">
                                  <div class="col-lg-offset-1 col-lg-9">
                                    <button type="button" class="btn btn-primary" id="postBlog">Post</button>
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

  

$( "#blogTitle" ).keypress(function() {
  var blogTitle =  $("#blogTitle").val();
  var blogUrl = blogTitle.replace(/\s+/g, "-");
  $("#blogUrl").val(blogUrl);
});
  $( "#postBlog" ).click(function() {
  var _token = $("input[name=_token]").val();
  var blogId =  $("#blogId").val();
  var blogTitle =  $("#blogTitle").val();
  var blogUrl =  $("#blogUrl").val();
  var blogContent = CKEDITOR.instances['blogpost'].getData();
  var blogDate =  $("#blogDate").val()+' '+$("#blogTime").val();
  var blogStatus =   $('input:radio[name=blogStatus]:checked').val();
  var blogTags = [];
  $('input[name=blogTags]:checked').map(function() {
              blogTags.push($(this).val());
  });


  $.post( "../updateBlog", { _token : _token, id: blogId, blogTitle: blogTitle, blogUrl: blogUrl, blogContent:blogContent, blogDate : blogDate, blogTags:blogTags, blogStatus:blogStatus })
  .done(function( data ) {
    var result = jQuery.parseJSON(JSON.stringify(data));

    if (result.success==1)
    {
  
      $("#blogPostFailure").hide();
      $("#blogPostSuccess").html("Blog Posted successfully.. Blog Id is "+result.blogId+" !");
      $("#blogPostSuccess").show(1000);
      $("#blogPostSuccess").hide(2000);
  
    }
    else
    {
    $("#blogPostFailure").html(" ");  
    $("#blogPostSuccess").hide();
    $("#blogPostFailure").html(result.err.blogTitle);
    $("#blogPostFailure").append(result.err.blogUrl);
    $("#blogPostFailure").append(result.err.blogContent);
    $("#blogPostFailure").show(1000);
      

      


    }

  });
});


} );

</script>

@stop
