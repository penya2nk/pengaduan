<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Mlaporan');
		$this->load->helper('url','form');
	}

	public function index()
	{
		//$data['bulan']=$this->Mlaporan->bulan();
		$data['masuk']=$this->Mlaporan->masuk();
		$data['diproses']=$this->Mlaporan->diproses();
		$data['selesai']=$this->Mlaporan->selesai();
		$data['pengaduan']=$this->Mlaporan->kategori();
		$data['ruang']=$this->Mlaporan->ruang();
		$this->load->view('laporan',$data);
	}

	public function rekap()
	{
		$data['bulan']=$this->Mlaporan->bulan();
		$data['kategori']=$this->Mlaporan->kategori();
		$this->load->view('rekap_manajemen',$data);	
	}
}
