<?php
include'includes/CheckUserLogin.php';
include'includes/header_login.php';
?>
<style>
 /* .form-control-text1{
    color: #444;
    
 
 padding: 15px 10px;
  font-size: 18px;

  }*/
</style>
<section id="tab-bar-img">
  <div class="container">
    <div class="row"> <!-- Nav tabs -->
      <div class="card">
          <?php if($role=="user2" || $role=="user1") {
          }
          else{ ?>

       
		
		 <div class="col-md-4" style="margin-bottom:15px;margin-top:20px;">
            <div class="input-group">
        <form onsubmit="searchEnter(document.getElementById('search_vessel').value); return false;">
          <input type="text" class="form-control-text" placeholder="Search For" name="search" id="search_vessel">
        </form>
          <span class="input-group-btn">
            <a class="btn btn-default text-muted" href="#" title="Clear" onclick="reset()"><i class="glyphicon glyphicon-remove"></i> </a>
            <button onclick="searchIcon(document.getElementById('search_vessel').value)" type="button" class="btn btn-info">
              <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
            </button>
          </span>
        </div>
          </div>
		  <?php  } ?>
		   <div class="col-md-2">
		  </div>
        <div class="col-md-6 text-right" style="margin-bottom:15px;margin-top:20px;">
		<a href="<?php echo base_url(); ?>index.php/AddVesselScreen/index" class="btn btn-primary btn-primary">Add</a>
		<a href="<?php echo base_url(); ?>index.php/AllVessels/company_vessel/<?php $company_id= $this->session->userdata['company_id']; echo $company_id; ?>" class="btn btn-primary btn-primary">All Vessels</a>
        </div>
      
        
        
         
        
        <div class="col-md-12" style="margin-bottom: 20px;">
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#AssignedVessels" aria-controls="home" role="tab" data-toggle="tab">Assigned Vessels</a></li>
            <!--li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Demo Vessels</a></li>
            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Demo Vessels</a></li>
            <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Demo Vessels</a></li-->
          </ul>
        </div>
        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="AssignedVessels">
            <div class="container">
              <div class="row">
                <div class="main-tab">
                <?php foreach($all_vessels as $vessel_data) {?>
                  <div class="col-md-3" style="padding-bottom:20px;">
                 
                    <div class="thumbnail-img"><a href="<?php echo base_url(); ?>index.php/FleetDetails/index/<?php echo $vessel_data['vessel_id']; ?>"> <img src="<?php if(!empty($vessel_data['image1'])) { echo $vessel_data['image1']; } else { echo base_url(); ?>img/no_image.png <?php }?>" style="width:290px; height:250px;" alt="" class="img-responsive"></a>
                      
                      <div class="caption">
                        <div class="caption-text">
                          <h4 class="pull-right"></h4>
                          <h4>State:<br>
                            <span>Nothing Pending (NP)</span></h4>
                        </div>
                        <div class="caption-text">
                          <h4 class="pull-right"><?php echo $vessel_data['imo_number']; ?></h4>
                          <h4>IMO: </h4>
                        </div>
                        <div class="caption-text">
                          <h5 class="pull-right"><?php echo $vessel_data['vessel_name']; ?></h5>
                          <h5>Name : </h5>
                        </div>
                        <div class="caption-text">
                          <h4 class="pull-right"><?php echo $vessel_data['flag']; ?></h4>
                          <h4>Flag:</h4>
                        </div>
                        <div class="caption-text">
                          <h4 class="pull-right"><?php echo $vessel_data['status']; ?></h4>
                          <h4>Status:</h4>
                        </div>
                      </div>
                      <div class="space-ten"></div>
                    </div>
                  
                  </div>
                  <?php } ?>
                </div>
              </div>
              <!--div>
                 <?php
                 foreach($results as $data) { 
                     //echo $data->vessel_id . "<br>";
                 }
                 ?>
                 <p><?php echo $links; ?></p>
              </div-->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="work-done">
  <div class="container">
    <div class="row">
      <div class="work-done-text">
        <div class="col-md-4">
          <div class="done-text"> <img src="<?php echo base_url(); ?>img/icon/icon01.png" class="img-responsive">
            <h3>Surveys Calendar</h3>
            <p>3-month panel</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="done-text"> <img src="<?php echo base_url(); ?>img/icon/icon02.png" class="img-responsive">
            <h3>Request Survey</h3>
            <p>Online</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="done-text"> <img src="<?php echo base_url(); ?>img/icon/icon03.png" class="img-responsive">
            <h3>Pending Surveys</h3>
            <p>More than 60-months period</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="work-done-text">
        <div class="col-md-4">
          <div class="done-text"> <img src="<?php echo base_url(); ?>img/icon/icon04.png" class="img-responsive">
            <h3>Completed Surveys</h3>
            <p>History Records</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="done-text"> <img src="<?php echo base_url(); ?>img/icon/icon05.png" class="img-responsive">
            <h3>Overdue Surveys</h3>
            <p>All past due so far</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="done-text"> <img src="<?php echo base_url(); ?>img/icon/icon06.png" class="img-responsive">
            <h3>Surveys Calendar</h3>
            <p>1-month prior today + all expired</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
include'includes/footer.php';
?>
<script>
function searchEnter(search_vessel)
{
    if(search_vessel == "")
    {
        alert("Please enter a value to be searched");
    }
    else
    {
       $company_id = "<?php echo $vessel_data['company_id'] ?>";
      window.location.href = "<?php echo base_url(); ?>index.php/AllVessels/searchdata/"+search_vessel+"/"+$company_id;
    }
}
function searchIcon(search_vessel)
{
    if(search_vessel == "")
    {
        alert("Please enter a value to be searched");
    }
    else
    {
            $company_id = "<?php echo $vessel_data['company_id'] ?>";
            window.location.href = "<?php echo base_url(); ?>index.php/AllVessels/searchdata/"+search_vessel+"/"+$company_id;
    }
}
function reset(search_vessel)
{
  $('#search_vessel').val('');
  $company_id = "<?php echo $vessel_data['company_id'] ?>";
  window.location.href = "<?php echo base_url(); ?>index.php/AllVessels/company_vessel/"+$company_id;
}
</script>