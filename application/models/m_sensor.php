<?php
class M_sensor extends CI_Model{
    
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
    
    public function insert($tabel, $data)
    {
        $this->db->insert($tabel, $data);
    }
    
    public function get_idr_ip()
    {
        $this->db->select('*');
        $this->db->from('prtg_idr_ip');
        $this->db->order_by("nama_link", "asc");  
        return $this->db->get();
    }

    public function get_url()
    {
        $this->db->select('id, url');
        $this->db->from('prtg_url');
        $this->db->order_by("url", "asc");  
        return $this->db->get();
    }

    public function detail($id)
    {
        $this->db->select('nama_link, id_sensor, prtg_sensor.id id, url, id_url');
        $this->db->from('prtg_sensor');
        $this->db->join('prtg_url', 'prtg_url.id = prtg_sensor.id_url');
        $this->db->where('prtg_sensor.id', $id);
        return $query = $this->db->get();
    }

    public function set($tabel, $id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($tabel, $data);
    }  

    public function get_data_where($table,array $param)
    {
        return $this->db->get_where($table, $param)->result();
    }
 
}