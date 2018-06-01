<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Cadm_dataruangtempat extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Madm_ruangtempat');
		$this->load->helper('url','form');
		$this->isLoggedIn();
	}

	public function index()
	{
		$data['tempat']=$this->Madm_ruangtempat->tempat();
		$data['ruang']=$this->Madm_ruangtempat->ruang();

		$this->load->view('adm_dataruangtempat',$data);
	}

	public function tambah_ruang()
	{
		$id_ruang = $this->input->post('id_ruang');
		$id_tempat = $this->input->post('id_tempat');
		$nama_ruang = $this->input->post('nama_ruang');
		$data = array(
			'id_ruang' => $id_ruang,
			'id_tempat' => $id_tempat,
			'nama_ruang' => $nama_ruang
		);
		$this->Madm_ruangtempat->tambah_ruang($data);
		redirect('admin/data_lokasi');
	}

	public function tambah_tempat()
	{
		$id_tempat = $this->input->post('id_tempat');
		$nama_tempat = $this->input->post('nama_tempat');
		$data = array(
			'id_tempat' => $id_tempat,
			'nama_tempat' => $nama_tempat
		);
		$this->Madm_ruangtempat->tambah_tempat($data);
		redirect('admin/data_lokasi');
	}
	
}
