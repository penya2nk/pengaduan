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
			$this->db->order_by('nama_tempat','ASC');
			return $this->db->get()->result();
		}

		public function ruang($id)
		{
			$this->db->select('id_ruang,nama_ruang');
			$this->db->from('ruang');
			$this->db->where('id_tempat',$id);
			$this->db->order_by('nama_ruang','ASC');
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
			$id_log = $this->input->post('id_log');
			$waktu = $this->input->post('waktu');
			$user = $this->session->userdata('id_user');
			$tempat = $this->input->post('tempat');
			$ruang = $this->input->post('ruang');
			$kategori = $this->input->post('kategori');
			$jenis = $this->input->post('jenis');
			$kejadian = $this->input->post('kejadian');
			$efek = $this->input->post('efek');
			$penyebab = $this->input->post('penyebab');
			$deskripsi = $this->input->post('deskripsi');
			$tindaklanjut = $this->input->post('tindaklanjut');
			$status = $this->input->post('status');
			$nama_pengguna = $this->input->post('nama_pengguna');
			
			$config['upload_path'] = './assets/gambar/';
	    $config['allowed_types'] = 'gif|jpg|png|jpeg';
	    $config['max_size']  = '2048';
	    $config['file_name'] = $nama_pengguna.'_'.$kategori.'_'.time();
			
	    $this->load->library('upload', $config); // Load konfigurasi uploadnya
	    if($this->upload->do_upload('gambar')){ // Lakukan upload dan Cek jika proses upload berhasil
				
				$data1 = array(
				'tgl_kejadian' => $waktu,
				'id_user' => $user,
				'id_ruang' => $ruang,
				'id_kategori' => $kategori,
				'id_jenis' => $jenis,
				'kejadian' => $kejadian,
				'efek' => $efek,
				'penyebab' => $penyebab,
				'deskripsi' => $deskripsi,
				'tindaklanjut' => $tindaklanjut,
				'gambar' => $this->upload->data()['file_name']
				);
				
				$this->db->insert('pengaduan', $data1);
				
				//insert ke tabel log nya
				$lastPengaduan = $this->db->insert_id();
				
				$data2 = array(
				'id_pengaduan' => $lastPengaduan,
				//'id_kategori' => $kategori,
				'id_user' => $user,
				'status' => 'diterima'
				);
				return $this->db->insert('log', $data2);
				
			}else{
				
				$data1 = array(
				'tgl_kejadian' => $waktu,
				'id_user' => $user,
				'id_ruang' => $ruang,
				'id_kategori' => $kategori,
				'id_jenis' => $jenis,
				'kejadian' => $kejadian,
				'efek' => $efek,
				'penyebab' => $penyebab,
				'deskripsi' => $deskripsi,
				'tindaklanjut' => $tindaklanjut,
				);
				
				$this->db->insert('pengaduan', $data1);
				
				//insert ke tabel log
				$lastPengaduan = $this->db->insert_id();
				
				$data2 = array(
				'id_pengaduan' => $lastPengaduan,
				//'id_kategori' => $kategori,
				'id_user' => $user,
				'status' => "masuk"
				);
				return $this->db->insert('log', $data2);
			}
		}

		public function riwayat($id_user)
		{
			$this->db->select('p.id_pengaduan, k.kategori, l.id_user , p.status, p.wkt_pengaduan');
			$this->db->from('pengaduan p');
			$this->db->join('log l','p.id_pengaduan = l.id_pengaduan');
			$this->db->join('kategori k','p.id_kategori = k.id_kategori');
			$this->db->where('p.id_user',$id_user);
			return $this->db->get()->result();
		}
	}
