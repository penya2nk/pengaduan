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
		$this->load->view('koordetail_pengaduan',$data);

	}

	public function konfirmasi($id_pengaduan)
	{
		// $this->db->where('id_pengaduan',$id_pengaduan);
		// $this->db->update('pengaduan_level',array('status'=>'selesai'));
		$id_user = $this->session->userdata('id_user');
		$pengaduan = $this->db->where('id_pengaduan',$id_pengaduan)->where('status','diproses')->get('pengaduan_level')->row();
		$data = array(
			'id_pengaduan'=>$id_pengaduan,
			'id_kategori'=>$pengaduan->id_kategori,
			'id_user'=>$id_user,
			'status'=>'selesai'
			);
		$this->db->insert('pengaduan_level',$data);
		redirect('koordinator');
	}
}

?>