<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Attendance
    <!-- <small>it all starts here</small> -->
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-calendar-check-o"></i> Attendance</a></li>
    <li class="active">Attendance form</li>
  </ol>
</section>
<!-- Main content -->
<section class="content col-lg-4"></section>
<section class="content col-lg-4">
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Attendance Form</h3>
      <!-- <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
        title="Collapse">
        <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fa fa-times"></i></button>
      </div> -->
    </div>
    <form action="<?php echo base_url();?>attendance/attendance_process" method="post">
      <div class="box-body">
        <div class="form-group">
          <input type="text" class="form-control" id="current-time" readonly>
          <input type="hidden" class="form-control" name="time">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="latitude" readonly>
          <input type="hidden" class="form-control" name="latitude" id="lat">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="longitude" readonly>
          <input type="hidden" class="form-control" name="longitude" id="long">
        </div>
        <!-- <div class="form-group">
          <textarea class="form-control" placeholder="Notes" name="notes" rows="3"></textarea>
        </div> -->
        <p class="text-center"><?php echo $this->session->flashdata('msg');?></p>
        <p id="error"></p>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <table width="100%">
          <td>
            <button type="submit" class="btn btn-primary btn-block" name="button_click" value="in">In</button>
          </td>
          <td width="1%"></td>
          <td>
            <button type="submit" class="btn btn-primary btn-block" name="button_click" value="out">Out</button>
          </td>
        </table>
      </div>
    </form>
    <!-- /.box-footer-->
  </div>
  <!-- /.box -->
</section>
<section class="content col-lg-4"></section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
  function getServerTime() {
    return $.ajax({async: false}).getResponseHeader( 'Date' );
  }

  function updateClock()
  {
    var currentTime_view = document.getElementById("current-time");
    var currentTime = new Date(getServerTime());
    var currentYears = currentTime.getFullYear ( );
    var currentMonths = currentTime.getMonth ( )+1;
    var currentDays = currentTime.getDate ( );
    var currentHours = currentTime.getHours ( );
    var currentMinutes = currentTime.getMinutes ( );
    var currentSeconds = currentTime.getSeconds ( );

    // Pad the minutes and seconds with leading zeros, if required
    currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
    currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;
    // Choose either "AM" or "PM" as appropriate
    var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";
    // Convert the hours component to 12-hour format if needed
    currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;
    // Convert an hours component of "0" to "12"
    currentHours = ( currentHours == 0 ) ? 12 : currentHours;
    // Compose the string for display
    var currentTimeString = currentYears + '-' + currentMonths + '-' + currentDays + ' ' + currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;

    // $("#current-time").value(currentTimeString);
    currentTime_view.value = currentTimeString;
  }

  $(document).ready(function()
  {
     setInterval('updateClock()', 1000);
  });


  var error_message = document.getElementById("error");
  var lat_view = document.getElementById("latitude");
  var lat_val = document.getElementById("lat");
  var long_view = document.getElementById("longitude");
  var long_val = document.getElementById("long");

  function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
      error_message.innerHTML = "Geolocation is not supported by this browser";
    }
  }
  function showPosition(position) {
    lat_view.value = "Latitude: " + position.coords.latitude;
    long_view.value = "Longitude: " + position.coords.longitude;
    lat_val.value = position.coords.latitude;
    long_val.value = position.coords.longitude;
  }

  function showError(error) {
    switch(error.code) {
      case error.PERMISSION_DENIED:
        error_message.innerHTML = "User denied the request for Geolocation"
        break;
      case error.POSITION_UNAVAILABLE:
        error_message.innerHTML = "Location information is unavailable"
        break;
      case error.TIMEOUT:
        error_message.innerHTML = "The request to get user location timed out"
        break;
      case error.UNKNOWN_ERROR:
        error_message.innerHTML = "An unknown error occurred."
        break;
    }
  }
  setInterval(getLocation(),5000);
</script>
