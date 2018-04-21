<!-- page content -->
    <div class="right_col" role="main">
      
        <div class="page-title">
          <div class="title_left">
            <h3>All Users</h3>
          </div>
          <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
				<form method="get" action="<?php echo base_url();?>index.php/admin/company/search_user/<?php echo $id;?>">
              <div class="input-group">
                <input type="text" class="form-control" value="<?php if(isset($search_kw) && !empty($search_kw)){ echo $search_kw; } ?>" name="search" placeholder="Search for...">
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
          <div class="left-add"> <a href="<?php echo base_url();?>index.php/admin/company/add_company_user/<?php echo $id;?>" class="btn btn-primary">Add User</a> </div>
          </div>
    	</div>
        <div class="clearfix"></div>
        <div class="row">	
          <div class="col-md-12 col-sm-12 col-xs-12">
			
            <div class="img-hover">
				<?php if(!empty($result)){
					$i = 0;
					foreach($result as $key => $value){
						$i++;
					?>
			 <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                <div class="card img-thumbnail">
						<img class="img-responsive" src="<?= $this->config->item('base_url') ?>/assets/production/images/com.jpg" alt="">
						<div class="card-body center1">
							
						<p class="card-title center1" style="font-size:12px; padding-top:10px;">
							
							<button style="float:left;">
						<a href="#"  data-toggle="tooltip" title="Active" style="color:green;"><span class="fa fa-circle"></span></a>
							</button>
						
						<b> <?php echo $value["username"];?></b>
						<?php if($value["role"] == 2){?>
						<a href="#" class="btn btn-xs btn-success" style="float:right;" data-toggle="tooltip" title="Online">
							<span class="glyphicon glyphicon-ok-circle"></span> Admin</a></p>
						<?php }elseif($value["role"] == 3){?>
						<a href="#" class="btn btn-xs btn-success" style="float:right;" data-toggle="tooltip" title="Online">
							<span class="glyphicon glyphicon-ok-circle"></span> Staff</a></p>
						<?php }elseif($value["role"] == 4){?>
						<a href="#" class="btn btn-xs btn-success" style="float:right;" data-toggle="tooltip" title="Online">
							<span class="glyphicon glyphicon-ok-circle"></span> User</a></p>
						<?php }?>
				<hr>
					<p class="icon-links">  
				<a href="<?php echo base_url();?>index.php/admin/company/view_company_user/<?php echo $value["id"];?>"><button  data-toggle="tooltip" title="View!" class="btn btn-primary icon-links center1"> <span class="glyphicon glyphicon-eye-open"></span></button></a>
				<a href="<?php echo base_url();?>index.php/admin/company/edit_company_user/<?php echo $value["id"];?>"><button class="btn btn-primary icon-links center1" data-toggle="tooltip" title="Edit!"> <span class="glyphicon glyphicon-edit"></span></button></a>
				<a href="<?php echo base_url();?>index.php/admin/company/delete/<?php echo $value["id"];?>"><button class="btn btn-primary icon-links center1" data-toggle="tooltip" title="Delete!"> <span class="glyphicon glyphicon-trash"></span></button></a>
				 </p>
					</div>
						</div>
              </div>
            
        
            
            
			<?php
			if($i%6 == 0){ ?>
			</div><div class="img-hover">
			<div class="clearfix"></div>	
			<?php }
				}
			}
			?>
            
            </div>
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
    <!-- /page content -->