<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Employee
    <!-- <small>it all starts here</small> -->
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-users"></i> Employee</a></li>
    <li><a href="<?php echo base_url(); ?>employee/profile/me ">Profile</a></li>
    <li class="active">Upload Photo</li>
  </ol>
</section>
<!-- Main content -->
<section class="content col-lg-12">
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Upload Photo Form</h3>
      <!-- <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
        title="Collapse">
        <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fa fa-times"></i></button>
      </div> -->
    </div>
      <div class="box-body">
      <!-- OPEN FORM TO UPLOAD PROFILE PHOTO -->
      <?php echo form_open_multipart('employee/upload_photo_process'); ?>
        <?php echo form_upload(['name'=>'userfile', 'value'=>'Save']); ?>
        <?php echo form_error('userfile', '<div class="text-danger">', '</div>'); ?>
        <p>Allowed file extension: *.gif, *.png, *.jpg, and *.jpeg (max size = 1,5MB)</p>
        <p class="text-center"><?php echo $this->session->flashdata('msg');?></p>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <button type="submit" class="btn btn-primary">
          <?php //echo form_submit(['name'=>'submit', 'value'=>'Upload profile photo']); ?>
          Upload
        </button>
        <a class="btn btn-warning" href="<?php echo base_url(); ?>employee/profile/me">Back</a>
        <a class="btn btn-danger" href="<?php echo base_url(); ?>employee/profile/me/upload-photo/remove" onclick="return confirm('Are you sure you want to remove photo?');">Remove</a>
      </div>
      <?php echo form_close(); ?>
      <!-- END OF FORM -->
    <!-- /.box-footer-->
  </div>
  <!-- /.box -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
