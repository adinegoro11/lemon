<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        ob_start();
        $this->load->model(array('model_login'));
	}


    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('v_login');
        }
        else
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $query = $this->model_login->cek();
            if($query->num_rows==0)
            {
                echo "<script> alert('Username password salah'); </script>";
                redirect('login/index','refresh');
            }

            foreach ($query->result() as $row)
            {
               $newdata = array('id_login' => $row->id_login, 'posisi' => $row->posisi); 
            }

            $this->session->set_userdata($newdata);
            
            if($this->session->userdata('posisi')=='telkom')redirect('telkom_sensor/index','refresh');
            else redirect('dashboard/index','refresh');
        }
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login/index','refresh');
    }



    public function index2(){
        $data = array('url'               => base_url(),
                      'title'             => 'Login',
                      'template_view'     => 'template/frontend/index/login'
                      );
        
        $this->parser->parse('template/frontend/template', $data);
    }

    /** Login Process **/
    public function loginprocess(){
        $username       = $this->input->post('username');
        $password       = $this->input->post('password');
        
        if($username != NULL || $password != NULL){
            $logincheck = ($username == 'metra') ? 'metra' : false;
            
            if($logincheck){
                
                if($password == 'm3tr4'){
                    $newdata    = array(
                        "login_username"        => 'metra',
                        "login_logged"          => TRUE
                    );
                    
                    $this->session->set_userdata($newdata);
                }else{
                    $this->session->set_flashdata('error','Wrong Password!');
                }
                
            }else{
                $this->session->set_flashdata('error','Wrong Username!');
            }
        }else{
            $this->session->set_flashdata('error','Enter Username & Password!');
        }

        redirect('login');

    }
    /** End Additional Function ***************************************************************************************/
}
