<?php namespace App; use App\Blog; use URL?>
@extends('layout.public')
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
                <p align="left">
                Tagged : 
                <?php
                $tag = BlogTag::where('blog_id', $data->id)->get();
                ?>
                @foreach ($tag as $tagName)
                <?php $tagName = Tag::where('id', $tagName->tag_id)->pluck('tagTitle');  ?>
                <a href="{{ URL::to('tag/'.$tagName) }}" title="{{ 'Tags related to : '.$tagName }}">{{ $tagName }}</a>
                @endforeach
                <?php
                $date = date('d M Y', strtotime($data->created_at));
                ?></p>
                <p align="right"><span class="glyphicon glyphicon-time"></span> Posted on {{ $date }}</p>
                <hr>
                <!-- Post Content -->
                <?php
                echo $data->blogContent;
                ?>
                <hr>
            </div>
                <!-- Blog Comments -->
                <div class="well">
<div id="disqus_thread"></div>
<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES * * */
    var disqus_shortname = 'sysaxiom';
    
    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
                </div>
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
                                
                                <li><a href="{{ asset('/tag').'/'.$tag->tagTitle }}"> {{ $tag->tagTitle }} <span class="badge">{{ $count = BlogTag::where('tag_id', $tag->id)->count() }}</span></a></li>
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