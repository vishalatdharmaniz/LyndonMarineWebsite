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
          <h2>Add User</h2>
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
								
                    <form method="post" action="<?php echo base_url();?>index.php/AdminAndRoles/add_user/<?php echo $com_id; ?>" id="demo-form2" class="form-horizontal form-label-left" enctype="multipart/form-data">
				
				
											<div class="form-group">
                         <label for="image" class="control-label col-md-3 col-sm-3 col-xs-12" style="color:gray;padding-top:13px;padding-bottom:13px;"><b>Profile photo</b></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                             <input style="margin-top:0px; width:100%;" type="file" name="profile_pic" class="form-control col-md-7 col-xs-12" >
                          </div>
                      </div>
				
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" style="color:gray;color:gray;padding-top:13px;padding-bottom:13px;"><b>First Name</b><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input style="margin-top:0px; width:100%;" type="text" id="first_name" name="first_name" required  value="<?php echo set_value('fname'); ?>" class="form-control col-md-7 col-xs-12" placeholder="First Name">
                        </div>
                      </div>
                      
                         <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12" style="color:gray;color:gray;padding-top:13px;padding-bottom:13px;"><b>Last Name</b><span class="required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input style="margin-top:0px; width:100%;" id="middle-name" class="form-control col-md-7 col-xs-12" value="<?php echo set_value('last_name'); ?>" required type="text" name="last_name" placeholder="Last Name">
                              </div>
                           </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name" style="color:gray;color:gray;padding-top:13px;padding-bottom:13px;"><b>Job Description</b>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input style="margin-top:0px; width:100%;" type="text" id="last-name" name="job"  value="<?php echo set_value('job'); ?>" class="form-control col-md-7 col-xs-12"placeholder="Job Description">
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
														
						          <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12" style="color:gray;color:gray;padding-top:13px;padding-bottom:13px;"><b>Password</b><span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input style="margin-top:0px; width:100%;" id="middle-name" class="form-control col-md-7 col-xs-12" type="text" required value="<?php echo set_value('password'); ?>" name="password" placeholder="Password">
                        </div>
                           </div>
                         
												 
												 <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12" style="color:gray;color:gray;padding-top:13px;padding-bottom:13px;"><b>Role</b><span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select style="margin-top:0px; width:100%;" class="form-control col-md-7 col-xs-12" required name="role">
															<option value="" disabled <?php if(set_value('role')==""){ echo "selected=selected";} ?> >Choose option</option>
															<option value="2" <?php if(set_value('role')==2){ echo "selected=selected";} ?>  >Admin</option>
															<option value="3" <?php if(set_value('role')==3){ echo "selected=selected";} ?> >Staff</option>
															<option value="4" <?php if(set_value('role')==4){ echo "selected=selected";} ?> >User</option>
													</select>
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