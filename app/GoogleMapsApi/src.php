<?php
$Title = substr(end(explode('/', "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]")), 0, -4);
echo $Title;
?>
        <?php  
          $Url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $Exploded = explode('/', $Url);
    $LastPart = end($Exploded);
    $ExactName = substr($LastPart, 0, -4);

          echo $ExactName;
        ?>
         