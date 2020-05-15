<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Employee
    <!-- <small>it all starts here</small> -->
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-users"></i> Employee</a></li>
    <li class="active">Employee list</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">List of Employees</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="data-table" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Employee No</th>
            <th>Birth Date</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Role</th>
            <th>Department</th>
            <th>Joined</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; if($employees) foreach($employees as $employee){ ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $employee->first_name . ' ' . $employee->last_name; ?></td>
            <td><?php echo $employee->employee_no; ?></td>
            <td><?php $dob = new DateTime($employee->date_of_birth); echo $employee->place_of_birth . ', ' . $dob->format('M jS Y'); ?></td>
            <td><?php echo $employee->email; ?></td>
            <td><?php echo $employee->phone; ?></td>
            <td><?php echo $employee->role_name; ?></td>
            <td><?php echo $employee->department_name; ?></td>
            <td><?php $joined = new DateTime($employee->joined); echo $joined->format('M Y')  ?></td>
            <td>
              <a href="<?php echo base_url().'employee/list/update/'.$employee->employee_no; ?>" data-toggle="tooltip" title="Update">
                <i class="fa fa-fw fa-edit"></i>
              </a>
              <a href="<?php echo base_url().'employee/list/delete/'.$employee->employee_no; ?>" data-toggle="tooltip" title="Delete" class="pull-right" onclick="return confirm('Are you sure you want to delete this employee info?');">
                <i class="fa fa-trash"></i>
              </a>
              <!-- /.modal -->
            </td>
          </tr>
          <?php } ?>
        </tbody>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Employee No</th>
            <th>Birth Date</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Role</th>
            <th>Department</th>
            <th>Joined</th>
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
