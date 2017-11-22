<?php
class Model_Common extends CI_Model{
    
	public function __construct(){
		parent::__construct();
	}
	
	function get_all($table,$limit=0,$offset=0,$order=NULL){
		$this->db->select('*');
		$this->db->from($table);
        
		if($limit!=0 && $offset!=0){
			$this->db->limit($limit, $offset);
		}
		if($order!=NULL){
			$this->db->order_by($order, 'asc');
		}
		
		return $this->db->get();
	}
    
    function get_data_where_limit($table,$limit=0,$param=NULL,$order=NULL){        
        $this->db->select('*');
		$this->db->from($table);
        
		if($limit!=0){
			$this->db->limit($limit);
		}
  		if($param!=NULL){
  			$this->db->where($param);
  		}
        
		$this->db->order_by($order, 'DESC');
        
        return $this->db->get()->result();
    }
    
    function get_data_where($table,array $param){
		return $this->db->get_where($table, $param)->result();
	}

	function get_data_like($table,array $param){
		return $this->db->select('*')->from($table)->like($param)->get();
	}
    
    function get_data_where_rowcount($table,array $param){
		return $this->db->get_where($table, $param)->num_rows();
	}

	function get_data_by_id($table,array $param){
		return $this->db->get_where($table, $param);
	}
	
	function count_all($table){
		return $this->db->count_all($table);
	}

	function delete($table,array $param){
		$this->db->delete($table, $param);
	}

	function insert($table,$data){
		$this->db->insert($table, $data);
	}

	function update($table, array $value, array $param){
		$this->db->where($param);
		$this->db->update($table, $value);
		return true;
	}
    
}