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
        $role = $this->session->userdata('id_role');
        $level = $this->session->userdata('id_level');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
            $this->load->view('login_karyawan');
        }
        else
        {
        	if ($level == 5) {
                	redirect('admin');
                }
                elseif ($level == 2) {
                	redirect('analis');
                }
                elseif ($level == 3 || $level == 4) {
                	redirect('koordinator');
                }
                elseif ($level == 6) {
                    redirect('manajemen');
                }else{
                    $this->session->sess_destroy();
                    redirect('karyawan');
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
                                            'id_level'=>$res->id_level,
                                            'username'=>$username,
                                            'id_level'=>$res->id_level,
                                            'isLoggedIn' => TRUE
                                    );
                    // var_dump($res->id_level); exit;
                    $this->session->set_userdata($sessionArray);
                    if ($res->id_level == 5) {
                        redirect('admin');
                    }
                    elseif ($res->id_level == 2) {
                        redirect('analis');
                    }
                    elseif ($res->id_level == 3 || $res->id_level == 4) {
                        redirect('koordinator');
                    }
                    elseif ($res->id_level == 6) {
                        redirect('manajemen');
                    }
                    else{
                        $this->session->sess_destroy();
                        redirect('karyawan');
                    }
                }
            }
            else
            {
                $this->session->set_flashdata('style','danger');
                $this->session->set_flashdata('alert', 'Gagal login!');
                $this->session->set_flashdata('message', 'Periksa kembali username dan password Anda.');
                
                redirect('karyawan');
            }
        }
    }

    public function logout_karyawan()
    {
    	$this->session->sess_destroy();
    	redirect('karyawan');
    }
}
