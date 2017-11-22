<?php
  //warna biru di left menu
  for($a=0;$a<=3;$a++)$link[$a]=NULL;
  if(preg_match("/telkom_sensor/",current_url()) )$link[0]="class='active' ";    
  elseif(preg_match("/timika/",current_url()) )$link[1]="class='active' ";
  elseif(preg_match("/makassar/",current_url()) )$link[2]="class='active' ";
  elseif(preg_match("/batam/",current_url()) )$link[3]="class='active' ";
?> 
 
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url();?>telkom_sensor">Telkom</a>
      </div>
      
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li <?php echo $link[0];?>><a href="<?php echo base_url();?>telkom_sensor">Lokasi</a></li>
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">History <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo base_url();?>telkom_export/history_down">History Downtime</a></li>
              <li><a href="<?php echo base_url();?>telkom_export/router_uptime">Router Uptime</a></li>
            </ul>
          </li>
          <li><a href="<?php echo base_url();?>login/logout" onclick='return confirm("keluar dari sistem?");'>Keluar</a></li>  
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>

