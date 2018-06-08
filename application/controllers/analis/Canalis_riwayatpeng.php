<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Canalis_riwayatpeng extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Manalis_riwayatpeng');
		$this->load->helper('url','form');
		$this->isLoggedIn();
	}

	public function index()
	{
		$data['proses']=$this->Manalis_riwayatpeng->pengaduan_proses();
		$this->load->view('analis_riwayatpeng',$data);
	}

	public function deleted($id_pengaduan)
	{
		$this->db->where('id_pengaduan',$id_pengaduan);
		$this->db->update('pengaduan', array('deleted'=> 1));
		redirect('analis/riwayat_pengaduan');
	}
	
}
