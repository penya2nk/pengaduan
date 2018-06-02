<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madm_log extends CI_Model {

	public function log()
	{
		$this->db->select('p.id_pengaduan, l.nama_level, l.posisi, pl.status, pl.timestamp,');
		$this->db->from('pengaduan p');
		$this->db->join('pengaduan p','id_pengaduan.p = id_pengaduan.pl');
		$this->db->join('level l','id_level.l = id_level.pl');
		//$this->db->where('');
		return $this->db->get()->result();
	}

}