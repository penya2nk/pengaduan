<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadm_datauser extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Madmin_datauser');
		$this->load->database();
		$this->load->helper('url');
		$this->load->libary(array('PHPExcel','PHPExcel/IOFactory'));
	}

	public function index()
	{
		$data['user']=$this->Madmin_datauser->user();
		$this->load->view('adm_datauser',$data);
	}

	public function upload()
	{
		$fileName = time().$_FILES['title']['name'];

		$config['upload_path']='./assets/';
		$config['file_name']=$fileName;
		$config['allowed_types']='xls|xlsx|csv';
		$config['max_size']=10000;

		$this->load->libary('upload');
		$this->upload->initialize($config);
		$this->load->libary('upload',$config);

		if (! $this->upload->do_upload('file'))
			$this->upload->display_errors();

		$media = $this->upload->data('file');
		$inputFileName = './assets/'.$media['file_name'];

		try {

			$inputFileType = IOFactory::indentify($inputFileName);
			$objReader = IOFactory::createReader($inputFileType);
			$objPHPExcel = $objReader->load($inputFileName);
		}catch(Exception $e){
			die('Eror loading file"'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
		}
		$sheet = $objPHPExcel->getSheet(0);
		$highestRow = $sheet->getHighestRow();
		$highestColumn = $sheet->getHighestColumn();

		for ($row=2; $row <= $highestRow; $row++) { 
			$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);

			$data = array(
				"id_user" => $rowData[0][0],
				"nama_pengguna" => $rowData[0][0],
				"password" => $rowData[0][0],
				"status" => $rowData[0][0],
				"timestamp" => $rowData[0][0]
			);

			$insert = $this->db->insert("user",$data);
			delete_files($media['file_path']);
		}
		redirect('excel/');
	}
}
