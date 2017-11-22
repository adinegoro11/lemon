<?php
  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=Uptime_$nama_link.xls");
?>

<table border="1">
<thead>
  <tr>
    <td>No</td>
    <td>Outage</td>
    <td>Gangguan</td>
  </tr>
</thead>
  <?php 
    for($i = 0; $i < count($downtime_awal); $i++)
    {
      echo "
        <tr> 
          <td>".($i+1)."</td> 
          <td>$downtime_awal[$i] - $downtime_akhir[$i] (=$outage[$i])</td> 
          <td>$jenis_gangguan[$i]</td>
        </tr>
        ";
    }
  ?>
 
</table>