<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model{

  public function get_role(){
    $query = $this->db->get('role_tbl');
    return $query->result();
  }

  public function get_department(){
    $query = $this->db->get('department_tbl');
    return $query->result();
  }

  public function get_all_employee(){
    $this->db->select('e.employee_no, e.first_name, e.last_name, e.place_of_birth, e.date_of_birth, e.email, e.phone,
      r.name as role_name, d.name as department_name, e.created_at as joined');
    $this->db->from('employee_tbl e');
    $this->db->join('role_tbl r', 'e.role_id = r.id');
    $this->db->join('department_tbl d', 'e.department_id = d.id');
    $this->db->where('deleted_at', null);
    $query = $this->db->get();
    return $query->result();
  }

  public function get_my_profile($employee_no){
    $this->db->select('e.id, e.employee_no, e.first_name, e.last_name, e.place_of_birth, e.date_of_birth, e.email, e.phone,
      r.name as role_name, r.id as role_id, d.name as department_name, d.id as department_id, e.created_at as joined');
    $this->db->from('employee_tbl e');
    $this->db->join('role_tbl r', 'e.role_id = r.id');
    $this->db->join('department_tbl d', 'e.department_id = d.id');
    $this->db->where('e.employee_no', $employee_no);
    $this->db->where('deleted_at', null);
    $query = $this->db->get();
    return $query->result();
  }

  public function insert_employee($employee){
    $this->db->insert('employee_tbl', $employee);
    return $this->db->affected_rows();
  }

  public function update_employee($employee_id, $employee){
    $this->db->set($employee);
    $this->db->where('id', $employee_id);
    $this->db->update('employee_tbl');
    return $this->db->affected_rows();
  }

  public function delete_employee($employee_no, $employee){
    $this->db->set($employee);
    $this->db->where('employee_no', $employee_no);
    $this->db->update('employee_tbl');
    return $this->db->affected_rows();
  }

  public function get_employee_by_employee_no($employee_no){
    $this->db->where('employee_no like binary', $employee_no);
    return $this->db->get('employee_tbl',1);
  }

  public function create_new_user($user){
    $this->db->insert('user_tbl', $user);
    return $this->db->affected_rows();
  }

  function get_employee_user_info($user_id){
    $this->db->where('id', $user_id);
    $result = $this->db->get('user_tbl',1);
    return $result;
  }

  function change_password($user_id, $new_password, $updated){
    $this->db->set('password', $new_password);
    $this->db->set('updated_at', $updated);
    $this->db->where('id', $user_id);
    $this->db->update('user_tbl');
    return $this->db->affected_rows();
  }

  function upload_photo($employee_no, $photo){
    $this->db->set($photo);
    $this->db->where('employee_no', $employee_no);
    $this->db->update('employee_tbl');
    return $this->db->affected_rows();
  }

}
?>
