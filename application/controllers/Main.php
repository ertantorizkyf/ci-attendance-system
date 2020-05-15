<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

  function __construct(){
    parent::__construct();
    if(empty($this->session->userdata('id'))){
			redirect('login');
		}
  }

  public function index()
  {
    $session_data = array('navigation' => "dashboard");
    $this->session->set_userdata($session_data);
    $this->load->view('templates/header');
    $this->load->view('mainviews/main');
    $this->load->view('templates/footer');
  }

  public function not_authorized(){
    $this->load->view('templates/not_authorized');
  }

}
