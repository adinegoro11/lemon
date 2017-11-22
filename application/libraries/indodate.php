<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class indodate {
    function indo_date($tgl)
    {
    	$tanggal   = substr($tgl,8,2);
    	$bulan     = $this->get_indo_month(substr($tgl,5,2));
    	$tahun     = substr($tgl,0,4);
    	return $tanggal.' '.$bulan.' '.$tahun;
    }
    
    function indo_date_full($tgl)
    {
        $day       = $this->get_indo_day($tgl);
    	$tanggal   = substr($tgl,8,2);
    	$bulan     = $this->get_indo_month(substr($tgl,5,2));
    	$tahun     = substr($tgl,0,4);
    	return $day.', '.$tanggal.' '.$bulan.' '.$tahun;
    }
    
    function indo_date_year($tgl)
    {
    	$bulan     = $this->get_indo_month_half(substr($tgl,5,2));
    	$tahun     = substr($tgl,0,4);
    	return $bulan.' '.$tahun;
    }
    
    function get_indo_month($bln)
    {
    	switch ($bln) {
    		case 1 :  return "Januari";   break;
    		case 2 :  return "Februari";  break;
    		case 3 :  return "Maret";     break;
    		case 4 :  return "April";     break;
    		case 5 :  return "Mei";       break;
    		case 6 :  return "Juni";      break;
    		case 7 :  return "Juli";      break;
    		case 8 :  return "Agustus";   break;
    		case 9 :  return "September"; break;
    		case 10:  return "Oktober";   break;
    		case 11:  return "November";  break;
    		case 12:  return "Desember";  break;
    	}
    }
    
    function get_indo_month_half($bln)
    {
    	switch ($bln) {
    		case 1 :  return "Jan";   break;
    		case 2 :  return "Feb";   break;
    		case 3 :  return "Mar";   break;
    		case 4 :  return "Apr";   break;
    		case 5 :  return "Mei";   break;
    		case 6 :  return "Jun";   break;
    		case 7 :  return "Jul";   break;
    		case 8 :  return "Agu";   break;
    		case 9 :  return "Sep";   break;
    		case 10:  return "Okt";   break;
    		case 11:  return "Nov";   break;
    		case 12:  return "Des";   break;
    	}
    }
    
    function get_indo_day($tgl)
    {
    	$tgls      = explode("-", $tgl);
    	$namahari  = date("l", mktime(0, 0, 0, $tgls[1], $tgls[2], $tgls[0]));
        
    	switch ($namahari) {
    		case "Monday" :       return "Senin";     break;
    		case "Tuesday" :      return "Selasa";    break;
    		case "Wednesday" :    return "Rabu";      break;
    		case "Thursday" :     return "Kamis";     break;
    		case "Friday" :       return "Jumat";     break;
    		case "Saturday" :     return "Sabtu";     break;
    		case "Sunday" :       return "Minggu";    break;
    	}
    }
}