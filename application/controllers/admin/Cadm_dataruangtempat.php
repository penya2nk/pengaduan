<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Cadm_dataruangtempat extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Madm_ruangtempat');
		$this->load->helper('url','form');
		$this->isLoggedIn();
	}

	public function index()
	{
		$data['tempat']=$this->Madm_ruangtempat->tempat();
		$data['ruang']=$this->Madm_ruangtempat->ruang();
		$this->load->view('adm_dataruangtempat',$data);
	}

	public function tambah_ruang()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_ruang','Tempat sudah terdaftar!','required');
		//$this->form_validation->set_rules('name_di field view','error','required');
		if($this->form_validation->run() == FALSE)
		{
			redirect('admin/data_lokasi');
		}else{
			$cek_ruang = $this->Madm_ruangtempat->cek_ruang();

			if(count($cek_ruang) > 0){
				$this->session->set_flashdata('style','danger');
				$this->session->set_flashdata('alert','Gagal!');
				$this->session->set_flashdata('ruang_msg','Ruang telah terdaftar');

				redirect('admin/data_lokasi');
			}else{

				$id_ruang = $this->input->post('id_ruang');
				$id_tempat = $this->input->post('id_tempat');
				$nama_ruang = $this->input->post('nama_ruang');
				$data = array(
					'id_ruang' => $id_ruang,
					'id_tempat' => $id_tempat,
					'nama_ruang' => strtolower($nama_ruang)
				);
				$this->Madm_ruangtempat->tambah_ruang($data);

				$this->session->set_flashdata('style', 'success');
				$this->session->set_flashdata('alert', 'Berhasil!');
				$this->session->set_flashdata('ruang_msg', 'Data ruang telah ditambahkan!');

				redirect('admin/data_lokasi');
			}
		}
	}

	public function tambah_tempat()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_tempat','Tempat sudah terdaftar!','required');

		if($this->form_validation->run() == FALSE)
		{
			redirect('admin/data_lokasi');
		}else{
			$cek_tempat = $this->Madm_ruangtempat->cek_tempat();

			if(count($cek_tempat) > 0){
				$this->session->set_flashdata('style','danger');
				$this->session->set_flashdata('alert','Gagal!');
				$this->session->set_flashdata('tempat_msg','Tempat telah terdaftar');

				redirect('admin/data_lokasi');
		}else{

			//$id_tempat = $this->input->post('id_tempat');
			$nama_tempat = $this->input->post('nama_tempat');
			$data = array(
				//'id_tempat' => $id_tempat,
				'nama_tempat' => strtolower($nama_tempat)
			);
			$this->Madm_ruangtempat->tambah_tempat($data);

			$this->session->set_flashdata('style', 'success');
			$this->session->set_flashdata('alert', 'Berhasil!');
			$this->session->set_flashdata('tempat_msg', 'Data tempat telah ditambahkan!');

			redirect('admin/data_lokasi');
			}
		}
	}

	public function edit_ruang()
	{
		$id_ruang = $this->input->post('id_ruang');
		$nama_ruang = $this->input->post('nama_ruang');
		$data = array(
			'nama_ruang' => $nama_ruang
		);
		$this->Madm_ruangtempat->edit_ruang($data, $id_ruang);
		redirect('admin/data_lokasi');
	}

	public function edit_tempat()
	{
		$id_ruang = $this->input->post('id_tempat');
		$nama_ruang = $this->input->post('nama_tempat');
		$data = array(
			'nama_tempat' => $nama_tempat
		);
		$this->Madm_ruangtempat->edit_tempat($data, $id_tempat);
		redirect('admin/data_lokasi');
	}

	public function hapus_ruang($id_ruang)
	{
		$this->db->where('id_ruang',$id_ruang);
		$this->db->update('ruang',array('deleted' => '1'));
		redirect('admin/data_lokasi');
	}

	public function hapus_tempat($id_tempat)
	{
		$this->db->where('id_tempat',$id_tempat);
		$this->db->update('tempat',array('deleted' => '1'));
		redirect('admin/data_lokasi');
	}

	//function mau cek data user
	public function save_password()
	 { 

	 	$this->load->library('form_validation');

	  $this->form_validation->set_rules('new','New','required|alpha_numeric');
	  $this->form_validation->set_rules('re_new', 'Retype New', 'required|matches[new]');

	    if($this->form_validation->run() == FALSE)
	  {
			redirect('admin/data_lokasi');
	  }
	  	else
	  {
	   $cek_old = $this->Madm_ruangtempat->cek_old();

	   if (count($cek_old) == 0){
		    $this->session->set_flashdata('error','Password lama yang Anda masukkan salah' );
		    
		    redirect('admin/data_lokasi');
	   }
	   	else
	   {
		    $this->Madm_ruangtempat->save();
		    $this->session->sess_destroy();
		    $this->session->set_flashdata('error','Password anda telah berhasil diubah' );
		    
		    redirect('karyawan');
	   }//end if valid_user
	}
 }
	
}
