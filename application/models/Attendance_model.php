<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance_model extends CI_Model{

  public function in_report($in){
    $this->db->insert('attendance_tbl', $in);
    return $this->db->affected_rows();
  }

  public function update_in_status($employee_user_id){
    $this->db->set('in_status', TRUE);
    $this->db->where('id', $employee_user_id);
    $this->db->update('user_tbl');
  }

  // NOT USED YET
  // public function reset_in_status($employee_user_id){
  //   $this->db->set('in_status', FALSE);
  //   $this->db->where('id', $employee_user_id);
  //   $this->db->update('user_tbl');
  // }

  public function out_report($out,$employee_user_id){
    $this->db->select('*');
    $this->db->where('employee_user_id', $employee_user_id);
    $this->db->order_by('time_in', 'DESC');
    $query = $this->db->get('attendance_tbl', 1);
    $get_in_report = $query->result_array();

    $in_report_id = $get_in_report[0]['id'];
    $this->db->set($out);
    $this->db->where('id', $in_report_id);
    $this->db->update('attendance_tbl');
    return $this->db->affected_rows();
  }

  public function update_out_status($employee_user_id){
    $this->db->set('out_status', TRUE);
    $this->db->where('id', $employee_user_id);
    $this->db->update('user_tbl');
  }

  public function get_attendance_history($employee_user_id){
    $this->db->where('employee_user_id', $employee_user_id);
    $this->db->order_by('time_in', 'DESC');
    $query = $this->db->get('attendance_tbl');
    return $query->result();
  }

  public function get_ranged_attendance_history($employee_user_id, $from, $to){
    $this->db->where('employee_user_id', $employee_user_id);
    $this->db->where('time_in >=', $from);
    $this->db->where('time_out <=', $to);
    $this->db->order_by('time_in', 'DESC');
    $query = $this->db->get('attendance_tbl');
    return $query->result();
  }
}
?>
