<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlaporan extends CI_Model {

	public function kategori()
	{
		$this->db->select('p.id_kategori, p.status, year(p.wkt_pengaduan) as tahun, k.kategori, count(p.status) as masuk, count(p.id_kategori) as jumlah');
		$this->db->from('pengaduan p');
		$this->db->join('kategori k', 'k.id_kategori = p.id_kategori');
		$this->db->where('status',"masuk");
		$this->db->group_by('p.id_kategori');
		return $this->db->get()->result();
	}

	// public function rekap_masuk()
	// {
	// 	$this->db->select('status,count(status)');
	// 	$this->db->from('pengaduan');
	// 	$this->db->where('status',"masuk");
	// 	return $this->db->get()->num_rows();
	// }
}
