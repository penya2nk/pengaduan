<?php

class Mkoor_masuk extends CI_Model
{
	public function pengaduan_masuk()
	{
		$this->db->select('p.id_pengaduan, p.wkt_pengaduan, k.kategori, r.id_tempat, r.nama_ruang, p.status');
		$this->db->from('pengaduan p');
		$this->db->join('kategori k','k.id_kategori = p.id_kategori');
		$this->db->join('ruang r','r.id_ruang = p.id_ruang');
		$this->db->where('p.status', "masuk");
		if($this->session->userdata('level' == 3))
		{
			$this->db->where('r.id_tempat',1);
		}
		elseif($this->session->userdata('level' == 4))
		{
			$this->db->where('r.id_tempat !=',1);
		}
		return $this->db->get()->result();
	}

	// public function pengaduan_selesai($id_pengaduan)
	// {
	// 	$this->db->where('l.id_pengaduan', $id_pengaduan);
	// 	$this->db->where('l.status',"selesai");
	// 	return $this->db->get('log l')->num_rows();	//hasil
	// }

	public function detail_koor($id)
	{
		$this->db->select('p.id_pengaduan, p.id_user, p.deskripsi, p.kejadian, p.penyebab, p.tindaklanjut, p.tgl_kejadian, p.efek,  r.nama_ruang, p.gambar, k.kategori, u.nama_pengguna, t.nama_tempat');	
		$this->db->from('pengaduan p','ruang r'); 
		$this->db->join('ruang r','r.id_ruang = p.id_ruang');
		$this->db->join('kategori k','k.id_kategori = p.id_kategori');
		$this->db->join('user u','u.id_user = p.id_user');
		$this->db->join('tempat t','t.id_tempat = r.id_tempat');
		$this->db->where('p.id_pengaduan',$id);
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

	public function kirim($data)
	{
		return $this->db->insert('log',$data);
	}

}

?>