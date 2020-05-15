<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Employee
    <!-- <small>it all starts here</small> -->
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-users"></i> Employee</a></li>
    <li><a href="<?php echo base_url(); ?>employee/profile/me ">Profile</a></li>
    <li class="active">Change Password</li>
  </ol>
</section>
<!-- Main content -->
<section class="content col-lg-12">
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Change Password Form</h3>
      <!-- <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
        title="Collapse">
        <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fa fa-times"></i></button>
      </div> -->
    </div>
    <form action="<?php echo base_url();?>employee/change_password_process" method="post">
      <div class="box-body">
        <div class="form-group">
          <label>Old password</label>
          <input type="password" class="form-control" name="old_password" required>
        </div>
        <div class="form-group">
          <label>New password</label>
          <input type="password" id="new_password" class="form-control" name="new_password" minlength="8" maxlength="25" required>
        </div>
        <div class="form-group">
          <label>Confirm new password</label>
          <input type="password" id="confirm_password" class="form-control" name="confirm_password" minlength="8" maxlength="25" required>
        </div>
        <p class="text-center" id="check_password_match"></p>
        <p class="text-center"><?php echo $this->session->flashdata('msg');?></p>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Change password</button>
        <a class="btn btn-warning" href="<?php echo base_url(); ?>employee/profile/me">Back</a>
      </div>
    </form>
    <!-- /.box-footer-->
  </div>
  <!-- /.box -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
