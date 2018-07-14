<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Cadm_datauser extends BaseController {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Madmin_datauser');
		$this->load->database();
		$this->load->helper(array('url','download'));
		$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
		$this->isLoggedIn();
	}

	public function index()
	{
		$data['user']=$this->Madmin_datauser->user();
		$data['level']=$this->Madmin_datauser->level();
		$data['role']=$this->Madmin_datauser->role();
		$this->load->view('adm_datauser',$data);
	}

	public function upload()
	{
		if(empty($_FILES['file'])) //cek inputan tanpa file atau bukan
		{
			$this->session->set_flashdata('style','danger');
					$this->session->set_flashdata('alert','Gagal!');
					$this->session->set_flashdata('message','Data Kosong!');
			redirect('admin/data_user');
		}else{
			$config['upload_path'] = './assets/user';
			$config['allowed_types'] = 'xls|xlsx|csv';
			$config['max_size'] = '10000';
			$config['file_name'] = time()."pengguna";

			$this->load->library('upload', $config);
			
			$this->upload->do_upload('file');
			$media = $this->upload->data();
			$inputFileName = './assets/user/'.$media['file_name']; //var utk nyimpan location dan nama file

			try {
				$inputFileType = IOFactory::identify($inputFileName);
				$objReader = IOFactory::createReader($inputFileType);
				$objPHPExcel = $objReader->load($inputFileName);
			} catch(Exception $e) {
				die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
					//var_dump("error lol");exit;
			}

			$sheet = $objPHPExcel->getSheet(0);
			$highestRow = $sheet->getHighestRow();
			$highestColumn = $sheet->getHighestColumn();

				$arr = ""; //wadah untuk nama yang duplikat
				
				for ($row=2; $row <= $highestRow; $row++) { 
					$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);

					if($rowData[0][1] != ''){

						$cek = $this->db->where('email', $rowData[0][1])->or_where('username', $rowData[0][4])->get('user')->num_rows(); //where email == $rowData[0][1] || where username == $rowData[0][4]
						if($cek > 0){
							$arr .= $rowData[0][0] . ", ";
						}else{
							$data = array(
								"nama_pengguna" => $rowData[0][0],
								"email" => $rowData[0][1],
								"password" => password_hash($rowData[0][2], PASSWORD_BCRYPT),
								"id_role" => $rowData[0][3],
								"username" => $rowData[0][4]
							);

							$this->db->insert("user",$data);
						}
					}
				}
				unlink($inputFileName);
				// var_dump($arr);exit;
				if(count($arr) > 0) {
					$this->session->set_flashdata('style','warning');
					$this->session->set_flashdata('alert','Peringatan!');
					$this->session->set_flashdata('message','Terdapat data duplikat yaitu dengan username '. $arr);
				}else{
					$this->session->set_flashdata('style','success');
					$this->session->set_flashdata('alert','Berhasil!');
					$this->session->set_flashdata('message','Data sukses diimport!');
				}
				redirect('admin/data_user');
			}
		}

		public function download()
		{
			force_download('file/format_user_data.xlsx',NULL);
		}

	//function mau cek data user
		public function save_password()
		{ 

			$this->load->library('form_validation');

			$this->form_validation->set_rules('new','New','required|alpha_numeric');
			$this->form_validation->set_rules('re_new', 'Retype New', 'required|matches[new]');

			if($this->form_validation->run() == FALSE)
			{
				redirect('admin/data_user');
			}
			else
			{
				$cek_old = $this->Madmin_datauser->cek_old();

				if (count($cek_old) == 0){
					$this->session->set_flashdata('style','danger');
					$this->session->set_flashdata('alert','Gagal!');
					$this->session->set_flashdata('message','Password lama yang Anda masukkan salah!');

					redirect('admin/data_user');
				}
				else
				{
					$this->Madmin_datauser->save();
					$this->session->sess_destroy();

					redirect('karyawan');
	   		}//end if valid_user
		}
	}

	public function edit_user()
	{

		$id_user = $this->input->post('id_user');
	 		//var_dump($id_user); exit;
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$id_level = $this->input->post('id_level');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$status = $this->input->post('status');
		$data = array(
			'nama_pengguna' => $nama,
			'email' => $email,
			'id_level' => $id_level,
			'username' => $username,
			'password' => password_hash($password, PASSWORD_BCRYPT),
			'status' => $status
		);
		$this->Madmin_datauser->edit_user($data, $id_user);

		$this->session->set_flashdata('style','success');
		$this->session->set_flashdata('alert','Selesai!');
		$this->session->set_flashdata('message','Data pengguna berhasil diubah!');

		redirect('admin/data_user');
	}

	public function hapus_user($id_user)
	{
		$this->db->where('id_user',$id_user);
		$this->db->update('user',array('deleted' => '1'));

		$this->session->set_flashdata('style','warning');
		$this->session->set_flashdata('alert','Selesai!');
		$this->session->set_flashdata('message','Data pengguna telah dihapus!');

		redirect('admin/data_user');
	}

	public function tambah_user()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_pengguna','Nama Pengguna','required');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');

		if($this->form_validation->run() == FALSE)
		{
			redirect('admin/data_user');
		}else{
			$nama = $this->input->post('nama_pengguna');
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$role = $this->input->post('id_role');
			$level = $this->input->post('id_level');
			
			$cek_user = $this->db->where('email', $email)->or_where('username', $username)->get('user')->num_rows();

			if($cek_user > 0){
				$this->session->set_flashdata('style','danger');
				$this->session->set_flashdata('alert','Peringatan!');
				$this->session->set_flashdata('message','Data yang Anda tambahkan sudah terdaftar pada sistem.');
				redirect('admin/data_user');
			}
			else
			{
				$data = array(
					'nama_pengguna' => strtolower($nama),
					'username' => $username,
					'email' => $email,
					'password' => password_hash($password, PASSWORD_BCRYPT),
					'id_role' => $role,
					'id_level' => $level
				);
				$this->Madmin_datauser->tambah_user($data);

				$this->session->set_flashdata('style','success');
				$this->session->set_flashdata('alert','Berhasil!');
				$this->session->set_flashdata('message','Data pengguna baru telah tersimpan.');

				redirect('admin/data_user');
			}
		}
	}

}
