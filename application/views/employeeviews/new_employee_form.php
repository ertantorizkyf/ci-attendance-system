<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Employee
    <!-- <small>it all starts here</small> -->
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-users"></i> Employee</a></li>
    <li class="active">Add new employee</li>
  </ol>
</section>
<!-- Main content -->
<section class="content col-lg-12">
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">New Employee Form</h3>
      <!-- <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
        title="Collapse">
        <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fa fa-times"></i></button>
      </div> -->
    </div>
    <form action="<?php echo base_url();?>employee/add_new_employee_process" method="post">
      <div class="box-body">
        <div class="form-group">
          <label>Employee no</label>
          <input type="text" class="form-control" name="employee_no" placeholder="Employee no (required)" required>
        </div>
        <div class="form-group col-md-6" style="padding-left: 0px; padding-right: 5px;">
          <label>First name</label>
          <input type="text" class="form-control" name="first_name" placeholder="First name (required)" required>
        </div>
        <div class="form-group col-md-6" style="padding-left: 5px; padding-right: 0px;">
          <label>Last name</label>
          <input type="text" class="form-control" name="last_name" placeholder="Last name">
        </div>
        <div class="form-group col-md-6" style="padding-left: 0px; padding-right: 5px;">
          <label>Place of birth</label>
          <input type="text" class="form-control" name="pob" placeholder="Place of birth (required)" required>
        </div>
        <div class="form-group col-md-6" style="padding-left: 5px; padding-right: 0px;">
          <label>Date of birth</label>
          <input type="text" class="form-control" id="datepicker-to" name="dob" placeholder="(required)" required>
        </div>
        <div class="form-group col-md-6" style="padding-left: 0px; padding-right: 5px;">
          <label>Email</label>
          <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
        <div class="form-group col-md-6" style="padding-left: 5px; padding-right: 0px;">
          <label>Phone</label>
          <input type="text" class="form-control" name="phone" placeholder="Phone ">
        </div>
        <div class="form-group col-md-6" style="padding-left: 0px; padding-right: 5px;">
          <label>Department</label>
          <select class="form-control" name="department">
            <?php foreach ($departments as $department){ ?>
            <option value="<?php echo $department->id; ?>"><?php echo $department->name; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group col-md-6" style="padding-left: 5px; padding-right: 0px;">
          <label>Role</label>
          <select class="form-control" name="role">
            <?php foreach ($roles as $role){ ?>
            <option value="<?php echo $role->id; ?>"><?php echo $role->name; ?></option>
            <?php } ?>
          </select>
        </div>
        <p class="text-center"><?php echo $this->session->flashdata('msg');?></p>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
    </form>
    <!-- /.box-footer-->
  </div>
  <!-- /.box -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
