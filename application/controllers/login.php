<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Mlogin');
		$this->load->helper('url','form');
	}

	public function index()
	{
		$this->isLoggedIn();
	}

	public function login_karyawan()
	{
		$this->load->view('login_karyawan');
	}

	function isLoggedIn()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        $username = $this->session->userdata('username');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
            $this->load->view('login');
        }
        else
        {
        	if ($username == 'admin') { //nyamain val opt
                    	redirect('admin');
                    }
                    elseif ($username == 'analis') {
                    	redirect('analis');
                    }
                    elseif ($username == 'koordinator') {
                    	redirect('koordinator');
                    }
        }
    }
    
    
    /**
     * This function used to logged in user
     */
    public function loginMe()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[32]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->index();
        }
        else
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            $result = $this->Mlogin->loginMe($username, $password);
            
            if(count($result) > 0)
            {
                foreach ($result as $res)
                {
                    $sessionArray = array('id_user'=>$res->id_user,                    
                                            'id_role'=>$res->id_role,
                                            'role'=>$res->role,
                                            'nama_pengguna'=>$res->nama_pengguna,
                                            'username'=>$username,
                                            'isLoggedIn' => TRUE
                                    );
//langsung redirect                                    
                    $this->session->set_userdata($sessionArray);
                    if ($username == 'admin') { //nyamain val opt
                    	redirect('admin');
                    }
                    elseif ($username == 'analis') {
                    	redirect('analis');
                    }
                    elseif ($username == 'koordinator') {
                    	redirect('koordinator');
                    }
                    
                }
            }
            else
            {
                $this->session->set_flashdata('error', 'username or password mismatch');
                
                redirect('login');
            }
        }
    }

    public function logout_karyawan()
    {
    	$this->session->sess_destroy();
    	redirect('karyawan');
    }
}
