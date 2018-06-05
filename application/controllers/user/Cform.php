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
		// $waktu = $this->input->post('waktu');
		// $subjek = $this->input->post('subjek');
		// $tempat = $this->input->post('tempat');
		// $ruang = $this->input->post('ruang');
		// $kategori = $this->input->post('kategori');
		// $kejadian = $this->input->post('kejadian');
		// $efek = $this->input->post('efek');
		// $penyebab = $this->input->post('deskripsi');

		// $data = array(
		// 	'tgl_kejadian' => $waktu,
		// 	'subjek' => $subjek,
		// 	'id_tempat' => $tempat,
		// 	'id_ruang' => $ruang,
		// 	'id_kategori' => $kategori
		// );
	}
}
