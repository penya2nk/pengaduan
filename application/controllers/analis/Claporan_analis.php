<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Claporan_analis extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Mlaporan_analis');
		$this->load->helper('url','form');
		$this->load->library('pdf');
		$this->isLoggedIn();
	}

	public function index()
	{
		$data['bulan']=$this->Mlaporan_analis->bulan();
		$data['ruang']=$this->Mlaporan_analis->ruang();
		$this->load->view('laporan_analis',$data);
	}
}