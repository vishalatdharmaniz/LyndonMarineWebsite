<?php
include'includes/CheckUserLogin.php';
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
        <div class="main-edit-add"> <a class="btn-blue" href="<?php echo base_url();?>index.php/VesselSurvey/index/<?php echo $vessel_id; ?>">Go Back</a> </div>       
      </div>
      <div class="col-md-offset-1 col-md-6">
        <div class="page-heading">
          <h2>View Survey Details </h2>
        </div>
      </div>
      <div class="col-md-2">
        <div class="main-edit-add"> <a class="btn-blue" href="<?php echo base_url();?>index.php/EditSurvey/index/<?php echo $id; ?>/<?php echo $vessel_id; ?>">Edit</a> </div>       
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
                <?php 
                    foreach ($survey_data as $data) {
                      # code...
                      $survey_no=$data['survey_no'];
                      $last_survey=date("d-m-Y",strtotime($data['last_survey_date']));
                      $due_date=date("d-m-Y",strtotime($data['due_date']));
                       if($data['postponed_date']!="")
                      {  
                      $postponed_date=date("d-m-Y",strtotime($data['postponed_date']));
                      }
                      else
                      {
                        $postponed_date="N/A";
                      }
                      if($data['range_from']!="")
                      {  
                      $range_from=date("d-m-Y",strtotime($data['range_from']));
                      }
                      else
                      {
                        $range_from="N/A";
                      }
                       if($data['range_to']!="")
                      {  
                      $range_to=date("d-m-Y",strtotime($data['range_to']));
                      }
                      else
                      {
                        $range_to="N/A";
                      }
                      $comments=$data['comments'];
                      $reminder_due=$data['reminder_due'];
                      $reminder_range=$data['reminder_range'];
                    }
                ?>
                <tr>
                  <th width="40%">Suvey No.</th>
                  <th width="60%"><?php echo $survey_no; ?></th>
                
                </tr>
                <tr>
                  <th scope="row">Last Survey</th>
                  <td>
                    <?php  
                    if($last_survey != "0000-00-00 00:00:00" && $last_survey != ""){
                      echo $last_survey; 
                    }else{
                      echo "N/A";
                    }
                    ?>
                  </td>
                </tr>
                <tr>
                  <th scope="row">Postponed Date</th>
                  <td>
                     <?php  
                    /*if($last_survey != "0000-00-00 00:00:00" && $last_survey != ""){*/
                      echo $postponed_date; 
                  /*  }else{
                      echo "N/A";
                    }*/
                    ?>
                  </td>  
                </tr>
                <tr>
                  <th scope="row">Due Date</th>
                  <td>
                     <?php  
                    if($due_date != "0000-00-00 00:00:00" && $due_date != ""){
                      echo $due_date; 
                    }else{
                      echo "N/A";
                    }
                    ?>
                  </td>  
                </tr>
                <tr>
                  <th scope="row">Range From</th>
                  <td> 
                    <?php  
                    /*f($range_from != "0000-00-00 00:00:00" && $range_from != ""){*/
                      echo $range_from; 
                    /*}else{
                      echo "N/A";
                    }*/
                    ?> 
                    </td>  
                </tr>
                <tr>
                  <th scope="row">Range To</th>
                  <td> 
                    <?php  
                    if($range_to != "0000-00-00 00:00:00" && $range_to != ""){
                      echo $range_to; 
                    }else{
                      echo "N/A";
                    }
                    ?>
                  </td>  
                </tr>
               
                <tr>
                  <th scope="row">Reminder Due</th>
                  <td><?php if($reminder_due!="") {echo $reminder_due; }else{echo "N/A";} ?></td>  
                </tr>
                <tr>
                  <th scope="row">Reminder Range</th>
                  <td><?php if($reminder_range!=""){ echo $reminder_range; }else{echo "N/A";} ?></td>  
                </tr>
                 <tr>
                  <th scope="row">Comments</th>
                  <td><?php if($comments!=""){ echo $comments; }else{echo "N/A";} ?></td>  
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
