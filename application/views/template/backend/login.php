<!DOCTYPE html>
<!--[if IE 8]><html lang="en" class="ie8"></html><![endif]-->
<!--[if IE 9]><html lang="en" class="ie9"></html><![endif]-->

<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="description" content="Yayasan Huda Cendekia" />
    <meta name="keywords" content="Server,Metrasat,Server Metrasat,Metrasat Server" />

    <!-- Title of Page -->
    <title>Metrasat Server | {title}</title>
    
    <!-- Favicon for little icon on browser tab -->
    <link rel="shortcut icon" href="{url}asset/images/favicon.png" type="image/x-icon" />

    <!-- Stylesheet Load -->
    <link href="{url}asset/backend/assets/bootstrap/css/bootstrap.min.css"          rel="stylesheet" type="text/css" />
    <link href="{url}asset/backend/assets/font-awesome/css/font-awesome.css"        rel="stylesheet" type="text/css" />
    <link href="{url}asset/backend/css/style.min.css"                               rel="stylesheet" type="text/css" />
    <link href="{url}asset/backend/css/style_responsive.css"                        rel="stylesheet" type="text/css" />
    <link href="{url}asset/backend/css/style_default.css"                           rel="stylesheet" type="text/css" id="style_color" />
    <style type="text/css">
    canvas {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
    }
    #backgroundHolder {
        position: absolute;
        height: 100%;
        width: 100%;
        overflow: hidden;
        background-color: #999;
    }
    #realbody {
        position: absolute;
        top: 0;
        width: 100%;
        overflow: auto;
        max-height: 100%;
    }
    </style>
</head>

<body id="login-body">
    <div id="backgroundHolder">
         <canvas id="backgroundCanvas" width="800" height="600"></canvas>
     </div>
     <div id="realbody">
    <!-- Login Header -->
    <div class="login-header">
        <div id="logo" class="center"><h3>Metrasat Perangkat</h3></div>
    </div>
    <!-- End Login Header -->
    
    <div class="widget-body">  
        <div id="alert-success" class="alert alert-success">
            <strong>Success!</strong> <span id="alert-success-text"></span> 
        </div>
        <div id="alert-warning" class="alert">
            <strong>Warning!</strong> <span id="alert-warning-text"></span> 
        </div>
        <div id="alert-error" class="alert alert-error">
            <strong>Error!</strong> <span id="alert-error-text"></span>
        </div>
    </div>

    <div id="login">
        <!-- Login Form -->
        <form id="loginform" class="form-vertical no-padding no-margin" >
            <input type="hidden" name="url" id="url" value="{url}login/loginprocess" />
            <div class="lock"><i class="icon-lock"></i></div>
            <div class="control-wrap">
                <h4>User Login</h4>
                
                <div class="control-group">
                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-user"></i></span>
                            <input id="input-username" name="username" type="text" placeholder="Username" autocomplete="off" required="required" />
                        </div>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-key"></i></span>
                            <input id="input-password" name="password" type="password" placeholder="Password" autocomplete="off" required="required"/>
                        </div>
                        
                        <div class="mtop10">
                            <div class="block-hint pull-right">
                                <a href="javascript:;" class="" id="forget-password">Forgot Password?</a>
                            </div>
                        </div>

                        <div class="clearfix space5"></div>
                    </div>
                </div>
            </div>
            
            <input type="submit" id="login-btn" class="btn btn-block login-btn" value="Login" />
        </form>
        <!-- End Login Form -->
        
        <!-- Forgot Password Form -->
        <form id="forgotform" class="form-vertical no-padding no-margin hide">
            <p class="center">Enter your e-mail address below to reset your password.</p>
            <div class="control-group">
                <div class="controls">
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-envelope"></i></span>
                        <input id="input-email" name="email" type="text" placeholder="Email" />
                    </div>
                </div>
                
                <div class="space20"></div>
            </div>
            
            <input type="submit" id="forget-btn" class="btn btn-block login-btn" value="Submit" />
        </form>
        <!-- End Forgot Password Form -->
    </div>
    
    <!-- Copyright -->
    <div id="login-copyright"> 2013 &copy; Metrasat Perangkat. </div>
</div>
    
    <!-- JQuery Load -->
    <script type="text/javascript" src="{url}asset/backend/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="{url}asset/backend/assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{url}asset/backend/js/jquery.blockui.js"></script>
    <script type="text/javascript" src="{url}asset/backend/js/scripts.js"></script>
    <script type="text/javascript" src="{url}asset/backend/js/anibg.js"></script>
    <script>
    $(document).ready(function(){
    loadGallery(true, 'a.thumbnail');

    //This function disables buttons when needed
    function disableButtons(counter_max, counter_current){
        $('#show-previous-image, #show-next-image').show();
        if(counter_max == counter_current){
            $('#show-next-image').hide();
        } else if (counter_current == 1){
            $('#show-previous-image').hide();
        }
    }

    /**
     *
     * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
     * @param setClickAttr  Sets the attribute for the click handler.
     */

    function loadGallery(setIDs, setClickAttr){
        var current_image,
            selector,
            counter = 0;

        $('#show-next-image, #show-previous-image').click(function(){
            if($(this).attr('id') == 'show-previous-image'){
                current_image--;
            } else {
                current_image++;
            }

            selector = $('[data-image-id="' + current_image + '"]');
            updateGallery(selector);
        });

        function updateGallery(selector) {
            var $sel = selector;
            current_image = $sel.data('image-id');
            $('#image-gallery-caption').text($sel.data('caption'));
            $('#image-gallery-title').text($sel.data('title'));
            $('#image-gallery-image').attr('src', $sel.data('image'));
            disableButtons(counter, $sel.data('image-id'));
        }

        if(setIDs == true){
            $('[data-image-id]').each(function(){
                counter++;
                $(this).attr('data-image-id',counter);
            });
        }
        $(setClickAttr).on('click',function(){
            updateGallery($(this));
        });
    }
});
 
    </script>
</body>
</html>