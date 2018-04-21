<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Designer ios</title>

<!-- Bootstrap -->
<link href="<?= $this->config->item('base_url') ?>/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="<?= $this->config->item('base_url') ?>/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!-- NProgress -->
<link href="<?= $this->config->item('base_url') ?>/assets/vendors/nprogress/nprogress.css" rel="stylesheet">
<!-- Animate.css -->
<link href="<?= $this->config->item('base_url') ?>/assets/vendors/animate.css/animate.min.css" rel="stylesheet">

<!-- Custom Theme Style -->
<link href="<?= $this->config->item('base_url') ?>/assets/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
<div> <a class="hiddenanchor" id="signup"></a> <a class="hiddenanchor" id="signin"></a>
  <div class="login_wrapper">
    <div class="animate form login_form">
    
    	<div class="logo">
        	<img src="<?= $this->config->item('base_url') ?>/assets/production/images/logo.png" class="img-responsive">
        </div>
      <section class="login_content">
        <form method="post" action="<?php echo  $this->config->item('base_url')."/index.php/admin/user/login" ?>">
          <h1>Login </h1>
					<?php
					if(!empty($error)){?>
					<h4><?php echo $error; ?></h4>
					<?php }?>
          <div class="form-group">
            <input type="text" class="form-control" name = "username" placeholder="Username" required />
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name = "password" placeholder="Password" required />
          </div>
          <div class="form-group">
            <button class="btn btn-black submit" href="index.html">Log in</button>
          </div>
         
          <div class="clearfix"></div>
         
            <div class="clearfix"></div>
            <br />
            <div> </div>
          </div>
        </form>
      </section>
    </div>
    <div id="register" class="animate form registration_form">
    <div class="logo">
        	<img src="<?= $this->config->item('base_url') ?>/assets/production/images/logo.png" class="img-responsive">
        </div>
      <section class="login_content">
        <form>
          <h1>Create Account</h1>
          <div>
            <input type="text" class="form-control" placeholder="Username" required />
          </div>
          <div>
            <input type="email" class="form-control" placeholder="Email" required />
          </div>
          <div>
            <input type="password" class="form-control" placeholder="Password" required />
          </div>
          <div class="form-group">
            <button class="btn btn-black submit" href="index.html">Submit</button>
          </div>
          <div> </div>
          <div class="clearfix"></div>
          <div class="separator"> <a href="#signin" class="to_register"> Log in </a>
            <div class="clearfix"></div>
            <br />
            <div> </div>
          </div>
        </form>
      </section>
    </div>
  </div>
</div>
</body>
</html>
