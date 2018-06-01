<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madm_ruangtempat extends CI_Model {

	public function ruang()
	{
		$this->db->select('id_ruang, id_tempat, nama_ruang');
		$this->db->from('ruang');
		return $this->db->get()->result();
	}

	public function tempat()
	{
		$this->db->select('id_tempat, nama_tempat');
		$this->db->from('tempat');
		return $this->db->get()->result();
	}

	public function tambah_ruang($data)
	{
		$this->db->insert('ruang',$data);
	}

	public function tambah_tempat($data)
	{
		$this->db->insert('tempat',$data);
	}
}