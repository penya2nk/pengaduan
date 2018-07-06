<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Canalis_riwayatpeng extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Manalis_riwayatpeng');
		$this->load->helper('url','form');
		$this->isLoggedIn();
	}

	public function index()
	{
		$data['proses']=$this->Manalis_riwayatpeng->pengaduan_proses();
		$this->load->view('analis_riwayatpeng',$data);
	}

	public function deleted($id_pengaduan)
	{
		$this->db->where('id_pengaduan',$id_pengaduan);
		$this->db->update('pengaduan', array('deleted'=> 1));
		redirect('analis/riwayat_pengaduan');
	}

	//function mau cek data user
	public function save_password()
	 { 

	 	$this->load->library('form_validation');

	  $this->form_validation->set_rules('new','New','required|alpha_numeric');
	  $this->form_validation->set_rules('re_new', 'Retype New', 'required|matches[new]');

	    if($this->form_validation->run() == FALSE)
	  {
			redirect('analis/riwayat_pengaduan');
	  }
	  	else
	  {
	   $cek_old = $this->Manalis_riwayatpeng->cek_old();

	   if (count($cek_old) == 0){
		    $this->session->set_flashdata('style','danger' );
		    $this->session->set_flashdata('alert','Gagal!' );
		    $this->session->set_flashdata('message','Password lama yang Anda masukkan salah' );
		    
		    redirect('analis/riwayat_pengaduan');
	   }
	   	else
	   {
		    $this->Manalis_riwayatpeng->save();
		    $this->session->sess_destroy();
		    
		    redirect('karyawan');
	   }//end if valid_user
	}
 }
	
}
