<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model('attendance_model');
    if(empty($this->session->userdata('id'))){
			redirect('login');
		}
  }

  public function index(){
    $session_data = array('navigation' => "attendance");
    $this->session->set_userdata($session_data);
    $this->load->view('templates/header');
    $this->load->view('attendanceviews/attendance_form');
    $this->load->view('templates/footer');
  }

  public function attendance_process(){
    $current_time = $this->config->item('now');
    $in_or_out = $this->input->post('button_click');

    if($in_or_out == "in"){
      if($this->session->userdata('in_status') == FALSE){
        $in['employee_user_id'] = $this->session->userdata('id');
        $in['time_in'] = $current_time;
        $in['latitude_in'] = $this->input->post('latitude');
        $in['longitude_in'] = $this->input->post('longitude');
        $employee_user_id = $this->session->userdata('id');
        $this->attendance_model->update_in_status($employee_user_id);
        $query = $this->attendance_model->in_report($in,$employee_user_id);
      } else{
        echo $this->session->set_flashdata('msg','You\'ve already reported in attendance today!');
        redirect('attendance/report');
      }

      if($query>0){
        $session_data = array('in_status' => TRUE);
        $this->session->set_userdata($session_data);
        echo $this->session->set_flashdata('msg','You\'ve successfully reported in attendance');
        redirect('attendance/report');
      } else{
        echo $this->session->set_flashdata('msg','Failed to report in attendance, please try again');
        redirect('attendance/report');
      }
    } else{
      if($this->session->userdata('in_status') == FALSE){
        echo $this->session->set_flashdata('msg','You haven\'t reported in attendance today!');
        redirect('attendance/report');
      } else{
        if($this->session->userdata('out_status') == FALSE){
          $out['time_out'] = $current_time;
          $out['latitude_out'] = $this->input->post('latitude');
          $out['longitude_out'] = $this->input->post('longitude');
          $employee_user_id = $this->session->userdata('id');
          $this->attendance_model->update_out_status($employee_user_id);
          $query = $this->attendance_model->out_report($out,$employee_user_id);
        } else{
          echo $this->session->set_flashdata('msg','You\'ve already reported out attendance today!');
          redirect('attendance/report');
        }
      }

      if($query>0){
        $session_data = array('out_status' => TRUE);
        $this->session->set_userdata($session_data);
        echo $this->session->set_flashdata('msg','You\'ve successfully reported out attendance');
        redirect('attendance/report');
      } else{
        echo $this->session->set_flashdata('msg','Failed to report out attendance, please try again');
        redirect('attendance/report');
      }
    }
  }

  public function view_attendance_history(){
    $session_data = array('navigation' => "attendance");
    $this->session->set_userdata($session_data);

    $employee_user_id = $this->session->userdata('id');

    $date_from = date('Y-m-d H:i:s', strtotime($this->input->post('date_from')));
    $date_to = date('Y-m-d H:i:s', strtotime($this->input->post('date_to')));

    if($date_from == "1970-01-01 01:00:00" && $date_to == "1970-01-01 01:00:00"){
      $data['histories'] = $this->attendance_model->get_attendance_history($employee_user_id);

      $this->load->view('templates/header');
      $this->load->view('attendanceviews/attendance_history', $data);
      $this->load->view('templates/footer');
    } else if(($date_from != "1970-01-01 01:00:00" && $date_to == "1970-01-01 01:00:00") || ($date_from == "1970-01-01 01:00:00" && $date_to != "1970-01-01 01:00:00")){
      echo $this->session->set_flashdata('msg','One of the date input is empty!');
      $data['histories'] = $this->attendance_model->get_attendance_history($employee_user_id);

      $this->load->view('templates/header');
      $this->load->view('attendanceviews/attendance_history', $data);
      $this->load->view('templates/footer');
    } else if(($date_from >= $date_to) && $date_to != "1970-01-01 01:00:00"){
      echo $this->session->set_flashdata('msg','Date range invalid!');
      $data['histories'] = $this->attendance_model->get_attendance_history($employee_user_id);

      $this->load->view('templates/header');
      $this->load->view('attendanceviews/attendance_history', $data);
      $this->load->view('templates/footer');
    } else{
      $data['histories'] = $this->attendance_model->get_ranged_attendance_history($employee_user_id, $date_from, $date_to);

      $this->load->view('templates/header');
      $this->load->view('attendanceviews/attendance_history', $data);
      $this->load->view('templates/footer');
    }
  }

}
