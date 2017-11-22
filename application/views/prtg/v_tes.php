<script type="text/javascript">
var auto_refresh = setInterval(
function ()
{
	$('#notifikasi').load('<?php echo base_url()."index.php/prtg/ajax_notifikasi/2214";?>').fadeIn("slow");
}, 15000); // refresh every 3 seconds

</script>

<br><br>
<div class="row">

	<div class="col-md-3"> 
		<div class="panel panel-primary">
			<div class="panel-heading"> <h3 class="panel-title">erlangga</h3> </div> 
			<div class="panel-body" > 
				<div id="notifikasi"> notif </div>
			</div> <!--panel panel-body  class="img-rounded">-->	
		</div> <!--panel panel-primary-->
	</div> <!--col-md-->

	

</div> <!-- row-->

<!--
<script type="text/javascript">
	var auto_refresh = setInterval(
	function ()
	{
<?
	if($converter_comtech[0]>=1)echo "$('#converter_a').load('".base_url()."converter/ajax_monitor_ethernet/A').fadeIn('slow');";
	if($converter_comtech[1]>=1)echo "$('#converter_b').load('".base_url()."converter/ajax_monitor_ethernet/B').fadeIn('slow');"; 
	if($converter_comtech[2]>=1)echo "$('#converter_c').load('".base_url()."converter/ajax_monitor_ethernet/C').fadeIn('slow');";

	if($converter_serial[0]>=1)echo "$('#serial_a').load('".base_url()."converter/ajax_monitor_serial/A').fadeIn('slow');";
	if($converter_serial[1]>=1)echo "$('#serial_b').load('".base_url()."converter/ajax_monitor_serial/B').fadeIn('slow');";
	if($converter_serial[2]>=1)echo "$('#serial_c').load('".base_url()."converter/ajax_monitor_serial/C').fadeIn('slow');";
	
	if($hpa_paradise[0]>=1)echo "$('#hpa_a').load('".base_url()."hpa/ajax_monitor/A').fadeIn('slow');";
	if($hpa_paradise[1]>=1)echo "$('#hpa_b').load('".base_url()."hpa/ajax_monitor/B').fadeIn('slow');";
	if($hpa_paradise[2]>=1)echo "$('#hpa_c').load('".base_url()."hpa/ajax_monitor/C').fadeIn('slow');";

	if($ups_remington[2]>=1)echo "$('#ups_c').load('".base_url()."ups/ajax_monitor/C').fadeIn('slow');";

?>


		$("#notifikasi").attr("src", "<?php echo base_url()."index.php/prtg/ajax_img"; ?>");
	}, 3000); // refresh every 3 seconds
</script>
-->