<?php
  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=Downtime_$nama_link.xls");
?>

<table border="1">
<thead>
  <tr>
    <td></td>
    <td colspan="2"><?php echo $nama_link;?></td>
    <td>Up: <?php echo $persen_up;?></td>
    <td colspan="3"><?php echo $durasi_up;?></td>
    <td>Down: <?php echo $persen_down;?></td>
    <td><?php echo $durasi_down;?></td>
    <td colspan="2"></td>
  </tr>
  <tr>
    <td>Status</td>
    <td>Date Time</td>
    <td>Down Time</td>
    <td>Up Time</td>
    <td>Outage</td>
    <td>Detik DT</td>
    <td>% DT</td>
    <td>Identifikasi Downtime Sesuai Kontrak</td>
    <td>Klarifikasi ISP (dengan hyperlink jika ada)</td>
    <td>Data Lainnya (jika ada)</td>
    <td>Kesimpulan Downtime</td>
  </tr>
</thead>
  <?php 
    for($i = 0; $i < count($date_time); $i++)
    {
      echo "<tr> 
          <td></td> 
          <td>$date_time[$i]</td> 
          <td>$down_time[$i]</td> 
          <td>$up_time[$i]</td> 
          <td>$outage[$i]</td> 
          <td>$durasi_detik[$i]</td>
          <td>$persen[$i]</td>
          <td></td> <td></td> <td></td> <td></td>
        </tr>";
    }
  ?>
 
</table>