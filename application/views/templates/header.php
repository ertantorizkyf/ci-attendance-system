<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Attendance System</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/adminlte/bower_components/Ionicons/css/ionicons.min.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/adminlte/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/adminlte/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url(); ?>main" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>S</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Attendance</b>System</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>

          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
              <!-- <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                    <li>
                      <ul class="menu">
                        <li>
                          <a href="#">
                            <div class="pull-left">
                              <img src="<?php echo base_url();?>assets/adminlte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                            </div>
                            <h4>
                              Support Team
                              <small><i class="fa fa-clock-o"></i> 5 mins</small>
                            </h4>
                            <p>Why not buy a new awesome theme?</p>
                          </a>
                        </li>
                      </ul>
                    </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li> -->
              <!-- Notifications: style can be found in dropdown.less -->
              <!-- <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li> -->
                  <!-- <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-flag-o"></i>
                      <span class="label label-danger">9</span>
                    </a>
                    <ul class="dropdown-menu">
                      <li class="header">You have 9 tasks</li>
                        <li>
                          <ul class="menu">
                            <li>
                              <a href="#">
                              <h3>
                                Design some buttons
                                <small class="pull-right">20%</small>
                              </h3>
                              <div class="progress xs">
                                <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                                aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                  <span class="sr-only">20% Complete</span>
                                </div>
                              </div>
                              </a>
                            </li>
                          </ul>
                        </li>
                        <li class="footer">
                        <a href="#">View all tasks</a>
                      </li>
                    </ul>
                  </li> -->
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <?php if($this->session->userdata('photo')!=""){ ?>
                  <img src="<?php echo $this->session->userdata('photo');?>" class="user-image" alt="User Image" style="max-height:25px; max-width:25px;">
                  <?php } else{?>
                  <img src="<?php echo base_url();?>assets/adminlte/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <?php }?>
                  <span class="hidden-xs"><?php echo $this->session->userdata('employee_no'); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <?php if($this->session->userdata('photo')!=""){ ?>
                    <img src="<?php echo $this->session->userdata('photo');?>" class="img-circle" alt="User Image" style="max-height:90px; max-width:90px;">
                    <?php } else{?>
                    <img src="<?php echo base_url();?>assets/adminlte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <?php }?>
                    <p>
                      <?php echo $this->session->userdata('employee_no'); ?> - <?php echo strtoupper($this->session->userdata('job_role')); ?>
                      <small>Joined <?php echo $this->session->userdata('joined'); ?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <!-- <li class="user-body">
                    <div class="row">
                      <div class="col-xs-4 text-center">
                        <a href="#">Followers</a>
                      </div>
                      <div class="col-xs-4 text-center">
                        <a href="#">Sales</a>
                      </div>
                      <div class="col-xs-4 text-center">
                        <a href="#">Friends</a>
                      </div>
                    </div>
                  </li> -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo base_url(); ?>employee/profile/me" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url();?>logout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <!-- PLACE TO PUT USER INFO -->
          <div class="user-panel">
            <div class="pull-left image">
              <?php if($this->session->userdata('photo')!=""){ ?>
              <img src="<?php echo $this->session->userdata('photo');?>" class="img-circle" alt="User Image" style="max-height:45px; max-width:45px;">
              <?php } else{?>
              <img src="<?php echo base_url();?>/assets/adminlte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
              <?php }?>
            </div>
            <div class="pull-left info">
              <p><?php echo $this->session->userdata('employee_no'); ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form> -->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">NAVIGATION</li>
            <li class="<?php if($this->session->userdata('navigation') == "dashboard") echo "active"; ?>">
              <a href="<?php echo base_url(); ?>main">
                <i class="fa fa-dashboard"></i> <span>Main Page</span>
              </a>
            </li>
            <li class="treeview <?php if($this->session->userdata('navigation') == "attendance") echo "active"; ?>">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Attendance</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>attendance/report"><i class="fa fa-circle-o"></i> Report attendance</a></li>
                <li><a href="<?php echo base_url();?>attendance/history"><i class="fa fa-circle-o"></i> View attendance history</a></li>
              </ul>
            </li>
            <?php if($this->session->userdata('privilege') == "admin"){ ?>
            <li class="treeview <?php if($this->session->userdata('navigation') == "employee") echo "active"; ?>">
              <a href="#">
                <i class="fa fa-users"></i> <span>Employee</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>employee/list"><i class="fa fa-circle-o"></i> Employee List</a></li>
                <li><a href="<?php echo base_url();?>employee/add"><i class="fa fa-circle-o"></i> Add New Employee</a></li>
              </ul>
            </li>
            <li class="treeview <?php if($this->session->userdata('navigation') == "role") echo "active"; ?>">
              <a href="#">
                <i class="fa fa-tag"></i> <span>Role</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>role/list"><i class="fa fa-circle-o"></i> Role List</a></li>
                <li><a href="<?php echo base_url();?>role/add"><i class="fa fa-circle-o"></i> Add New Role</a></li>
              </ul>
            </li>
            <li class="treeview <?php if($this->session->userdata('navigation') == "department") echo "active"; ?>">
              <a href="#">
                <i class="fa fa-building-o"></i> <span>Department</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>department/list"><i class="fa fa-circle-o"></i> Department List</a></li>
                <li><a href="<?php echo base_url();?>department/add"><i class="fa fa-circle-o"></i> Add New Department</a></li>
              </ul>
            </li>
            <?php } ?>
            <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
