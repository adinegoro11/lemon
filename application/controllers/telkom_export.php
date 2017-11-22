<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Telkom_export extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        ob_start(); 
        if($this->session->userdata('posisi') != 'telkom')redirect('dashboard/index','refresh');
        $this->load->model('m_telkom_sensor'); 
    }


    public function index()
    {
        redirect('telkom_sensor/index','refresh');
    }

    private function cek_browser()
    {
        if (!$this->agent->is_browser('Chrome'))
        {
            echo "<script>Harus menggunakan Google Chrome</script>";
            redirect('telkom_export/index','refresh');
        }
        else return true;
    }

    public function history_down()
    {
        $this->cek_browser();
        $this->form_validation->set_rules('id_link', 'Nama link', 'required');
        $this->form_validation->set_rules('month', 'Bulan', 'required');
        $data['dropdown_link'] = $this->m_telkom_sensor->get();

        if ($this->form_validation->run() == FALSE)
        {
            $data['isi'] = 'telkom_export/v_history_down';
            $this->load->view('telkom_layout/layout',$data);
        }
        else
        {
            $cek = $this->m_telkom_sensor->cek_export('sensor_ping');
            if($cek->num_rows()==0)
            {
                echo "<script> Belum terhubung dengan PRTG </script>";
                redirect('telkom_export/history_down','refresh');
            }

            $data['query'] = $this->m_telkom_sensor->export();
            foreach ($data['query']->result() as $row)
            {
                $data['nama_link'] = $row->nama_link;
                $data['sensor_ping'] = $row->sensor_ping;
                $data['url'] = $row->url;
                $data['username'] = $row->username;
                $data['pass'] = $row->pass;
            }

            $this->input->set_cookie('nama_link', $data['nama_link'], 3600);

            $data['sdate'] = $this->input->post('month')."-01";
            $waktu = explode("-", $data['sdate']);
            $total_hari = cal_days_in_month(CAL_GREGORIAN, $waktu[1], $waktu[0]);
            $data['edate'] = $this->input->post('month')."-".$total_hari;
            $this->input->set_cookie('total_hari', $total_hari, 3600);
        
            $parameter = array($data['url'], $data['sensor_ping'], $data['sdate'], $data['edate'], $data['username'], $data['pass']);
            $hasil = $this->history_curl($parameter);
            $data['down'] = $hasil['down'];
            $data['isi']='telkom_export/v_history_down';
            $this->load->view('telkom_layout/layout',$data);
        }//else
    }//function

    public function history_curl($parameter)
    { 
        $link = $parameter[0]."/historicdata_html.htm?id=".$parameter[1]."&sdate=".$parameter[2]."-00-00-00&edate=".$parameter[3]."-24-00-00&avg=3600&username=".$parameter[4]."&password=".$parameter[5]."&pctavg=300&pctshow=false&pct=95&pctmode=false";
        $curl = curl_init($link);
        curl_setopt($curl, CURLOPT_FAILONERROR, true); 
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); 
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false); 
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($curl); 
        curl_close($curl);
        $chars = preg_split('/<[^>]*[^\/]>/i', $result, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
        
        //echo "<pre>";
        // print_r($link);
        
        $data['link_name'] = $chars[30];
        $data['persen_up'] = $chars[43];
        $data['persen_down'] = $chars[50];
        $data['durasi_up'] = $chars[46];
        $data['durasi_down'] = $chars[53];

        $j = $k = 0;
        for ($i=0; $i < count($chars); $i++) 
        { 
            if(preg_match("/Down/", $chars[$i]))
            {
                $periksa[$j] = $chars[$i+1]." ".$chars[$i+4]."<br>";
                if(preg_match("/^(0[1-9]|[1-2][0-9]|3[0-1])[\/](0[1-9]|1[0-2])[\/][0-9]{4} (00|[0-9]|1[0-9]|2[0-3]):([0-9]|[0-5][0-9]):/",$periksa[$j]))
                {
                    $data['down'][$k] = $periksa[$j];
                    $k++;
                }
                $j++;
            }
        }
        $data['total'] = $k;
        return $data;
    }// function 


    public function history_export($server, $sensor_ping, $sdate, $edate, $username, $pass)
    {
        $outage_detik = $outage_persen = 0;
        $total_hari = $this->input->cookie('total_hari', TRUE);
        $total_detik = $total_hari * 86400;

        $parameter = array($server, $sensor_ping, $sdate, $edate, $username, $pass);
        $hasil = $this->history_curl($parameter);

        $data['persen_up'] = $hasil['persen_up'];
        $data['persen_down'] = $hasil['persen_down'];
        $data['durasi_up'] = $hasil['durasi_up'];
        $data['durasi_down'] = $hasil['durasi_down'];

        $down = $hasil['down'];

        for($i=0; $i < count($down); $i++)
        {
            $string = explode("=",$down[$i]);
            $outage = explode(")",$string[1]);
            $cek = explode(" ",$string[1]);
            //$cek[1] = preg_replace("/[^a-z.]/","",$cek[1]);
            $cek[1] = $outage[0];
            $waktu= explode(" ",$down[$i]);
            

            $hasil= explode("=",$down[$i]);
            $hasil= explode(")",$hasil[1]);
            $hasil= explode(" ",$hasil[0]);
    
            if($hasil[1]=="d" && count($hasil)==2)
            {
                $durasi_detik = (86400 * $hasil[0]);
            }

            elseif ($hasil[1]=="d" && count($hasil)==4)
            {
                $durasi_detik = (86400 * $hasil[0]) + (3600 * $hasil[2]);
            }

            elseif ($hasil[1]=="d" && count($hasil)==6)
            {
                $durasi_detik = (86400 * $hasil[0]) + (3600 * $hasil[2]) + (60 * $hasil[4]);
            }

            elseif ($hasil[1]=="h" && count($hasil)==2)
            {
                $durasi_detik = (3600 * $hasil[0]);
            }

            elseif ($hasil[1]=="h" && count($hasil)==4)
            {
                $durasi_detik = (3600 * $hasil[0]) + (60 * $hasil[2]);
            }

            elseif ($hasil[1]=="h" && count($hasil)==6)
            {
                $durasi_detik = (3600 * $hasil[0]) + (60 * $hasil[2]) + $hasil[4];
            }

            elseif ($hasil[1]=="m" && count($hasil)==2)
            {
                $durasi_detik = (60 * $hasil[0]);
            }           

            elseif ($hasil[1]=="m" && count($hasil)==4)
            {
                $durasi_detik = (60 * $hasil[0]) + $hasil[2];
            }

            elseif ($hasil[1]=="s" && count($hasil)==2)
            {
                $durasi_detik = $hasil[0];
            }

            $data['date_time'][$i] = $down[$i];
            $data['down_time'][$i] = $waktu[0]." ".$waktu[1];
            $data['up_time'][$i] = $waktu[3]." ".$waktu[4];
            $data['outage'][$i] = $outage[0];
            $data['durasi_detik'][$i] = $durasi_detik;
            $data['persen'][$i] = round($durasi_detik/$total_detik, 5)*100;
            //$outage_detik += $durasi_detik;
            //$outage_persen += $persen;
        }   

        $data['nama_link'] = $this->input->cookie('nama_link', TRUE);
        $this->load->view('telkom_export/v_history_excel',$data);
    }//function


    public function router_uptime()
    {
        $this->cek_browser();
        $this->form_validation->set_rules('id_link', 'Nama link', 'required');
        $this->form_validation->set_rules('month', 'Bulan', 'required');
        $data['dropdown_link'] = $this->m_telkom_sensor->get();

        if ($this->form_validation->run() == FALSE)
        {
            $data['isi'] = 'telkom_export/v_router_form';
            $this->load->view('telkom_layout/layout',$data);
        }
        else
        {
            $cek = $this->m_telkom_sensor->cek_export('sensor_uptime');
            if($cek->num_rows()==0)
            {
                echo "<script> Belum terhubung dengan PRTG </script>";
                redirect('telkom_export/router_uptime','refresh');
            }
    
            $data['query'] = $this->m_telkom_sensor->export();
            foreach ($data['query']->result() as $row)
            {
                $data['sensor_uptime'] = $row->sensor_uptime;
                $data['nama_link'] = $row->nama_link;
                $data['url'] = $row->url;
                $data['username'] = $row->username;
                $data['pass'] = $row->pass;
            }

            $data['sdate'] = $this->input->post('month')."-01";
            $waktu = explode("-", $data['sdate']);
            $total_hari = cal_days_in_month(CAL_GREGORIAN, $waktu[1], $waktu[0]);
            $data['edate'] = $this->input->post('month')."-".$total_hari;
            //$this->input->set_cookie('total_hari', $total_hari, 3600);
            $this->input->set_cookie('nama_link', $data['nama_link'], 3600);

            $parameter = array($data['url'], $data['sensor_uptime'], $data['sdate'], $data['edate'], $data['username'], $data['pass']);
            $hasil = $this->curl_uptime($parameter);

            if(isset($hasil['downtime_awal']))
            {
                $data['downtime_awal'] = $hasil['downtime_awal'];
                $data['downtime_akhir'] = $hasil['downtime_akhir'];
                $data['outage'] = $hasil['outage'];
                $data['jenis_gangguan'] = $hasil['jenis_gangguan'];   
            }

            $data['bulan'] = date("M Y", strtotime($this->input->post('month')));
            $data['isi'] = 'telkom_export/v_router_form';
            $this->load->view('telkom_layout/layout',$data);

        }//else
    }//function

    public function router_export($server, $sensor_ping, $sdate, $edate, $username, $pass)
    {
        $parameter = array($server, $sensor_ping, $sdate, $edate, $username, $pass);
        $hasil = $this->curl_uptime($parameter);

        $data['downtime_awal'] = $hasil['downtime_awal'];
        $data['downtime_akhir'] = $hasil['downtime_akhir'];
        $data['outage'] = $hasil['outage'];
        $data['jenis_gangguan'] = $hasil['jenis_gangguan'];
        //$data['bulan'] = date("M Y", strtotime($this->input->post('month')));
        $data['nama_link'] = $this->input->cookie('nama_link', TRUE);
        $this->load->view('telkom_export/v_router_excel',$data);
    }

    public function tes()
    {
    	$j=0;
		$link = "https://202.43.73.155/historicdata_html.htm?id=18716&sdate=2017-02-01-00-00-00&edate=2017-03-01-00-00-00&avg=0&username=isp Telkom&password=Telkom123&pctavg=300&pctshow=false&pct=95&pctmode=false";
    
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

  
		for($i=117; $i < $akhir; $i+=4)
		{ 
			$angka[$j]['waktu'] = $chars[$i];
			$angka[$j]['value'] = $chars[$i+1];
            // $angka[$j]['outage'] = $this->durasi_detik($chars[$i+1]);
			
			// if(ctype_alnum($chars[$i+1])) $angka[$j]['outage'] = "kosong";
			// else $angka[$j]['outage'] = $this->durasi_detik($chars[$i+1]);
			


			$angka[$j]['coverage'] = $chars[$i+2];
			$j++;
		}


        echo '<pre>';
		//if($chars[104]=='System Uptime') echo "Uptime";
        //else echo "value";
       	if(count($angka) < 2) echo "kosong";
       	else echo count($angka);

		//preg_replace("/[^0-9]/","",$chars[$i+1]);

        //print_r($chars);
        print_r($angka);

    }//function

    
}/** Penutup controller **/
