<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Ckategori_jenis extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Manalis_kelola');
		$this->load->helper('url','form');
		//$this->load->library('pdf');
		$this->isLoggedIn();
	}

	public function index()
	{
		$data['kategori']=$this->Manalis_kelola->kategori();
		$data['jenis']=$this->Manalis_kelola->jenis();
		$this->load->view('analis_kelolakategorijenis',$data);
	}

	//tambah plus validasi kategori
	public function tambah_kategori()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('kategori','Kategori yang Anda masukkan sudah terdaftar!','required');

		if($this->form_validation->run()== FALSE )
		{
			redirect('analis/kelola');
		}else{
			$cek_kategori = $this->Manalis_kelola->cek_kategori();
			
			if (count($cek_kategori) > 0){
		    	$this->session->set_flashdata('style', 'danger');
				$this->session->set_flashdata('alert', 'Gagal!');
				$this->session->set_flashdata('kategori_msg','Data kategori sudah terdaftar!');
		    
		    	redirect('analis/kelola');
	   		}
	   		else
	   		{
				$kategori = $this->input->post('kategori');
				$data = array(
					'kategori' => strtolower($kategori)
				);
				$this->Manalis_kelola->tambah_kategori($data);

				$this->session->set_flashdata('style', 'success');
				$this->session->set_flashdata('alert', 'Berhasil!');
				$this->session->set_flashdata('kategori_msg', 'Data kategori telah ditambahkan!');

				redirect('analis/kelola');
			}
		}
	}

	//tambah plus validasi jenis
	public function tambah_jenis()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_jenis','Jenis yang Anda masukkan sudah terdaftar!','required');

		if($this->form_validation->run()== FALSE )
		{
			redirect('analis/kelola');
		}else{
			$cek_jenis = $this->Manalis_kelola->cek_jenis();

			if (count($cek_jenis) > 0){
		    	$this->session->set_flashdata('style', 'danger');
				$this->session->set_flashdata('alert', 'Gagal!');
				$this->session->set_flashdata('jenis_msg','Data jenis sudah terdaftar!');
		    
		    redirect('analis/kelola');
	   		}
	   		else
	   		{
				$nama_jenis = $this->input->post('nama_jenis');
				$data = array(
					'nama_jenis' => strtolower($nama_jenis)
				);
				$this->Manalis_kelola->tambah_jenis($data);

				$this->session->set_flashdata('style', 'success');
				$this->session->set_flashdata('alert', 'Berhasil!');
				$this->session->set_flashdata('jenis_msg', 'Data jenis telah ditambahkan!');

				redirect('analis/kelola');
			}
		}
	}

	public function edit_kategori()
	{
		$id_kategori = $this->input->post('id_kategori');
		$kategori = $this->input->post('kategori');
		$data = array(
			'kategori' => $kategori
		);
		$this->Manalis_kelola->edit_kategori($data, $id_kategori);

		$this->session->set_flashdata('style','success');
		$this->session->set_flashdata('alert','Berhasil!');
		$this->session->set_flashdata('kategori_msg','Data kategori telah berhasil diubah');
		redirect('analis/kelola');
	}

	public function edit_jenis()
	{
		$id_jenis = $this->input->post('id_jenis');
		$nama_jenis = $this->input->post('nama_jenis');
		$data = array(
			'nama_jenis' => $nama_jenis
		);
		$this->Manalis_kelola->edit_jenis($data, $id_jenis);

		$this->session->set_flashdata('style','success');
		$this->session->set_flashdata('alert','Berhasil!');
		$this->session->set_flashdata('jenis_msg','Data jenis telah berhasil diubah');

		redirect('analis/kelola');
	}

	public function hapus_kategori($id_kategori)
	{
		$this->db->where('id_kategori',$id_kategori);
		//$this->db->update('kategori',array('deleted' => '1'));
		$this->db->delete('kategori');

		$this->session->set_flashdata('style','warning');
		$this->session->set_flashdata('alert','Berhasil!');
		$this->session->set_flashdata('kategori_msg','Data kategori berhasil berhasil dihapus');

		redirect('analis/kelola');
	}

	public function hapus_jenis($id_jenis)
	{
		$this->db->where('id_jenis',$id_jenis);
		$this->db->delete('jenis');

		$this->session->set_flashdata('style','warning');
		$this->session->set_flashdata('alert','Berhasil!');
		$this->session->set_flashdata('jenis_msg','Data jenis berhasil dihapus');

		redirect('analis/kelola');
	}

	//function mau cek data user
	public function save_password()
	 { 

	 	$this->load->library('form_validation');

	  $this->form_validation->set_rules('new','New','required|alpha_numeric');
	  $this->form_validation->set_rules('re_new', 'Retype New', 'required|matches[new]');

	    if($this->form_validation->run() == FALSE)
	  {
			redirect('analis/kelola');
	  }
	  	else
	  {
		   $cek_old = $this->Manalis_kelola->cek_old();

		   if (count($cek_old) == 0){
			    $this->session->set_flashdata('style','danger' );
			    $this->session->set_flashdata('alert','Gagal!' );
			    $this->session->set_flashdata('message','Password lama yang Anda masukkan salah' );
			    
			    redirect('analis/kelola');
		   }
		   	else
		   {
			    $this->Manalis_kelola->save();
			    $this->session->sess_destroy();
			    
			    redirect('karyawan');
		   }//end if valid_user
		}
 	}
}