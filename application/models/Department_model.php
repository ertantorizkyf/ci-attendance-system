<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department_model extends CI_Model{

  public function get_all(){
    $query = $this->db->get('department_tbl');
    return $query->result();
  }

  public function insert($department){
    $this->db->insert('department_tbl', $department);
    return $this->db->affected_rows();
  }

  public function delete($id){
    $this->db->where('id', $id);
    $this->db->delete('department_tbl');
    return $this->db->affected_rows();
  }

}
?>
