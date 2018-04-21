<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="#" type="image/ico" />
<title>Designerios</title>

<!-- Bootstrap -->
<link href="<?= $this->config->item('base_url') ?>/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="<?= $this->config->item('base_url') ?>/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!-- NProgress -->
<link href="<?= $this->config->item('base_url') ?>/assets/vendors/nprogress/nprogress.css" rel="stylesheet">
<!-- iCheck -->
<link href="<?= $this->config->item('base_url') ?>/assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

<!-- bootstrap-progressbar -->
<link href="<?= $this->config->item('base_url') ?>/assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
<!-- JQVMap -->
<link href="<?= $this->config->item('base_url') ?>/assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
<!-- bootstrap-daterangepicker -->
<link href="<?= $this->config->item('base_url') ?>/assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

<!-- Custom Theme Style -->
<link href="<?= $this->config->item('base_url') ?>/assets/build/css/custom.min.css" rel="stylesheet">

<script src="<?= $this->config->item('base_url') ?>/assets/jquery.js"></script>
<script src="<?= $this->config->item('base_url') ?>/assets/handlebars-v3.0.3.js"></script>
<script src="<?= $this->config->item('base_url') ?>/assets/typeahead.bundle.js"></script>
</head>

<body class="nav-md">
<div class="container body">
  <div class="main_container">
    <div class="col-md-3 left_col">
      <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;"> <a href="index.html" class="site_title"><img src="<?= $this->config->item('base_url') ?>/assets/production/images/logo.png" class="img-responsive"></a> </div>
        <div class="clearfix"></div>
        
        <!-- menu profile quick info -->
        <div class="profile clearfix">
          <div class="profile_pic"> <img src="<?= $this->config->item('base_url') ?>/assets/production/images/img.jpg" alt="..." class="img-circle profile_img"> </div>
          <div class="profile_info"> <span>Welcome,</span>
            <h2>John Doe</h2>
          </div>
        </div>
        <!-- /menu profile quick info --> 
        
        <br />
        
        <!-- sidebar menu --> <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
            <ul class="nav side-menu">
              <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home </a> </li>
                     <li><a href="<?php echo base_url();?>index.php/admin/user"><i class="fa fa-lock" aria-hidden="true"></i> Admin/Role</a> </li>
                   
                     <li><a href="<?php echo base_url();?>index.php/admin/vessel"><i class="fa fa-ship" aria-hidden="true"></i>Vessels</a> </li>
                    <li><a href="<?php echo base_url();?>index.php/admin/company"><i class="fa fa-building" aria-hidden="true"></i>Company</a> </li>
            </ul>
          </div>
        </div>
        <!-- /sidebar menu --> 
        
        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small"> <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo base_url();?>index.php/admin/user/login"> <span class="glyphicon glyphicon-off" aria-hidden="true"></span> </a> </div>
        <!-- /menu footer buttons --> 
      </div>
    </div>
    
    <!-- top navigation -->
    <div class="top_nav">
      <div class="nav_menu">
        <nav>
          <div class="nav toggle"> <a id="menu_toggle"><i class="fa fa-bars"></i></a> </div>
          <ul class="nav navbar-nav navbar-right">
						<?php $user = $this->session->userdata('user');?>
            <li class=""> <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <img src="<?= $this->config->item('base_url') ?>/assets/production/images/img.jpg" alt=""><?php echo $user['username'];?> <span class=" fa fa-angle-down"></span> </a>
              <ul class="dropdown-menu dropdown-usermenu pull-right">
                <li><a href="javascript:;"> Profile</a></li>
                <li><a href="<?php echo base_url();?>index.php/admin/user/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
				 <li><a href="#">Admin and Role</a></li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <!-- /top navigation -->