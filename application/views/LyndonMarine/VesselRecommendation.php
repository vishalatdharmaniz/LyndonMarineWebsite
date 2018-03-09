<?php
include'includes/header_login.php';
include'includes/CheckUserLogin.php';
?>

<section id="main-edit">
  <div class="container">
    
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
          <h2>Vessel Recommendations </h2> <br>
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
        <li><a class="btn-blue" href="<?php echo base_url();?>index.php/AddRecommendationScreen/index/<?php echo $vessel_id; ?>">Add Recommendation</a></li>
          <!-- <li><a class="btn-blue" onclick="mail_selected_vessels()" >Mail Document</a></li> -->
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
                <th>Type of Rec.</th>
                <th>Date of Rec.</th>
                <th>Due Date</th>
                <th>Description</th>
                <th>Rectified</th>
                <th>Rectified By</th>
                <th>Rectified Date</th>
                <th>Status</th>
                <th class="text-center">View Document</th>
                <th>Select</th>
                <th>Action</th>
                
              </tr>
            </thead>
            <tbody>
            <?php foreach($recommendation_data as $data) {
              $now=time();
            
            $due_date=strtotime($data['due_date']); 
            $rec_date =strtotime($data['recommendation_date']); 
            $caldays = $due_date - $now;

            if($due_date>$now && $due_date>$rec_date)
            {
            $caldays = $due_date - $rec_date;  
            $calday =  round($caldays / (60 * 60 * 24));
            }
            $calday =  round($caldays / (60 * 60 * 24)); 

            $rec_date=$data['recommendation_date'];
            $date_due=$data['due_date'];
             ?>

              <tr>
                <td><?php echo $data['recommendation_type']; ?></td>
                <td><?php echo date("d-m-Y",strtotime($rec_date)); ?></td>
                <td><?php echo date("d-m-Y",strtotime($date_due)); ?></td>
                <td><?php echo ($data['description'] ? $data['description'] : 'N/A'); ?></td>
                <td><?php echo ($data['rectified_status'] ? $data['rectified_status'] : 'N/A'); ?></td>
                 <td><?php  echo ($data['rectified_by'] ? $data['rectified_by'] : 'N/A'); ?></td>
                 <td><?php if($data['rectified_status']!=='%Yes%'){echo "N/A";}else{echo $data['rectified_date'];} ?></td>
                <td>
                 <?php 
                 if($calday<5) { ?>
                  <button type="button" class="update text-center btn btn-red btn-sm"></button>
                  <?php }
                  elseif($calday>5) { ?>
                  <button type="button" class="update text-center btn btn-blue btn-sm"></button>
                  <?php } ?>
              </td>
                 <td class="text-center"><a href="<?php echo base_url(); ?>index.php/ViewRecommendation/index/<?php echo $vessel_id;?>" class="btn btn-primary">View</td>
                <td>
                    <input type="checkbox" name="checkbox" id="checkbox<?php echo $data['vessel_id']; ?>">
                </td>
               <td class="text-center">
                  <a href="<?php echo base_url();?>index.php/DeleteRecommendation/index/<?php echo $data['recommendation_id']; ?>/<?php echo $data['vessel_id']; ?>" Onclick="return confirm('Are you Sure?');" class="btn-bk">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                  </a>
                  <a href="<?php echo base_url();?>index.php/EditRecommendation/index/<?php echo $data['recommendation_id']; ?>/<?php echo $data['vessel_id']; ?>" class="btn-bk">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                  </a>
               </td>
              </tr>
              
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
      <div class="col-md-12">
        <div class="text-center">
          
            <?php echo $links; ?>
          
        </div>
      </div>
    </div>
</section>
<?php
include'includes/footer.php';
?>