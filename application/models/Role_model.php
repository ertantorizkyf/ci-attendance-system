<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role_model extends CI_Model{

  public function get_all(){
    $query = $this->db->get('role_tbl');
    return $query->result();
  }

  public function insert($role){
    $this->db->insert('role_tbl', $role);
    return $this->db->affected_rows();
  }

  public function delete($id){
    $this->db->where('id', $id);
    $this->db->delete('role_tbl');
    return $this->db->affected_rows();
  }

}
?>
