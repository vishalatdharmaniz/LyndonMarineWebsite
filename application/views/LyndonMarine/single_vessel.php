<?php
include'includes/CheckUserLogin.php';
include'includes/header_login.php';
?>

<section id="image-details">
  <div class="container">
    <?php  foreach($vessel_data as $vessel) { ?>
    <div class="row">

        <div class="main-edit-add"> <a class="btn-blue" href="<?php echo base_url();?>index.php/AllVessels/user_vessel/<?php echo $vessel['user_id']; ?>">Go Back</a> </div>       
<?php if($role=="user2" || $role=="user1") { }
          else{ ?>
      <div class="button-right"> <a href="<?php echo base_url();?>index.php/AllVessels/view_vessel/<?php echo $vessel['vessel_id']; ?>" class="btn btn-view">View</a> <a href="<?php echo base_url();?>index.php/AllVessels/edit_vessel/<?php echo $vessel['vessel_id']; ?>" class="btn btn-edit">Edit</a> <a href="<?php echo base_url();?>index.php/DeleteVessel/index/<?php echo $vessel['vessel_id']; ?>" Onclick="return confirm('Are you sure?');" class="btn btn-del">Delete</a>

      </div>
    <?php  } ?>
    </div>
    <div class="row">
      <div class="col-md-6 col-md-push-6">
        <div class="image-table text-center">
          <div class="owl-carousel owl-theme">
            <?php if ($vessel["image1"] != ""): ?>
            <div class="item"><img src="<?php echo $vessel["image1"]; ?>" alt=""></div>
            <?php endif; ?>
            <?php if ($vessel["image2"] != ""): ?>
            <div class="item"><img src="<?php echo $vessel["image2"]; ?>" alt=""></div>
            <?php endif; ?>
            <?php if ($vessel["image3"] != ""): ?>
            <div class="item"><img src="<?php echo $vessel["image3"]; ?>" alt=""></div>
            <?php endif; ?>
            <?php if ($vessel["image4"] != ""): ?>
            <div class="item"><img src="<?php echo $vessel["image4"]; ?>" alt=""></div>
            <?php endif; ?>
            <?php if ($vessel["image5"] != ""): ?>
            <div class="item"><img src="<?php echo $vessel["image5"]; ?>" alt=""></div>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <!-- <div class="col-md-6 col-md-push-6">
                <div class="image-test">
                    <img src="<?php if(!empty($vessel['image1'])) { echo $vessel['image1']; } else { echo base_url(); ?>img/no_image.png <?php }?>" style="width:290px;height:250px;" class="img-responsive">
                </div>
            </div> -->
      
      <div class="col-md-6 col-md-pull-6">
        <div class="image-test-text">
          <h2><?php echo $vessel['vessel_name']; ?></h2>
          <ul>
            <li>IMO No. : <span><?php echo $vessel['imo_number'];?></span></li>
            <li>Class No. : <span><?php echo $vessel['class_no'];?></span></li>
            <li>Flag : <span><?php echo $vessel['flag'];?></span></li>
            <li>Agency : <span><?php echo $vessel['agency'];?></span></li>
            <li>Owner : <span><?php echo $vessel['owner_name'];?></span></li>
            <li>Manager : <span><?php echo $vessel['manager_name'];?></span></li>
            <li>Status : <span><?php echo $vessel['status'];?></span></li>
          </ul>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>
<section id="work-done">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="main-heading">Vessel Information</h2>
      </div>
    </div>
    <div class="row">
      <div class="work-done-text">
		<div class="col-md-3">
          <div class="done-text"> <a href="<?php echo base_url();?>index.php/AllVessels/view_fullvessel/<?php echo $vessel['vessel_id']; ?>"><img src="<?php echo base_url(); ?>img/icon/ship.png" class="img-responsive"></a>
            <h3>Vessel Particular</h3>
          </div>
        </div>
        <div class="col-md-3">
          <div class="done-text"> <a href="<?php echo base_url(); ?>index.php/VesselCertificate/index/<?php echo $vessel['vessel_id'];?>"><img src="<?php echo base_url(); ?>img/icon/Certificates.png" class="img-responsive"></a>
            <h3>Certificates </h3>
          </div>
        </div>
		<div class="col-md-3">
          <div class="done-text"> <a href="<?php echo base_url(); ?>index.php/VesselSurvey/index/<?php echo $vessel['vessel_id'];?>"><img src="<?php echo base_url(); ?>img/icon/Survey.png" class="img-responsive"></a>
            <h3>Survey </h3>
          </div>
        </div>
        <div class="col-md-3">
          <div class="done-text"> <a href="<?php echo base_url(); ?>index.php/VesselPlans/index/<?php echo $vessel['vessel_id'];?>"><img src="<?php echo base_url(); ?>img/icon/Plans.png" class="img-responsive"></a>
            <h3>Plans & Manuals </h3>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="work-done-text">
		<div class="col-md-3">
          <div class="done-text"> <a href="<?php echo base_url(); ?>index.php/VesselRecommendation/index/<?php echo $vessel['vessel_id'];?>">
            <img src="<?php echo base_url(); ?>img/icon/Recommendation.png" class="img-responsive"></a>
            <h3>Recommendations </h3>
          </div>
        </div>
		<div class="col-md-3">
          <div class="done-text"> <a href="<?php echo base_url(); ?>index.php/VesselInventory/index/<?php echo $vessel['vessel_id']; ?>">
            <img src="<?php echo base_url(); ?>img/icon/directory.png" class="img-responsive"></a>
            <h3>Inventory </h3>
          </div>
        </div>
		<div class="col-md-3">
          <div class="done-text"> <a href="<?php echo base_url(); ?>index.php/Vessel_fixture/index/<?php echo $vessel['vessel_id']; ?>"><img src="<?php echo base_url(); ?>img/icon/Fixture.png" class="img-responsive"></a>
            <h3>Fixture </h3>
          </div>
        </div>
		<div class="col-md-3">
          <div class="done-text"> <a href="<?php echo base_url() ;?>index.php/CrewDetails/index/<?php echo $vessel['vessel_id']; ?>">
            <img src="<?php echo base_url(); ?>img/icon/crew.png" class="img-responsive"></a>
            <h3>Crew </h3>
          </div>
        </div>  
      </div>
    </div>
    <div class="row">
      <div class="work-done-text">
        <div class="col-md-3">
          <div class="done-text"> <a href="<?php echo base_url(); ?>index.php/VesselBunkerSupply/index/<?php echo $vessel['vessel_id']; ?>">
            <img src="<?php echo base_url(); ?>img/icon/bunker_icon.jpg" class="img-responsive"></a>
            <h3>Bunker </h3>
          </div>
        </div>
        <div class="col-md-3">
          <div class="done-text"> <a href="<?php echo base_url(); ?>index.php/VesselSoa/index/<?php echo $vessel['vessel_id']; ?>">
            <img src="<?php echo base_url(); ?>img/icon/Soa.png" class="img-responsive"></a>
            <h3>Soa </h3>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
include'includes/footer.php';
?>
