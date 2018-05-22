<?php

class Mkoor_masuk extends CI_Model
{
	public function pengaduan_masuk()
	{

		$this->db->select('pl.id_pengaduan, p.subjek, p.wkt_pengaduan, k.kategori, r.nama_ruang');
		$this->db->from('pengaduan_level pl');
		$this->db->join('pengaduan p','p.id_pengaduan = pl.id_pengaduan');
		$this->db->join('kategori k','k.id_kategori = p.id_kategori');
		$this->db->join('ruang r','r.id_ruang = p.id_ruang');
		return $this->db->get()->result();
	}
}

?>