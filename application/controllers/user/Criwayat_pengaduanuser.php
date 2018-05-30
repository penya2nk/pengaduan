<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Criwayat_pengaduanuser extends BaseController {

	function __construct()
	{
		parent::__construct();
		//$this->load->model('Mform_pengaduan');
		$this->load->helper('url','form');
		$this->isLoggedIn();
	}

	public function index()
	{
		$this->load->view('riwayat_pengaduanuser');
	}

}
