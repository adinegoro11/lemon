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
				 
				<table class="table">
					<tr>
					<?php 
						$i = 0;
						foreach ($query->result() as $row){
							if($i % 5 != 0)
							{
								echo " <td>".$row->nama_link."</td> <td>".$row->value_tx_traffic."</td> <td>".$row->value_rx_traffic."</td>";
							}
							else
							{
								echo "</tr><tr>";
							}
					
							$i++;
					 	} 
					 ?>
					</tr>
				</table>

			
		</div> <!-- panel-primary-->
	</div>  <!--md-->
</div> <!-- row-->

