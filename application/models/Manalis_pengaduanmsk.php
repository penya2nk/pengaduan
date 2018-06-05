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
		$this->db->join('pengaduan_level pl','pl.id_pengaduan = p.id_pengaduan','left');
		$this->db->where('pl.status',"diterima");
		$this->db->order_by('wkt_pengaduan','ASC');
		return $this->db->get()->result();	//hasil
	}

	public function pengaduan_diproses($id_pengaduan)
	{
		$this->db->where('pl.id_pengaduan', $id_pengaduan);
		$this->db->where('pl.status',"diproses");
		return $this->db->get('pengaduan_level pl')->num_rows();	//hasil
	}

	public function detail_pengaduan($id)
	{
		$this->db->select('p.id_pengaduan, p.subjek, p.deskripsi, p.kejadian, p.penyebab, p.tgl_kejadian, p.efek,  r.nama_ruang, k.kategori, u.nama_pengguna, t.nama_tempat');	//select field yang mau ditampilin
		$this->db->from('pengaduan p'); //dari dua tabel
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
		$this->db->from('level l'); //tabel
		$this->db->join('kategori k','k.id_level = l.id_level'); //tabel
		$this->db->where('nama_level','koordinator'); //tabel
		return $this->db->get()->result();	//hasil
	}
	
	public function kirim($data)
	{
		
		return $this->db->INSERT('pengaduan_level',$data);


/**		return $this->db->query('DELIMITER $$
			CREATE TRIGGER `log` AFTER INSERT ON  `pengaduan_level` 
			FOR EACH ROW BEGIN 
			UPDATE pengaduan 
			SET status = `diproses` WHERE status = `diterima` 
			END$$
			DELIMITER', $data); **/
	}

	public function ubah($data,$id_pengaduan)
	{
		$this->db->where('id_pengaduan',$id_pengaduan);
		return $this->db->update('pengaduan',$data);
	}
}
