<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manalis_pengaduanmsk extends CI_Model {

	public function kategori()
	{
		$this->db->select('id_kategori,kategori');	//select field yang mau ditampilin
		$this->db->from('kategori'); //tabel
		return $this->db->get()->result();	//hasil
	}

	public function pengaduan_masuk()
	{
		$this->db->select('p.id_pengaduan, p.subjek, p.wkt_pengaduan, r.nama_ruang, k.kategori');	//select field yang mau ditampilin
		$this->db->from('pengaduan p'); //tabel
		$this->db->join('ruang r','r.id_ruang = p.id_ruang');
		$this->db->join('kategori k','k.id_kategori = p.id_kategori');
		$this->db->where('status',"diterima");
		return $this->db->get()->result();	//hasil
	}

	public function detail_pengaduan($id)
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

	public function level()
	{
		$this->db->select('*');	//select field yang mau ditampilin
		$this->db->from('level'); //tabel
		$this->db->where('nama_level','koordinator'); //tabel
		return $this->db->get()->result();	//hasil
	}
	
	public function kirim($data)
	{
		return $this->db->insert('pengaduan_level',$data);
	}

	public function ubah($data,$id_pengaduan)
	{
		$this->db->where('id_pengaduan',$id_pengaduan);
		return $this->db->update('pengaduan',$data);
	}
}
