<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setup extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->dbforge();
  }

  public function index(){
    $this->load->view('setupviews/setup');
  }

  //create table in db = mems_db
  function create_user_table(){
    $fields = array(
      'id' => array(
        'type' => 'INT',
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'employee_id' => array(
        'type' => 'INT'
      ),
      'password' => array(
        'type' =>'VARCHAR',
        'constraint' => '255'
      ),
      'privilege' => array(
        'type' => 'ENUM("admin","user")',
        'default' => 'user'
      ),
      'created_at' => array(
        'type' => 'DATETIME'
      ),
      'updated_at' => array(
        'type' => 'DATETIME',
        'null' => TRUE
      ),
      'deleted_at' => array(
        'type' => 'DATETIME',
        'null' => TRUE
      ),
    );
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->add_field($fields);
    $this->dbforge->create_table('user_tbl');
    echo $this->session->set_flashdata('msg','User table created');
    redirect('setup');
  }

  public function create_role(){
    $this->load->model('setup_model');
    $insert_role = $this->setup_model->insert_role();
    echo $this->session->set_flashdata('msg','Role added');
    redirect('setup');
  }

  public function create_department(){
    $this->load->model('setup_model');
    $insert_department = $this->setup_model->insert_department();
    echo $this->session->set_flashdata('msg','Department added');
    redirect('setup');
  }

  public function create_admin(){
    $this->load->model('setup_model');

    $current_time = $this->config->item('now');

    $employee_data['employee_no'] = "superadmin";
    $employee_data['first_name'] = "admin";
    $employee_data['place_of_birth'] = "Jakarta";
    $employee_data['date_of_birth'] = "2019-10-18";
    $employee_data['email'] = "admin@mail.com";
    $employee_data['phone'] = "08566726628";
    $employee_data['role_id'] = 1;
    $employee_data['department_id'] = 1;
    $employee_data['created_at'] = $current_time;
    $insert_employee = $this->setup_model->create_new_employee_info($employee_data);

    $get_employee = $this->setup_model->get_employee_info("superadmin");
    if($get_employee->num_rows() > 0){
      $data = $get_employee->row_array();

      $raw_password = "110891";
      $hashed_password = $this->bcrypt->hash_password($raw_password);

      $user['employee_id'] = $data['id'];
      $user['password'] = $hashed_password;
      $user['privilege'] = "admin";
      $user['created_at'] = $current_time;

      $query = $this->setup_model->create_new_user($user);

      if($query){
        echo $this->session->set_flashdata('msg','Admin added');
        redirect('setup');
      }
    }
  }

  function create_attendance_table(){
    $fields = array(
      'id' => array(
        'type' => 'INT',
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'employee_user_id' => array(
        'type' => 'int'
      ),
      'time_in' => array(
        'type' => 'DATETIME'
      ),
      'latitude_in' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => TRUE
      ),
      'longitude_in' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => TRUE
      ),
      'time_out' => array(
        'type' => 'DATETIME',
        'null' => TRUE
      ),
      'latitude_out' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => TRUE
      ),
      'longitude_out' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => TRUE
      ),
      'notes' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => TRUE
      ),
    );
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->add_field($fields);
    $this->dbforge->create_table('attendance_tbl');
    echo $this->session->set_flashdata('msg','Attendance table created');
    redirect('setup');
  }

  function add_attendance_status_to_user_table(){
    $fields = array(
      'in_status' => array(
        'type' => 'BOOLEAN',
        'default' => false,
        'after' => 'privilege'
      ),
      'out_status' => array(
        'type' => 'BOOLEAN',
        'default' => false,
        'after' => 'in_status'
      ),
    );
    $this->dbforge->add_column('user_tbl', $fields);
    echo $this->session->set_flashdata('msg','Attendance status added to user table');
    redirect('setup');
  }

  function create_employee_table(){
    $fields = array(
      'id' => array(
        'type' => 'INT',
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'employee_no' => array(
        'type' => 'VARCHAR',
        'constraint' => '255'
      ),
      'first_name' => array(
        'type' => 'VARCHAR',
        'constraint' => '255'
      ),
      'last_name' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => TRUE
      ),
      'place_of_birth' => array(
        'type' => 'VARCHAR',
        'constraint' => '255'
      ),
      'date_of_birth' => array(
        'type' => 'DATE'
      ),
      'email' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => TRUE
      ),
      'phone' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => TRUE
      ),
      'role_id' => array(
        'type' => 'INT'
      ),
      'department_id' => array(
        'type' => 'INT',
      ),
      'created_at' => array(
        'type' => 'DATETIME'
      ),
      'updated_at' => array(
        'type' => 'DATETIME',
        'null' => TRUE
      ),
      'deleted_at' => array(
        'type' => 'DATETIME',
        'null' => TRUE
      ),
    );
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->add_field($fields);
    $this->dbforge->create_table('employee_tbl');
    echo $this->session->set_flashdata('msg','Employee table created');
    redirect('setup');
  }

  function create_role_table(){
    $fields = array(
      'id' => array(
        'type' => 'INT',
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'name' => array(
        'type' => 'VARCHAR',
        'constraint' => '255'
      ),
    );
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->add_field($fields);
    $this->dbforge->create_table('role_tbl');
    echo $this->session->set_flashdata('msg','Role table created');
    redirect('setup');
  }

  function create_department_table(){
    $fields = array(
      'id' => array(
        'type' => 'INT',
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'name' => array(
        'type' => 'VARCHAR',
        'constraint' => '255'
      ),
    );
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->add_field($fields);
    $this->dbforge->create_table('department_tbl');
    echo $this->session->set_flashdata('msg','Department table created');
    redirect('setup');
  }

  function add_photo_to_employee_table(){
    $fields = array(
      'photo' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => TRUE,
        'after' => 'department_id',
      ),
    );
    $this->dbforge->add_column('employee_tbl', $fields);
    echo $this->session->set_flashdata('msg','Photo added to employee table');
    redirect('setup');
  }

}
?>
