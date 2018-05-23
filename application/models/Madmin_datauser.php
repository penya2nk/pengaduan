<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madmin_datauser extends CI_Model {

	public function user()
	{
		$this->db->select('id_user, nama_pengguna, status');
		$this->db->from('user');
		return $this->db->get()->result();
	}
}
?>