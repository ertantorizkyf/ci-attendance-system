<!DOCTYPE html>
<html>
  <head>
    <title>Initial setup</title>
  </head>
  <body>
    <div>
      <br>
      <?php echo $this->session->flashdata('msg');?>
      <h2>Initial setup for attendance-system</h2>
      <a href="<?php echo base_url();?>setup/create_user_table">1. Create user table</a>
      <br>
      <a href="<?php echo base_url();?>setup/create_employee_table">2. Create employee table</a>
      <br>
      <a href="<?php echo base_url();?>setup/create_role_table">3. Create role table</a>
      <br>
      <a href="<?php echo base_url();?>setup/create_department_table">4. Create department table</a>
      <br>
      <a href="<?php echo base_url();?>setup/create_attendance_table">5. Create attendance table</a>
      <br>
      <a href="<?php echo base_url();?>setup/add_attendance_status_to_user_table">6. Add attendance status to user table</a>
      <br>
      <a href="<?php echo base_url();?>setup/create_role">7. Create initial role</a>
      <br>
      <a href="<?php echo base_url();?>setup/create_department">8. Create initial depeartment</a>
      <br>
      <a href="<?php echo base_url();?>setup/create_admin">9. Create admin in user table</a>
      <br>
      <a href="<?php echo base_url();?>setup/add_photo_to_employee_table">10. Add photo to employee table</a>
      <br>
    </div>
  </body>
</html>
