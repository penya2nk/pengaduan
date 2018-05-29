<?php
require APPPATH . '/libraries/BaseController.php';
class Ckpengaduan_masuk extends BaseController 
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
		$data['masuk']= $this->Mkoor_masuk->pengaduan_masuk();
		$this->load->view('koor_masuk',$data);
	}
}

?>