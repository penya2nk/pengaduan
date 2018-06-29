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
		$data['masuk']=$this->Mlaporan->masuk();
		$data['diproses']=$this->Mlaporan->diproses();
		$data['selesai']=$this->Mlaporan->selesai();
		$data['pengaduan']=$this->Mlaporan->kategori();
		$this->load->view('laporan',$data);
	}
}
