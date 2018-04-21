<!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Edit User</h3>
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
        
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Image<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="pic" accept="image/*" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required class="form-control col-md-7 col-xs-12" value = "<?php echo $result['email'];?>" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">First Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="last-name" required class="form-control col-md-7 col-xs-12" value = "<?php echo $result['first_name'];?>" placeholder="First Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Surname</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text"  value = "<?php echo $result['last_name'];?>" name="middle-name" placeholder="Surname">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Organisation</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" value = "<?php echo $result['organization'];?>"  placeholder="Organisation">
                          </div>
                          </div>
                          
                          <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Phone No.</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name"  value = "<?php echo $result['telephone'];?>" placeholder="Phone No.">
                        </div>
                           </div>
                          <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Address</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name"  value = "<?php echo $result['address'];?>" placeholder="Address">
                        </div>
                         </div>
                        
                         <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">City</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name"  value = "<?php echo $result['city'];?>" placeholder="City">
                        </div>
                         </div>
                         <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Country</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" value = "<?php echo $result['country'];?>"  placeholder="Country">
                        </div>
                         </div>
                         
                              
                     

                            <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Note</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name"  value = "<?php echo $result['note'];?>" placeholder="Note">
                        </div>
                         </div>
                     

<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12">Select</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<select class="form-control col-md-7 col-xs-12">
<option>Choose option</option>
<option>User1</option>
<option>User2</option>
<option>Admin</option>
<option>Staffr</option>
</select>
</div>
</div>
                      </div>
                      
                      
                      
                   
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          
                          <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                      </div>

                    </form>
                  </div>
                      </div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
    <!-- /page content --> 