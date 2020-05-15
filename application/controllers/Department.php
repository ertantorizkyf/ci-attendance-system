<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model('department_model');
    if(empty($this->session->userdata('id'))){
			redirect('login');
		}
    if($this->session->userdata('privilege') != "admin"){
			redirect('not_authorized');
		}
  }

  public function index(){
    $session_data = array('navigation' => "department");
    $this->session->set_userdata($session_data);

    $data['departments'] = $this->department_model->get_all();

    $this->load->view('templates/header');
    $this->load->view('departmentviews/department_list', $data);
    $this->load->view('templates/footer');
  }

  public function add_new_department(){
    $session_data = array('navigation' => "department");
    $this->session->set_userdata($session_data);

    $this->load->view('templates/header');
    $this->load->view('departmentviews/new_department_form');
    $this->load->view('templates/footer');
  }

  public function add_new_department_process(){
    $current_time = $this->config->item('now');

    $department['name'] = $this->input->post('name');

    $insert_department = $this->department_model->insert($department);
    if($insert_department > 0){
      echo $this->session->set_flashdata('msg','New department has been created');
      redirect('department/add');
    } else{
      echo $this->session->set_flashdata('msg','Failed to insert new department, please try again');
      redirect('department/add');
    }
  }

  public function delete_department($id){
    $delete_role = $this->department_model->delete($id);
    if($delete_role > 0){
      redirect('department/list');
    }
  }
}
