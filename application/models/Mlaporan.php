<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlaporan extends CI_Model {

	public function kategori()
	{
		$this->db->select('p.id_kategori, year(p.wkt_pengaduan) as tahun, k.kategori, count(p.id_kategori) as jumlah');
		$this->db->from('pengaduan p');
		$this->db->join('kategori k', 'k.id_kategori = p.id_kategori');
		$this->db->group_by('p.id_kategori');

		return $this->db->get()->result();
	}

	public function rekap_masuk()
	{
		$this->db->select('count(*)');
		$this->db->from('pengaduan_level');
		//$this->where
		return $this->db->get()->result();
	}
}
