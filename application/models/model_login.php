<?php
class Model_Login extends CI_Model{
    
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
		$this->db->db_select('db_login_metrasat');
	}


	public function cek()
	{ 
		return $this->db->get_where('db_login_metrasat.tbl_login',array('username'=>$this->input->post('username'),'password'=> md5($this->input->post('password'))));
	}

    public function logincheck($username){
      return $this->db->get_where('p_login',array('login_username'=>$username,'login_status_data'=>'1'));
    }
}