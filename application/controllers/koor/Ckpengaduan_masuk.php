<?php

class Ckpengaduan_masuk extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Mkoor_masuk');
		$this->load->helper('url','form');
	}

	public function index()
	{
		$data['masuk']= $this->Mkoor_masuk->pengaduan_masuk();
		$this->load->view('koor_masuk',$data);
	}
}

?>