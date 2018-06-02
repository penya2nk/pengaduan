<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Ck_riwayatpeng extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Mkoor_riwayat');
		$this->load->helper('url','form');
		$this->isLoggedIn();
	}

	public function index()
	{
		$data['selesai'] = $this->Mkoor_riwayat->pengaduan_selesai();
		$this->load->view('koor_riwayatpeng',$data);
	}
}
