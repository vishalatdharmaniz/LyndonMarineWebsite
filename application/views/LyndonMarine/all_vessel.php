<?php
include'includes/CheckUserLogin.php';
include'includes/header_login.php';
?>
<section id="tab-bar-img">
  <div class="container">
    <div class="row"> <!-- Nav tabs -->
      <div class="card">
          <?php if($role=="user2" || $role=="user1") {
          }
          else{ ?>

        <div class="row">
        <div class="col-md-12 gur">
          <a class="btn-blue" href="<?php echo base_url(); ?>index.php/AddVesselScreen/index">Add</a>
        </div>
        </div>
        <?php  } ?>
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
                  <div class="col-md-3">
                 
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
                          <h4 class="pull-right"><?php echo $vessel_data['vessel_name']; ?></h4>
                          <h4>Name : </h4>
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