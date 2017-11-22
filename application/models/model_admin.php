<?php
class Model_Admin extends CI_Model{
    
	public function __construct(){
		parent::__construct();
	}
  function get_all_perangkat($id=NULL){
    $query = $this->db->select('*')->from('p_sum')
    ->join('p_perangkat','p_perangkat.perangkat_id = p_sum.sum_perangkat_id','left')
    ->join('p_lokasi','p_lokasi.lokasi_id = p_sum.sum_lokasi_id','left');
    if($id!=NULL){
      $query->where('sum_id',$id);
    }
    $query->order_by('sum_last_update','DESC');
    return $query->get();
    // echo $this->db->last_query();
  }
  function get_all_namaperangkat(){
    return $this->db->get('p_perangkat');
  }
  function get_all_lokasi(){
    return $this->db->get('p_lokasi');
  }
  function get_all_users(){
    return $this->db->get('p_login');
  }

  function get_update_by_id($id){
    return $this->db->select('*')->from('p_update')
    ->join('p_login','p_login.login_id = p_update.update_update_by','left')
    ->where('update_sum_id',$id)
    ->order_by('update_last_update','DESC')
    ->get()->result();
  }

  function get_notif_input(){
    return $this->db->select('*')->from('p_sum')
    ->join('p_perangkat','p_sum.sum_perangkat_id = p_perangkat.perangkat_id')
    ->join('p_login','p_sum.sum_update_by = p_login.login_id')
    ->order_by('sum_last_update','DESC')
    ->limit(5)
    ->get()->result();
  }

  function get_notif_update(){
    return $this->db->select('*')->from('p_update')
    ->join('p_sum','p_update.update_sum_id = p_sum.sum_id')
    ->join('p_perangkat','p_sum.sum_perangkat_id = p_perangkat.perangkat_id')
    ->join('p_login','p_update.update_update_by = p_login.login_id')
    ->order_by('update_last_update','DESC')
    ->limit(4)
    ->get()->result();
  }

  function delete($table,array $param){
    $this->db->delete($table, $param);
  }

  function insert($table,$data){
    if($this->db->insert($table, $data)){
      return $this->db->insert_id();
    }else{
      return false;
    }
    
  }

  function update($table, array $value, array $param){
    if($this->db->update($table, $value, $param)){
      return true;
    }else{
      return false;
    }
  }

  function save_new_image(){
        error_reporting(E_ALL);
        $tgl = date('Y-m-d H:i:s');
        $config['upload_path']      = './asset/backend/img/user/thumb/';
        $config['allowed_types']    = '*';
        $this->load->library('upload', $config);
        $upload_foto = $this->upload->do_upload('user-pic');

        $data['image-thumbnail'] = '';
        if($upload_foto){
            $data_file = $this->upload->data();
            $url_source = 'asset/backend/img/user/thumb/'.$data_file['file_name'];
            $image_thumbnail = $this->resize_crop($url_source, 50, 50, '_thumb', 'true');
            unlink($data_file['full_path']);
        }
        return $image_thumbnail;
    }

