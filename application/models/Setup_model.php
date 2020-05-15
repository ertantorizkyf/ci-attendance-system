<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setup_model extends CI_Model{

  public function create_new_employee_info($employee_data){
    return $this->db->insert('employee_tbl', $employee_data);
  }

  public function create_new_user($user){
    return $this->db->insert('user_tbl', $user);
  }

  public function get_employee_info($employee_no){
    $this->db->where('employee_no like binary', $employee_no);
    return $this->db->get('employee_tbl',1);
  }

  public function insert_department(){
    $data['name'] = "IT";
    return $this->db->insert('department_tbl', $data);
  }

  public function insert_role(){
    $data['name'] = "admin";
    return $this->db->insert('role_tbl', $data);
  }

}
?>
