<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madm_ruangtempat extends CI_Model {

	public function ruang()
	{
		$this->db->select('id_ruang, id_tempat, nama_ruang');
		$this->db->from('ruang');
		$this->db->where('deleted',0);
		$this->db->order_by('nama_ruang','ASC');
		return $this->db->get()->result();
	}

	public function tempat()
	{
		$this->db->select('id_tempat, nama_tempat');
		$this->db->from('tempat');
		$this->db->where('deleted',0);
		$this->db->order_by('nama_tempat','ASC');
		return $this->db->get()->result();
	}

	public function tambah_ruang($data)
	{
		$this->db->insert('ruang',$data);
	}

	public function cek_ruang()
	{
		return $this->db->where('nama_ruang', strtolower($this->input->post('nama_ruang')))->where('deleted',0)->get('ruang')->result();
	}

	public function tambah_tempat($data)
	{
		$this->db->insert('tempat',$data);
	}

	public function cek_tempat()
	{
		return $this->db->where('nama_tempat', strtolower($this->input->post('nama_tempat')))->where('deleted', 0)->get('tempat')->result();
	}

	public function edit_ruang($data,$id_ruang)
	{
		$this->db->where('id_ruang',$id_ruang);
		$this->db->update('ruang',$data);
	}

	public function edit_tempat($data,$id_tempat)
	{
		$this->db->where('id_tempat',$id_tempat);
		$this->db->update('tempat',$data);
	}

	// //bikin update password di admin dulu
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