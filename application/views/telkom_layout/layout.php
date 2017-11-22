<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="<?php echo base_url();?>assets/logo.ico">

        <title>Export PRTG</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap theme -->
        <link href="<?php echo base_url();?>assets/css/bootstrap-theme.min.css" rel="stylesheet">
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="<?php echo base_url();?>assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="<?php echo base_url();?>assets/css/theme.css" rel="stylesheet">
        <script src="<?php echo base_url();?>assets/js/jquery-2.0.3.min.js"></script>

        <!-- Select2 -->
        <link href="<?php echo base_url();?>assets/css/select2.min.css" rel="stylesheet">
        <script src="<?php echo base_url();?>assets/js/select2.full.min.js"></script>

        <!-- CSS Datatable -->
        <link href="<?php echo base_url();?>assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <!-- JS Datatable -->
        <script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/dataTables.bootstrap.min.js"></script>

    </head>

    <body role="document">
        <?php $this->load->view('telkom_layout/topmenu');?>
  
        <div class="container-fluid theme-showcase" role="main">
            <?php $this->load->view($isi);?>
        </div> <!-- /container -->

        <script>window.jQuery || document.write('<script src="<?php echo base_url();?>assets/js/jquery-2.0.3.min.js"><\/script>')</script>
        <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/docs.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="<?php echo base_url();?>assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>

</html>
