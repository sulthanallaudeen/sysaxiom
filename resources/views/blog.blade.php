@extends('layout.publiclayout')
@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <div id="resultArea">
                <h1>{{ $data->blogTitle}}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a style="text-decoration:none">Sulthan Allaudeen</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <?php
                $date = date('d M Y', strtotime($data->created_at));
                ?>
                <p><span class="glyphicon glyphicon-time"></span> Posted on {{ $date }}</p>

                <hr>

                

                

                <!-- Post Content -->
                {{ $data->blogContent }}

                <hr>
            </div>
                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well" style='display:none'>
                    <h4>Leave a Comment:</h4>
                    <form role="form">
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                

                <!-- Posted Comments -->

           
            

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control" id="searchBlog">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Tags</h4>
                    <div class="row">
                    @foreach ($tags as $tag)
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                
                                <li><a href="{{ asset('/tag').'/'.$tag->tagTitle }}"> {{ $tag->tagTitle }} </a></li>
                            </ul>
                        </div>
                        @endforeach
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well" style="display:none">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>


    </div>

    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> 
<script>
$( document ).ready(function() {
$("#searchBlog").on("change paste keyup", function() {

var searchQuery = $(this).val();
var token = $("#_token").val();
$.post( "../searchBlog", { _token : token, searchQuery : searchQuery })
  .done(function( data ) {
    $("#resultArea").html(data);
  });


    
});
});
</script>

    @stop