<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sensor extends CI_Controller {

	function __construct()
    {
		parent::__construct();
		ob_start();
		if($this->session->userdata('id_login')==NULL)redirect('login/index','refresh');
		$this->load->model('m_sensor');
		$this->load->library('form_validation');
    }

	public function index($jenis='')
	{
		if($jenis=='idr_ip')
		{
			$data['query'] = $this->m_sensor->get_idr_ip();
			$data['isi'] = 'sensor_idr_ip/v_index';
		}
		else
		{
			$data['query'] = $this->m_sensor->get();
			$data['isi'] = 'sensor/v_index';
		}
		// $data['query'] = $this->m_sensor->get();
		// $data['isi'] = 'sensor/v_index';
		$this->load->view('sensor/layout',$data);
	}//function

	public function add()
	{
		$this->form_validation->set_rules('id_url', 'URL', 'required');
		$this->form_validation->set_rules('id_sensor', 'ID PRTG', 'required');
		$this->form_validation->set_rules('nama_link', 'Nama link', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$data['dropdown_url'] = $this->m_sensor->get_url();
			$data['isi'] = 'sensor/v_add';
			$this->load->view('prtg/layout',$data);
		}
		else
		{
			$data = array(
	            'id_url' => $this->input->post('id_url'),
	            'id_sensor' => $this->input->post('id_sensor'),
	            'nama_link' => $this->input->post('nama_link'),
	            'last_update' => date("Y-m-d H:i:s")
            );

			$this->m_sensor->insert('prtg_sensor', $data);
			$this->db->close();
			redirect('sensor/index','refresh');
		}
	}


 	public function set($id = '')
	{
		$id = $this->uri->segment(3);
		$this->form_validation->set_rules('id_url', 'URL', 'required');
		$this->form_validation->set_rules('id_sensor', 'ID PRTG', 'required');
		$this->form_validation->set_rules('nama_link', 'Nama link', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			if(empty($id)) $id = $this->input->post('id');
			$query = $this->m_sensor->detail($id);
			foreach ($query->result() as $row)
			{
				$data['nama_link']= $row->nama_link;
				$data['id_sensor']= $row->id_sensor;
				$data['id_url']= $row->id_url;
			}
			$data['dropdown_url'] = $this->m_sensor->get_url();
			$data['id'] = $id;
			$data['isi'] = 'sensor/v_set';
			$this->load->view('prtg/layout',$data);
		}
		else
		{
			$data = array(
	            'id_url' => $this->input->post('id_url'),
	            'id_sensor' => $this->input->post('id_sensor'),
	            'nama_link' => $this->input->post('nama_link'),
	            'last_update' => date("Y-m-d H:i:s")
        	);

			$this->m_sensor->set('prtg_sensor', $id, $data);
			$this->db->close();
			redirect('sensor/index','refresh');
		}
	}	

 
	public function add_idr_ip()
	{
		$this->form_validation->set_rules('nama_link', 'Nama Link', 'required');
		$this->form_validation->set_rules('sensor_tx_traffic', 'Sensor Tx', 'required');
		$this->form_validation->set_rules('sensor_rx_traffic', 'Sensor Rx', 'required');
		$this->form_validation->set_rules('sensor_lebno', 'Sensor L.Ebno', 'required');
		$this->form_validation->set_rules('sensor_rebno', 'Sensor R.Ebno', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['isi'] = 'sensor_idr_ip/v_add';
			$this->load->view('prtg/layout',$data);
		}
		else
		{
			// print_r($this->input->post());
			$data = array(
					'nama_link' => $this->input->post('nama_link'),
					'sensor_tx_traffic' => $this->input->post('sensor_tx_traffic'),
					'sensor_rx_traffic' => $this->input->post('sensor_rx_traffic'),
					'sensor_lebno' => $this->input->post('sensor_lebno'),
					'sensor_rebno' => $this->input->post('sensor_rebno'),
					'hub' => $this->input->post('hub'),
					'last_update' => date("Y-m-d H:i:s")
				);
			$this->m_sensor->insert('prtg_idr_ip', $data);
			redirect('sensor/index/idr_ip','refresh');
		}
	}//function


	public function set_idr_ip($id='')
	{
		$this->form_validation->set_rules('nama_link', 'Nama Link', 'required');
		$this->form_validation->set_rules('sensor_tx_traffic', 'Sensor Tx', 'required');
		$this->form_validation->set_rules('sensor_rx_traffic', 'Sensor Rx', 'required');
		$this->form_validation->set_rules('sensor_lebno', 'Sensor L.Ebno', 'required');
		$this->form_validation->set_rules('sensor_rebno', 'Sensor R.Ebno', 'required');

		// $id = $this->uri->segment(3);
		if ($this->form_validation->run() == FALSE)
		{

			$data['sql'] = $this->m_sensor->get_data_where('prtg_idr_ip',array('id'=> $id));
            // echo '<pre>';
            // print_r($data); 
            // echo $data[0]->nama_link;

			// $this->load->view('v_input_update',$data);
			$data['id'] = $id;
			$data['isi'] = 'sensor_idr_ip/v_set';
			$this->load->view('prtg/layout',$data);
		}
		else
		{
			// print_r($this->input->post());
			$data = array(
				'nama_link' => $this->input->post('nama_link'),
				'sensor_tx_traffic' => $this->input->post('sensor_tx_traffic'),
				'sensor_rx_traffic' => $this->input->post('sensor_rx_traffic'),
				'sensor_lebno' => $this->input->post('sensor_lebno'),
				'sensor_rebno' => $this->input->post('sensor_rebno'),
				'value_tx_traffic' => $this->input->post('value_tx_traffic'),
				'value_rx_traffic' => $this->input->post('value_rx_traffic'),
				'value_rebno' => $this->input->post('value_rebno'),
				'value_lebno' => $this->input->post('value_lebno'),
				'hub' => $this->input->post('hub'),
				'last_update' => date("Y-m-d H:i:s")
			);

			$this->m_sensor->set('prtg_idr_ip', $this->uri->segment(3), $data);
			redirect('sensor/index/idr_ip','refresh');
		}            
	}

 



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */