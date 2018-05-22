<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadm_datauser extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Madmin_datauser');
		$this->load->helper('url');
	}

	public function index()
	{
		$data['user']=$this->Madmin_datauser->user();
		$this->load->view('adm_datauser',$data);
	}
}
