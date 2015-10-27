@extends('layout.public')
@section('content')

   <div class="container theme-showcase" role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <img src="images/Sulthan-Allaudeen.jpg" class="img-responsive img-thumbnail" alt="Sulthan Allaudeen" style="float:right;">
        <h1>Sulthan Allaudeen</h1>
        <p>Software Engineer who loves Rapid and Serious Web Applications and Services mostly in <a href="https://php.net/" target="_new">PHP</a></p>
        <div class="row social-buttons" >
        <div class="col-md-3 col-xs-6">
            <span class="twitter-button orange">
                <a href="https://twitter.com/allaudeens">
                    <span class="fa-stack fa-5x">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
            </span>
        </div>
        <div class="col-md-3 col-xs-6">
            <span class="github-button orange">
                <a href="https://github.com/sulthanallaudeen">
                    <span class="fa-stack fa-5x">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-github-alt fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
            </span>
        </div>
        <div class="col-md-3 col-xs-6">
            <span class="linkedin-button orange">
                <a href="https://linkedin.com/in/sulthanallaudeen">
                    <span class="fa-stack fa-5x">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
            </span>
        </div>
        <div class="col-md-3 col-xs-6">
            <span class="instagram-button orange">
                <a href="https://instagram.com/allaudeens/">
                    <span class="fa-stack fa-5x">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
            </span>
        </div>
    </div>
	<div class="alert alert-success" role="alert" style='display:none'>
        <strong>Inspiring Qutoes :</strong>  {{ Inspiring::quote() }}
      </div>        
	  <div class="alert alert-success" role="alert" >
        <strong>Take a look about the <a href='http://www.sysaxiom.com/accessLog/server'>Website Access Tool</a> which is launched on 15-10-2015</strong>
      </div>        
      </div>


      
    </div> <!-- /container -->

    @stop