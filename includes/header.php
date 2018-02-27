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
<!--<link rel="stylesheet" href="<?php echo base_url(); ?>bower_components/css/font.css">-->
<link rel="stylesheet" href="<?php echo base_url(); ?>bower_components/font-awesome/css/font-awesome.min.css">

<link rel="stylesheet" href="<?php echo base_url(); ?>responsive.css">
<link rel="icon" href="<?php echo base_url(); ?>img/favicon.ico" type="image/x-icon" />
</head>	
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
      <a class="navbar-brand" style="margin-top:7px" href="<?php echo base_url();?>"><img src="<?php echo base_url(); ?>img/logo@1x.png" ></a> </div>
    <div id="navbar" class="navbar-collapse collapse text-right">
    
      <form class="navbar-form navbar-right" method="post" action="<?php echo base_url(); ?>index.php/Login/index" enctype="multipart/form-data">
        <div class="form-group">
          <input type="text" placeholder="Email" name="email" id="email" class="form-control-text-on" required>
        </div> 
        <div class="form-group">
          <input type="password" placeholder="Password" class="form-control-text-on" name="password" required>
        </div>
        <button type="submit" class="btn btn-success-white">Login</button>
        
      </form>
   
    </div> 	<div id="navbar" class="text-right forget"><a href="<?php echo base_url(); ?>index.php/Forgot/index" > Forgot your Password?</a></div>
      
    <!--/.navbar-collapse --> 
  </div>
</nav>