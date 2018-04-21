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


<link rel="icon" href="<?php echo base_url(); ?>img/icon.png" type="image/x-icon" />

<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script type="text/javascript" src="http://cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script src="http://cdn.ckeditor.com/4.5.9/standard/ckeditor.js"></script>
</head> 
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
  <div class="row">
  <div class="col-md-12">
    <div class=" col-md-6 navbar-header">
       <a class="navbar-brand" style="margin-top:7px" href="<?php echo base_url();?>index.php/AllVessels/user_vessel/<?php $user_id = $this->session->userdata('user_id');echo $user_id; ?>"><img src="<?php echo base_url(); ?>img/logo@1x.png" ></a> 
	   </div>
	   <div class="col-md-6" style="text-align:right; margin-top:25px;">
   		 <ul class="navbar-right">
                            
                <li class="dropdown" style="margin-top:20px"><a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:white;"><?php $user_id = $this->session->userdata('email'); echo $user_id;?><b class="caret"></b></a>
              
                    <ul class="dropdown-menu">
                         	<p>User Menu Options</p>
                         <li><a href="<?php echo base_url(); ?>index.php/Profile/index"><i class="fa fa-user"></i>&nbsp; My Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url(); ?>index.php/Logout/index"><i class="fa fa-key"></i>&nbsp; Logout</a></li>
                    </ul>
                </li>
            </ul></div>
			</div>
        </div>
	 </div>
</nav>
