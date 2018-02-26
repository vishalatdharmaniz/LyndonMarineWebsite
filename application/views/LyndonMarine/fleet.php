<?php
include'includes/CheckUserLogin.php';
include'includes/header_login.php';
?>
<section id="main-edit">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
          <h2>Welcome</h2>
        </div>
      </div>
      
      <!-- <div class="col-md-3">
        <div class="main-edit-add"> <a class="btn-blue" href="<?php echo base_url(); ?>index.php/AddVesselScreen/index">Add</a> </div>
      </div> -->
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