  function resize_crop($image, $width, $height, $new_name, $crop = 'true')
    {
        $image_path = $image;
        $ext = pathinfo($image_path, PATHINFO_EXTENSION);
        $new_image_path = str_replace('.'.$ext, $new_name.'.'.$ext, $image_path);
        $return_name = str_replace('asset/backend/img/user/thumb/', '', $new_image_path);
        
        $this->load->library('image_lib');
       
        //The original sizes
        $original_size = getimagesize($image_path);
        $original_width = $original_size[0];
        $original_height = $original_size[1];
        $ratio = $original_width / $original_height;
       
        //The requested sizes
        $requested_width = $width;
        $requested_height = $height;
       
        //Initialising
        $new_width = 0;
        $new_height = 0;
       
        //Calculations
        if ($requested_width > $requested_height) {
            $new_width = $requested_width;
            $new_height = $new_width / $ratio;
            if ($requested_height == 0)
                $requested_height = $new_height;
           
            if ($new_height < $requested_height) {
                $new_height = $requested_height;
                $new_width = $new_height * $ratio;
            }
       
        }
        else {
            $new_height = $requested_height;
            $new_width = $new_height * $ratio;
            if ($requested_width == 0)
                $requested_width = $new_width;
           
            if ($new_width < $requested_width) {
                $new_width = $requested_width;
                $new_height = $new_width / $ratio;
            }
        }
       
        $new_width = ceil($new_width);
        $new_height = ceil($new_height);
       
        //Resizing
        $config = array();
        $config['image_library'] = 'gd2';
        $config['source_image'] = $image_path;
        $config['new_image'] = $new_image_path;
        $config['maintain_ratio'] = FALSE;
        $config['height'] = $new_height;
        $config['width'] = $new_width;
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        $this->image_lib->clear();
       
        //Crop if both width and height are not zero
        if($crop == 'true'){
            if (($width != 0) && ($height != 0)) {
                $x_axis = floor(($new_width - $width) / 2);
                $y_axis = floor(($new_height - $height) / 2);
               
                //Cropping
                $config = array();
                $config['source_image'] = $new_image_path;
                $config['maintain_ratio'] = FALSE;
                $config['new_image'] = $new_image_path;
                $config['width'] = $width;
                $config['height'] = $height;
                $config['x_axis'] = $x_axis;
                $config['y_axis'] = $y_axis;
                $this->image_lib->initialize($config);
                $this->image_lib->crop();
                $this->image_lib->clear();
            }
        }
        
        return $return_name;
    }

