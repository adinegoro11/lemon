<script type="text/javascript">
	var auto_refresh = setInterval(
	function ()
	{         
    $('#Palu').load('<?php echo base_url()."index.php/prtg/tampil_palu";?>').fadeIn("slow");
    $('#Pontianak').load('<?php echo base_url()."index.php/prtg/tampil_pontianak";?>').fadeIn("slow");
    $('#Palangkaraya').load('<?php echo base_url()."index.php/prtg/tampil_palangkaraya";?>').fadeIn("slow");
    $('#Sampit').load('<?php echo base_url()."prtg/tampil_sampit";?>').fadeIn("slow");
    $('#Balikpapan').load('<?php echo base_url()."prtg/tampil_balikpapan";?>').fadeIn("slow");
    $('#Ambon').load('<?php echo base_url()."prtg/tampil_ambon";?>').fadeIn("slow");
    $('#Bogor').load('<?php echo base_url()."prtg/tampil_bogor";?>').fadeIn("slow");
    $('#Timika').load('<?php echo base_url()."prtg/tampil_timika";?>').fadeIn("slow");
    $('#Jayapura_ip').load('<?php echo base_url()."prtg/tampil_jayapura_ip";?>').fadeIn("slow");
    $('#Sorong').load('<?php echo base_url()."prtg/tampil_sorong";?>').fadeIn("slow");
    $('#Makassar').load('<?php echo base_url()."prtg/tampil_makassar";?>').fadeIn("slow");
	}, 10000); // refresh every 3 seconds
</script>

<div class="row">

	<div class="col-md-12">
  	<h3>Monitoring High Capacity & IDR IP</h3>
	</div>
 
	 
 <div class="col-md-3">
    <div class="panel panel-primary">
      <div class="panel-heading">Pontianak</div> <table class="table" id="Pontianak"> </table>
      <div class="panel-heading">Palangkaraya</div> <table class="table" id="Palangkaraya"> </table>
      <div class="panel-heading">Sampit</div> <table class="table" id="Sampit"> </table>
      <div class="panel-heading">Balikpapan</div> <table class="table" id="Balikpapan"> </table>
    </div>
  </div> 

  <div class="col-md-3">
    <div class="panel panel-primary">
      <div class="panel-heading">Palu</div> <table class="table" id="Palu"> </table>
      <div class="panel-heading">Makassar</div> <table class="table" id="Makassar"> </table>
      <div class="panel-heading">Ambon</div> <table class="table" id="Ambon"> </table>
      <div class="panel-heading">Jayapura</div> <table class="table" id="Jayapura_ip"> </table>
    </div>
  </div>

  <div class="col-md-3">
    <div class="panel panel-primary">
      <div class="panel-heading">Timika</div> <table class="table" id="Timika"> </table>
      <div class="panel-heading">Sorong</div> <table class="table" id="Sorong"> </table>
      <div class="panel-heading">Bogor</div> <table class="table" id="Bogor"> </table>
     
    </div>
  </div>   

</div> <!-- row-->
