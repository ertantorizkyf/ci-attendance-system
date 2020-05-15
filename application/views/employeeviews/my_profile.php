<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Employee
    <!-- <small>it all starts here</small> -->
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-users"></i> Employee</a></li>
    <li class="active">Profile</li>
  </ol>
</section>
<!-- Main content -->
<section class="content col-lg-12">
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">My Profile</h3>
      <!-- <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
        title="Collapse">
        <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fa fa-times"></i></button>
      </div> -->
    </div>
      <div class="box-body">
        <?php foreach ($profile as $myprofile){ ?>
        <p><strong>Name :</strong> <?php echo $myprofile->first_name . ' ' . $myprofile->last_name; ?></p>
        <p><strong>Employee No :</strong> <?php echo $myprofile->employee_no; ?></p>
        <p><strong>Birth Date :</strong> <?php $dob = new DateTime($myprofile->date_of_birth); echo $myprofile->place_of_birth . ', ' . $dob->format('M jS Y'); ?></p>
        <p><strong>Email :</strong> <?php echo $myprofile->email; ?></p>
        <p><strong>Phone :</strong> <?php echo $myprofile->phone; ?></p>
        <p><strong>Role :</strong> <?php echo $myprofile->role_name; ?></p>
        <p><strong>Department :</strong> <?php echo $myprofile->department_name; ?></p>
        <p><strong>Joined :</strong> <?php $joined = new DateTime($myprofile->joined); echo $joined->format('M Y')  ?></p>
        <?php }?>
        <a href="<?php echo base_url(); ?>employee/profile/me/update" class="btn btn-primary">Update profile</a>
        <br><br>
        <a href="<?php echo base_url(); ?>employee/profile/me/upload-photo" class="btn btn-primary">Upload photo</a>
        <br><br>
        <a href="<?php echo base_url(); ?>employee/profile/me/change-password" class="btn btn-primary">Change password</a>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
      </div>
    <!-- /.box-footer-->
  </div>
  <!-- /.box -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
