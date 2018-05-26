<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madmin_datauser extends CI_Model {

	public function user()
	{
		$this->db->select('u.id_user, u.nama_pengguna, u.status, l.nama_level');
		$this->db->from('user u','level l');
		$this->db->join('level l','l.id_level = u.id_level');
		//$this->db->where('u.id_level = 1');
		return $this->db->get()->result();
	}

	public function upload_data()
	{

	}
}
?>