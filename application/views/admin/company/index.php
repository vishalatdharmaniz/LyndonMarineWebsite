 <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Company	</h3>
          </div>
          <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
							<form method="get" action="<?php echo base_url();?>index.php/admin/company/search">
              <div class="input-group">
                <input type="text" class="form-control" name="search" value="<?php if(isset($search_kw) && !empty($search_kw)){ echo $search_kw; } ?>" placeholder="Search for...">
                <span class="input-group-btn">
                <button class="btn btn-default" type="submit">Go!</button>
                </span> </div>
							</form>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
         <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="left-add"> <a href="<?php echo base_url();?>index.php/admin/company/add" class="btn btn-primary">Add Company</a> </div>
					<div class="left-add">
						<form method="post" action="<?php echo base_url();?>index.php/admin/company/index">
						<select name="request_type" onchange="this.form.submit();">
							<option value=1 <?php if($request_type == 1){echo "selected=selected";}?> >Accepted</option>
							<option value=2 <?php if($request_type == 2){echo "selected=selected";}?>>Rejected</option>
							<option value=0 <?php if($request_type == 0){echo "selected=selected";}?> >New Requests</option>
						</select>
						</form>
					</div>
		  <div class="left-add"> <a href="<?php echo base_url();?>index.php/admin/company/new_request" class="btn btn-primary">New Request</a> </div>
          </div>
    	</div>
      
         <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
          
          		<div class="company_info">
								<?php if(!empty($result)){
									$count = 0;
									foreach($result as $key => $value){
										$count ++;
									?>
                	<div class="col-md-3 card img-thumbnail center1">
                    	<a href="#" >
                    		<div class="#" style="margin-bottom:10px;">
                            	<img src="<?= $this->config->item('base_url') ?>/assets/production/images/com.jpg" class="img-responsive" alt="">
                            </div>                       
                            	<h2><?php echo $value['organization']; ?></h2> <hr>							                        
                            </a>
							<a href="<?php echo base_url();?>index.php/admin/company/company_vessel/<?php echo $value['id'];?>"><button class="btn btn-primary icon-links center1" data-toggle="tooltip" title="Vessels "> <span class="fa fa-ship"></span></button></a>
							<a href="<?php echo base_url();?>index.php/admin/company/company_user/<?php echo $value['id'];?>"><button class="btn btn-primary icon-links center1" data-toggle="tooltip" title="User "> <span class="glyphicon glyphicon-user"></span></button></a>
							<a href="#"><button  data-toggle="tooltip" title="View " class="btn btn-primary icon-links center1"> <span class="glyphicon glyphicon-eye-open"></span></button></a>
							
							<a href="<?php echo base_url();?>index.php/admin/company/edit/<?php echo $value['id'];?>" ><button class="btn btn-primary icon-links center1" data-toggle="tooltip" title="Edit "> <span class="glyphicon glyphicon-edit"></span></button></a>
							
							<a href="<?php echo base_url();?>index.php/admin/company/delete/<?php echo $value['id'];?>" onclick="return confirm('Are you sure?')" ><button class="btn btn-primary icon-links center1" data-toggle="tooltip" title="Delete "> <span class="glyphicon glyphicon-trash"></span></button></a>
							
							<button class="btn btn-primary icon-links  center1" data-toggle="collapse" data-target="#<?php echo $count;?>"  data-toggle="tooltip" title="Detail "> <span class="glyphicon glyphicon-plus"></span></button>
							<div id="<?php echo $count;?>" class="collapse text-left" style="color:black;"> <hr>
							<p><b>1. Name :</b> <?php echo $value['name']; ?></p>
							<p><b>2.Username :</b> <?php echo $value['username']; ?></p>
							<p><b>3. Organization :</b> <?php echo $value['organization']; ?></p>
							<p><b>4. Address :</b> <?php echo $value['address']; ?></p>
							<p><b>5. City :</b> <?php echo $value['city']; ?></p>
							<p><b>6. Country :</b><?php echo $value['country']; ?></p>
							<p><b>7. Email :</b> <?php echo $value['email']; ?></p>
							<p><b>8. Note :</b> <?php echo $value['note']; ?></p>
							</div>									
                    </div>
					<?php }}else{ ?>
					
                 Nothing To Show
								 
					<?php }?>
                   
					
                  
                   
							</div>
                 </div>
                   <div class="clearfix"></div>  
                   <div class="company_info">
                	
					
                  
					
                  
					
                   
          
            
           
          <div class="row">
          <div class="col-md-12">
            <div class="text-center"> <?php echo $this->pagination->create_links(); ?> </div>
          </div>
        </div>  
          </div>
          <div class="clearfix"></div>
        </div>
					
      </div>
    </div>
    <!-- /page content --> 