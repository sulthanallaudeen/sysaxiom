
      <div class="page-header">
        <h1  style="display:none">Sysaxiom</h1>
      </div>
      <div class="well">
      <?php
      $EndTime = microtime(true);
      $ExecutedTime = $EndTime - $StartTime;
      ?>
        <p>Copyright @ Sysaxiom. </p>
        <p> Page Executed in <?php echo $ExecutedTime; ?> seconds</p>
      </div>


      


    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo $url;?>assets/js/jquery.min.js"></script>
    <script src="<?php echo $url;?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo $url;?>assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo $url;?>assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
