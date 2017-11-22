<!DOCTYPE html>
<!--[if IE 8]><html lang="en" class="ie8"></html><![endif]-->
<!--[if IE 9]><html lang="en" class="ie9"></html><![endif]-->
<!--[if IE 10]><html lang="en" class="ie10"></html><![endif]-->

<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="description" content="Metrasat Perangkat" />
    <meta name="keywords" content="metrasat perangkat" />
    
    <!-- Title of Page -->
    <title>Perangkat Metrasat | {title}</title>
    
    <!-- Favicon for little icon on browser tab -->
    <link rel="shortcut icon" href="{url}asset/images/favicon.png" type="image/x-icon" />
    
    <!-- Stylesheet Load -->
    <link rel="stylesheet" type="text/css" href="{url}asset/backend/assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="{url}asset/backend/assets/bootstrap/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" type="text/css" href="{url}asset/backend/assets/bootstrap/css/bootstrap-fileupload.css" />
    <link rel="stylesheet" type="text/css" href="{url}asset/backend/assets/font-awesome/css/font-awesome.css" />
    
    <link rel="stylesheet" type="text/css" href="{url}asset/backend/css/style.min.css" />
    <link rel="stylesheet" type="text/css" href="{url}asset/backend/css/style_responsive.css" />
    <link rel="stylesheet" type="text/css" href="{url}asset/backend/css/style_default.css" id="style_color" />
    
    <link rel="stylesheet" type="text/css" href="{url}asset/backend/assets/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="{url}asset/backend/assets/uniform/css/uniform.default.css" />
    <link rel="stylesheet" type="text/css" href="{url}asset/backend/assets/fancybox/source/jquery.fancybox.css" />
    
    <link rel="stylesheet" type="text/css" href="{url}asset/backend/assets/chosen-bootstrap/chosen/chosen.css" />
    <link rel="stylesheet" type="text/css" href="{url}asset/backend/assets/jquery-tags-input2/jquery.tagsinput.css" />
    <link rel="stylesheet" type="text/css" href="{url}asset/backend/assets/clockface/css/clockface.css" />
    <link rel="stylesheet" type="text/css" href="{url}asset/backend/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
    <link rel="stylesheet" type="text/css" href="{url}asset/backend/assets/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="{url}asset/backend/assets/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="{url}asset/backend/assets/bootstrap-colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" type="text/css" href="{url}asset/backend/assets/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
    <link rel="stylesheet" type="text/css" href="{url}asset/backend/assets/bootstrap-daterangepicker/daterangepicker.css" />
    
    <link rel="stylesheet" type="text/css" href="{url}asset/backend/assets/jslider/css/jslider.css" />
    <link rel="stylesheet" type="text/css" href="{url}asset/backend/assets/jslider/css/jslider.blue.css" />
    <link rel="stylesheet" type="text/css" href="{url}asset/backend/assets/jslider/css/jslider.plastic.css" />
    <link rel="stylesheet" type="text/css" href="{url}asset/backend/assets/jslider/css/jslider.round.css" />
    <link rel="stylesheet" type="text/css" href="{url}asset/backend/assets/jslider/css/jslider.round.plastic.css" />
    <script type="text/javascript" src="{url}asset/backend/js/jquery-1.8.3.min.js"></script>
</head>
<?php
    $rec = current($login_data);
    $colorbody = ($rec->login_color == '') ? 'style="background-color:#32C2CD"' : 'style="background-color:'.$rec->login_color.'"';
?>
<body class="fixed-top" <?=$colorbody?>>
    <!-- Header -->
    <?php $this->load->view('template/backend/index/header'); ?>
    <!-- End Header -->
    
    <div id="container" class="row-fluid">
        <!-- Sidebar -->
        <?php $this->load->view('template/backend/index/sidebar'); ?>
        <!-- End Sidebar -->
    
        <!-- Content -->
        <div id="main-content">
            <div class="container-fluid">
                <?php $this->load->view($template_view); ?>
            </div>
        </div>
        <!-- Content -->
    </div>
    
    <!-- Footer -->
    <?php $this->load->view('template/backend/index/footer'); ?>
    <!-- End Footer -->
    
    
    <script type="text/javascript" src="{url}asset/backend/assets/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="{url}asset/backend/assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{url}asset/backend/assets/bootstrap/js/bootstrap-fileupload.js"></script>
    <script type="text/javascript" src="{url}asset/backend/js/jquery.blockui.js"></script>
    
    <!--[if lt IE 9]>
        <script src="{url}asset/backend/js/excanvas.js"></script>
        <script src="{url}asset/backend/js/respond.js"></script>
    <![endif]-->
    
    <script type="text/javascript" src="{url}asset/backend/assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
    <script type="text/javascript" src="{url}asset/backend/assets/clockface/js/clockface.js"></script>
    <script type="text/javascript" src="{url}asset/backend/assets/jquery-tags-input2/jquery.tagsinput.min.js"></script>
    
    <script type="text/javascript" src="{url}asset/backend/assets/uniform/jquery.uniform.min.js"></script>
    <script type="text/javascript" src="{url}asset/backend/assets/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="{url}asset/backend/js/jquery.pulsate.min.js"></script>
    <script type="text/javascript" src="{url}asset/backend/assets/fancybox/source/jquery.fancybox.pack.js"></script>
    
    <script type="text/javascript" src="{url}asset/backend/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
    <script type="text/javascript" src="{url}asset/backend/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
    <script type="text/javascript" src="{url}asset/backend/assets/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
    <script type="text/javascript" src="{url}asset/backend/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="{url}asset/backend/assets/bootstrap-daterangepicker/date.js"></script>
    <script type="text/javascript" src="{url}asset/backend/assets/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script type="text/javascript" src="{url}asset/backend/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
    <script type="text/javascript" src="{url}asset/backend/assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
    <script type="text/javascript" src="{url}asset/backend/assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
    
    <script type="text/javascript" src="{url}asset/backend/assets/jslider/js/jshashtable-2.1_src.js"></script>
    <script type="text/javascript" src="{url}asset/backend/assets/jslider/js/jquery.numberformatter-1.2.3.js"></script>
    <script type="text/javascript" src="{url}asset/backend/assets/jslider/js/tmpl.js"></script>
    <script type="text/javascript" src="{url}asset/backend/assets/jslider/js/jquery.dependClass-0.1.js"></script>
    <script type="text/javascript" src="{url}asset/backend/assets/jslider/js/draggable-0.1.js"></script>
    <script type="text/javascript" src="{url}asset/backend/assets/jslider/js/jquery.slider.js"></script>

    <script type="text/javascript" src="{url}asset/backend/assets/jquery-knob/js/jquery.knob.js"></script>
    
    <script type="text/javascript" src="{url}asset/backend/assets/data-tables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="{url}asset/backend/assets/data-tables/DT_bootstrap.js"></script>
    <script type="text/javascript" src="{url}asset/backend/js/scripts.js"></script>
    <script>
        jQuery(document).ready(function(){App.init()});
    </script>
</body>
</html>