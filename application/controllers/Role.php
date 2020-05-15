<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model('role_model');
    if(empty($this->session->userdata('id'))){
			redirect('login');
		}
    if($this->session->userdata('privilege') != "admin"){
			redirect('not_authorized');
		}
  }

  public function index(){
    $session_data = array('navigation' => "role");
    $this->session->set_userdata($session_data);

    $data['roles'] = $this->role_model->get_all();

    $this->load->view('templates/header');
    $this->load->view('roleviews/role_list', $data);
    $this->load->view('templates/footer');
  }

  public function add_new_role(){
    $session_data = array('navigation' => "role");
    $this->session->set_userdata($session_data);

    $this->load->view('templates/header');
    $this->load->view('roleviews/new_role_form');
    $this->load->view('templates/footer');
  }

  public function add_new_role_process(){
    $current_time = $this->config->item('now');

    $role['name'] = $this->input->post('name');

    $insert_role = $this->role_model->insert($role);
    if($insert_role > 0){
      echo $this->session->set_flashdata('msg','New role has been created');
      redirect('role/add');
    } else{
      echo $this->session->set_flashdata('msg','Failed to insert new role, please try again');
      redirect('role/add');
    }
  }

  public function delete_role($id){
    $delete_role = $this->role_model->delete($id);
    if($delete_role > 0){
      redirect('role/list');
    }
  }
}
