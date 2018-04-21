 <!-- page content -->
    <div class="right_col" role="main">
     
        <div class="page-title ">
          <div class="title_left">
            <h3>Details</h3>
          </div>
          
        </div>
        
        <div class="clearfix"></div>
        
         <div class="img-thumbnail">
		 <div class="col-md-12">
        <div class="image-details">
          
        <div class="col-md-6">
            	<div class="image-test img-thumbnail">
                	<img src="<?php echo $vessel_data['image1']; ?>" onerror="this.src='http://root.lyndonmarine.com/LyndonMarineImages/no_image.png'" class="img-responsive">
                </div>
            </div>
            <?php //echo "<pre>";print_r($vessel_data);?>
            <div class="col-md-6">
            	<div class="image-test-text">
                	<h2>Vessel <?php echo $vessel_data['vessel_name']; ?>, IMO No. <?php echo $vessel_data['imo_number']; ?>, Class No. <?php echo $vessel_data['class_no']; ?></h2><hr>
                    <ul>
					<li> Vessel Name:	<span><?php echo $vessel_data['vessel_name']; ?></span></li>
					<li>Agency:	<span><?php echo $vessel_data['agency']; ?></span></li>
					<li>IMO Number:	<span><?php echo $vessel_data['imo_number']; ?></span></li>
					<li>Owner Name:	<span><?php echo $vessel_data['owner_name']; ?></span></li>
                    <li>Owner Email:	<span><?php echo $vessel_data['owner_email']; ?></span></li>
                    <li>Owner Address:	<span><?php echo $vessel_data['owner_address']; ?></span></li>
                    <li>Manager: <span><?php echo $vessel_data['manager_name']; ?></span></li>
					<li>Assigned Vessels: <span><?php echo $vessel_data['class_no']; ?></span></li>
                    </ul>
                </div>
            </div> 
    
        </div>
        </div>
        <div class="clearfix"></div>
        	
        <div class="work-done">

    	
     
        	<div class="col-md-12">
            	<h2 class="main-heading">Vessel Information Details</h2>
            </div>
         
         
    		<div class="work-done-text">
            	<div class="col-md-4">
                 	<div class="done-text">
                    	<a href="<?php echo base_url();?>index.php/admin/vessel_certificate/index"><img src="<?= $this->config->item('base_url') ?>/assets/production/images/icon/Certificates.png" class="img-responsive"></a>
                        <h3>Certificates
</h3>
                 
                    
                    </div>	
            	</div>
                <div class="col-md-4">
                 	<div class="done-text">
                    	<a href="<?php echo base_url();?>index.php/admin/vessel_recommendations/index"><img src="<?= $this->config->item('base_url') ?>/assets/production/images/icon/Recommendation.png" class="img-responsive"></a>
                        <h3>Recommendations
</h3>
                 
                    
                    </div>	
            	</div>
                <div class="col-md-4">
                 	<div class="done-text">
                    	<a href="<?php echo base_url();?>index.php/admin/vessel_plans/index"><img src="<?= $this->config->item('base_url') ?>/assets/production/images/icon/Plans.png" class="img-responsive"></a>
                        <h3>Plans & Manuals
</h3>
                        
                    
                    </div>	
            	</div>
                
            </div>
	
</div>
        
        </div>
        
      
    </div>
    <!-- /page content --> 