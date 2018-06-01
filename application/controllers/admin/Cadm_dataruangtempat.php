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

	public function edit_ruang()
	{
		$id_ruang = $this->input->post('id_ruang');
		$nama_ruang = $this->input->post('nama_ruang');
		$data = array(
			'nama_ruang' => $nama_ruang
		);
		$this->Madm_ruangtempat->edit_ruang($data, $id_ruang);
		redirect('admin/data_lokasi/'.$id_ruang);
	}

	public function edit_tempat()
	{
		$id_ruang = $this->input->post('id_tempat');
		$nama_ruang = $this->input->post('nama_tempat');
		$data = array(
			'nama_tempat' => $nama_tempat
		);
		$this->Madm_ruangtempat->edit_tempat($data, $id_tempat);
		redirect('admin/data_lokasi');
	}

	public function hapus_ruang($id_ruang)
	{
		$this->db->where('id_ruang',$id_ruang);
		$this->db->update('ruang',array('deleted' => '1'));
		redirect('admin/data_lokasi');
	}

	public function hapus_tempat($id_tempat)
	{
		$this->db->where('id_tempat',$id_tempat);
		$this->db->update('tempat',array('deleted' => '1'));
		redirect('admin/data_lokasi');
	}
	
}
