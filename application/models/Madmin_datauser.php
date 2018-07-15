<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madmin_datauser extends CI_Model {

	public function user()
	{
		$this->db->select('u.id_user, u.id_role, u.nama_pengguna, u.email, u.status, u.username, l.id_level, l.nama_level, l.posisi, r.role,');
		$this->db->from('user u','level l', 'roles r');
		$this->db->join('level l','l.id_level = u.id_level');
		$this->db->join('roles r','r.id_role = u.id_role','left');
		$this->db->where('u.id_level !=',5);
		$this->db->where('deleted',0);
		return $this->db->get()->result();
	}
	
	//get level list
	public function level()
	{
		return $this->db->get('level')->result();
	}

	public function role()
	{
		return $this->db->get('roles')->result();
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

	public function edit_user($data,$id_user)
	{
		$this->db->where('id_user',$id_user);
		return $this->db->update('user',$data);
	}
	
	public function tambah_user($data)
	{
		return $this->db->insert('user',$data);
	}

	// public function cek_user()
	// {	//strtolower = biar hurufnya kecil semua
	// 	return $this->db->where('nama_pengguna')->or_where('email', $this->input->post('nama_pengguna').$this->input->post('email')))->where('deleted', 0)->get('user')->result();
	// }
}
?>