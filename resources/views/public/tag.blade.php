<?php namespace App; use App\Blog; use URL?>
@extends('layout.public')
@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">Post related to "{{ $tagName }}"<small></h1><p align="right" style=""><b>Learn more about <a href="{{ URL::to('tag/'.$tagName.'/about') }}">{{ $tagName }}</a></b></p>
                <div id="resultArea">
                <!-- First Blog Post -->
                <?php
                if(isset($error))
                {
                    echo $error;
                    goto endloop;
                    
                }
                ?>
                @foreach ($tagData as $tag)
                <h2>
                    <a href="{{ asset('/blog').'/'.$tag->blogUrl }}" style="text-decoration:none">{{ $tag->blogTitle }}</a>
                </h2>
                <p class="lead">
                    by <a style="text-decoration:none">Sulthan Allaudeen</a>
                </p>
                <?php
                $date = date('d M Y', strtotime($tag->created_at));
                ?>
                <p style="float:right"><span class="glyphicon glyphicon-time"></span> Posted on {{ $date }} </p>
                <hr>
                @endforeach
                <?php endloop: ?>
            </div>
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

                        <!-- /.col-lg-6 -->
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

        <!-- Footer -->

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