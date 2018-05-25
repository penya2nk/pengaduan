<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ck_riwayatpeng extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		//$this->load->model('Mkoor_pengaduan');
		$this->load->helper('url','form');
	}

	public function index()
	{
		$this->load->view('koor_riwayatpeng');
	}
}
