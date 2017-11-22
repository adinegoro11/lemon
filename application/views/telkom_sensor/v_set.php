 <script>
	$(document).ready(function(){
		$(".js-example-basic-single").select2();	
    });
</script>

<br><br>
<div class="row">
	<div class="col-md-12"> <!---->
		<div class="panel panel-primary">
			<div class="panel-heading"> <h3 class="panel-title">Ubah Sensor</h3> </div>
				<div class="panel-body"> 

					<form class="form-horizontal" action="<?php echo base_url()."telkom_sensor/set/".$id; ?>"  method="post" accept-charset="utf-8">

					<div class="form-group">
						<label for="nama_link" class="col-sm-2 control-label">Lokasi</label>
						<div class="col-sm-4"> 
							<input type="text" class="form-control" name="nama_link" value="<?php echo $nama_link;?>" placeholder="Nama Lokasi" required="required" autocomplete="off"> 
						</div> <?php echo form_error('nama_link'); ?>
					</div>

					<div class="form-group">
						<label for="sensor_ping" class="col-sm-2 control-label">Sensor Ping</label>
						<div class="col-sm-4"> 
							<input type="number" class="form-control" name="sensor_ping" value="<?php echo $sensor_ping;?>" placeholder="Sensor Ping" required="required" autocomplete="off"> 
						</div> <?php echo form_error('sensor_ping'); ?>
					</div>		

					<div class="form-group">
						<label for="sensor_uptime" class="col-sm-2 control-label">Sensor Uptime</label>
						<div class="col-sm-4"> 
							<input type="number" class="form-control" name="sensor_uptime" value="<?php echo $sensor_uptime;?>" placeholder="Sensor Uptime" required="required" autocomplete="off"> 
						</div> <?php echo form_error('sensor_uptime'); ?>
					</div>		

					<div class="form-group">
						<label for="id_url" class="col-sm-2 control-label">URL</label>
						<div class="col-sm-4"> 
							<select name="id_url" id="id_url" class="form-control js-example-basic-single" required="required">
								<option value="">-- Pilih URL --</option>
								<?php 
            						foreach ($dropdown_url->result() as $row)
            						{
            							$id_url == $row->id ? $selected = "Selected" : $selected = "";
            							echo "<option value='$row->id' $selected>$row->url</option>";
            						}
            					?>

							</select>
						</div> <?php echo form_error('id_url'); ?>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Simpan</button>
						</div>
					</div>

					</form>

			</div> <!-- panel-body-->
		</div> <!-- panel-primary-->
	</div>  <!--md-->
</div> <!-- row-->

