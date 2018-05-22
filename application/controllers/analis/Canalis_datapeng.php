<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Canalis_datapeng extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		//$this->load->model('Manalis_detailpeng');
		$this->load->helper('url','form');
	}

	public function index()
	{
		$this->load->view('analis_datapeng');
	}
	public function laporan()
	{
		$this->load->view('laporan');
	}
	
}
