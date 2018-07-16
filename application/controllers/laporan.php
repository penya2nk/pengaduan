<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Laporan extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Mlaporan');
		$this->load->helper('url','form');
		$this->isLoggedIn();
	}

	public function index()
	{
		//$data['bulan']=$this->Mlaporan->bulan();
		$data['masuk']=$this->Mlaporan->masuk();
		$data['diproses']=$this->Mlaporan->diproses();
		$data['selesai']=$this->Mlaporan->selesai();
		$data['pengaduan']=$this->Mlaporan->kategori();
		$data['ruang']=$this->Mlaporan->ruang();
		$this->load->view('laporan',$data);
	}

	public function rekap()
	{
		// $data['jenis']=$this->Mlaporan->jenis();
		$data['bulan']=$this->Mlaporan->bulan();
		$data['kategori']=$this->Mlaporan->kategori();
		$this->load->view('rekap_manajemen',$data);	
	}

	//function mau cek data user
		public function save_password()
		{ 

			$this->load->library('form_validation');

			$this->form_validation->set_rules('new','New','required|alpha_numeric');
			$this->form_validation->set_rules('re_new', 'Retype New', 'required|matches[new]');

			if($this->form_validation->run() == FALSE)
			{
				redirect('mnajemen');
			}
			else
			{
				$cek_old = $this->Mlaporan->cek_old();

				if (count($cek_old) == 0){
					$this->session->set_flashdata('style','danger');
					$this->session->set_flashdata('alert','Gagal!');
					$this->session->set_flashdata('message','Password lama yang Anda masukkan salah!');

					redirect('manajemen');
				}
				else
				{
					$this->Mlaporan->save();
					$this->session->sess_destroy();

					redirect('karyawan');
	   		}//end if valid_user
		}
	}
}
