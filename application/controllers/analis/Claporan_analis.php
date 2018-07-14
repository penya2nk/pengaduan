<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Claporan_analis extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Mlaporan_analis');
		$this->load->helper('url','form');
		$this->load->library('pdf');
		$this->isLoggedIn();
	}

	public function index()
	{
		$data['bulan']=$this->Mlaporan_analis->bulan();
		$data['ruang']=$this->Mlaporan_analis->ruang();
		$data['kategori']=$this->Mlaporan_analis->kategori();
		$this->load->view('laporan_analis',$data);
	}

	public function print_laporan()
	{
		$data['bulan']=$this->Mlaporan_analis->bulan();
		$data['ruang']=$this->Mlaporan_analis->ruang();
		$data['kategori']=$this->Mlaporan_analis->kategori();
		$this->load->view('cetak_laporan',$data);
	}

	//function mau cek data user
	public function save_password()
	 { 

	 	$this->load->library('form_validation');

	  $this->form_validation->set_rules('new','New','required|alpha_numeric');
	  $this->form_validation->set_rules('re_new', 'Retype New', 'required|matches[new]');

	    if($this->form_validation->run() == FALSE)
	  {
			redirect('analis/laporan');
	  }
	  	else
	  {
		   $cek_old = $this->Mlaporan_analis->cek_old();

		   if (count($cek_old) == 0){
			    $this->session->set_flashdata('style','danger' );
			    $this->session->set_flashdata('alert','Gagal!' );
			    $this->session->set_flashdata('message','Password lama yang Anda masukkan salah' );
			    
			    redirect('analis/laporan');
		   }
		   	else
		   {
			    $this->Mlaporan_analis->save();
			    $this->session->sess_destroy();
			    
			    redirect('karyawan');
		   }//end if valid_user
		}
 	}
}