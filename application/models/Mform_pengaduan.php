<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mform_pengaduan extends CI_Model {

	
	public function kategori()
	{
		$this->db->select(' k.id_kategori, k.kategori');
		$this->db->from('pengaduan p','pengaduan_level pl');
		$this->db->join('kategori k','pl.id_kategori = k.id_kategori');
		return $this->db->get()->result();
	}

	public function tempat()
	{

		$this->db->select('id_tempat, nama_tempat');
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
	public function jenis_kejadian()
	{
		$this->db->select('id_jenis,nama_jenis');
		$this->db->from('jenis');
		return $this->db->get()->result();
	}

	public function jml_kejadian()
	{
		$this->db->select('id_pengaduan, kejadian');
		$this->db->from('pengaduan');
		return $this->db->get()->result();
	}
	
	public function tambah()
	{

	}
}
