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
		//var_dump($this->session->userdata('level'));exit;
		$data['masuk']= $this->Mkoor_masuk->pengaduan_masuk();
		$this->load->view('koor_masuk',$data);
	}

	public function detail_koor($id)
	{
		$data['detail_pengaduan']=$this->Mkoor_masuk->detail_koor($id);
		$this->load->view('koordetail_pengaduan',$data);

	}

	public function konfirmasi()
	{
		$keterangan = $this->input->post('keterangan');
		$id_pengaduan = $this->input->post('id_pengaduan');
		$id_user = $this->session->userdata('id_user');
		$data = array(
			'id_pengaduan'=>$id_pengaduan,
			'keterangan'=>$keterangan,
			'id_user'=>$id_user,
			'status'=>'selesai'
		);
		$this->Mkoor_masuk->konfirmasi($data);

		$data2 = array(
			'status'=>'selesai'
		);
		$this->db->where('id_pengaduan',$id_pengaduan)->update('pengaduan',$data2);

		$this->session->set_flashdata('style', 'success');
		$this->session->set_flashdata('alert', 'Berhasil!');
		$this->session->set_flashdata('message', 'Pengaduan telah dikonfirmasi.');

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

	public function kirim()
	{
		$keterangan = $this->input->post('keterangan');
		$id_pengaduan = $this->input->post('id_pengaduan');
		$id_user = $this->session->userdata('id_user');
		$data = array(
			'id_pengaduan'=>$id_pengaduan,
			'keterangan'=>$keterangan,
			'id_user'=>$id_user,
			'status'=>'diproses'
		);
		$this->Mkoor_masuk->kirim($data);

		$data2 = array(
			'status'=>'diproses'
		);
		$this->db->where('id_pengaduan',$id_pengaduan)->update('pengaduan',$data2);

		$this->session->set_flashdata('style', 'success');
		$this->session->set_flashdata('alert', 'Berhasil!');
		$this->session->set_flashdata('message', 'Pengaduan telah terkirim.');

		redirect('koordinator');
	}

}

?>