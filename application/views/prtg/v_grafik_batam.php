<?php
	for ($i=0; $i < count($link_batam); $i++) 
	{ 
		$url[$i] = "http://batam-m3tr4.mooo.com:8088/chart.png?type=graph&width=300&height=200&graphid=0&id=".$link_batam[$i]."&";
		$nama = file_get_contents("http://batam-m3tr4.mooo.com:8088/api/getsensordetails.json?id=".$link_batam[$i]."&username=prtgadmin&password=prtgadmin");	
		$hasil = json_decode($nama,true);
		$img_title[$i] = $hasil['sensordata']['name'];
		$img_title[$i] = substr($img_title[$i], 0, 24);
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
		$("#img_7").attr("src", "<?php echo $url[7]?>"+new Date().getTime());
		$("#img_8").attr("src", "<?php echo $url[8]?>"+new Date().getTime());
		$("#img_9").attr("src", "<?php echo $url[9]?>"+new Date().getTime());
		$("#img_10").attr("src", "<?php echo $url[10]?>"+new Date().getTime());
		$("#img_11").attr("src", "<?php echo $url[11]?>"+new Date().getTime());
		$("#img_12").attr("src", "<?php echo $url[12]?>"+new Date().getTime());
		$("#img_13").attr("src", "<?php echo $url[13]?>"+new Date().getTime());
		$("#img_14").attr("src", "<?php echo $url[14]?>"+new Date().getTime());
		$("#img_15").attr("src", "<?php echo $url[15]?>"+new Date().getTime());
	}, 10000); // refresh every 3 seconds
</script>

<br><br>
<div class="row">

	<div class="col-md-12">
		<div class="page-header">
  			<h1>IDR IP <small>Hub Batam</small></h1>
  		</div>
	</div>
	

<?php for ($i=0; $i < count($link_batam); $i++) { ?>
	<div class="col-md-3"> 
		<div class="panel panel-primary">
			<div class="panel-heading"> <h3 class="panel-title"><?php echo $img_title[$i];?></h3> </div>
			<img src="<?php echo base_url();?>images/loading.gif" id="img_<?php echo $i?>">
			<div class="panel-body">  </div> <!--panel panel-body  class="img-rounded">-->	
		</div> <!--panel panel-primary-->
	</div> <!--col-md-->
<?php } ?>
	
	

</div> <!-- row-->
