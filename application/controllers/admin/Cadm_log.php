<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Cadm_log extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Madm_log');
		$this->load->helper('url','form');
		$this->isLoggedIn();
	}

	public function index()
	{
		$data['log_activity']=$this->Madm_log->log_activity();
		$data['level']=$this->Madm_log->level();
		$this->load->view('adm_log',$data);
	}

	//function mau cek data user
	public function save_password()
	 { 

	 	$this->load->library('form_validation');

	  $this->form_validation->set_rules('new','New','required|alpha_numeric');
	  $this->form_validation->set_rules('re_new', 'Retype New', 'required|matches[new]');

	    if($this->form_validation->run() == FALSE)
	  {
			redirect('admin');
	  }
	  	else
	  {
	   $cek_old = $this->Madm_log->cek_old();

	   if (count($cek_old) == 0){
		    $this->session->set_flashdata('error','Password lama yang Anda masukkan salah' );
		    
		    redirect('admin');
	   }
	   	else
	   {
		    $this->Madm_log->save();
		    $this->session->sess_destroy();
		    $this->session->set_flashdata('error','Password anda telah berhasil diubah' );
		    
		    redirect('karyawan');
	   }//end if valid_user
	}
 }
}
