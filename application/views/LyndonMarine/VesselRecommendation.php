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
        <div class="main-edit-add-left"> 
          <a class="btn-blue" href="<?php echo base_url();?>index.php/FleetDetails/index/<?php echo $vessel_id; ?>">Go Back</a>                
        </div>       
      </div>
      
      <div class="col-md-4">
      <!-- for alignment of add button towards right . -->
      </div>
      
      <div class="col-md-5">
        <div class="list_right">
        <ul class="main-edit-add"> 
        <li><a class="btn-blue" href="<?php echo base_url();?>index.php/AddRecommendationScreen/index/<?php echo $vessel_id; ?>">Add Recommendation</a></li>
         <li> 
          <a class="btn-blue" href="<?php echo base_url(); ?>index.php/VesselRecommendation/index/<?php echo $vessel_id; ?>">All Recommendations</a>
         </li>
          <!-- <li><a class="btn-blue" onclick="mail_selected_vessels()" >Mail Document</a></li> -->
          </ul>
         </div>
         </div>
         
         
      </div>
    </div>
</section>
<section id="work-done">
  <div class="container">
   <div class="row">
     <div class="black_bg">
     <div class="col-md-8">
      <div class="mar_box">
      <form id="drop_down"action="<?php echo base_url(); ?>index.php/VesselRecommendation/search_dropdown_status/<?php echo $vessel_id; ?>" method="get">
      <input type="hidden" name="range" value="red" />
      <button type="submit" id="redclor" class="update text-center btn btn-red btn-sm"></button>
      </form>
      &nbsp;<span>Due in 10 days</span>&nbsp;&nbsp;
      <form id="drop_down"action="<?php echo base_url(); ?>index.php/VesselRecommendation/search_dropdown_status/<?php echo $vessel_id; ?>" method="get">
      <input type="hidden" name="range" value="green" />
      <button type="button" id="greenclr" class="update text-center btn btn-green btn-sm"></button>
      </form>
      &nbsp;<span>Valid more than 10 days</span>&nbsp;&nbsp;
      <form id="drop_down"action="<?php echo base_url(); ?>index.php/VesselRecommendation/search_dropdown_status/<?php echo $vessel_id; ?>" method="get">
      <input type="hidden" name="range" value="blue" />
      <button type="submit" id="blueclr" class="update text-center btn btn-blue-status btn-sm"></button>
      </form>
      &nbsp;<span>Rectified</span>&nbsp;&nbsp;
      
      </div>
    </div>
     
      <div class="col-md-2">
        <div class="input-group">
          <select class="form-control-text1" placeholder="Select" name="recommendation_type" id="recommendation_type">
            <option selected value="">Recommendation Type</option>
            <option value="management">management</option>
            <option value="text2">text2</option>
            <option value="text3">text3</option>
          </select>
        </div>
     </div>
   <div class="col-md-2">
       <div class="input-group">
        <?php
          if(array_key_exists('range',$_REQUEST)){
             $range = $_REQUEST['range'];
          }else{
            $range ="";
          }
          ?>
           <form id="drop_down" action="<?php echo base_url(); ?>index.php/VesselRecommendation/search_dropdown_status/<?php echo $vessel_id; ?>" method="get">
         
            <select class="form-control-text1" name="range" style="width: 169px;" onchange="this.form.submit()">
              <option selected value="">Select Status</option>
              <option value="red" <?php if($range == "red"){echo "selected=selected";}?>>Due in 10 days</option>
              <option value="blue" <?php if($range == "blue"){echo "selected=selected";}?>> Rectified</option>
              <option value="green" <?php if($range == "green"){echo "selected=selected";}?>>Valid More than 10 days</option>
            </select>
          
          </form>
   </div>
  </div>
      </div>
       </div>
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
            $rec_type=$data['recommendation_type'];
            $description=$data['description'];
            $rectified_status=$data['rectified_status'];
            $rectified_date=$data['rectified_date'];
            $rectified_by=$data['rectified_by'];
             ?>

              <tr>
                <td><?php echo $rec_type; ?></td>
                <td class="text-center"><?php echo date("d-m-Y",strtotime($rec_date)); ?></td>
                <td class="text-center"><?php echo date("d-m-Y",strtotime($date_due)); ?></td>
                <td class="text-center"><?php echo ($description ? $description : 'N/A'); ?></td>
                <td class="text-center"><?php echo ($rectified_status ? $rectified_status : 'N/A'); ?></td>
                 <td class="text-center"><?php  if($rectified_status!="Yes")
                              {echo "N/A"; } 
                            else
                              {echo $rectified_by; } 
                            
                               ?></td>
                  <td>
                       <?php if($rectified_status!="Yes")
                              {echo "N/A"; } 
                            else
                              {echo $rectified_date; } 
                            ?>
                              
                  </td>
                <td class="text-center">
                 <?php 
                 if($rectified_status=="Yes") { ?>
                  <button type="button" class="update text-center btn btn-blue-status btn-sm"></button>
                  <?php }
                  elseif($calday<10) { ?>
                  <button type="button" class="update text-center btn btn-red btn-sm"></button>
                  <?php } 
                  elseif($calday>10) { ?>
                  <button type="button" class="update text-center btn btn-green btn-sm"></button>
                  <?php } ?>
              </td>
                 <td class="text-center"><a href="<?php echo base_url(); ?>index.php/ViewRecommendation/index/<?php echo $vessel_id;?>" class="btn btn-primary">View</td>
                <td class="text-center">
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
<script>
   function searchtype(recommendation_type)
{
    if(recommendation_type == "")
    {
        alert("Please enter a value to be searched");
    }
    else
    {
            window.location.href = "<?php echo base_url(); ?>index.php/VesselRecommendation/search_recommendation_type/"+recommendation_type+"/"+<?php echo $data['vessel_id'] ?>;
    }
}

$('#recommendation_type').change(function(){
      $selected_value=$('#recommendation_type option:selected').text();
      window.location.href = "<?php echo base_url(); ?>index.php/VesselRecommendation/search_recommendation_type/"+$selected_value+"/"+<?php echo $data['vessel_id'] ?>;
    });

</script>