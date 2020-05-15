<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model('auth_model');
  }

  public function index()
  {
    if(!empty($this->session->userdata('employee_no'))){
      redirect('main');
    }
    $this->load->view('authviews/login');
  }

  public function login_process(){
    $employee_no = $this->input->post('employee_no');
    $password = $this->input->post('password');
    // Get from the employee table
    $get_employee = $this->auth_model->get_employee_no($employee_no);

    if($get_employee->num_rows() > 0){
      // Data from the employee table
      $data = $get_employee->row_array();
      $employee_user_id = $data['id'];
      // Get grom the user table
      $get_employee_user_info = $this->auth_model->get_employee_user_info($employee_user_id);

      if ($get_employee_user_info->num_rows() > 0) {
        // Data from the user table
        $user_data = $get_employee_user_info->row_array();
        $hashedPassword = $user_data['password'];
        //checking whether the inputted password matches or not
        if($this->bcrypt->check_password($password, $hashedPassword))
        {
          $get_last_attendance = $this->auth_model->employee_last_attendance($user_data['id']);
          $last_attendance = date('Y-m-d', strtotime($get_last_attendance[0]['time_in']));
          $current_time = date('Y-m-d', strtotime($this->config->item('now')));
          if($last_attendance != $current_time){
            $this->auth_model->reset_attendance_status($user_data['id']);
          }

          $joined = new DateTime($data['joined']);

          $session_data = array(
            'id' => $user_data['id'],
            'employee_no' => $employee_no,
            'privilege' => $user_data['privilege'],
            'in_status' => $user_data['in_status'],
            'out_status' => $user_data['out_status'],
            'joined' => $joined->format('M Y'),
            'job_role' => $data['department_name'].' '.$data['role_name'],
            'photo' => $data['photo'],
            'logged_in' => TRUE
          );

          $this->session->set_userdata($session_data);
          redirect('main');
        }
        else
        {
          echo $this->session->set_flashdata('msg','Wrong password!');
          redirect('login');
        }
      }
    } else{
        echo $this->session->set_flashdata('msg','User not registered!');
        redirect('login');
    }
  }

  public function logout(){
    $this->session->sess_destroy();
    redirect('login');
  }
}
