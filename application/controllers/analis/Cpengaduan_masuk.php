<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpengaduan_masuk extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Manalis_pengaduanmsk');
		$this->load->helper('url','form');
	}

	public function index()
	{
		$data['pengaduan']=$this->Manalis_pengaduanmsk->pengaduan_masuk();
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
		$data = array(
			'id_pengaduan'=>$id_pengaduan,
			'id_level'=>$id_level
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

	public function laporan_analis()
	{
		$this->load->view('laporan');
	}


}
