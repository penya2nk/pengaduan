<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mform_pengaduan extends CI_Model {

	
	public function kategori()
	{
		$this->db->select('id_kategori, kategori');
		$this->db->from('kategori');
	return $this->db->get()->result();
	}

	public function tempat()
	{

		$this->db->select('id_tempat, nama_tempat');
		$this->db->from('tempat');
		return $this->db->get()->result();
	}
	public function ruang($id)
	{
		$this->db->select('id_ruang,nama_ruang');
		$this->db->from('ruang');
		$this->db->where('id_tempat',$id);
		return $this->db->get()->result();
	}
	public function jenis_kejadian()
	{
		$this->db->select('id_jenis,nama_jenis');
		$this->db->from('jenis');
		return $this->db->get()->result();
	}

	public function jml_kejadian()
	{
		$this->db->select('id_pengaduan, kejadian');
		$this->db->from('pengaduan');
		return $this->db->get()->result();
	}
	
	public function tambah()
	{
		$id_pengaduan = $this->input->post('id_pengaduan');
		$id_pengaduan_level = $this->input->post('id_pengaduan_level');
		$waktu = $this->input->post('waktu');
		$subjek = $this->input->post('subjek');
		$user = $this->session->userdata('id_user');
		$tempat = $this->input->post('tempat');
		$ruang = $this->input->post('ruang');
		$kategori = $this->input->post('kategori');
		$jenis = $this->input->post('jenis');
		$kejadian = $this->input->post('kejadian');
		$efek = $this->input->post('efek');
		$penyebab = $this->input->post('penyebab');
		$deskripsi = $this->input->post('deskripsi');
		$saran = $this->input->post('saran');
		$status = $this->input->post('status');

		$data1 = array(
			'tgl_kejadian' => $waktu,
			'subjek' => $subjek,
			'id_user' => $user,
			'id_ruang' => $ruang,
			'id_kategori' => $kategori,
			'id_jenis' => $jenis,
			'kejadian' => $kejadian,
			'efek' => $efek,
			'penyebab' => $penyebab,
			'deskripsi' => $deskripsi,
			'saran' => $saran
		);
			
		$this->db->insert('pengaduan', $data1);
		// $this->db->into('pengaduan',$id_pengaduan, $data);
		$lastPengaduan = $this->db->insert_id();
		// var_dump($lastPengaduan);die;
		$data2 = array(
			'id_pengaduan' => $lastPengaduan,
			'id_kategori' => $kategori,
			'id_user' => $user,
			'status' => 'diterima'
		);
		$this->db->insert('pengaduan_level', $data2);
		// $this->db->into();

	}
}
