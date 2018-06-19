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

		//function mau cek data user
	public function save_password()
	 { 

	 	$this->load->library('form_validation');

	  $this->form_validation->set_rules('new','New','required|alpha_numeric');
	  $this->form_validation->set_rules('re_new', 'Retype New', 'required|matches[new]');

	    if($this->form_validation->run() == FALSE)
	  {
			redirect('koordinator');
	  }
	  	else
	  {
	   $cek_old = $this->Mkoor_masuk->cek_old();

	   if (count($cek_old) == 0){
		    $this->session->set_flashdata('error','Password lama yang Anda masukkan salah' );
		    
		    redirect('koordinator');
	   }
	   	else
	   {
		    $this->Mkoor_masuk->save();
		    $this->session->sess_destroy();
		    $this->session->set_flashdata('success','Password anda telah berhasil diubah' );
		    
		    redirect('karyawan');
	   }//end if valid_user
	}
 }
}

?>