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
        <div class="main-edit-add"> <a class="btn-blue" href="<?php echo base_url();?>index.php/VesselCertificate/index/<?php echo $vessel_id; ?>">Go Back</a> </div>       
      </div>
      <div class="col-md-offset-1 col-md-6">
        <div class="page-heading">
          <h2>View Certificate</h2>
        </div>
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

              <thead>
                
              </thead>
              <tbody>
                <tr>
                  <th width="40%">Certificate No</th>
                  <th width="60%"><?php echo $certificate_data['certificate_no']; ?></th>
                
                </tr>
                <tr>
                  <th scope="row">Certificate Name</th>
                  <td><?php echo $certificate_data['certificate_name']; ?></td>
                </tr>
                <tr>
                  <th scope="row">Certificate Type</th>
                  <td><?php echo ucwords($certificate_data['certificate_type']); ?></td>  
                </tr>
                <tr>
                  <th scope="row">Date of Issue</th>
                  <td><?php echo date("d/m/Y",strtotime($certificate_data['date_issue'])); ?></td>
                </tr>
                <tr>
                  <th scope="row">Date of Expiry</th>
                  <td><?php echo date("d/m/Y",strtotime($certificate_data['date_expiry'])); ?></td> 
                </tr>
                 <tr>
                   <th scope="row">Extention until</th>
                  <td><?php echo (($certificate_data['extention_until']) ? date("d/m/Y",strtotime($certificate_data['extention_until'])) : 'N/A');?></td>
                  
                </tr>
                 <tr>
                   <th scope="row">Reminder 1</th>
                   <td><?php echo $certificate_data['reminder1']." days"; ?></td>
                  </tr>
                  <tr>
                  <th scope="row">Reminder 2</th>
                  <td><?php echo $certificate_data['reminder2']." days"; ?></td> 
                </tr>
                <tr>
                  <th scope="row">Exemption</th>
                  <td><?php echo ($certificate_data['examption'] ? $certificate_data['examption'] : 'N/A'); ?></td> 
                </tr>
                 <tr>
                   <th scope="row">Comments</th>
                  <td><?php echo $certificate_data['comments']; ?></td> 
                </tr>
                <!--<tr>
                  <th scope="row">Document 1</th>
                    <td>
                      <a href="<?php echo $certificate_data['document1']; ?>" class="btn btn-primary"> View</a>&nbsp;
                      <?php if(!empty($certificate_data['document1'])) {?>
                      <span><?php $value = explode("/",$certificate_data['document1']);echo substr($value[6],0,20); ?></span>
                      <?php } 
                      else { ?>
                      <span> No Document Available </span>
                      <?php } ?>
                    </td>
                </tr>-->
                <!--<tr>
                  <th scope="row">Document 2</th>
                    <td>
                      <a href="<?php echo $certificate_data['document2']; ?>" class="btn btn-primary"> View</a>&nbsp;
                      <?php if(!empty($certificate_data['document2'])) {?>
                      <span><?php $value = explode("/",$certificate_data['document2']);echo substr($value[6],0,20); ?></span>
                      <?php } 
                      else { ?>
                      <span> No Document Available </span>
                      <?php } ?>
                    </td>
                </tr>-->
                <!--<tr>
                  <th scope="row">Document 3</th>
                    <td>
                      <a href="<?php echo $certificate_data['document3']; ?>" class="btn btn-primary"> View</a>&nbsp;
                      <?php if(!empty($certificate_data['document3'])) {?>
                      <span><?php $value = explode("/",$certificate_data['document3']);echo substr($value[6],0,10); ?></span>
                      <?php } 
                      else { ?>
                      <span> No Document Available </span>
                      <?php } ?>
                    </td>
                </tr>-->
                <!--<tr>
                  <th scope="row">Document 4</th>
                    <td>
                      <a href="<?php echo $certificate_data['document4']; ?>" class="btn btn-primary"> View</a>&nbsp;
                      <?php if(!empty($certificate_data['document4'])) {?>
                      <span><?php $value = explode("/",$certificate_data['document4']);echo substr($value[6],0,10); ?></span>
                      <?php } 
                      else { ?>
                      <span> No Document Available </span>
                      <?php } ?>
                    </td>
                </tr>-->
                <!--<tr>
                  <th scope="row">Document 5</th>
                    <td>
                      <a href="<?php echo $certificate_data['document5']; ?>" class="btn btn-primary"> View</a>&nbsp;
                      <?php if(!empty($certificate_data['document5'])) {?>
                      <span><?php $value = explode("/",$certificate_data['document5']);echo substr($value[6],0,10); ?></span>
                      <?php } 
                      else { ?>
                      <span> No Document Available </span>
                      <?php } ?>
                    </td>
                </tr>-->
                </tbody>
               
              </table>
            </div>
          
            <div class="row">
            	<div class="doc-img">
                	<ul>
                    	<li>
                      <?php if(!empty($certificate_data['document1'])) {?>
                      <a href="<?php echo $certificate_data['document1']; ?>" target="_blank"><img src="http://via.placeholder.com/100x100" class="img-responsive"> </a><br>
                      <span><?php $value = explode("/",$certificate_data['document1']);echo substr($value[6],0,20); ?></span>
                      <?php } 
                      else { ?>
                     <!-- <span> No Document Available </span>-->
                      <?php } ?></li>
                      
                      <li>
                      <?php if(!empty($certificate_data['document2'])) {?>
                      <a href="<?php echo $certificate_data['document2']; ?>" target="_blank"><img src="http://via.placeholder.com/100x100" class="img-responsive"> </a><br>
                      <span><?php $value = explode("/",$certificate_data['document2']);echo substr($value[6],0,20); ?></span>
                      <?php } 
                      else { ?>
                     <!-- <span> No Document Available </span>-->
                      <?php } ?></li>
                      
                      <li>
                      <?php if(!empty($certificate_data['document3'])) {?>
                      <a href="<?php echo $certificate_data['document3']; ?>" target="_blank"><img src="http://via.placeholder.com/100x100" class="img-responsive"> </a><br>
                      <span><?php $value = explode("/",$certificate_data['document3']);echo substr($value[6],0,10); ?></span>
                      <?php } 
                      else { ?>
                     <!-- <span> No Document Available </span>-->
                      <?php } ?></li>
                      
                        <li>
                      <?php if(!empty($certificate_data['document4'])) {?>
                      <a href="<?php echo $certificate_data['document4']; ?>" target="_blank"><img src="http://via.placeholder.com/100x100" class="img-responsive">  </a><br>
                      <span><?php $value = explode("/",$certificate_data['document4']);echo substr($value[6],0,10); ?></span>
                      <?php } 
                      else { ?>
                    <!--  <span> No Document Available </span>-->
                      <?php } ?></li>
                      
                        <li>
                      <?php if(!empty($certificate_data['document5'])) {?>
                      <a href="<?php echo $certificate_data['document5']; ?>" target="_blank"> <img src="http://via.placeholder.com/100x100" class="img-responsive"> </a><br>
                      <span><?php $value = explode("/",$certificate_data['document5']);echo substr($value[6],0,10); ?></span>
                      <?php } 
                      else { ?>
                  <!--    <span> No Document Available </span></li>-->
                      <?php } ?>
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
