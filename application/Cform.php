<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cform extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Mform_pengaduan');
		$this->load->helper('url','form');
	}

	public function index()
	{
		$data['kategori']= $this->Mform_pengaduan->kategori();
		$data['tempat']= $this->Mform_pengaduan->tempat();
		$this->load->view('form_pengaduan',$data);
	}

	public function ruang()
	{
		$id = $this->input->post('id');
		$data= $this->Mform_pengaduan->ruang($id);
		echo json_encode($data);
	}
/*
	public function tambah()
	{

	}*/
}
