<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prtg extends MY_Controller {

	//private $link_batam  = array(2214, 2215, 2217, 2216, 2218, 2219, 2220, 2221, 2222, 2208, 2209, 2210, 2211, 2226, 2224, 2225);
	private $username_kima = "prtgadmin";
	private $password_kima = "m3tr4Vpsat";
	private $hash_kima = "3916959852";

	private $css_text ="class='text-muted'";
	private $css_link_name ="class='active'";
	private $css_warning="bgcolor='#FA2A00'";
	private $css_clear="bgcolor='#006633'";
	private $batas = 100;


	function __construct()
    {
		parent::__construct();
		ob_start();
		//$this->load->model('M_dbai');
		$this->load->model('m_sensor');
		$this->load->library('form_validation');
		
    }

	public function index()
	{
		// $data['isi'] = 'prtg/v_index';
		$data['isi'] = 'prtg/v_layar_penuh';
		$this->load->view('prtg/layout',$data);
	}//function


	public function makassar()
	{
		$data['link'] = array(2073, 2085, 2093, 2090,  2087, 2077, 2049);
		$data['nama_link'] = array('BSC Sorong Traffic', 'Ambon Traffic', 'Jayapura Traffic','TO-MODEM840 Traffic','TO-MODEM840 Traffic','TO-MODEM840 Traffic', 'MUX-XL-KM9 Traffic');
		$data['username'] = $this->username_kima;
		$data['passhash'] = $this->hash_kima;
		$data['isi'] = 'prtg/v_grafik_makassar';
		$this->load->view('prtg/layout',$data);
	}//penutup fungsi
	
	public function timika()
	{
		$data['link'] = array(2054, 2037, 2057, 2058);
		$data['nama_link'] = array('Traffic STM1 Nabire 1', 'Traffic STM1 Nabire 2', 'Traffic Dogiyai', 'Traffic Router Tsel');
		$data['isi'] = 'prtg/v_grafik_timika';
		$this->load->view('prtg/layout',$data);
	}
 
	public function batam()
	{
		$data['link_batam'] = array(2214, 2215, 2217, 2216, 2218, 2219, 2220, 2221, 2222, 2208, 2209, 2210, 2211, 2226, 2224, 2225);
		$data['isi'] = 'prtg/v_grafik_batam';
		//$data['isi'] = 'prtg/v_maintenance';
		$this->load->view('prtg/layout',$data);
	}

	public function ajax_notifikasi($lokasi='', $id_prtg='')
	{
		//$url = file_get_contents("http://batam-m3tr4.mooo.com:8088/api/getsensordetails.json?id=".$id_prtg."&username=prtgadmin&password=prtgadmin");
		if($lokasi=='timika') $url = file_get_contents("http://timika-m3tr4.mooo.com:7070/api/getsensordetails.json?id=".$id_prtg."&username=prtgadmin&password=prtgadmin&");
		else $url = file_get_contents("http://10.80.254.232:8787/api/getsensordetails.json?id=".$id_prtg."&username=prtgadmin&password=m3tr4Vpsat");
		
		$hasil = json_decode($url,true);
		//$data['waktu'] = date("Y-m-d H:i:s");
		$nama = $hasil['sensordata']['name'];
		$trafik = preg_replace("/[^0-9]/","",$hasil['sensordata']['lastvalue']);
		if($trafik <= 0)
		{
			echo "<div class='alert alert-danger' role='alert'>$nama bermasalah <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button></div>";
		}
		elseif ($trafik > 0 && $trafik <= 1000)
		{
			echo "<div class='alert alert-warning' role='alert'>$nama rendah <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button></div>";
		}

		//$this->load->view('prtg/v_ajax_notifikasi',$data);

	}//penutup fungsi


	public function get_value3($id_sensor='')
	{
		$url = file_get_contents("http://prtg-tsel.metrasat.net:9200/api/getobjectstatus.htm?id=".$id_sensor."&name=lastvalue&show=text&username=prtgadmin&password=M3tr4sat");
		$xml = simplexml_load_string($url) or die("Error: Cannot create object");
		echo $xml->result;

	}//penutup fungsi


	private function get_value($id_sensor='')
	{
		$url = file_get_contents("http://prtg-tsel.metrasat.net:9200/api/getobjectstatus.htm?id=".$id_sensor."&name=lastvalue&show=text&username=prtgadmin&password=M3tr4sat");
		$xml = simplexml_load_string($url) or die("Error: Cannot create object");
		return $xml->result;
	}//penutup fungsi


	public function tampil_palu()
	{
		$data = $this->data_palu();
		$this->ajax_data($data);
	}

	public function tampil_pontianak()
	{
		$data = $this->data_pontianak();
		$this->ajax_data($data);
	}	

	public function tampil_palangkaraya()
	{
		$data = $this->data_palangkaraya();
		$this->ajax_data($data);
	}

	public function tampil_balikpapan()
	{
		$data = $this->data_balikpapan();
		$this->ajax_data($data);
	}

	public function tampil_sampit()
	{
		$data = $this->data_sampit();
		$this->ajax_data($data);
	}

	public function tampil_ambon()
	{
		$data = $this->data_ambon();
		$this->ajax_data($data);
	}			

	public function tampil_bogor()
	{
		$data = $this->data_bogor();
		$this->ajax_data($data);
	}

	public function tampil_timika()
	{
		$data = $this->data_timika();
		$this->ajax_data($data);
	}

	public function tampil_sorong()
	{
		$data = $this->data_sorong();
		$this->ajax_data($data);
	}	

	public function tampil_jayapura_ip()
	{
		$data = $this->data_jayapura_ip();
		$this->ajax_data($data);
	}

	public function tampil_makassar()
	{
		$data = $this->data_makassar();
		$this->ajax_data($data);
	}	


	public function ajax_data($data)
	{
		// $data = $this->data_palu();

		echo "<tr> <th>Link</th> <th>Tx</th> <th>Rx</th> </tr>";
		for ($i=0; $i < count($data); $i++) 
		{ 
			$cek_tx = preg_replace("/[^0-9]/","", $this->get_value($data[$i]['tx']));
			$cek_rx = preg_replace("/[^0-9]/","", $this->get_value($data[$i]['rx']));

			$cek_tx <= $this->batas || $cek_rx <= $this->batas ? $css = $this->css_warning : $css = $this->css_clear;

			echo "<tr ".$this->css_text."> ";
			echo "<td ".$this->css_link_name.">".$data[$i]['lokasi']."</td>";		 
			echo "<td ".$css.">".$this->get_value($data[$i]['tx'])."</td>";			 
			echo "<td ".$css.">".$this->get_value($data[$i]['rx'])."</td>"; 
			echo "</tr>";
		}
	
	}

    private function data_palu()
    {
        $data[0] = array('lokasi' =>'Wuasa', 'tx' => 2968, 'rx' => 2967);
        $data[1] = array('lokasi' =>'Bangkurung','tx' => 2962,'rx' => 2961);
        $data[2] = array('lokasi' =>'Arthabumi', 'tx' =>2956, 'rx' =>2955);
  

        return $data;
    }

    private function data_palangkaraya()
    {
        $data[0] = array('lokasi' =>'Tumbang Tukun', 'tx' => 2991, 'rx' => 2990);
        $data[1] = array('lokasi' =>'PT.Top Buhut','tx' => 2997,'rx' => 2996);
        $data[2] = array('lokasi' =>'Pama Asmi', 'tx' =>3009, 'rx' =>3008);
		$data[3] = array('lokasi' =>'Tumbang Manjul', 'tx' =>3015, 'rx' =>3014);
        return $data;
    }

    private function data_pontianak()
    {
        $data[0] = array('lokasi' =>'PT.Erna', 'tx' => 3195, 'rx' => 3196);
        $data[1] = array('lokasi' =>'Semendang','tx' => 3200,'rx' => 3201);
        $data[2] = array('lokasi' =>'Nangasayan', 'tx' =>3206, 'rx' =>3207);
        return $data;
    }

    private function data_balikpapan()
    {
        $data[0] = array('lokasi' =>'Long Midang', 'tx' => 3054, 'rx' => 3053);
        $data[1] = array('lokasi' =>'Long Bawan','tx' => 2921,'rx' => 2920);
        $data[2] = array('lokasi' =>'Data Bilang', 'tx' =>2927, 'rx' =>2926);
        $data[3] = array('lokasi' =>'Sekatak', 'tx' =>2939, 'rx' =>2938);
        $data[4] = array('lokasi' =>'Sekatak Buji', 'tx' =>2933, 'rx' =>2932);
        return $data;
    }

    private function data_sampit()
    {
        $data[0] = array('lokasi' =>'Ruwai', 'tx' => 3022, 'rx' => 3021);
        $data[1] = array('lokasi' =>'PT.AKT','tx' => 3040,'rx' => 3039);
        $data[2] = array('lokasi' =>'Kudangan', 'tx' =>3046, 'rx' =>3045);
		$data[3] = array('lokasi' =>'T. Senaman', 'tx' =>3052, 'rx' =>3051);
        return $data;
    }

    private function data_ambon()
    {
        $data[0] = array('lokasi' =>'Geser', 'tx' => 3140, 'rx' => 3139);
        $data[1] = array('lokasi' =>'Liran','tx' => 3145,'rx' => 3144);
        $data[2] = array('lokasi' =>'Moa Lakor 6/6', 'tx' =>3147, 'rx' =>3148);
        $data[3] = array('lokasi' =>'Moa Lakor 9/4', 'tx' =>3156, 'rx' =>3155);
        $data[4] = array('lokasi' =>'Gorom', 'tx' =>3170, 'rx' =>3169);
        $data[5] = array('lokasi' =>'Namalean', 'tx' =>3167, 'rx' =>3168);
        return $data;
    }

    private function data_jayapura_ip()
    {
        $data = array(
					array('lokasi' =>'Karubaga', 'tx' => 3059, 'rx' => 3060),
					array('lokasi' =>'Lereh','tx' => 3065,'rx' => 3066),
					array('lokasi' =>'Yalimo', 'tx' =>3071, 'rx' =>3072),
					array('lokasi' =>'Senggi', 'tx' =>3076, 'rx' =>3077),
					array('lokasi' =>'Dekai', 'tx' =>3081, 'rx' =>3082),
					array('lokasi' =>'Tolikara', 'tx' =>3087, 'rx' =>3088),
					array('lokasi' =>'Supiori', 'tx' =>3092, 'rx' =>3093),
        	);
        return $data;
    }


    private function data_bogor()
    {
        $data = array(
        			array('lokasi' =>'Tiakur', 'tx' => 3252, 'rx' => 3251),
        			array('lokasi' =>'Saumlaki', 'tx' => 3258, 'rx' => 3257), 
        		);
        return $data;
    }

    private function data_timika()
    {
        $data = array(
        			array('lokasi' =>'Kepikrida', 'tx' => 3186, 'rx' => 3187),
        			array('lokasi' =>'Enarotali', 'tx' => 3276, 'rx' => 3277),
        			array('lokasi' =>'Dogiyai', 'tx' => 3282, 'rx' => 3283), 
        		);
        return $data;
    }    

    private function data_sorong()
    {
        $data = array(
        			array('lokasi' =>'LNG Tangguh', 'tx' => 3104, 'rx' => 3105),
        			array('lokasi' =>'Babo', 'tx' => 3109, 'rx' => 3110), 
        			array('lokasi' =>'Teminabuan 8/8', 'tx' => 3114, 'rx' => 3115), 
        			array('lokasi' =>'Patipi', 'tx' => 3119, 'rx' => 3120), 
        			array('lokasi' =>'Karas', 'tx' => 3124, 'rx' => 3125), 
        			array('lokasi' =>'Teminabuan 4/4', 'tx' => 3129, 'rx' => 3130), 
        		);
        return $data;
    }

    private function data_makassar()
    {
        $data = array(
        			array('lokasi' =>'Binongko', 'tx' => 3288, 'rx' => 3288),
        			array('lokasi' =>'Pasimamai', 'tx' => 3289, 'rx' => 3289),
        			array('lokasi' =>'Stargate', 'tx' => 3294, 'rx' => 3294), 
        			array('lokasi' =>'Langgikima', 'tx' => 3295, 'rx' => 3295), 
        			array('lokasi' =>'Tolala', 'tx' => 3296, 'rx' => 3296), 
        		);
        return $data;
    } 


    public function tes2()
    {
		$query = $this->db->get('prtg_idr_ip');
		
		foreach ($query->result() as $row)
		{
			$value_tx_traffic = str_replace(",", ".", $this->get_value($row->sensor_tx_traffic));
			$value_rx_traffic = str_replace(",", ".", $this->get_value($row->sensor_rx_traffic));
			$value_lebno = str_replace(",", ".", $this->get_value($row->sensor_lebno));
			$value_rebno = str_replace(",", ".", $this->get_value($row->sensor_rebno));

			$data =array(
				'value_tx_traffic' => $value_tx_traffic,
				'value_rx_traffic' => $value_rx_traffic,
				'value_rebno' => $value_rebno,
				'value_lebno' => $value_lebno,
				'last_update' => date("Y-m-d H:i:s")
				);

			$this->m_sensor->set('prtg_idr_ip', $row->id, $data);
		}
		// redirect('sensor/index/idr_ip','refresh');
    }

	public function tes()
	{
		$this->db->select('*');
		$this->db->from('prtg_idr_ip');
		$this->db->order_by('hub', 'asc');
        $data['query'] = $this->db->get();


		// $data['query'] = $this->db->get('prtg_idr_ip');
		$data['isi'] = 'sensor_idr_ip/v_tabel';
		$this->load->view('prtg/layout',$data);
	}//function

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */