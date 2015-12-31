@extends('layout.public')
@section('content')
<link href="{{ asset('/').('public/css/gallery.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
   <div class="container theme-showcase" role="main">

     <div class="container">

        <!-- Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Gallery - {{ $dir }} 
                </h1>
            </div>
        </div>
        <!-- /.row -->

    <?php
        
        $files = scandir('images/'.$dir);
        
    ?>

    <?php 


        $construt = 1;   
        foreach ($files as $key) {
            if ($key=='.' || $key=='..' || $key=='blog') {  }
            else { 
                $construt = $construt +1;
                if ($construt/2==0) { echo '<div class="row">'; }
                else {
                ?>
        
            <div class="col-md-6 portfolio-item">
                
                <?php
                #$key = str_replace(array( '.', 'png', 'jpg', 'jpeg'), ' ', $key);
                

                ?>
                    <a href="<?php echo '/images/'.$dir.'/'.$key?>">
                    <img class="img-responsive" src="<?php echo '../images/'.$dir.'/'.$key?>" alt="" style='height:700px;width:400px;'>
                </a>
                <h3>
                    <a href="<?php echo '/images/'.$dir.'/'.$key?>"><?php echo str_replace(array( '-'), ' ', $key)?></a>
                </h3>
                <p>Album About <?php echo $key ?>.</p>
            </div>
            
        
                <?php
     

            }
            if ($construt/2==0) { echo '</div>'; }
            }
                }
    ?>
        
            

  


       

        <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
                    <li>
                        <a href="#">&laquo;</a>
                    </li>
                    <li class="active">
                        <a href="#">1</a>
                    </li>
                    <li>
                        <a href="#">2</a>
                    </li>
                    <li>
                        <a href="#">3</a>
                    </li>
                    <li>
                        <a href="#">4</a>
                    </li>
                    <li>
                        <a href="#">5</a>
                    </li>
                    <li>
                        <a href="#">&raquo;</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        

    </div>
  
   


      
    </div>

    @stop