<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Canalis_riwayatpeng extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Manalis_riwayatpeng');
		$this->load->helper('url','form');
		$this->isLoggedIn();
	}

	public function index()
	{
		$data['proses']=$this->Manalis_riwayatpeng->pengaduan_proses();
		$this->load->view('analis_riwayatpeng',$data);
	}
	
}
