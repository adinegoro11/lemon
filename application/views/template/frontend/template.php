<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{url}assets/img/metrasat.jpg">

    <title>LEMON | LINK MONITORING</title>

    <!-- Bootstrap core CSS -->
    <link href="{url}assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{url}assets/css/custom.css" rel="stylesheet">
  </head>

  <body style="background-color:#eee;">

    <div class="container">
      <div class="page-header">
        <h1>LEMON <small>Link Monitoring</small></h1>
      </div>
      <!-- Main component  -->
      <?php $this->load->view($template_view); ?>
      

    </div> <!-- /container -->

    <?php if($this->session->userdata('login_logged')):?>
     <div id="footer">
      <div class="container">
        <a href="{url}dashboard/logout" class="btn btn-lg btn-danger btn-block">Logout</a>
      </div>
    </div>
    <?php endif ?>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{url}assets/js/jquery-2.0.3.min.js"></script>
    <script src="{url}assets/js/holder.js"></script>
    <script src="{url}assets/js/bootstrap.min.js"></script>
    
    <?php
        if(isset($extra_script)){
             $this->load->view($extra_script);
        }
    ?>
  </body>
</html>
