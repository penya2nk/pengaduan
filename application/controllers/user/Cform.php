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

public function home()
	{
		$this->load->view('user_home');
	}
	public function index()
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
			
			redirect('user');
		}
	}
    
}