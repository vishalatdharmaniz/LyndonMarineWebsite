<?php
include'includes/CheckUserLogin.php';
include'includes/header_login.php';
?>

<style>
  #errmsg
{
color: red;
}
</style>
<section id="main-edit">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
          <h2>Edit Company Profile</h2>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="main-editone"  style="padding-top:40px;">
  <div class="container">
    <div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
          		    <div class="x_panel">
            <div class="x_content">
										
										<?php echo validation_errors(); ?>
										
										
                    <form method="post" action="<?php echo base_url();?>index.php/EditCompanyProfile/edit/<?php $company_id; ?>" id="demo-form2" class="form-horizontal form-label-left">
				
				
											<div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12" style="color:gray;padding-top:13px;padding-bottom:13px;"><b>Profile photo</b></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input style="margin-top:0px; width:100%;" type="file" name="profile_pic" accept="image/*" class="form-control col-md-7 col-xs-12" >
                        </div>
                           </div>
				
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" style="color:gray;color:gray;padding-top:13px;padding-bottom:13px;"><b>Username</b><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input style="margin-top:0px; width:100%;" type="text" id="username" name="username" required  value="<?php echo set_value('username'); ?>" class="form-control col-md-7 col-xs-12" placeholder="First Name">
                        </div>
                      </div>
                      
                         <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12" style="color:gray;color:gray;padding-top:13px;padding-bottom:13px;"><b>Organization</b><span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input style="margin-top:0px; width:100%;" id="middle-name" class="form-control col-md-7 col-xs-12" value="<?php echo set_value('organization'); ?>" required type="text" name="organization" placeholder="Last Name">
                        </div>
                           </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name" style="color:gray;color:gray;padding-top:13px;padding-bottom:13px;"><b>Address</b>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input style="margin-top:0px; width:100%;" type="text" id="address" name="address"  value="<?php echo set_value('address'); ?>" class="form-control col-md-7 col-xs-12" placeholder="Address">
                        </div>
                      </div>
                      
                       <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12" style="color:gray;color:gray;padding-top:13px;padding-bottom:13px;"><b>username</b><span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input style="margin-top:0px; width:100%;" id="middle-name" class="form-control col-md-7 col-xs-12" value="<?php echo set_value('username'); ?>" required type="text" name="username" placeholder="Username">
                        </div>
                           </div>                         
                                                 
                            <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12" style="color:gray;color:gray;padding-top:13px;padding-bottom:13px;"><b>Email Address</b><span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  style="margin-top:0px; width:100%;" id="middle-name" class="form-control col-md-7 col-xs-12" required type="text" name="email" value="<?php echo set_value('email'); ?>" placeholder="Email Address">
                        </div>
                           </div>
												 
                      </div>
                     
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
                          
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                     
    </div>
                    </form>
                  </div> </div>
    </div>
  </div>
</section>
<?php
include'includes/footer.php';
?>