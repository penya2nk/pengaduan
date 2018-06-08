<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_pengadu extends CI_Controller {

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

	public function login()
	{
		$this->load->view('login');
	}

	function isLoggedIn()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        $username = $this->session->userdata('username');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
            $this->load->view('Login');
        }
        else
        {
        	redirect('user');
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
                    $sessionArray = array(
                        // 'usenname'=>$res->id_user,                    

                        'id_user'=>$res->id_user,                    
                        'id_role'=>$res->id_role,
                        'role'=>$res->role,
                        'nama_pengguna'=>$res->nama_pengguna,
                        'username'=>$username,
                        'isLoggedIn' => TRUE
                    );

                    $this->session->set_userdata($sessionArray);
                    redirect('user');
                }
            }
            else
            {
                $this->session->set_flashdata('style', 'danger');
                $this->session->set_flashdata('alert', 'Gagal login!');
                $this->session->set_flashdata('message', 'Periksa kembali username dan password Anda.');
                
                redirect('login_pengaduan');
            }
        }
    }

    public function logout()
    {
    	$this->session->sess_destroy();
    	redirect('login_pengaduan');
    }

    public function forget()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $password_confrim = $this->input->post('password_confirm');

    }
}
