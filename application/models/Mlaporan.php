<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlaporan extends CI_Model {

	public function kategori()
	{
		$this->db->select('p.id_kategori, k.kategori, count(p.id_kategori) as jumlah');
		$this->db->from('pengaduan p');
		$this->db->join('kategori k', 'k.id_kategori = p.id_kategori');
		$this->db->group_by('p.id_kategori');

		if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
		return $hasil;
	}
}
