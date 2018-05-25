<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Canalis_riwayatpeng extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Manalis_riwayatpeng');
		$this->load->helper('url','form');
	}

	public function index()
	{
		$data['proses']=$this->Manalis_riwayatpeng->pengaduan_proses();
		$this->load->view('analis_riwayatpeng',$data);
	}
	
}
