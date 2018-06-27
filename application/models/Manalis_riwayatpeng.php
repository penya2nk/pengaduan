<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manalis_riwayatpeng extends CI_Model {

	public function pengaduan_proses()
	{
		$this->db->select('p.id_pengaduan,   p.wkt_pengaduan, p.status, r.nama_ruang, k.kategori');	//select field yang mau ditampilin
		$this->db->from('pengaduan p');
		$this->db->join('ruang r','r.id_ruang = p.id_ruang');
		$this->db->join('kategori k','k.id_kategori = p.id_kategori');
		//$this->db->join('pengaduan_level pl','pl.id_pengaduan = p.id_pengaduan');
		$this->db->where('p.status','selesai');
		return $this->db->get()->result();	//hasil
	}

	public function pengaduan_selesai($id_pengaduan)
	{
		$this->db->where('pl.id_pengaduan', $id_pengaduan);
		$this->db->where('pl.status',"selesai");
		return $this->db->get('pengaduan_level pl')->num_rows();	//hasil
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