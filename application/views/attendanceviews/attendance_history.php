<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Attendance
    <!-- <small>it all starts here</small> -->
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-calendar-check-o"></i> Attendance</a></li>
    <li class="active">Attendance history</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Employee's Attendance History</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <form action="<?php echo base_url() ?>attendance/history" method="post">
        <label>Date: </label>
        <table width="100%">
          <td width="40%">
            <div class="form-group">
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="datepicker-from" name="date_from" placeholder="From">
              </div>
            </div>
          </td>
          <td width="1%"></td>
          <td width="40%">
            <div class="form-group">
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="datepicker-to" name="date_to" placeholder="To">
              </div>
            </div>
          </td>
          <td width="1%"></td>
          <td width="18%">
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block">filter</button>
            </div>
          </td>
        </table>
      </form>
      <br>
      <p><?php echo $this->session->flashdata('msg');?></p>
      <br>
      <table id="data-table" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Time in</th>
            <th>Latitude in</th>
            <th>Longitude in</th>
            <th>Time out</th>
            <th>Latitude out</th>
            <th>Longitude out</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; if($histories) foreach($histories as $history){ ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php $in = new DateTime($history->time_in); echo $in->format('d/m/y H:i'); ?></td>
            <td><?php echo $history->latitude_in; ?></td>
            <td><?php echo $history->longitude_in; ?></td>
            <td><?php if($history->time_out){$out = new DateTime($history->time_out); echo $out->format('d/m/y H:i');} ?></td>
            <td><?php echo $history->latitude_out; ?></td>
            <td><?php echo $history->longitude_out; ?></td>
          </tr>
          <?php } ?>
        </tbody>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Time in</th>
            <th>Latitude in</th>
            <th>Longitude in</th>
            <th>Time out</th>
            <th>Latitude out</th>
            <th>Longitude out</th>
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
