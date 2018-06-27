<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Ck_riwayatpeng extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Mkoor_riwayat');
		$this->load->helper('url','form');
		$this->isLoggedIn();
	}

	public function index()
	{
		$data['selesai'] = $this->Mkoor_riwayat->pengaduan_selesai();
		$this->load->view('koor_riwayatpeng',$data);
	}

	//function mau cek data user
	public function save_password()
	 { 

	 	$this->load->library('form_validation');

	  $this->form_validation->set_rules('new','New','required|alpha_numeric');
	  $this->form_validation->set_rules('re_new', 'Retype New', 'required|matches[new]');

	    if($this->form_validation->run() == FALSE)
	  {
			redirect('koordinator');
	  }
	  	else
	  {
	   $cek_old = $this->Mkoor_riwayat->cek_old();

	   if (count($cek_old) == 0){
		    $this->session->set_flashdata('error','Password lama yang Anda masukkan salah' );
		    
		    redirect('koordinator');
	   }
	   	else
	   {
		    $this->Mkoor_riwayat->save();
		    $this->session->sess_destroy();
		    $this->session->set_flashdata('success','Password anda telah berhasil diubah' );
		    
		    redirect('karyawan');
	   }//end if valid_user
	}
 }
}
