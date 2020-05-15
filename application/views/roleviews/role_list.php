<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Role
    <!-- <small>it all starts here</small> -->
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-tag"></i> Role</a></li>
    <li class="active">Role list</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">List of Roles</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="data-table" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th width="10%">No</th>
            <th>Role</th>
            <th width="10%">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; if($roles) foreach($roles as $role){ ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $role->name; ?></td>
            <td>
              <center>
                <a href="<?php echo base_url().'role/list/delete/'.$role->id; ?>" data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure you want to delete this employee info?');">
                  <i class="fa fa-trash"></i>
                </a>
              </center>
            </td>
          </tr>
          <?php } ?>
        </tbody>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Role</th>
            <th>Action</th>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
