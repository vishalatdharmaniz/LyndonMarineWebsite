<?php
include'includes/header_login.php';
?>
<style>
  ul {
    display: flex;
  }
</style>
<section id="main-edit">
  <div class="container">
    <div class="row">
      <div class="col-md-2">
        <div class="main-edit-add"> <a class="btn-blue" href="<?php echo base_url();?>index.php/VesselRecommendation/index/<?php echo $vessel_id ; ?>">Go Back </a> 
        </div>   
      </div>
      <div class="col-md-offset-1 col-md-6">
        <div class="page-heading">
          <h2>View Vessel Recommendation </h2>
        </div>
      </div>
          
    </div>
  </div>
</section>
<section id="table-data">
<div class="container">
  
    <div class="row">
        
      <div class="col-md-10 col-md-offset-1">
        <div class="table-responsive">
        <table class="table table-bordered">
              <tbody>
                <?php foreach($recommendation_data as $data) 
                { 
                  $recommendation_type=$data['recommendation_type'] ; 
                  $recommendation_date=$data['recommendation_date'] ; 
                  $due_date=$data['due_date'] ; 
                  $description=$data['description'] ; 
                  $rectified_status=$data['rectified_status'] ; 
                  $rectified_date=$data['rectified_date'] ; 
                  $rectified_by=$data['rectified_by'] ; 
                  $reminder=$data['reminder'] ; 
                  $image1=$data['image1'] ;
                  $image2=$data['image2'] ; 
                  $image3=$data['image3'] ; 



                }
              ?>
                <tr>
                  <th width="40%">Type of Rec.</th>
                  <th width="60%"><?php echo $recommendation_type ; ?></th> 
                </tr>
                <tr>
                  <th scope="row">Date of Rec.</th>
                  <td> <?php echo $recommendation_date ; ?> </td>
                </tr>
                <tr>
                  <th scope="row">Due Date</th>
                  <td><?php echo $due_date ; ?> </td>  
                </tr>
                <tr>
                  <th scope="row">Description</th>
                  <td><?php echo $description ; ?> </td>  
                </tr>
                <tr>
                  <th scope="row">Rectified Date</th>
                  <td><?php echo $rectified_date ; ?> </td>  
                </tr>
                <tr>
                  <th scope="row">Rectified By</th>
                  <td><?php echo $rectified_by ; ?> </td>  
                </tr>
                <tr>
                  <th scope="row">Reminder</th>
                  <td><?php echo $reminder ; ?> </td>  
                </tr> 
                <tr>
                 <th width="42">Status</th>
                 <td><?php echo $rectified_status ; ?> </td>  
                </tr>
              </tbody>
               
              </table>
            </div>
                 <div class="row">
              <div class="doc-img">
                  <ul>
                      <li>
                        <?php if(!empty($image1)) {?>
                        <a href="<?php echo $image1; ?>" target="_blank"><img src="http://via.placeholder.com/100x100" class="img-responsive"> </a><br>
                        <span><?php $value = explode("/",$image1);echo substr($value[6],0,20); ?></span>
                        <?php } 
                        else { ?>
                       <!-- <span> No Document Available </span>-->
                        <?php } ?>
                      </li>
                       <li>
                        <?php if(!empty($image2)) {?>
                        <a href="<?php echo $image2; ?>" target="_blank"><img src="http://via.placeholder.com/100x100" class="img-responsive"> </a><br>
                        <span><?php $value = explode("/",$image2);echo substr($value[6],0,20); ?></span>
                        <?php } 
                        else { ?>
                       <!-- <span> No Document Available </span>-->
                        <?php } ?>
                      </li>
                       <li>
                        <?php if(!empty($image3)) {?>
                        <a href="<?php echo $image3; ?>" target="_blank"><img src="http://via.placeholder.com/100x100" class="img-responsive"> </a><br>
                        <span><?php $value = explode("/",$image3);echo substr($value[6],0,20); ?></span>
                        <?php } 
                        else { ?>
                       <!-- <span> No Document Available </span>-->
                        <?php } ?>
                      </li>
                      
                  </ul>
              </div>  
            </div>
            
            </div>
    </div>
  </div>
</section>
<?php
include'includes/footer.php';
?>