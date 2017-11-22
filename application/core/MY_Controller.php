<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		ob_start();
		if($this->session->userdata('id_login')==NULL)redirect('login/index','refresh');
		

	}

	protected function cek_login()
	{
		if($this->session->userdata('id_login')==NULL)redirect('login/index','refresh');
		if($this->session->userdata('level_login')==1){
			echo "<script> alert('Anda belum punya hak akses'); </script>";
			redirect('login/index','refresh');			
			}
	}

	protected function cek_admin()
	{
		if($this->session->userdata('level_login')!= 2) 
		{
			echo "<script> alert('Anda tidak punya hak akses'); </script>";
			redirect('login/index','refresh');			
		}
		else return TRUE;
	}

    protected function autocomplete_link()
    {
	 	$link_name = $_GET['term'];
	 	if (isset($_GET['term']))
	 	{
	    	$this->db->select('link_name, id_link');
			$this->db->from('tbl_link');
			//$this->db->where_in('id_pelanggan', array(14, 15));
			$this->db->like('link_name', $link_name);
			$query = $this->db->get();
			if($query->num_rows()>=1)
			{
				foreach ($query->result() as $row) $data[] = $row->link_name;
			}
			else
			{
				$data[] = "tidak ditemukan";
			}
	    	echo json_encode($data);
	 	}
    }


	
	protected function curl_uptime($parameter)
	{
		$link = $parameter[0]."/historicdata_html.htm?id=".$parameter[1]."&sdate=".$parameter[2]."-00-00-00&edate=".$parameter[3]."-24-00-00&avg=0&username=".$parameter[4]."&password=".$parameter[5]."&pctavg=300&pctshow=false&pct=95&pctmode=false";

		$curl = curl_init($link);
		curl_setopt($curl, CURLOPT_FAILONERROR, true); 
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); 
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false); 
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		$result = curl_exec($curl);
		curl_close($curl);
		$chars = preg_split('/<[^>]*[^\/]>/i', $result, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
        $akhir = array_search('Sensor Status History', $chars); 
        $angka = $jenis_gangguan = $downtime_akhir = $downtime_awal = null ;
        $j = $k = $l= 0;
            
        //kolom System Uptime
        if($chars[104]=='System Uptime')
        {
            
            for($i=117; $i < $akhir; $i+=4)
            { 
                $angka[$j]['waktu'] = $chars[$i];
                $replace = preg_replace("/[^0-9]/","",$chars[$i+1]);
                if($replace) $angka[$j]['value'] = $this->durasi_detik($chars[$i+1]); 
                else $angka[$j]['value'] = 0; 
                
                $angka[$j]['coverage'] = $chars[$i+2];
                $j++;
            }                
        }
        
        // kolom Value
        else
        {
            for($i=118; $i < $akhir; $i+=4)
            { 
                $angka[$j]['waktu'] = $chars[$i];
                $angka[$j]['value'] = preg_replace("/[^0-9]/","",$chars[$i+1]);
                $angka[$j]['coverage'] = $chars[$i+2];
                $j++;
            }
        }
        
        $downtime_awal = array();
        $downtime_akhir = array();
        $before = '';
        $index = 0;
        $hit = 1;
        foreach ($angka as $key => $rec) 
        {
            // echo $rec['waktu'].' => '.$rec['value'];
            // echo '<br>';
            if(trim($rec['waktu']) != '')
            {
                if($rec['value'] < $before || ($hit ==1 && $rec['value'] == ''))
                {
                    $downtime_awal[$index]['waktu'] = $rec['waktu'];
                    $downtime_awal[$index]['value'] = $hit == 1 ? 0 : $angka[$key-1]['value'];
                }
                elseif($rec['value'] > $before || ($hit+1) == count($angka))
                {
                    if(!empty($downtime_awal[$index]))
                    {
                        $downtime_akhir[$index]['waktu'] = (($hit+1) == count($angka)) ? $angka[$key]['waktu'] : $angka[$key-1]['waktu'];
                        $downtime_akhir[$index]['value'] = $rec['value'];
                        $index++;
                    }
                }
                $before = $rec['value'];
                $hit++;
            }
            
        }

        // echo '<pre>';
        // print_r($downtime_awal);
        // print_r($downtime_akhir);

        if(count($downtime_awal) != count($downtime_akhir))
        {
            echo "<script> export laporan error </script>";
            redirect('telkom_export/router_uptime','refresh');
        }

        $data = null;
        for ($i=0 ; $i < count($downtime_awal) ; $i++)
        {
            if($downtime_awal[$i]['value'] < $downtime_akhir[$i]['value']) $data['jenis_gangguan'][$i] = "Gangguan jaringan";
            else $data['jenis_gangguan'][$i] = "Gangguan kelistrikan";
            
            $data['downtime_awal'][$i] = $downtime_awal[$i]['waktu'];
            $data['downtime_akhir'][$i] = $downtime_akhir[$i]['waktu'];

            $tanggal_1 = $this->format_tanggal($downtime_awal[$i]['waktu']);
            $tanggal_2 = $this->format_tanggal($downtime_akhir[$i]['waktu']);
            $outage = $tanggal_1->diff($tanggal_2);
            $data['outage'][$i] = $outage->format("%H:%I:%S");
        }

        $data['persen_up'] = $chars[43];
        $data['persen_down'] = $chars[50];
        $data['durasi_up'] = $chars[46];
        $data['durasi_down'] = $chars[53];
        
        return $data;
	}//function

   
    private function format_tanggal($tanggal='')
    {
        $s1 = explode(" ",$tanggal);
        $s2 = explode("/",$s1[0]);
        $data = $s2[2]."-".$s2[1]."-".$s2[0]." ".$s1[1];
        $data = new DateTime($data);
        return $data;
    }	

    private function durasi_detik($string='')
    {
		$hasil= explode(" ",$string);
        $durasi_detik = 0;
		
        if($hasil[1]=="d" && count($hasil)==3)
	    {
	        $durasi_detik = (86400 * $hasil[0]);
	    }

	    elseif ($hasil[1]=="d" && count($hasil)==5)
	    {
	        $durasi_detik = (86400 * $hasil[0]) + (3600 * $hasil[2]);
	    }

	    elseif ($hasil[1]=="d" && count($hasil)==7)
	    {
	        $durasi_detik = (86400 * $hasil[0]) + (3600 * $hasil[2]) + (60 * $hasil[4]);
	    }

	    elseif ($hasil[1]=="h" && count($hasil)==3)
	    {
	        $durasi_detik = (3600 * $hasil[0]);
	    }

	    elseif ($hasil[1]=="h" && count($hasil)==5)
	    {
	        $durasi_detik = (3600 * $hasil[0]) + (60 * $hasil[2]);
	    }

	    elseif ($hasil[1]=="h" && count($hasil)==7)
	    {
	        $durasi_detik = (3600 * $hasil[0]) + (60 * $hasil[2]) + $hasil[4];
	    }

	    elseif ($hasil[1]=="m" && count($hasil)==3)
	    {
	        $durasi_detik = (60 * $hasil[0]);
	    }           

	    elseif ($hasil[1]=="m" && count($hasil)==5)
	    {
	        $durasi_detik = (60 * $hasil[0]) + $hasil[2];
	    }

	    elseif ($hasil[1]=="s" && count($hasil)==3)
	    {
	        $durasi_detik = $hasil[0];
	    }

	    return $durasi_detik;
    }//function   



} //penutup MY_Controller
