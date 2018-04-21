 <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Internal News</h3>
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
							
<?php //echo "<pre>";print_r($result);?>							
			<?php
			$counter = 0;
			foreach($result as $key => $userinfo){
				$counter++;
				//echo "<pre>";print_r($userinfo);
				?>				
			 <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="card img-thumbnail">
						<img class="img-responsive" src="<?= $this->config->item('base_url') ?>/assets/production/images/com.jpg" alt="">
						<div class="card-body center1">
						<p class="card-title center1" style="font-size:18px; padding-top:10px;"><button style="float:left;margin-left:7px;"><a href="#"  data-toggle="tooltip" title="Active" style="color:green;"><span class="fa fa-circle"></span></a></button> <?php echo $userinfo['name']?>  <a href="#" class="btn btn-xs btn-success" style="float:right;" data-toggle="tooltip" title="Online"><span class="glyphicon glyphicon-ok-circle"></span> admin</a></p>
				
					<p class="icon-links">  
				<a href="#"><button  data-toggle="tooltip" title="View!" class="btn btn-primary icon-links center1"> <span class="glyphicon glyphicon-eye-open"></span></button></a>
				<a href="<?php echo base_url();?>index.php/admin/user/edit/<?php echo $userinfo['id'];?>"><button class="btn btn-primary icon-links center1" data-toggle="tooltip" title="Edit!"> <span class="glyphicon glyphicon-edit"></span></button></a>
				<button class="btn btn-primary icon-links center1" data-toggle="tooltip" title="Delete!"> <span class="glyphicon glyphicon-trash"></span></button>
				 </p>
					</div>
						</div>
              </div>
			<?php if($counter == 4){ ?>
			 <div class="clearfix"></div>
<?php			 }

 } ?>


            </div>
            </div>
          </div>
				
				<div class="row">
          <div class="col-md-12">
            <div class="text-center"> <?php echo $this->pagination->create_links(); ?> </div>
          </div>
        </div>
				
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
		
    <!-- /page content --> 