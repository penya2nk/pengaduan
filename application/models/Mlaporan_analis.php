<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlaporan_analis extends CI_Model {

	public function bulan()
	{
		$this->db->select('MONTH(p.wkt_pengaduan) AS bulan, COUNT(*) AS jumlah');
		$this->db->from('pengaduan p');
		$this->db->group_by('MONTH(wkt_pengaduan)');
		return $this->db->get()->result();
		
	}

	public function ruang()
	{
		$this->db->select('r.nama_ruang, COUNT(p.id_ruang) AS jumlah');
		$this->db->from('pengaduan p');
		$this->db->join('ruang r','r.id_ruang = p.id_ruang');
		$this->db->group_by('p.id_ruang');
		$this->db->order_by('p.id_ruang',"ASC");
		return $this->db->get()->result();
	}

}
