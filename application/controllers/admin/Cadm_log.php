<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadm_log extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('adm_log');
	}
}
