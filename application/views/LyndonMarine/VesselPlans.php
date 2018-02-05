<?php
include'includes/header_login.php';
?>
<section id="main-edit">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
          <h2>Vessel Plans</h2>
        </div>
      </div>
      <div class="col-md-3">
        <div class="main-edit-add"> <a class="btn-blue" href="<?php echo base_url(); ?>index.php/AddPlansScreen/index/<?php echo $vessel_id;?>">Add</a> </div>
      </div>
    </div>
  </div>
</section>
<section id="work-done">
  <div class="container">
    <!--<div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="img-upload"> <img src="img/image01.jpg" class="img-responsive"> </div>
      </div>
    </div>-->
    <div class="row">
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Plan Number</th>
                <th>Plan Name</th>
                <th>Description</th>
                <th class="text-center">Vessel Plans</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($vessel_plans as $data) { ?>
              <tr>
                <td><?php echo $data['plan_no'];?></td>
                <td><?php echo $data['plan_name'];?></td>
                <td><?php echo $data['description'];?></td>
                
                <td class="text-center"><a href="#" class="btn btn-primary">Click to View</td>
              </tr>
              <!--tr>
                <td>25452-mmm</td>
                <td>Dock</td>
                <td>Docking Plan " for Dry Dcok"</td>
               
                <td class="text-center"><a href="#" class="btn btn-primary">Click to View</td>
              </tr>
               <tr>
                <td>124-bb</td>
                <td>Capacity Plan</td>
                <td>Capacity Plan</td>
                
                <td class="text-center"><a href="#" class="btn btn-primary">Click to View</td>
              </tr-->
             <?php } ?>  
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
include'includes/footer.php';
?>