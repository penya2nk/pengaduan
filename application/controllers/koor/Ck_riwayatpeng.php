<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Ck_riwayatpeng extends BaseController {

	function __construct()
	{
		parent::__construct();
		//$this->load->model('Mkoor_pengaduan');
		$this->load->helper('url','form');
		$this->isLoggedIn();
	}

	public function index()
	{
		$this->load->view('koor_riwayatpeng');
	}
}
