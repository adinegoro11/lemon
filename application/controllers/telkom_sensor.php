<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Telkom_sensor extends CI_Controller {


    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('id_login')==NULL)redirect('login/index','refresh');
        $this->load->model('m_telkom_sensor');
    }


    public function index()
    {
        $data['query']= $this->m_telkom_sensor->get();
        $data['isi']='telkom_sensor/v_index';
        $this->load->view('telkom_layout/layout',$data);
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

    public function add()
    {
        $this->form_validation->set_rules('id_url', 'URL', 'required');
        $this->form_validation->set_rules('sensor_ping', 'Sensor Ping', 'required');
        $this->form_validation->set_rules('sensor_uptime', 'Sensor Uptime', 'required');
        $this->form_validation->set_rules('nama_link', 'Nama link', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $data['dropdown_url'] = $this->m_telkom_sensor->get_url();
            $data['isi'] = 'telkom_sensor/v_add';
            $this->load->view('telkom_layout/layout',$data);
        }
        else
        {
            $this->m_telkom_sensor->insert();
            $this->db->close();
            redirect('telkom_sensor/index','refresh');
        }
    }

    public function set($id = '')
    {
        $id = $this->uri->segment(3);
        $this->form_validation->set_rules('id_url', 'URL', 'required');
        $this->form_validation->set_rules('sensor_ping', 'Sensor Ping', 'required');
        $this->form_validation->set_rules('sensor_uptime', 'Sensor Uptime', 'required');
        $this->form_validation->set_rules('nama_link', 'Nama link', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            if(empty($id)) $id = $this->input->post('id');
            $query = $this->m_telkom_sensor->detail($id);
            foreach ($query->result() as $row)
            {
                $data['nama_link'] = $row->nama_link;
                $data['sensor_uptime'] = $row->sensor_uptime;
                $data['sensor_ping'] = $row->sensor_ping;
                $data['id_url'] = $row->id_url;
            }
            $data['dropdown_url'] = $this->m_telkom_sensor->get_url();
            $data['id'] = $id;
            $data['isi'] = 'telkom_sensor/v_set';
            $this->load->view('telkom_layout/layout',$data);
        }
        else
        {
            $this->m_telkom_sensor->set($id);
            $this->db->close();
            redirect('telkom_sensor/index','refresh');
        }
    }

    
}/** Penutup controller **/
