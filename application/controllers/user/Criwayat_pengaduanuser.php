<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Criwayat_pengaduanuser extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Mform_pengaduan');
		$this->load->helper('url','form');
		$this->isLoggedIn();
	}

	public function index()
	{
		$id_user = $this->session->userdata('id_user');
		$data['pengaduan']=$this->Mform_pengaduan->riwayat($id_user);
		$this->load->view('riwayat_pengaduanuser',$data);
	}

}
