<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Cform extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Mform_pengaduan');
		$this->load->helper('url','form');
		$this->isLoggedIn();
	}

	public function index()
	{
		$this->load->view('pengadu_home');
	}
	
	public function home()
	{
		$data['kategori']= $this->Mform_pengaduan->kategori();
		$data['tempat']= $this->Mform_pengaduan->tempat();
		$data['jenis']= $this->Mform_pengaduan->jenis_kejadian();
		$data['kejadian']= $this->Mform_pengaduan->jml_kejadian();
		$this->load->view('form_pengaduan',$data);
	}


	public function ruang()
	{
		$id = $this->input->post('id');
		$data= $this->Mform_pengaduan->ruang($id);
		echo json_encode($data);
	}

	public function tambah()
	{
		if ($this->input->post('simpan')) {
			$this->Mform_pengaduan->tambah();
			
			$this->session->set_flashdata('style', 'success');
			$this->session->set_flashdata('alert', 'Berhasil!');
			$this->session->set_flashdata('message', 'Pengaduan telah direkam.');
			
			redirect('user/home');
		}
	}

	//function mau cek data user
	public function save_password()
	 { 

	 	$this->load->library('form_validation');

	  $this->form_validation->set_rules('new','New','required|alpha_numeric');
	  $this->form_validation->set_rules('re_new', 'Retype New', 'required|matches[new]');

	    if($this->form_validation->run() == FALSE)
	  {
			redirect('user/home');
	  }
	  	else
	  {
		   $cek_old = $this->Mform_pengaduan->cek_old();

		   if (count($cek_old) == 0){
			    $this->session->set_flashdata('style','danger' );
			    $this->session->set_flashdata('alert','Gagal!' );
			    $this->session->set_flashdata('message','Password lama yang Anda masukkan salah' );
			    
			    redirect('user/home');
		   }
		   	else
		   {
			    $this->Mform_pengaduan->save();
			    $this->session->sess_destroy();
			    
			    redirect('login_pengaduan');
		   }//end if valid_user
		}
 	}
    
}