<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class forgot extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Mlogin');
		$this->load->helper('url','form');
	}

	public function index()
	{
		//$password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
		$this->load->view('input_email');
	}

	public function kirim_email()
	{
		date_default_timezone_set("Asia/jakarta");
		$email = $this->input->post('email');
		$rs = $this->Mlogin->getByEmail($email);

  // cek email ada atau engga
		if (!$rs->num_rows() > 0){

			$this->session->set_flashdata('style','danger');
			$this->session->set_flashdata('alert', 'Email tidak ditemukan!');
			$this->session->set_flashdata('message', 'Cek kembali email Anda.');

			redirect ('forgot');
		}

		$user = $rs->row();

  // get id user
		$user_token = $user->id_user;

  //create valid dan expire token
		$date_create_token = date("Y-m-d H:i");
		$date_expired_token = date('Y-m-d H:i',strtotime('+2 hour',strtotime($date_create_token)));

  // create token string
		$tokenstring = md5(sha1($user_token.$date_create_token));

  // simpan data token
		$data = array('token'=>$tokenstring,'id_user'=>$user_token,'created'=>$date_create_token,'expired'=>$date_expired_token);
		$simpan = $this->Mlogin->simpanToken($data);

		if ($simpan > 0){
    // email link reset
			$config['protocol'] = "smtp";
			$config['smtp_host'] = "ssl://smtp.googlemail.com";
			$config['smtp_port'] = 465;
		    $config['smtp_user'] = "sinfo.pengaduan@gmail.com"; // ganti dengan emailmu sendiri
		    $config['smtp_pass'] = "Vendredijuin8102"; // ganti dengan password emailmu
		    $config['charset'] = "iso-8859-1";
		    $config['mailtype'] = "html";
		    $config['wordwrap'] = "TRUE";
		    $config['crlf'] = "\r\n";
		    $config['newline'] = "\r\n";

		    $this->load->library('email',$config);
		    $this->email->initialize($config);
		    $this->email->set_newline("\r\n");

		    $this->email->from('sinfo.pengaduan@gmail.com', 'Sistem Informasi Pengaduan');
		    $this->email->to($email);
		    $this->email->subject('Reset Password');

		    $this->email->message("
		    	Token ini hanya berlaku untuk 2 jam dari pengiriman token saat ini:
		    	Klik disini untuk reset password Anda : http://localhost/pengaduan/forgot/lupa_password/$tokenstring"
		    );
		    $this->email->send();

		    	// echo $this->email->print_debugger();
		    $this->session->set_flashdata('style', 'success');
		    $this->session->set_flashdata('alert', 'Berhasil !');
		    $this->session->set_flashdata('message', 'Silahkan cek email anda');

		    }

		    $cekLevel = $this->Mlogin->getLevel($user_token); //ngeset halaman balik loginnya

 			if($cekLevel->id_role == '1' || $cekLevel->id_role == '2')
 			{
			 redirect('login_pengaduan');
			}
			else
			{
				redirect('karyawan');
			}

		}
	

	public function reset(){
		date_default_timezone_set("Asia/jakarta");
		$token = $this->uri->segment(4);

  // get token ke nodel user
		$cekToken = $this->Mlogin->cekToken($token);
		$rs = $cekToken->num_rows();

  // cek token ada atau engga
		if ($rs > 0){

			$data = $cekToken->row();
			$tokenExpired = $data->expired;
			$timenow = date("Y-m-d H:i:s");

    // cek token expired atau engga
			if ($timenow < $tokenExpired){

      // tampilkan form reset
				$datatoken['token'] = $token;
				$this->load->view('password_reset',$datatoken);

			}else{

      // redirect form forgot
				$this->session->set_flashdata('style', 'danger');
				$this->session->set_flashdata('alert', 'Maaf, Token Anda Sudah Expired!');
				$this->session->set_flashdata('message', 'Coba masukkan email anda kembali');

				redirect ('forgot');
			}
		}else{
			$this->session->set_flashdata('style', 'danger');
			$this->session->set_flashdata('alert', 'Maaf, Token Anda Tidak Ditemukan!');
			$this->session->set_flashdata('message', 'Coba masukkan email anda kembali');
			redirect ('forgot');
		}
	}

	public function kirim_reset(){

		$password = $this->input->post('password');
		$token = $this->input->post('token');
		$id = $this->input->post('id_user');

		$cekToken = $this->Mlogin->cekToken($token);
		$data = $cekToken->row();
		

  // ubah password
		$data = array ('password'=>password_hash($password, PASSWORD_BCRYPT));
		$simpan = $this->Mlogin->ubahData($data,$id);

		if ($simpan){
			$this->session->set_flashdata('style', 'success');
			$this->session->set_flashdata('alert', 'Password Berhasil Dirubah!');
			$this->session->set_flashdata('message', 'Silahkan login kembali');

			$cekLevel = $this->Mlogin->getLevel($id);		//tambahan buat ngeset halaman balik
			
			if($cekLevel->id_role == '1' || $cekLevel->id_role == '2')
 			{
			 redirect('login_pengaduan');
			}
			else
			{
				redirect('karyawan');
			}
			
		}else{
			$this->session->set_flashdata('style', 'danger');
			$this->session->set_flashdata('alert', 'Password Gagal Dirubah');
			$this->session->set_flashdata('message', 'Silahkan coba kembali.');

redirect('forgot/lupa_password/'.$token);
		}
		
	}

	public function lupa_password($token)
	{
		$data['id_token']=$this->Mlogin->getToken($token);
		$this->load->view('lupa_password',$data);
	}
}
