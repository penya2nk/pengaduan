<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madm_log extends CI_Model {

	public function log_activity()
	{
		$this->db->select('p.id_pengaduan, p.status, r.nama_ruang, p.wkt_pengaduan');
		$this->db->from('pengaduan p');
		$this->db->join('ruang r','r.id_ruang = p.id_ruang');
		//$this->db->order_by('p.status',"limit 1");
		return $this->db->get()->result();
	}

	public function detail_log($id_pengaduan)
	{
		$this->db->select('log.id_pengaduan, log.status, user.nama_pengguna, log.timestamp');
		$this->db->from('log');
		$this->db->join('user', 'user.id_user = log.id_user');
		$this->db->where('id_pengaduan',$id_pengaduan);
		return $this->db->get()->result();
	}

	//bikin update password di admin dulu
	public function save()
	{
		$password = password_hash($this->input->post('new'), PASSWORD_BCRYPT);
		$data = array (
			'password' => $password
		);
		$this->db->where('id_user', $this->session->userdata('id_user'));
		return $this->db->update('user', $data);
	}

	//fungsi untuk mengecek password lama :
	public function cek_old()
	{
		$user = $this->db->select('password')->where('id_user', $this->session->userdata('id_user'))->get('user')->result();

		if(!empty($user)){
			if(password_verify($this->input->post('old'), $user[0]->password )){
				return $user;
			} else {
				return array();
			}
		} else {
			return array();
		}
	}
		//end

}