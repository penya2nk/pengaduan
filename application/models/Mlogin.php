<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlogin extends CI_Model {

	function loginMe($user, $password)
    {
        $this->db->select('u.id_user, u.password, u.nama_pengguna, u.username, u.id_role, r.role');
        $this->db->from('user u');
        $this->db->join('roles r','r.id_role = u.id_role');
        $this->db->where('u.username',$user);
        $this->db->where('u.deleted', 0);
        $this->db->where('status',1);
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

    //function yang dipakai buat reset password

    public function getByEmail($email){
      $this->db->where('email',$email);
      $result = $this->db->get('user');
      return $result;
  }

  public function simpanToken($data){
      $this->db->insert('token', $data);
      return $this->db->affected_rows();
  }

public function getToken($token){
        $this->db->select('token, id_user');
        $this->db->from('token');
        $this->db->where('token',$token);
        
        $query = $this->db->get();
        return $query->result();
  }

  public function cekToken($token){
      $this->db->where('token',$token);
      $result = $this->db->get('token');
      return $result;
  }

  public function ubahData($data,$id)
  {
    $this->db->where('id_user',$id);
    return $this->db->update('user', $data);
  }

  public function getLevel($id)
  {
    return $this->db
    ->join('level','level.id_level = user.id_level')
    ->where('user.id_user',$id)
    ->get('user')->row();
  }
}