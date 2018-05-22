<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadm_datapengaduan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		//$this->load->model('mlogin');
		$this->load->helper('url','form');
	}

	public function index()
	{
		$this->load->view('adm_datapengaduan');
	}
	public function laporan()
	{
		$this->load->view('laporan');
	}
}
