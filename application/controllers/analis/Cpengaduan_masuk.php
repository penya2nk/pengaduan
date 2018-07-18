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

		$this->session->set_flashdata('style', 'success');
		$this->session->set_flashdata('alert', 'Berhasil!');
		$this->session->set_flashdata('message', 'Kategori baru telah ditambahkan.');

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
				$this->session->set_flashdata('style', 'danger');
				$this->session->set_flashdata('alert', 'Gagal!');
				$this->session->set_flashdata('message', 'Password lama yang Anda masukkan salah!');

				redirect('analis');
			}
			else
			{
				$this->Manalis_pengaduanmsk->save();
				$this->session->sess_destroy();

				redirect('karyawan');
	   		}//end if valid_user
	   	}
	}

	   public function konfirmasi()
	   {
		// $id_user = $this->session->userdata('id_user');
		// $pengaduan = $this->db->where('id_pengaduan',$id_pengaduan)->where('status','diproses')->get('log')->row();

		// $data = array(
		// 	'id_pengaduan'=>$id_pengaduan,
		// 	'id_user'=>$id_user,
		// 	'status'=>'selesai'
		// 	);
		// $this->db->insert('log',$data);
		// $this->db->where('id_pengaduan',$id_pengaduan)->update('pengaduan',array('status'=>'selesai'));

		// $this->session->set_flashdata('style','success');
		// $this->session->set_flashdata('alert','Berhasil');
		// $this->session->set_flashdata('message','Pengaduan telah dikonfirmasi!');

		// redirect('analis');

	   	$id_pengaduan = $this->input->post('id_pengaduan');
	   	$keterangan = $this->input->post('keterangan');
	   	$pengaduan = $this->db->where('id_pengaduan',$id_pengaduan)->where('status','diproses')->get('log')->row();
	   	$id_user = $this->session->userdata('id_user');
	   	$data = array(
	   		'id_pengaduan'=>$id_pengaduan,
	   		'keterangan'=>$keterangan,
	   		'id_user'=>$id_user,
	   		'status'=>'selesai'
	   	);
	   	$this->Manalis_pengaduanmsk->konfirmasi($data);

	   	$data2 = array(
	   		'status'=>'selesai'
	   	);
	   	$this->db->where('id_pengaduan',$id_pengaduan)->update('pengaduan',$data2);

	   	$this->session->set_flashdata('style', 'success');
	   	$this->session->set_flashdata('alert', 'Berhasil!');
	   	$this->session->set_flashdata('message', 'Pengaduan telah dikonfirmasi.');

	   	redirect('analis');

	//konfirmasi dengan ngirim email
 // 	date_default_timezone_set("Asia/jakarta");
	// $email = $this->input->post('email');
	// $rs = $this->Mlogin->getByEmail($email);

	// $pengaduan = $this->db->where('id_pengaduan',$id_pengaduan)->where('status','diproses')->get('log')->row();

	// $data = array(
	// 	'id_pengaduan'=>$id_pengaduan,
	// 	'id_user'=>$id_user,
	// 	'status'=>'selesai'
	// 	);

	// $this->db->insert('log',$data);
	// $this->db->where('id_pengaduan',$id_pengaduan)->update('pengaduan',array('status'=>'selesai'));

	// $config['protocol'] = "smtp";
	// $config['smtp_host'] = "ssl://smtp.googlemail.com";
	// $config['smtp_port'] = 465;
 //    $config['smtp_user'] = "sinfo.pengaduan@gmail.com"; // ganti dengan emailmu sendiri
 //    $config['smtp_pass'] = "Vendredijuin8102"; // ganti dengan password emailmu
 //    $config['charset'] = "iso-8859-1";
 //    $config['mailtype'] = "html";
 //    $config['wordwrap'] = "TRUE";
 //    $config['crlf'] = "\r\n";
 //    $config['newline'] = "\r\n";

 //    $this->load->library('email',$config);
 //    $this->email->initialize($config);
 //    $this->email->set_newline("\r\n");

 //    $this->email->from('sinfo.pengaduan@gmail.com', 'Sistem Informasi Pengaduan');
 //    $this->email->to($email);
 //    $this->email->subject('Notifikasi Konfirmasi');

 //    $this->email->message("Pengaduan Anda telah selesai ditangani! Silahkan login dan cek untuk melihat pengaduan yang telah ditangani."
 //    );
 //    $this->email->send();

 //    $this->session->set_flashdata('style','success');
	// $this->session->set_flashdata('alert','Berhasil');
	// $this->session->set_flashdata('message','Pengaduan telah dikonfirmasi!');

	// redirect('analis');
	   }


	}
