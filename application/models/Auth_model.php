<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model{

  function get_employee_user_info($user){
    $this->db->where('employee_id', $user);
    $result = $this->db->get('user_tbl',1);
    return $result;
  }

  function get_employee_no($user){
    $this->db->select('e.id, e.employee_no, e.first_name, e.last_name, e.place_of_birth, e.date_of_birth, e.email, e.phone,
      r.name as role_name, d.name as department_name, e.created_at as joined, e.photo');
    $this->db->from('employee_tbl e');
    $this->db->join('role_tbl r', 'e.role_id = r.id');
    $this->db->join('department_tbl d', 'e.department_id = d.id');
    $this->db->where('e.employee_no like binary', $user);
    $this->db->where('e.deleted_at', null);
    $this->db->limit(1);
    $result = $this->db->get();
    return $result;
  }

  function employee_last_attendance($employee_user_id){
    $this->db->select('time_in');
    $this->db->where('employee_user_id', $employee_user_id);
    $this->db->order_by('time_in', 'DESC');
    $query = $this->db->get('attendance_tbl', 1);
    return $query->result_array();
  }

  public function reset_attendance_status($employee_user_id){
    $this->db->set('out_status', FALSE);
    $this->db->set('in_status', FALSE);
    $this->db->where('id', $employee_user_id);
    $this->db->where('out_status', TRUE);
    $this->db->where('in_status', TRUE);
    $this->db->update('user_tbl');
  }

}
?>
