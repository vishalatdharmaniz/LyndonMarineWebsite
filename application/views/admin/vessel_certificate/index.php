<!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Vessel Certificates</h3>
          </div>
          <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                <button class="btn btn-default" type="button">Go!</button>
                </span> 
                 </div>
                 <div class="main-edit-add"> <a class="btn-blue" href="<?php echo base_url();?>index.php/admin/vessel_certificate/add">Add</a> </div>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
          
            <div class="x_content">
              <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Certificate No.</th>
                <th>Certificate Name</th>
                <th>Certificate Type</th>
                <th>Date of Issue</th>
                <th>Date of Expiry</th>
                <th>Extension until</th>
                <th>Examption</th>
                <th class="text-center">View Documents</th>
                 <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>3425235</td>
                <td>Loadline</td>
                <td>Class</td>
                <td>5/14/2017</td>
                <td>12/20/2017</td>
                <td>N/A</td>
                 <td>N/A</td>
                <td class="text-center"><a href="<?php echo base_url();?>index.php/admin/vessel/view/<?php echo 1;?>" class="btn btn-primary">Click to View</td>
                <td><button type="button" class="update text-center btn btn-warning btn-sm"></button></td>
              </tr>
               <tr>
                <td>CM-HWR 2015</td>
                <td>Registry</td>
                <td>Flag</td>
                <td>5/14/2017</td>
                <td>12/20/2018</td>
                <td>N/A</td>
                 <td>Less than 500 GT</td>
                <td class="text-center"><a href="<?php echo base_url();?>index.php/admin/vessel/view/<?php echo 1;?>" class="btn btn-primary">Click to View</td>
                  <td><button type="button" class="update text-center btn btn-primary btn-sm"></button></td>
              </tr>
               <tr>
                <td>3425235</td>
                <td>Loadline</td>
                <td>Class</td>
                <td>5/14/2017</td>
                <td>12/20/2017</td>
                <td>N/A</td>
                 <td>N/A</td>
                <td class="text-center"><a href="<?php echo base_url();?>index.php/admin/vessel/view/<?php echo 1;?>" class="btn btn-primary">Click to View</td>
                  <td><button type="button" class="update text-center btn btn-success btn-sm"></button></td>
              </tr>
             <tr>
                <td>CM-HWR 2015</td>
                <td>Registry</td>
                <td>Flag</td>
                <td>5/14/2017</td>
                <td>12/20/2018</td>
                <td>N/A</td>
                 <td>Less than 500 GT</td>
                <td class="text-center"><a href="<?php echo base_url();?>index.php/admin/vessel/view/<?php echo 1;?>" class="btn btn-primary">Click to View</td>
                  <td><button type="button" class="update text-center btn btn-danger btn-sm"></button></td>
              </tr>
              
            </tbody>
          </table>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
        
        <div class="row">
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
           
            <tbody>
              <tr>
                <td><button type="button" class="update text-center btn btn-warning btn-sm"></button></td>
                <td>Due in 45 days</td>
               
              </tr>
                <tr>
                <td><button type="button" class="update text-center btn btn-primary btn-sm"></button></td>
                <td>Due in 30 days</td>
               
              </tr>
                <tr>
                <td><button type="button" class="update text-center btn btn-success btn-sm"></button></td>
                <td>Due Now or Overdue</td>
               
              </tr>
              <tr>
                <td><button type="button" class="update text-center btn btn-danger btn-sm"></button></td>
                <td>Valid More than 45 day</td>
               
              </tr>
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
      </div>
    </div>
    <!-- /page content -->