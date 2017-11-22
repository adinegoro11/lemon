<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    private $tulisan_1 ="Masuk";
    private $tulisan_2 ="Gallery";

    function __construct()
    {
        parent::__construct();
        //if($this->session->userdata('id_login')==NULL)redirect('login/index','refresh');
    }


    public function index()
    {

        $data['tombol_masuk']= $this->tulisan_1;
        $data['tombol_gambar']= $this->tulisan_2;
        $data['isi']='v_index';
        $this->load->view('layout',$data);
    }


    public function index2()
    {
         $data           = array('title'            => 'Dashboard',
                                'template_view'     => 'template/frontend/index/dashboard',
                                'extra_script'      => 'template/frontend/index/extra_dashboard');
        $dataparse      = array_merge($this->data(),$data);
        
        $this->parser->parse('template/frontend/template', $dataparse);
    }
    

 
    
}/** Penutup controller **/
