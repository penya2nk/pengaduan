<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manalis_kelola extends CI_Model {

	public function kategori()
	{
		$this->db->select('id_kategori, kategori');
		$this->db->from('kategori');
		$this->db->where('deleted',0);
		$this->db->order_by('kategori','ASC');
		return $this->db->get()->result();
	}

	public function jenis()
	{
		$this->db->select('id_jenis, nama_jenis');
		$this->db->from('jenis');
		$this->db->where('deleted',0);
		$this->db->order_by('nama_jenis','ASC');
		return $this->db->get()->result();
	}

	public function tambah_kategori($data)
	{
		return $this->db->insert('kategori',$data);
	}

	public function cek_kategori()
	{	//strtolower = biar hurufnya kecil semua
		return $this->db->where('kategori', strtolower($this->input->post('kategori')))->where('deleted', 0)->get('kategori')->result();
	}

	public function tambah_jenis($data)
	{
		$this->db->insert('jenis',$data);
	}

	public function cek_jenis()
	{
		return $this->db->where('nama_jenis', strtolower($this->input->post('nama_jenis')))->where('deleted', 0)->get('jenis')->result();
	}

	public function edit_kategori($data,$id_kategori)
	{
		$this->db->where('id_kategori',$id_kategori);
		$this->db->update('kategori',$data);
	}

	public function edit_jenis($data,$id_jenis)
	{
		$this->db->where('id_jenis',$id_jenis);
		$this->db->update('jenis',$data);
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