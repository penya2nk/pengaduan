<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Cpengaduan_masuk extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Manalis_pengaduanmsk');
		$this->load->helper('url','form');
		$this->isLoggedIn();
	}

	public function index()
	{
		$id_user = $this->session->userdata('id_user');
		$data['pengaduan']=$this->Manalis_pengaduanmsk->pengaduan_masuk($id_user);
		$this->load->view('pengaduan_masuk',$data);
	}

	public function detail($id)
	{
		$data['kategori']=$this->Manalis_pengaduanmsk->kategori();
		$data['detail_pengaduan']=$this->Manalis_pengaduanmsk->detail_pengaduan($id);
		$data['level']=$this->Manalis_pengaduanmsk->level();	//ke level tujuan

		$this->load->view('detail_pengaduan',$data);
	}
	
	public function kirim()
	{
		$id_level = $this->input->post('id_level');
		$id_pengaduan = $this->input->post('id_pengaduan');
		$id_user = $this->session->userdata('id_user');
		$data = array(
			'id_pengaduan'=>$id_pengaduan,
			'id_kategori'=>$id_level,
			'id_user'=>$id_user,
			'status'=>'diproses'
		);
		$this->Manalis_pengaduanmsk->kirim($data);

		$this->session->set_flashdata('style', 'success');
		$this->session->set_flashdata('alert', 'Berhasil!');
		$this->session->set_flashdata('message', 'Pengaduan telah terkirim.');

		redirect('analis');
	}

	public function ubah()
	{
		$id_pengaduan = $this->input->post('id_pengaduan');
		
		$data = array(
			'id_kategori' => $this->input->post('id_kategori'),
		);
		$this->Manalis_pengaduanmsk->ubah($data,$id_pengaduan);

		redirect('analis/detail_pengaduan/'.$id_pengaduan);
	}

	public function update_status($id_pengaduan,$status)
	{
		$this->db->where('id_pengaduan',$id_pengaduan);
		$this->db->update('pengaduan',array('status'=>"diproses"));
	}

	public function tambah_kategori()
	{
		$kategori = $this->input->post('kategori');
		$id_pengaduan = $this->input->post('id_pengaduan');

		$data = array(
			'kategori' => strtolower($kategori)
		);
		$this->Manalis_pengaduanmsk->simpan($data);
		redirect('analis/detail_pengaduan/'.$id_pengaduan);
	}

	//function mau cek data user
	public function save_password()
	 { 

	 	$this->load->library('form_validation');

	  $this->form_validation->set_rules('new','New','required|alpha_numeric');
	  $this->form_validation->set_rules('re_new', 'Retype New', 'required|matches[new]');

	    if($this->form_validation->run() == FALSE)
	  {
			redirect('analis');
	  }
	  	else
	  {
	   $cek_old = $this->Manalis_pengaduanmsk->cek_old();

	   if (count($cek_old) == 0){
		    $this->session->set_flashdata('error','Password lama yang Anda masukkan salah' );
		    
		    redirect('analis');
	   }
	   	else
	   {
		    $this->Manalis_pengaduanmsk->save();
		    $this->session->sess_destroy();
		    $this->session->set_flashdata('success','Password anda telah berhasil diubah' );
		    
		    redirect('karyawan');
	   }//end if valid_user
	}
 }

 public function konfirmasi($id_pengaduan)
	{
		$id_user = $this->session->userdata('id_user');
		$pengaduan = $this->db->where('id_pengaduan',$id_pengaduan)->where('status','diproses')->get('log')->row();

		$data = array(
			'id_pengaduan'=>$id_pengaduan,
			'id_user'=>$id_user,
			'status'=>'selesai'
			);
		$this->db->insert('log',$data);
		$this->db->where('id_pengaduan',$id_pengaduan)->update('pengaduan',array('status'=>'selesai'));

		$this->session->set_flashdata('alert','success');
		$this->session->set_flashdata('success','Berhasil');
		$this->session->set_flashdata('message','Pengaduan telah dikonfirmasi!');
		
		redirect('analis');
	}

}
