<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->library('sanitize_input');
    $this->load->model('employee_model');
    if(empty($this->session->userdata('id'))){
			redirect('login');
		}
  }

  public function index(){
    if($this->session->userdata('privilege') != "admin"){
			redirect('not_authorized');
		}

    $session_data = array('navigation' => "employee");
    $this->session->set_userdata($session_data);

    $data['employees'] = $this->employee_model->get_all_employee();

    $this->load->view('templates/header');
    $this->load->view('employeeviews/employee_list', $data);
    $this->load->view('templates/footer');
  }

  public function my_profile(){
    $data['profile'] = $this->employee_model->get_my_profile($this->session->userdata('employee_no'));

    $this->load->view('templates/header');
    $this->load->view('employeeviews/my_profile', $data);
    $this->load->view('templates/footer');
  }

  public function my_profile_update(){
    $data['profile'] = $this->employee_model->get_my_profile($this->session->userdata('employee_no'));

    $this->load->view('templates/header');
    $this->load->view('employeeviews/my_profile_form', $data);
    $this->load->view('templates/footer');
  }

  public function my_profile_update_process(){
    $current_time = $this->config->item('now');

    $employee_id = $this->input->post('id');
    $employee['employee_no'] = $this->input->post('employee_no');
    $employee['first_name'] = $this->sanitize_input->string_sanitize($this->input->post('first_name'));
    $employee['last_name'] = $this->sanitize_input->string_sanitize($this->input->post('last_name'));
    $employee['place_of_birth'] = $this->sanitize_input->string_sanitize($this->input->post('pob'));
    $employee['date_of_birth'] = date('Y-m-d', strtotime($this->input->post('dob')));
    $employee['email'] = trim($this->input->post('email'));
    $employee['phone'] = $this->sanitize_input->phone_sanitize($this->input->post('phone'));
    $employee['role_id'] = $this->input->post('role');
    $employee['department_id'] = $this->input->post('department');
    $employee['updated_at'] = $current_time;

    if($employee['last_name'] == ""){
      $employee['last_name'] == NULL;
    }

    if($employee['email'] == ""){
      $employee['email'] == NULL;
    }

    if($employee['phone'] == ""){
      $employee['phone'] == NULL;
    }

    $update_employee = $this->employee_model->update_employee($employee_id, $employee);
    if($update_employee > 0){
      echo $this->session->set_flashdata('msg','Employee info has been updated');
      redirect('employee/profile/me/update');
    } else{
      echo $this->session->set_flashdata('msg','Failed to update employee info, please try again');
      redirect('employee/profile/me/update');
    }
  }

  public function add_new_employee(){
    if($this->session->userdata('privilege') != "admin"){
			redirect('not_authorized');
		}

    $session_data = array('navigation' => "employee");
    $this->session->set_userdata($session_data);

    $data['departments'] = $this->employee_model->get_department();
    $data['roles'] = $this->employee_model->get_role();

    $this->load->view('templates/header');
    $this->load->view('employeeviews/new_employee_form', $data);
    $this->load->view('templates/footer');
  }

  public function add_new_employee_process(){
    if($this->session->userdata('privilege') != "admin"){
			redirect('not_authorized');
		}

    $current_time = $this->config->item('now');

    $employee['employee_no'] = $this->input->post('employee_no');
    $employee['first_name'] = $this->sanitize_input->string_sanitize($this->input->post('first_name'));
    $employee['last_name'] = $this->sanitize_input->string_sanitize($this->input->post('last_name'));
    $employee['place_of_birth'] = $this->sanitize_input->string_sanitize($this->input->post('pob'));
    $employee['date_of_birth'] = date('Y-m-d', strtotime($this->input->post('dob')));
    $employee['email'] = trim($this->input->post('email'));
    $employee['phone'] = $this->sanitize_input->phone_sanitize($this->input->post('phone'));
    $employee['role_id'] = $this->input->post('role');
    $employee['department_id'] = $this->input->post('department');
    $employee['created_at'] = $current_time;

    if($employee['last_name'] == ""){
      $employee['last_name'] == NULL;
    }

    if($employee['email'] == ""){
      $employee['email'] == NULL;
    }

    if($employee['phone'] == ""){
      $employee['phone'] == NULL;
    }

    $insert_employee = $this->employee_model->insert_employee($employee);
    if($insert_employee > 0){
      $get_employee = $this->employee_model->get_employee_by_employee_no($employee['employee_no']);
      if($get_employee->num_rows() > 0){
        $data = $get_employee->row_array();

        $raw_password = "password123";
        $hashed_password = $this->bcrypt->hash_password($raw_password);

        $user['employee_id'] = $data['id'];
        $user['password'] = $hashed_password;
        $user['privilege'] = "user";
        $user['created_at'] = $current_time;

        $query = $this->employee_model->create_new_user($user);

        if($query > 0){
          echo $this->session->set_flashdata('msg','New employee info and user account has been created');
          redirect('employee/add');
        } else{
          echo $this->session->set_flashdata('msg','Error when creating the user account, please try again');
          redirect('employee/add');
        }
      }
    } else{
      echo $this->session->set_flashdata('msg','Failed to insert new employee, please try again');
      redirect('employee/add');
    }
  }

  public function change_password(){
    $this->load->view('templates/header');
    $this->load->view('employeeviews/change_password_form');
    $this->load->view('templates/footer');
  }

  public function change_password_process(){
    $current_time = $this->config->item('now');
    $user_id = $this->session->userdata('id');
    $old_password = $this->input->post('old_password');
    $new_password = $this->input->post('new_password');
    $confirm_password = $this->input->post('confirm_password');
    $hashed_new_password = $this->bcrypt->hash_password($new_password);

    if($new_password != $confirm_password){
      echo $this->session->set_flashdata('msg','New passwords don\'t match!');
      redirect('employee/profile/me/change-password');
    }

    $user_info = $this->employee_model->get_employee_user_info($user_id);
    if($user_info->num_rows() > 0){
      $data = $user_info->row_array();
      $hashed_password = $data['password'];

      if($this->bcrypt->check_password($old_password, $hashed_password)){
        $query = $this->employee_model->change_password($user_id, $hashed_new_password, $current_time);
        if($query > 0){
          echo $this->session->set_flashdata('msg','Password successfully changed');
          redirect('employee/profile/me/change-password');
        } else {
          echo $this->session->set_flashdata('msg','Error while changing the password, please try again');
          redirect('employee/profile/me/change-password');
        }
      } else{
        echo $this->session->set_flashdata('msg','Old password doesn\'t match the stored password!');
        redirect('employee/profile/me/change-password');
      }
    }
  }

  public function employee_update($employee_no){
    if($this->session->userdata('privilege') != "admin"){
			redirect('not_authorized');
		}

    $session_data = array('navigation' => "employee");
    $this->session->set_userdata($session_data);

    $data['profile'] = $this->employee_model->get_my_profile($employee_no);
    $data['departments'] = $this->employee_model->get_department();
    $data['roles'] = $this->employee_model->get_role();

    $this->load->view('templates/header');
    $this->load->view('employeeviews/update_employee_form', $data);
    $this->load->view('templates/footer');
  }

  public function employee_update_process(){
    if($this->session->userdata('privilege') != "admin"){
			redirect('not_authorized');
		}

    $current_time = $this->config->item('now');

    $employee_id = $this->input->post('id');
    $employee['employee_no'] = $this->input->post('employee_no');
    $employee['first_name'] = $this->sanitize_input->string_sanitize($this->input->post('first_name'));
    $employee['last_name'] = $this->sanitize_input->string_sanitize($this->input->post('last_name'));
    $employee['place_of_birth'] = $this->sanitize_input->string_sanitize($this->input->post('pob'));
    $employee['date_of_birth'] = date('Y-m-d', strtotime($this->input->post('dob')));
    $employee['email'] = trim($this->input->post('email'));
    $employee['phone'] = $this->sanitize_input->phone_sanitize($this->input->post('phone'));
    $employee['role_id'] = $this->input->post('role');
    $employee['department_id'] = $this->input->post('department');
    $employee['updated_at'] = $current_time;

    if($employee['last_name'] == ""){
      $employee['last_name'] == NULL;
    }

    if($employee['email'] == ""){
      $employee['email'] == NULL;
    }

    if($employee['phone'] == ""){
      $employee['phone'] == NULL;
    }

    $update_employee = $this->employee_model->update_employee($employee_id, $employee);
    if($update_employee > 0){
      echo $this->session->set_flashdata('msg','Employee info has been updated');
      redirect('employee/list/update/'.$employee['employee_no']);
    } else{
      echo $this->session->set_flashdata('msg','Failed to update employee info, please try again');
      redirect('employee/list/update/'.$employee['employee_no']);
    }
  }

  public function employee_delete($employee_no){
    if($this->session->userdata('privilege') != "admin"){
			redirect('not_authorized');
		}

    $current_time = $this->config->item('now');

    $employee['deleted_at'] = $current_time;

    $delete_employee = $this->employee_model->delete_employee($employee_no, $employee);
    if($delete_employee > 0){
      echo $this->session->set_flashdata('msg','Employee info has been deleted');
      redirect('employee/list');
    } else{
      echo $this->session->set_flashdata('msg','Failed to delete employee info, please try again');
      redirect('employee/list');
    }
  }

  public function upload_photo(){
    $this->load->view('templates/header');
    $this->load->view('employeeviews/photo_upload_form');
    $this->load->view('templates/footer');
  }

  public function upload_photo_process(){
    $current_time = $this->config->item('now');

    $config = [
      'upload_path' => './assets/profile',
      'allowed_types' => 'gif|png|jpg|jpeg',
      'max_size' => "1536000"
    ];

    $this->load->library('upload', $config);
    $this->form_validation->set_error_delimiters();
    if($this->upload->do_upload()){
      $data = $this->input->post();
      $info = $this->upload->data();
      $image_path = base_url("assets/profile/" . $info['raw_name'] . $info['file_ext']);
      $photo['photo'] = $image_path;
      $photo['updated_at'] = $current_time;
      $employee_no = $this->session->userdata('employee_no');
      $query = $this->employee_model->upload_photo($employee_no, $photo);

      if($query > 0){
        $session_data = array('photo' => $image_path);
        $this->session->set_userdata($session_data);
        echo $this->session->set_flashdata('msg','Photo successfully uploaded');
        redirect('employee/profile/me/upload-photo');
      } else {
        echo $this->session->set_flashdata('msg','Failed to upload photo, please try again');
        redirect('employee/profile/me/upload-photo');
      }
    } else{
      echo $this->session->set_flashdata('msg','Error while uploading, please try again');
      redirect('employee/profile/me/upload-photo');
    }
  }

  public function remove_photo(){
    $current_time = $this->config->item('now');

    $photo['photo'] = NULL;
    $photo['updated_at'] = $current_time;
    $employee_no = $this->session->userdata('employee_no');
    $query = $this->employee_model->upload_photo($employee_no, $photo);

    if($query > 0){
      $session_data = array('photo' => $image_path);
      $this->session->set_userdata($session_data);
      echo $this->session->set_flashdata('msg','Photo successfully removed');
      redirect('employee/profile/me/upload-photo');
    } else {
      echo $this->session->set_flashdata('msg','Failed to remove photo, please try again');
      redirect('employee/profile/me/upload-photo');
    }
  }
}
