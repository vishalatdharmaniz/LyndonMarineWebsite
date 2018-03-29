<?php
include'includes/CheckUserLogin.php';
include'includes/header_login.php';
?>
<style>
  ul {
    display: flex;
  }
</style>
<section id="main-edit">
  <div class="container">
    <div class="row">
      <div class="col-md-2">
        <div class="main-edit-add"> <a class="btn-blue" href="<?php echo base_url();?>index.php/VesselPlans/index/<?php echo $vessel_id; ?>">Go Back</a> </div>       
      </div>
      <div class="col-md-offset-1 col-md-6">
        <div class="page-heading">
          <h2>View Plan </h2>
        </div>
      </div>
      <div class="col-md-2">
        <div class="main-edit-add"> <a class="btn-blue" href="<?php echo base_url();?>index.php/VesselPlans/edit_plan/<?php echo $plans_id; ?>">Edit</a> </div>       
      </div>
    </div>
  </div>
</section>
<section id="table-data">
<div class="container">
  
    <div class="row">
        
      <div class="col-md-10 col-md-offset-1">
        <div class="table-responsive">
        <table class="table table-bordered">
              <tbody>
                <tr>
                  <th width="40%">Plan No</th>
                  <th width="60%"><?php echo $vessel_plans['plan_no']; ?></th>
                
                </tr>
                <tr>
                  <th scope="row">Plan Name</th>
                  <td><?php echo $vessel_plans['plan_name']; ?></td>
                </tr>
                <tr>
                  <th scope="row">Description</th>
                  <td><?php echo $vessel_plans['description']; ?></td>  
                </tr>
                
              </tbody>
               
              </table>
            </div>
            <div class="row">
            	<div class="doc-img">
                	<ul>
                    	<li> 
                      <?php if(!empty($vessel_plans['upload_plan1'])) {?>
                      <a href="<?php echo $vessel_plans['upload_plan1']; ?>" target="_blank"><img src="http://via.placeholder.com/100x100" class="img-responsive"> </a><br>
                      <span><?php $value = explode("/",$vessel_plans['upload_plan1']);echo substr($value[8],0,20); ?></span>
                      <?php } 
                      else { ?>
                     <!-- <span> No Document Available </span>-->
                      <?php } ?></li>
                      
                      <li>
                      <?php if(!empty($vessel_plans['upload_plan2'])) {?>
                      <a href="<?php echo $vessel_plans['upload_plan2']; ?>" target="_blank"><img src="http://via.placeholder.com/100x100" class="img-responsive"> </a><br>
                      <span><?php $value = explode("/",$vessel_plans['upload_plan2']);echo substr($value[8],0,20); ?></span>
                      <?php } 
                      else { ?>
                     <!-- <span> No Document Available </span>-->
                      <?php } ?></li> 
                	</ul>
            	</div>	
            </div>
            
            </div>
    </div>
  </div>
</section>

<?php
include'includes/footer.php';
?>
