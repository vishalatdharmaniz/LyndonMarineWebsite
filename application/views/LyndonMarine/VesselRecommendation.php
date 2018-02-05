<?php
include'includes/header_login.php'
?>
<section id="main-edit">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
          <h2>Vessel Recommendation</h2>
        </div>
      </div>
      <div class="col-md-3">
        <div class="main-edit-add"> <a class="btn-blue" href="<?php echo base_url();?>index.php/AddRecommendationScreen/index/<?php echo $vessel_id;?>">Add</a> </div>
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
              <tr><th>Type of Rec.</th>
                <th>Date of Rec.</th>
                <th>Due Date</th>
                <th>Description</th>
                <th>Status</th>
                <th class="text-center">View Document</th>
                <th>Rectified</th>
                <th>Rectified By</th>
                <th>Rectified Date</th>
                
              </tr>
            </thead>
            <tbody>
            <?php foreach($recommendation_data as $data) { ?>
              <tr>
                <td><?php echo $data['recommendation_type']; ?></td>
                <td><?php echo $data['recommendation_date']; ?></td>
                <td><?php echo $data['due_date']; ?></td>
                <td><?php echo $data['description']; ?></td>
               <td><button type="button" class="update text-center btn btn-danger btn-sm"></button></td>
                <td class="text-center"><a href="#" class="btn btn-primary">Click to View</td>
                <td><?php echo $data['rectified_status']; ?></td>
                 <td><?php echo $data['rectified_by']; ?></td>
                <td><?php echo $data['rectified_date']; ?></td>
              </tr>
               <!--tr>
                <td>Management</td>
                <td>11/21/2017</td>
                <td>11/16/2017</td>
                <td>MLC has been approved and dispatched form DBS H.O, </td>
               <td><button type="button" class="update text-center btn btn-danger btn-sm"></button></td>
                <td class="text-center"><a href="#" class="btn btn-primary">Click to View</td>
                <td>No</td>
                 <td>N/A</td>
                <td>N/A</td>
              </tr>
               <tr>
                <td>Management</td>
                <td>11/21/2017</td>
                <td>11/16/2017</td>
                <td>MLC has been approved and dispatched form DBS H.O, </td>
               <td><button type="button" class="update text-center btn btn-success btn-sm"></button></td>
                <td class="text-center"><a href="#" class="btn btn-primary">Click to View</td>
                <td>No</td>
                 <td>N/A</td>
                <td>N/A</td>
              </tr>
             <tr>
                <td>Management</td>
                <td>11/21/2017</td>
                <td>11/16/2017</td>
                <td>MLC has been approved and dispatched form DBS H.O, </td>
                <td><button type="button" class="update text-center btn btn-danger btn-sm"></button></td>
                <td class="text-center"><a href="#" class="btn btn-primary">Click to View</td>
                <td>No</td>
                 <td>N/A</td>
                <td>N/A</td>
              </tr-->
              <?php } ?>
            </tbody>
          </table>
        </div>
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
           
            <tbody>
              <tr>
                <td><button type="button" class="update text-center btn btn-danger btn-sm"></button></td>
                <td>Due Now or Overdue within 15day</td>
               
              </tr>
                <tr>
                <td><button type="button" class="update text-center btn btn-success btn-sm"></button></td>
                <td>Rectified</td>
               
              </tr>
                
              
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