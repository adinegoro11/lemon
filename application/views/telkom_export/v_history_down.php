<script language="javascript">
  $(document).ready(function(){
    $(".js-example-basic-single").select2();  
    });
</script> 

<br><br>
<div class="row">
  <div class="col-md-12"> <!---->
    <div class="panel panel-primary">
      <div class="panel-heading"> <h3 class="panel-title">History Down</h3> </div>
        <div class="panel-body"> 

          <form class="form-horizontal" action="<?php echo base_url()."telkom_export/history_down"; ?>"  method="post" accept-charset="utf-8">

            <div class="form-group">
              <label for="link_name" class="col-sm-2 control-label">Lokasi</label>
              <div class="col-sm-4">
                <select name="id_link" id="id_link" class="form-control js-example-basic-single" required="required">
                        <option value="">-- Pilih Link --</option>
                        <?php foreach ($dropdown_link->result() as $row) echo "<option value='$row->id' >$row->nama_link</option>"; ?>
                  </select>

               </div>
              <?php echo form_error('id_link'); ?>
            </div>  

            <div class="form-group">
              <label for="month" class="col-sm-2 control-label">Bulan</label>
              <div class="col-sm-2"> <input type="month" class="form-control" name="month" placeholder="Bulan" required="required" autocomplete="off"> </div>
              <?php echo form_error('month'); ?>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Cari</button>
              </div>
            </div>

          </form>

      </div> <!-- panel-body-->
    </div> <!-- panel-primary-->

<?php 
  if(isset($query)){
    $link = explode("//",$url);
?>
    <div class="panel panel-primary">
      <div class="panel-heading"> <h3 class="panel-title"><?php echo $nama_link;?></h3> </div>
        <div class="panel-body">
          <a class="btn btn-default" href="<?php echo base_url("telkom_export/history_export/".$link[1]."/".$sensor_ping."/".$sdate."/".$edate."/".$username."/".$pass); ?>" role="button"> <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Download</a>
          <!--  -->
        </div>
        
        <table class="table table-hover">
          <thead><tr> <th>No</th> <th>Down</th> </tr></thead>
          <tbody>
          <?php 
            for($i = 0; $i < count($down); $i++) 
            {
              $i%2==0 ? $css="" : $css="class='success'";
              echo "<tr ".$css."><td>".($i+1)."</td> <td>".$down[$i]."</td> </tr>";
            }
          ?>
          </tbody>
        </table>
    </div> <!-- panel-primary-->
<?php } ?>

  </div>  <!--md-->
</div> <!-- row-->

