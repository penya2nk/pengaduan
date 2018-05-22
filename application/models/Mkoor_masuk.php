<?php

class Mkoor_masuk extends CI_Model
{
	public function pengaduan_masuk()
	{

		$this->db->select('pl.id_pengaduan, p.subjek, p.wkt_pengaduan, k.kategori, r.nama_ruang');
		$this->db->from('pengaduan_level pl');
		$this->db->join('kategori k','k.id_kategori = p.id_kategori');
		$this->db->join('ruang r','r.id_ruang = p.id_ruang');
		$this->db->join('pengaduan_level pl','pl.id_ruang = p.id_ruang');
		$this->db->where('pengaduan_level pl','pl.id_level = p.id_level');
		return $this->db->get()->result();
	}
}

?>