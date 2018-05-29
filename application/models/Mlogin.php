<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlogin extends CI_Model {

	function loginMe($user, $password)
    {
        $this->db->select('u.id_user, u.password, u.nama_pengguna, u.username, u.id_role, r.role');
        $this->db->from('user u');
        $this->db->join('roles r','r.id_role = u.id_role');
        $this->db->where('u.nama_pengguna',$user);
        $this->db->where('u.deleted', 0);
        $query = $this->db->get();
        
        $user = $query->result();
        
        if(!empty($user)){
            if(password_verify($password, $user[0]->password)){
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }
}
