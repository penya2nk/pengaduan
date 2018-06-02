<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Cadm_log extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Madm_log');
		$this->load->helper('url','form');
		$this->isLoggedIn();
	}

	public function index()
	{
		$this->load->view('adm_log');
	}
}
