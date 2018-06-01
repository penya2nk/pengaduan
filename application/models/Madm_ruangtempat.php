<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madm_ruangtempat extends CI_Model {

	public function ruang()
	{
		$this->db->select('id_ruang, id_tempat, nama_ruang');
		$this->db->from('ruang');
		$this->db->where('deleted',0);
		return $this->db->get()->result();
	}

	public function tempat()
	{
		$this->db->select('id_tempat, nama_tempat');
		$this->db->from('tempat');
		$this->db->where('deleted',0);
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

	public function edit_ruang($data,$id_ruang)
	{
		$this->db->where('id_ruang',$id_ruang);
		$this->db->update('ruang',$data);
	}

	public function edit_tempat($data,$id_tempat)
	{
		$this->db->where('id_tempat',$id_tempat);
		$this->db->update('tempat',$data);
	}

}