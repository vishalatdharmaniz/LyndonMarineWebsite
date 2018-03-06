<?php
include'includes/header_login.php';
include'includes/CheckUserLogin.php';
?>

<section id="main-edit">
  <div class="container">
    
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
          <h2>Crew Details </h2> <br>
        </div> 
      </div>
    </div>
     
  </div>
</section>

<section id="top_mail">
  <div class="container">
      <div class="row"> 
        <div class="col-md-3">
        <div class="main-edit-add-left"> <a class="btn-blue" href="<?php echo base_url();?>index.php/FleetDetails/index/<?php echo $vessel_id; ?>">Go Back</a>                
          </div>       
      </div>
      
      <div class="col-md-4">
      <!-- for alignment of add button towards right . -->
      </div>
      
      <div class="col-md-5">
        <div class="list_right">
        <ul class="main-edit-add"> 
        <li><a class="btn-blue" href="<?php echo base_url();?>index.php/CrewDetails/AddCrewDetailsScreen/<?php echo $vessel_id; ?>">Add </a></li>
        
          </ul>
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
            <thead>
              <tr>
                <th>Name</th>
                <th>Tourist Passport No.</th>
                <th>Seaman Passport No.</th>
                <th>Rank</th>
                <th>Salary</th>
                <th class="text-center">Documents</th>
                <th>Select</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                foreach ($crew_data as $data) 
                {
                  $crew_id=$data['crew_id'];
                $name=$data['name'];
                $tourist_p_number=$data['tourist_p_num'];
                $seaman_p_number=$data['seaman_p_num'];
                $rank=$data['rank'];
                $salary=$data['salary'];
                $document=$data['document'];

                ?>
                <tr>
                  <td><?php echo $name; ?></td>
                  <td><?php echo $tourist_p_number; ?></td>
                  <td><?php echo $seaman_p_number; ?></td>
                  <td><?php echo $rank; ?></td>
                  <td><?php echo $salary; ?></td>
                  <td class="text-center">
                 <!-- <a href="<?php echo base_url(); ?>index.php/CrewDetails/view_crew_details/<?php echo $crew_id; ?>" class="btn btn-primary">View
                  -->view </td>
                  <td>
                    <input type="checkbox" name="checkbox" id="checkbox<?php echo $data['vessel_id']; ?>">
                  </td>
                </tr>
                <?php
                     }
                 ?>


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