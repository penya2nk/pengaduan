<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Cpengaduan_masuk extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Manalis_pengaduanmsk');
		$this->load->helper('url','form');
		$this->isLoggedIn();
	}

	public function index()
	{
		$id_user = $this->session->userdata('id_user');
		$data['pengaduan']=$this->Manalis_pengaduanmsk->pengaduan_masuk($id_user);
		$this->load->view('pengaduan_masuk',$data);
	}

	public function detail($id)
	{
		$data['detail_pengaduan']=$this->Manalis_pengaduanmsk->detail_pengaduan($id);
		$data['level']=$this->Manalis_pengaduanmsk->level();	//ke level tujuan

		$this->load->view('detail_pengaduan',$data);
	}
	
	public function kirim()
	{
		$id_level = $this->input->post('id_level');
		$id_pengaduan = $this->input->post('id_pengaduan');
		$id_user = $this->session->userdata('id_user');
		$data = array(
			'id_pengaduan'=>$id_pengaduan,
			'id_kategori'=>$id_level,
			'id_user'=>$id_user,
			'status'=>'diproses'
		);
		$this->Manalis_pengaduanmsk->kirim($data);
		redirect('analis');
	}

	public function ubah()
	{
		$id_pengaduan = $this->input->post('id_pengaduan');
		$penyebab = $this->input->post('penyebab');
		$deskripsi = $this->input->post('deskripsi');
		$data = array(
			'penyebab' => $penyebab,
			'deskripsi' => $deskripsi
		);
		$this->Manalis_pengaduanmsk->ubah($data,$id_pengaduan);

		redirect('analis/detail_pengaduan/'.$id_pengaduan);
	}

	public function update_status($id_pengaduan,$status)
	{
		$this->db->where('id_pengaduan',$id_pengaduan);
		$this->db->update('pengaduan_level',array('status'=>"diproses"));
	}


}
