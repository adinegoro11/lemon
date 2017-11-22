<?php
class Model_Index extends CI_Model{
    
	public function __construct(){
		parent::__construct();
	}
	
	public function get_category($table, array $param){
        $category           = $this->db->get_where($table, $param)->row();
        return $category->category_name;
	}
    
    public function get_link($table, array $param, $post_uid, $post_slug){
        $post_category_uid  = $this->db->get_where($table, $param)->row();
        $link               = 'detail/post/'.$post_uid.'/'.$post_category_uid->category_slug.'/'.$post_slug;
        return $link;
    }
    
    public function get_statistic($table, $param, $group=NULL){
        $this->db->select('*');
    	$this->db->from($table);
        $this->db->where($param);
        if($group!=NULL){
            $this->db->group_by($group);
        }
        return $this->db->get()->num_rows();
    }
    
    public function get_this_month_donation($month){
        $this->db->select('*');
		$this->db->from('hc_donation');
        $this->db->like('donation_date',$month,'both'); 
        
        return $this->db->get();
    }
    
    public function get_related_post($table,$post_category_uid,$post_uid,$order,$limit=0){
        $sql        = "SELECT * FROM ".$table." 
                       WHERE post_category_uid = ".$post_category_uid." 
                       AND post_uid != ".$post_uid."  
                       ORDER BY ".$order." DESC LIMIT ".$limit;
        return $this->db->query($sql)->result();
    }
}