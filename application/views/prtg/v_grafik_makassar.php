<?php
	for ($i=0; $i < count($link); $i++) 
	{ 
		$url[$i] = "http://10.80.254.232:8787/chart.png?type=graph&width=300&height=200&graphid=0&id=".$link[$i]."&username=prtgadmin&passhash=".$passhash."&";
		// $nama = file_get_contents("http://10.80.254.232:8787/api/getsensordetails.json?id=".$link[$i]."&username=prtgadmin&passhash=".$passhash);
		// $hasil = json_decode($nama,true);
		// $img_title[$i] = $hasil['sensordata']['name'];
		// $img_title[$i] = substr($img_title[$i], 0, 27);
	}
?>


<script type="text/javascript">
	var auto_refresh = setInterval(
	function ()
	{
		$("#img_0").attr("src", "<?php echo $url[0]?>"+new Date().getTime());
		$("#img_1").attr("src", "<?php echo $url[1]?>"+new Date().getTime());
		$("#img_2").attr("src", "<?php echo $url[2]?>"+new Date().getTime());
		$("#img_3").attr("src", "<?php echo $url[3]?>"+new Date().getTime());
		$("#img_4").attr("src", "<?php echo $url[4]?>"+new Date().getTime());
		$("#img_5").attr("src", "<?php echo $url[5]?>"+new Date().getTime());
		$("#img_6").attr("src", "<?php echo $url[6]?>"+new Date().getTime());
		$('#notifikasi_0').load('<?php echo base_url()."index.php/prtg/ajax_notifikasi/makassar/".$link[0];?>').fadeIn("slow");
		$('#notifikasi_1').load('<?php echo base_url()."index.php/prtg/ajax_notifikasi/makassar/".$link[1];?>').fadeIn("slow");
		$('#notifikasi_2').load('<?php echo base_url()."index.php/prtg/ajax_notifikasi/makassar/".$link[2];?>').fadeIn("slow");
		$('#notifikasi_3').load('<?php echo base_url()."index.php/prtg/ajax_notifikasi/makassar/".$link[3];?>').fadeIn("slow");
		$('#notifikasi_4').load('<?php echo base_url()."index.php/prtg/ajax_notifikasi/makassar/".$link[4];?>').fadeIn("slow");
		$('#notifikasi_5').load('<?php echo base_url()."index.php/prtg/ajax_notifikasi/makassar/".$link[5];?>').fadeIn("slow");
		$('#notifikasi_6').load('<?php echo base_url()."index.php/prtg/ajax_notifikasi/makassar/".$link[6];?>').fadeIn("slow");
	}, 10000); // refresh every 3 seconds
</script>


<div class="row">

	<div class="col-md-12">
		<div class="page-header">
  			<h1>XL Makassar <small>Hub KIMA</small></h1>
  		</div>
	</div>

	<?php for ($i=0; $i < count($link); $i++) { ?>
	<div class="col-md-12" id="notifikasi_<?php echo $i?>"> notif </div>
	<?php } ?>

<?php for ($i=0; $i < count($link); $i++) { ?>
	<div class="col-md-3"> 
		<div class="panel panel-primary">
			<div class="panel-heading"> <h3 class="panel-title"><?php echo $nama_link[$i];?></h3> </div>
			<img src="<?php echo base_url();?>assets/img/loading.gif" id="img_<?php echo $i?>">
			<div class="panel-body">  </div> <!--panel panel-body  class="img-rounded">-->	
		</div> <!--panel panel-primary-->
	</div> <!--col-md-->
<?php } ?>
	
	

</div> <!-- row-->
