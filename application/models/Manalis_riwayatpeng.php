<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manalis_riwayatpeng extends CI_Model {

	public function pengaduan_proses()
	{
		$this->db->select('p.id_pengaduan, p.subjek,  p.wkt_pengaduan, p.status, r.nama_ruang, k.kategori');	//select field yang mau ditampilin
		$this->db->from('pengaduan p'); //tabel
		$this->db->join('ruang r','r.id_ruang = p.id_ruang');
		$this->db->join('kategori k','k.id_kategori = p.id_kategori');
		$this->db->where('status',"diproses");
		return $this->db->get()->result();	//hasil
	}
}