<?php
include'includes/CheckUserLogin.php';
include'includes/header_login.php';
?>
<section id="main-edit">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
					<div class="col-md-3">
						<div class="main-edit-add">
					<a class="btn-blue" href="<?php echo base_url();?>/index.php/FleetDetails/index/<?php echo $vessel_id;?>">GO BACK</a>
						</div>
					</div>
          <h2>Survey Form</h2>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="main-editone">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="form-action">
         <form action="<?php echo base_url();?>/index.php/EditSurvey/Edit/<?php echo $id; ?>/<?php echo $vessel_id; ?>"  method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id ?>" />
            <?php 
            foreach ($survey_data as $data) 
            {
              $survey_no=$data['survey_no'];
              $last_survey=$data['last_survey_date'];
              $postponed_date=$data['postponed_date'];
              $due_date=$data['due_date'];
              $range_from=$data['range_from'];
              $range_to=$data['range_to'];
              $comments=$data['comments'];
              $reminder_due=$data['reminder_due'];
              $reminder_range=$data['reminder_range'];
              $status=$data['status'];
              $created=$data['created'];
              $modified=$data['modified'];
            }
            ?>
            <div class="row">
              <div class="form-group col-md-6">
								<?php echo form_error('Survey'); ?>
                <label class="control-label">Survey</label>
                <input type="text" name="Survey" required  value ="<?php echo $survey_no;?>" placeholder="Survey" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Last Survey</label>
                <input type="text" name="Lastsurvey" id="datepicker1" value = "<?php echo date("d/m/Y",strtotime($last_survey));?>" required placeholder="Last Survey" class="form-control-text">
              </div>
            </div>
            
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Postponed Date</label>
								<input type="text" name="postponed_date" id="datepicker2"  value = "<?php echo date("d/m/Y",strtotime($postponed_date));?>" placeholder="Postponed Date" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Due</label>
                <input type="text" name="Due" id="datepicker3" placeholder="Due" value ="<?php echo date("d/m/Y",strtotime($due_date));?>" class="form-control-text">
              </div>
            </div>
            
             <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Range From</label>
								<input type="text" name="range_from" id="datepicker4"  placeholder="Range" value ="<?php echo date("d/m/Y",strtotime($range_from));?>" class="form-control-text">
              </div>
							<div class="form-group col-md-6">
                <label class="control-label">Range To</label>
								<input type="text" name="range_to" id="datepicker5"  placeholder="Range" value ="<?php echo date("d/m/Y",strtotime($range_to));?>" class="form-control-text"> 
              </div>
            </div>
        
            
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Reminder Due</label>
                <input type="text" name="examption" placeholder="Reminder Due" value = "<?php echo $reminder_due?>" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Reminder Range</label>
                <input type="text" required name="reminder_range" placeholder="Reminder Range" value = "<?php echo $reminder_range?>" class="form-control-text">
              </div>
            </div>
           
					 <div class="row">
					 <div class="form-group col-md-6">
                <label class="control-label">Comments</label>
                 <input type="text" name="Comments"  placeholder="Comments" value = "<?php echo $comments?>" class="form-control-text">
              </div>
            </div>
            
            <button type="submit" class="btn btn-black">Save </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
include'includes/footer.php';
?>
<script>
  $( function() {
    $( "#datepicker1" ).datepicker({ dateFormat: 'dd/mm/yy' }).val();
    $( "#datepicker2" ).datepicker({ dateFormat: 'dd/mm/yy' }).val();
		
		$( "#datepicker3" ).datepicker({ dateFormat: 'dd/mm/yy' }).val();
		$( "#datepicker4" ).datepicker({ dateFormat: 'dd/mm/yy' }).val();
		$( "#datepicker5" ).datepicker({ dateFormat: 'dd/mm/yy' }).val();
		
    $( "#datepicker3" ).datepicker({ 
      dateFormat: 'dd/mm/yy'
    });
  } );
</script>