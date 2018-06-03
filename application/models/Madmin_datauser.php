<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madmin_datauser extends CI_Model {

	public function user()
	{
		$this->db->select('u.id_user, u.nama_pengguna, u.email, u.status, l.nama_level, r.role');
		$this->db->from('user u','level l', 'roles r');
		$this->db->join('level l','l.id_level = u.id_level');
		$this->db->join('roles r','r.id_role = u.id_role');
		return $this->db->get()->result();
	}
}
?>