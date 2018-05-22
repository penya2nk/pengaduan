<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		//$this->load->model('mlogin');
		$this->load->helper('url','form');
	}

	public function index()
	{
		$this->load->view('laporan');
	}
}
