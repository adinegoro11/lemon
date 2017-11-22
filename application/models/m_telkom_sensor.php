<?php
class M_telkom_sensor extends CI_Model{
    
	public function __construct()
    {
		parent::__construct();
	}
	
	public function get()
    {
        $this->db->select('nama_link, sensor_ping, sensor_uptime, id, last_update');
        $this->db->from('prtg_sensor');
        $this->db->order_by("nama_link", "asc");  
        return $this->db->get();
	}

    public function cek_export($kolom)
    {
        $this->db->select('id, nama_link, sensor_ping, sensor_uptime');
        $this->db->from('prtg_sensor');
        $this->db->where_not_in($kolom, 0);
        $this->db->where('id', $this->input->post('id_link'));
 
        $query = $this->db->get();
        return $query;
    }

    public function export()
    {
        $this->db->select('(prtg_sensor.id)AS id, nama_link, sensor_ping, sensor_uptime, url, username, pass');
        $this->db->from('prtg_sensor');
        $this->db->join('prtg_url', 'prtg_url.id = prtg_sensor.id_url');
        $this->db->where('prtg_sensor.id', $this->input->post('id_link'));
 
        $query = $this->db->get();
        return $query;
    }
    
    public function insert()
    {
        $data = array(
            'id_url' => $this->input->post('id_url'),
            'sensor_ping' => $this->input->post('sensor_ping'),
            'sensor_uptime' => $this->input->post('sensor_uptime'),
            'nama_link' => $this->input->post('nama_link'),
            'last_update' => date("Y-m-d H:i:s")
            );
        $this->db->insert('prtg_sensor', $data);
    }

    public function detail($id)
    {
        $this->db->select('(prtg_sensor.id)AS id, nama_link, sensor_uptime, sensor_ping, url, id_url, last_update');
        $this->db->from('prtg_sensor');
        $this->db->join('prtg_url', 'prtg_url.id = prtg_sensor.id_url');
        $this->db->where('prtg_sensor.id', $id);
        return $query = $this->db->get();
    }

    public function set($id)
    {
        $data = array(
            'id_url' => $this->input->post('id_url'),
            'sensor_ping' => $this->input->post('sensor_ping'),
            'sensor_uptime' => $this->input->post('sensor_uptime'),
            'nama_link' => $this->input->post('nama_link'),
            'last_update' => date("Y-m-d H:i:s")
        );
        $this->db->where('id', $id);
        $this->db->update('prtg_sensor', $data);
    }   

    public function get_url()
    {
        $this->db->select('id, url');
        $this->db->from('prtg_url');
        $this->db->order_by("url", "asc");  
        return $this->db->get();
    }

 
}