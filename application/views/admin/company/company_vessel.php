<!-- page content -->
    
	  <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Assigned Vessels</h3>
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
            <div class="img-hover">
			<!--<div class="left-add"> <a href="<?php echo base_url();?>index.php/admin/vessel/add" class="btn btn-primary">Add</a> </div>-->
             <div class="clearfix"></div>
						 <?php if(!empty($result)){
						$count = 0;
						foreach($result as $key => $value){
							$count ++;
						?>
			 <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                <div class="card img-thumbnail">
					<?php $image_name = $value['image1'] ?>
							<img class="img-responsive" src="<?php echo $image_name; ?>" onerror="this.src='http://root.lyndonmarine.com/LyndonMarineImages/no_image.png'" style="height: 118px;width: 152px;" alt="">
					<div class="card-body">
							<div style="padding-left:6px;"> 
							<h6><p><b> Vessel Name :</b> <?php echo $value['vessel_name']; ?></p>
							<p><b> IMO Number :</b> <?php echo $value['imo_number']; ?></p></h6><hr>
		<p class="center1"><a href="<?php echo base_url();?>index.php/admin/vessel/view/<?php echo $value['vessel_id']; ?>" class="btn btn-sm btn-primary" data-toggle="tooltip" title="View Detail!"><span class="glyphicon glyphicon-eye-open"></span> </a> &nbsp 
			<!--<button type="button"  title="Assigned / Unassigned" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#example<?php echo $value['vessel_id']; ?>">
			<span class="glyphicon glyphicon-retweet"></span></button>-->

</p>


							</div>
					</div>
				</div>
             </div>
						<?php if($count == 6){?>
			 <div class="clearfix"></div>
       <br>
			 <?php } ?>
              <?php }}else{?>
			  NO VESSEL ASSIGNED
       <?php }?>
             </div>
           </div>
        <div class="row">
          <div class="col-md-12">
            <div class="text-center"> <?php echo $this->pagination->create_links(); ?> </div>
          </div>
        </div>
            </div>
          </div>
            </div>      </div>
			


    <!-- /page content --> 