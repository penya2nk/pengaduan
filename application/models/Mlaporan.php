<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlaporan extends CI_Model {

	public function kategori()
	{
		$this->db->select('p.id_kategori, p.status, year(p.wkt_pengaduan) as tahun, k.kategori, count(p.id_kategori) as jumlah');
		$this->db->from('pengaduan p');
		$this->db->join('kategori k', 'k.id_kategori = p.id_kategori');
		$this->db->group_by('p.id_kategori');
		return $this->db->get()->result();
	}

	public function bulan()
	{
		$this->db->select('p.wkt_pengaduan AS bulan, COUNT(*) AS jumlah');
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

	// public function jenis()
	// {

	// }

	public function masuk()
	{
		$this->db->select('status');
		$this->db->from('pengaduan');
		$this->db->where('status','masuk');
		$query = $this->db->get('');
		return $query->result();
	}
	public function diproses()
	{
		$this->db->select('status');
		$this->db->from('pengaduan');
		$this->db->where('status','diproses');
		$query = $this->db->get('');
		return $query->result();
	}
	public function selesai()
	{
		$this->db->select('status');
		$this->db->from('pengaduan');
		$this->db->where('status','selesai');
		$query = $this->db->get('');
		return $query->result();
	}

	//bikin update password di manajemen dulu
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
