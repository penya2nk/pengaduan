<?php
require APPPATH . '/libraries/BaseController.php';
class Grouping extends BaseController 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('');
		$this->load->helper('url','form');
		$this->isLoggedIn();
	}

	public function index()
	{
		//$data['kejadian']=$this->Mkoor_masuk->kejadian();
		$this->load->view('koor_group');
	}

}

?>