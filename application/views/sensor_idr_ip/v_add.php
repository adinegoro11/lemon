 <script>
	$(document).ready(function(){
		$(".js-example-basic-single").select2();	
    });
</script>

<br><br>
<div class="row">
	<div class="col-md-12"> <!---->
		<div class="panel panel-primary">
			<div class="panel-heading"> <h3 class="panel-title">Tambah Sensor</h3> </div>
				<div class="panel-body"> 

					<form class="form-horizontal" action="<?php echo base_url()."sensor/add_idr_ip"; ?>"  method="post" accept-charset="utf-8">
 
					<div class="form-group">
						<label for="nama_link" class="col-sm-2 control-label">Nama Link</label>
						<div class="col-sm-4"> 
						<input type="text" class="form-control" name="nama_link" id="nama_link" placeholder="Nama Lokasi" required="required" autocomplete="off"> 
						</div> <?php echo form_error('nama_link'); ?>
					</div>

					<div class="form-group">
						<label for="hub" class="col-sm-2 control-label">Hub</label>
						<div class="col-sm-4"> 
							<select name="hub" id="hub" class="form-control js-example-basic-single" required="required">
								<option value="">-- Pilih Hub --</option>
								<option value="Batam">Batam</option>
								<option value="Bogor">Bogor</option>
								<option value="Pontianak">Pontianak</option>
								<option value="Palangkaraya">Palangkaraya</option>
								<option value="Sampit">Sampit</option>
								<option value="Balikpapan">Balikpapan</option>
								<option value="Palu">Palu</option>
								<option value="Jayapura">Jayapura</option>
								<option value="Timika">Timika</option>
								<option value="Sorong">Sorong</option>
								<option value="Ambon">Ambon</option>
								<option value="Ternate">Ternate</option>
							</select>
						</div> <?php echo form_error('hub'); ?>
					</div>

					<div class="form-group">
						<label for="sensor_tx_traffic" class="col-sm-2 control-label">Sensor Tx</label>
						<div class="col-sm-4"> 
						<input type="number" class="form-control" name="sensor_tx_traffic" id="sensor_tx_traffic" placeholder="Sensor Tx" required="required" autocomplete="off"> 
						</div> <?php echo form_error('sensor_tx_traffic'); ?>
					</div>   

					<div class="form-group">
						<label for="sensor_rx_traffic" class="col-sm-2 control-label">Sensor Rx</label>
						<div class="col-sm-4"> 
						<input type="text" class="form-control" name="sensor_rx_traffic" id="sensor_rx_traffic" placeholder="Sensor Rx" required="required" autocomplete="off"> 
						</div> <?php echo form_error('sensor_rx_traffic'); ?>
					</div>

					<div class="form-group">
						<label for="sensor_lebno" class="col-sm-2 control-label">Sensor Local Ebno</label>
						<div class="col-sm-4"> 
						<input type="text" class="form-control" name="sensor_lebno" id="sensor_lebno" placeholder="Sensor Local Ebno" required="required" autocomplete="off"> 
						</div> <?php echo form_error('sensor_lebno'); ?>
					</div>

					<div class="form-group">
						<label for="sensor_rebno" class="col-sm-2 control-label">Sensor Remote Ebno</label>
						<div class="col-sm-4"> 
						<input type="text" class="form-control" name="sensor_rebno" id="sensor_rebno" placeholder="Sensor Remote Ebno" required="required" autocomplete="off"> 
						</div> <?php echo form_error('sensor_rebno'); ?>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Simpan</button>
						<?php $this->load->view('sensor_idr_ip/tombol_batal');?>
						</div>
					</div>					 

					</form>

			</div> <!-- panel-body-->
		</div> <!-- panel-primary-->
	</div>  <!--md-->
</div> <!-- row-->

