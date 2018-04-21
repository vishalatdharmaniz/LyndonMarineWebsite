<!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Edit  Company User</h3>		
          </div>
          <!--<div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                <button class="btn btn-default" type="button">Go!</button>
                </span> </div>
            </div>
          </div>-->
        </div>
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
          		    <div class="x_panel">
            <div class="x_content">
										
										<?php echo validation_errors(); ?>
										
										
											<?php
											$url = base_url()."index.php/admin/company/add_company_user/".$result['id'];
											?>
											<?php echo form_open($url,array("id" => "demo-form2", "class"=> "form-horizontal form-label-left")); ?>
										
                    <!--<form method="post" action="<?php //echo base_url();?>index.php/admin/company/add_company_user/<?php //echo $company_id; ?>" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">-->
				
				
											<div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Profile photo</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="pic" accept="image/*" class="form-control col-md-7 col-xs-12" >
                        </div>
                           </div>
				
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first_name" name="fname" required  value="<?php echo set_value('fname',$result['first_name']); ?>" class="form-control col-md-7 col-xs-12" placeholder="First Name">
                        </div>
                      </div>
                      
                         <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Last Name<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" value="<?php echo set_value('last_name',$result['last_name']); ?>" required type="text" name="last_name" placeholder="Last Name">
                        </div>
                           </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Job Description
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="job"  value="<?php echo set_value('job',$result['job_desc']); ?>" class="form-control col-md-7 col-xs-12"placeholder="Job Description">
                        </div>
                      </div>
                      
                       <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">username<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" value="<?php echo set_value('username',$result['username']); ?>" required type="text" name="username" placeholder="Username">
                        </div>
                           </div>                         
                                                 
                            <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email Address<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" required type="text" name="email" value="<?php echo set_value('email',$result['email']); ?>" placeholder="Email Address">
                        </div>
                           </div>
														
						    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Password<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" required value="<?php echo set_value('password',$result['password']); ?>" name="password" placeholder="Password">
                        </div>
                           </div>
                         
												 
												 <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Role<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12" required name="role">
															<option value="" <?php if(set_value('role')==""|| $result['role']==""){ echo "selected=selected";} ?> >Choose option</option>
															<option value=2 <?php if(set_value('role')==2 || $result['role']==2){ echo "selected=selected";} ?>  >Admin</option>
															<option value=3 <?php if(set_value('role')==3 || $result['role']==3){ echo "selected=selected";} ?> >Staff</option>
															<option value=4 <?php if(set_value('role')==4 || $result['role']==4){ echo "selected=selected";} ?> >User</option>
													</select>
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
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
    <!-- /page content --> 