<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Lyndon Marine</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>style.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>bower_components/css/font.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>bower_components/owl.carousel/dist/assets/owl.carousel.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>bower_components/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>responsive.css">

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script src="//cdn.ckeditor.com/4.5.9/standard/ckeditor.js"></script>
</head> 
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
      <a class="navbar-brand" href="<?php echo base_url();?>index.php/AllVessels/user_vessel/<?php $user_id = $this->session->userdata('user_id');echo $user_id; ?>"><img src="<?php echo base_url(); ?>img/logo.png" ></a> </div>
   		 <ul class="nav navbar-nav navbar-right">
                
                
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php $user_id = $this->session->userdata('email'); echo $user_id;?><b class="caret"></b></a>
              
                    <ul class="dropdown-menu">
                         	<p>User Menu Options</p>
                         <li><a href="<?php echo base_url(); ?>index.php/Profile/index"><i class="fa fa-user"></i>&nbsp; My Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url(); ?>index.php/Logout/index"><i class="fa fa-key"></i>&nbsp; Logout</a></li>
                    </ul>
                </li>
            </ul>
    <!--/.navbar-collapse --> 
  </div>
</nav>