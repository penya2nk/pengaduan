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

	public function detail_koor($id)
	{
		$data['detail_pengaduan']=$this->Mkoor_masuk->detail_koor($id);
		//$data['level']=$this->Mkoor_masuk->level();	//ke level tujuan

		$this->load->view('koordetail_pengaduan',$data);

	}

	public function konfirmasi($id_pengaduan)
	{
		$this->db->where('id_pengaduan',$id_pengaduan);
		$this->db->update('pengaduan',array('status'=>'selesai'));
		redirect('koordinator');
	}
}

?>