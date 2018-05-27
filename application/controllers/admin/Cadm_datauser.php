<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadm_datauser extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Madmin_datauser');
		$this->load->database();
		$this->load->helper('url');
		$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
	}

	public function index()
	{
		$data['user']=$this->Madmin_datauser->user();
		$this->load->view('adm_datauser',$data);
	}

	public function upload()
	{
		$fileName = time().$_FILES['file']['name'];

		$config['upload_path']='./assets/';
		$config['file_name']=$fileName;
		$config['allowed_types']='xls|xlsx|csv';
		$config['max_size']=10000;

<<<<<<< HEAD
		$this->load->libary('upload');
		$this->upload->initialize($config);
=======
		$this->load->library('upload',$config);
>>>>>>> 0343e76f907fb462268846956348f399e66ddd7a

		if (! $this->upload->do_upload('file')) {
			$this->upload->display_errors();
		}else{
		$media = $this->upload->data();
		$inputFileName = './assets/'.$media['file_name'];

		// try {
		// }catch(Exception $e){
			// die('Eror loading file"'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
		// }

			$inputFileType = IOFactory::identify($inputFileName);
			$objReader = IOFactory::createReader($inputFileType);
			$objPHPExcel = $objReader->load($inputFileName);
		$sheet = $objPHPExcel->getSheet(0);
		$highestRow = $sheet->getHighestRow();
		$highestColumn = $sheet->getHighestColumn();

		for ($row=2; $row <= $highestRow; $row++) { 
			$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);

			$data = array(
				"nama_pengguna" => $rowData[0][1],
				"password" => $rowData[0][2],
				"status" => $rowData[0][3],
				"id_level" => $rowData[0][4]
			);

			$insert = $this->db->insert("user",$data);
			unlink($inputFileName); //File Deleted After uploading in database .
		}
		}
		redirect('admin/data_user/');
	}
}
