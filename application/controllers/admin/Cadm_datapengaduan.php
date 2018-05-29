<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Cadm_datapengaduan extends BaseController {

	function __construct()
	{
		parent::__construct();
		//$this->load->model('mlogin');
		$this->load->helper('url','form');
		$this->isLoggedIn();
	}

	public function index()
	{
		$this->load->view('adm_datapengaduan');
	}
	
}
