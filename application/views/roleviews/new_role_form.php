<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Role
    <!-- <small>it all starts here</small> -->
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-tag"></i> Role</a></li>
    <li class="active">Add new role</li>
  </ol>
</section>
<!-- Main content -->
<section class="content col-lg-12">
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">New Role Form</h3>
      <!-- <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
        title="Collapse">
        <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fa fa-times"></i></button>
      </div> -->
    </div>
    <form action="<?php echo base_url();?>role/add_new_role_process" method="post">
      <div class="box-body">
        <div class="form-group">
          <label>Role name</label>
          <input type="text" class="form-control" name="name" placeholder="Role name" required>
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