    function ajaxgetperangkat($get)
    {
        error_reporting(E_ALL);
        /*
         * Script:    DataTables server-side script for PHP and MySQL
         * Copyright: 2010 - Allan Jardine
         * License:   GPL v2 or BSD (3-point)
         */
        
        /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
         * Easy set variables
         */
        
        /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        $aColumns = array( 'sum_id','perangkat_name', 'sum_sn', 'sum_fungsi', 'lokasi_name', 'sum_status', 'sum_lokasi_terpasang', 'sum_update_content_time', 'sum_update_content' );
        $aColumnsB = array( 'sum_id','perangkat_name', 'sum_sn', 'sum_fungsi', 'lokasi_name', 'sum_status', 'sum_lokasi_terpasang', 'sum_update_content_time', 'sum_update_content' );
        /* Indexed column (used for fast and accurate table cardinality) */
        $sIndexColumn = "sum_id";
        
        /* DB table to use */
        $sTable = "p_sum
                    left join p_perangkat on p_sum.sum_perangkat_id = p_perangkat.perangkat_id 
                    left join p_lokasi on p_sum.sum_lokasi_id = p_lokasi.lokasi_id";
        
        /* Database connection information */
        // $gaSql['user']       = "";
        // $gaSql['password']   = "";
        // $gaSql['db']         = "";
        // $gaSql['server']     = "localhost";
        
        
        /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
         * If you just want to use the basic configuration for DataTables with PHP server-side, there is
         * no need to edit below this line
         */
        
        /* 
         * MySQL connection
         */
        // $gaSql['link'] =  mysql_pconnect( $gaSql['server'], $gaSql['user'], $gaSql['password']  ) or
        //     die( 'Could not open connection to server' );
        
        // mysql_select_db( $gaSql['db'], $gaSql['link'] ) or 
        //     die( 'Could not select database '. $gaSql['db'] );
        
        
        /* 
         * Paging
         */
        $sLimit = "";
        if ( isset( $get['iDisplayStart'] ) && $get['iDisplayLength'] != '-1' )
        {
            $sLimit = "LIMIT ".mysql_real_escape_string( $get['iDisplayStart'] ).", ".
                mysql_real_escape_string( $get['iDisplayLength'] );
        }
        
        
        /*
         * Ordering
         */
        if ( isset( $get['iSortCol_0'] ) )
        {
            $sOrder = "ORDER BY  ";
            for ( $i=0 ; $i<intval( $get['iSortingCols'] ) ; $i++ )
            {
                if ( $get[ 'bSortable_'.intval($get['iSortCol_'.$i]) ] == "true" )
                {
                    $sOrder .= $aColumnsB[ intval( $get['iSortCol_'.$i] ) ]."
                        ".mysql_real_escape_string( $get['sSortDir_'.$i] ) .", ";
                }
            }
            
            $sOrder = substr_replace( $sOrder, "", -2 );
            if ( $sOrder == "ORDER BY" )
            {
                $sOrder = "ORDER BY sum_update_content_time DESC";
            }
        }else{
            $sOrder = "ORDER BY sum_update_content_time DESC";
        }
        
        
        /* 
         * Filtering
         * NOTE this does not match the built-in DataTables filtering which does it
         * word by word on any field. It's possible to do here, but concerned about efficiency
         * on very large tables, and MySQL's regex functionality is very limited
         */
        $sWhere = "";
        if ( $get['sSearch'] != "" )
        {
            $sWhere = "WHERE (";
            for ( $i=0 ; $i<count($aColumnsB) ; $i++ )
            {
                // if($aColumnsB[$i] != 'updt'){
                    $sWhere .= $aColumnsB[$i]." LIKE '%".mysql_real_escape_string( $get['sSearch'] )."%' OR ";
                // }
                // else
                // {
                //     $get['shaving'] = $get['sSearch'];
                // }
                
            }
            $sWhere = substr_replace( $sWhere, "", -3 );
            $sWhere .= ')';
        }
        
        /* Individual column filtering */
        for ( $i=0 ; $i<count($aColumnsB) ; $i++ )
        {
            if ( $get['bSearchable_'.$i] == "true" && $get['sSearch_'.$i] != '' )
            {
                if ( $sWhere == "" )
                {
                    $sWhere = "WHERE ";
                }
                else
                {
                    $sWhere .= " AND ";
                }
                $sWhere .= $aColumnsB[$i]." LIKE '%".mysql_real_escape_string($get['sSearch_'.$i])."%' ";
            }
        }
        
        /* having by (ga dipake soalnya bikin lama)

        */
        // $sHaving = "";
        // if ( isset($get['shaving']) && $get['shaving'] != "" )
        // {
        //     $sHaving = "HAVING updt like '%".mysql_real_escape_string( $get['shaving'] )."%'";
        // }

        /* Group by
        */
        // $groupby = "GROUP BY p_sum.sum_id";

        /*
         * SQL queries
         * Get data to display
         */
        $sQuery = "
            SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
            FROM   $sTable
            $sWhere 
            $sOrder
            $sLimit
        ";
        // $rResult = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
        $rResult = $this->db->query($sQuery);
        
        /* Data set length after filtering */
        $sQuery = "
            SELECT FOUND_ROWS() as jml
        ";
        // $rResultFilterTotal = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
        $rResultFilterTotal = $this->db->query($sQuery);
        $aResultFilterTotal = $rResultFilterTotal->row_array();
        // print_r($aResultFilterTotal['jml']);
        $iFilteredTotal = $aResultFilterTotal['jml'];
        
        /* Total data set length */
        $sQuery = "
            SELECT COUNT(sum_id) as jml_c
            FROM   $sTable
        ";
        // $rResultTotal = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
        $rResultTotal = $this->db->query($sQuery);
        $aResultTotal = $rResultTotal->row_array();
        $iTotal = $aResultTotal['jml_c'];
        
        
        /*
         * Output
         */
        $output = array(
            "sEcho" => intval($get['sEcho']),
            "iTotalRecords" => $iTotal,
            "iTotalDisplayRecords" => $iFilteredTotal,
            "aaData" => array()
        );
        
        foreach ( $rResult->result_array() as $aRow )
        {
            $row = array();
            for ( $i=0 ; $i<count($aColumnsB) ; $i++ )
            {
                if ( $aColumnsB[$i] == "updt" )
                {
                    /* Special output formatting for 'version' column */
                    $row[] = ($aRow[ $aColumnsB[$i] ]== null) ? '-' : $aRow[ $aColumnsB[$i] ];
                }
                else if ( $aColumnsB[$i] != ' ' )
                {
                    /* General output */
                    $row[] = $aRow[ $aColumnsB[$i] ];
                }
            }
            $output['aaData'][] = $row;
        }
        
        return json_encode( $output );
    }
}