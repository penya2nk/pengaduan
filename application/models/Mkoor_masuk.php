<?php

class Mkoor_masuk extends CI_Model
{
	public function pengaduan_masuk()
	{

		$this->db->select('pl.id_pengaduan, p.subjek, p.wkt_pengaduan, k.kategori, r.nama_ruang');
		$this->db->from('pengaduan_level pl');
		$this->db->join('pengaduan p','p.id_pengaduan = pl.id_pengaduan');
		$this->db->join('kategori k','k.id_kategori = p.id_kategori');
		$this->db->join('ruang r','r.id_ruang = p.id_ruang');
		$this->db->where('pl.status', "diproses");
		return $this->db->get()->result();
	}

	public function pengaduan_selesai($id_pengaduan)
	{
		$this->db->where('pl.id_pengaduan', $id_pengaduan);
		$this->db->where('pl.status',"selesai");
		return $this->db->get('pengaduan_level pl')->num_rows();	//hasil
	}

	public function detail_koor($id)
	{
		$this->db->select('p.id_pengaduan, p.subjek, p.deskripsi, p.kejadian, p.penyebab, p.tgl_kejadian, p.efek,  r.nama_ruang, k.kategori, u.nama_pengguna, t.nama_tempat');	//select field yang mau ditampilin
		$this->db->from('pengaduan p','ruang r'); //dari dua tabel
		$this->db->join('ruang r','r.id_ruang = p.id_ruang');
		$this->db->join('kategori k','k.id_kategori = p.id_kategori');
		$this->db->join('user u','u.id_user = p.id_user');
		$this->db->join('tempat t','t.id_tempat = r.id_tempat');
		$this->db->where('p.id_pengaduan',$id);
		return $this->db->get()->result();	//hasil
	}
}

?>