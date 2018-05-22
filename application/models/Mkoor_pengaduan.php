<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mkoor_pengaduan extends CI_Model {

	public function kategori()
	{
		$this->db->select('id_kategori,kategori');
		$this->db->from('kategori');
		return $this->db->get()->result();
	}
	public function tempat()
	{
		$this->db->select('id_tempat,nama_tempat');
		$this->db->from('tempat');
		return $this->db->get()->result();
	}
	public function ruang($id)
	{
		$this->db->select('id_ruang,nama_ruang');
		$this->db->from('ruang');
		$this->db->where('id_tempat',$id);
		return $this->db->get()->result();
	}
}
