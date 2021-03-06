<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Employee
    <!-- <small>it all starts here</small> -->
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-users"></i> Employee</a></li>
    <li><a href="<?php echo base_url(); ?>employee/profile/me ">Profile</a></li>
    <li class="active">Update</li>
  </ol>
</section>
<!-- Main content -->
<section class="content col-lg-12">
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Update Profile Form</h3>
      <!-- <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
        title="Collapse">
        <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fa fa-times"></i></button>
      </div> -->
    </div>
    <form action="<?php echo base_url();?>employee/my_profile_update_process" method="post">
      <div class="box-body">
        <?php foreach ($profile as $myprofile){ ?>
        <div class="form-group">
          <label>Employee no</label>
          <input type="hidden" class="form-control" name="id" value="<?php echo $myprofile->id; ?>">
          <input type="text" class="form-control" name="employee_no" value="<?php echo $myprofile->employee_no; ?>" readonly>
        </div>
        <div class="form-group col-md-6" style="padding-left: 0px; padding-right: 5px;">
          <label>First name</label>
          <input type="text" class="form-control" name="first_name" value="<?php echo $myprofile->first_name; ?>" readonly>
        </div>
        <div class="form-group col-md-6" style="padding-left: 5px; padding-right: 0px;">
          <label>Last name</label>
          <input type="text" class="form-control" name="last_name" value="<?php echo $myprofile->last_name; ?>" readonly>
        </div>
        <div class="form-group col-md-6" style="padding-left: 0px; padding-right: 5px;">
          <label>Place of birth</label>
          <input type="text" class="form-control" name="pob" value="<?php echo $myprofile->place_of_birth; ?>" readonly>
        </div>
        <div class="form-group col-md-6" style="padding-left: 5px; padding-right: 0px;">
          <label>Date of birth</label>
          <input type="text" class="form-control" id="datepicker-to" name="dob" value="<?php echo $myprofile->date_of_birth; ?>" readonly>
        </div>
        <div class="form-group col-md-6" style="padding-left: 0px; padding-right: 5px;">
          <label>Email</label>
          <input type="email" class="form-control" name="email" value="<?php echo $myprofile->email; ?>">
        </div>
        <div class="form-group col-md-6" style="padding-left: 5px; padding-right: 0px;">
          <label>Phone</label>
          <input type="text" class="form-control" name="phone" value="<?php echo $myprofile->phone; ?>">
        </div>
        <div class="form-group col-md-6" style="padding-left: 0px; padding-right: 5px;">
          <label>Department</label>
          <input type="hidden" class="form-control" name="department" value="<?php echo $myprofile->department_id; ?>">
          <input type="text" class="form-control" value="<?php echo $myprofile->department_name; ?>" readonly>
        </div>
        <div class="form-group col-md-6" style="padding-left: 5px; padding-right: 0px;">
          <label>Role</label>
          <input type="hidden" class="form-control" name="role" value="<?php echo $myprofile->role_id; ?>">
          <input type="text" class="form-control" value="<?php echo $myprofile->role_name; ?>" readonly>
        </div>
        <p class="text-center"><?php echo $this->session->flashdata('msg');?></p>
      <?php } ?>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Update</button>
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
