<!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Company	</h3>
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
          <div class="left-add"> <a href="<?php echo base_url();?>index.php/admin/company/add" class="btn btn-primary">Add Company</a> </div>
		  
          </div>
    	</div>
      
         <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
          
          		<div class="company_info">
					<?php
					if(!empty($result)){
					foreach($result as $key => $value){?>
                	<div class="col-md-3 card img-thumbnail center1">
                    	<a href="#" >
                    		<div class="#" style="margin-bottom:10px;">
                            	<img src="<?= $this->config->item('base_url') ?>/assets/production/images/com.jpg" class="img-responsive" alt="">
                            </div>                       
                            	<h2><?php echo $value['name']; ?></h2> <hr>							                        
                            </a>
							<a href="<?php echo base_url();?>index.php/admin/company/accept_request/<?php echo $value['id']; ?>"><button class="btn btn-primary icon-links center1" data-toggle="tooltip" title="Accept"> <span class="glyphicon glyphicon-ok"></span></button></a>
							<a href="<?php echo base_url();?>index.php/admin/company/reject_request/<?php echo $value['id']; ?>"><button class="btn btn-primary icon-links center1" data-toggle="tooltip" title="Reject "> <span class="glyphicon glyphicon-remove"></span></button></a>
							<a href="#"><button  data-toggle="tooltip" title="View " class="btn btn-primary icon-links center1"> <span class="glyphicon glyphicon-eye-open"></span></button></a>
															
                    </div> 
                <?php }}else{?>
				NO PENDING REQUEST'S
				<?php }?>
                </div>
          </div>
          <div class="clearfix"></div>
		  <div class="row">
          <div class="col-md-12">
            <div class="text-center"> <?php echo $this->pagination->create_links(); ?> </div>
          </div>
        </div> 
        </div>
      </div>
    </div>
    <!-- /page content -->