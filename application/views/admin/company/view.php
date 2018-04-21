<!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Company	</h3>
          </div>
          <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                <button class="btn btn-default" type="button">Go!</button>
                </span> </div>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="left-add"> <a href="company-edit.html" class="btn btn-primary">Add</a> </div>
            <div class="x_content">
              <table width="100%" class="table">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Vessel Name</th>
                    <th>Agency</th>
                    <th>IMO Number</th>
                    <th>Owner Name</th>
                    <th>Owner Email</th>
                    
                    <th>Owner address</th>
                    <th>Manager address</th>
                    <th>Flag</th>
                  
                   <th>Assigned Vessels</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td> Farah Express</td>
                    <td>Zakaria Jawhar</td>
                    <td>112232</td>
                   
                    <td>0123456789</td>
                    <td>0123456789</td>
                    <td>Loram lpsum</td>
                    <td>Loram lpsum</td>
         
                    <td>China</td>
                    <td>jaohar</td>
                    <td><img src="<?= $this->config->item('base_url') ?>assets/production/images/com.jpg" width="100" height="80"></td>
                    <td class=" last"><a href="<?php echo base_url();?>/index.php/admin/company/edit" class="btn btn-success">Edit</a></td>
                  </tr>
                   <tr>
                    <th scope="row">2</th>
                    <td> Farah Express</td>
                    <td>Zakaria Jawhar</td>
                    <td>112232</td>
                   
                    <td>0123456789</td>
                    <td>0123456789</td>
                    <td>Loram lpsum</td>
                 
                    <td>China</td>
                    <td>China</td>
                    <td>dharmani apps</td>
                   <td><img src="<?= $this->config->item('base_url') ?>assets/production/images/com.jpg" width="100" height="80"></td>
                              <td class=" last"><a href="company-edit.html" class="btn btn-success">Edit</a></td>
                  </tr>
                   <tr>
                    <th scope="row">3</th>
                    <td> Farah Express</td>
                    <td>Zakaria Jawhar</td>
                    
                    <td>Johan smith</td>
                    <td>0123456789</td>
                    <td>0123456789</td>
                    <td>Loram lpsum</td>
              
                    <td>China</td>
                    <td>China</td>
                    <td>jaohar</td>
                   <td><img src="<?= $this->config->item('base_url') ?>assets/production/images/com.jpg" width="100" height="80"></td>
                              <td class=" last"><a href="company-edit.html" class="btn btn-success">Edit</a></td>
                  </tr>
                   <tr>
                    <th scope="row">4</th>
                    <td> Farah Express</td>
                    <td>Zakaria Jawhar</td>
                    <td>112232</td>
                    
                    <td>0123456789</td>
                    <td>0123456789</td>
                    <td>Loram lpsum</td>
       
                    <td>China</td>
                    <td>China</td>
                    <td>dharmani apps</td>
                 <td><img src="<?= $this->config->item('base_url') ?>assets/production/images/com.jpg" width="100" height="80"></td>
                              <td class=" last"><a href="company-edit.html" class="btn btn-success">Edit</a></td>
                  </tr>
                 
                </tbody>
              </table>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
    <!-- /page content -->