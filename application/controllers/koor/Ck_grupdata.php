<?php
require APPPATH . '/libraries/BaseController.php';
class Ck_grupdata extends BaseController 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Mkoor_masuk');
		$this->load->helper('url','form');
		$this->isLoggedIn();
	}

	public function index()
	{
		$data['kejadian']=$this->Mkoor_masuk->kejadian();
		$this->load->view('koor_group',$data);
	}

}

?>