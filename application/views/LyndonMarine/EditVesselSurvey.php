<?php
include'includes/CheckUserLogin.php';
include'includes/header_login.php';
?>
<section id="main-edit">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
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
					<?php $id = $data->id;echo form_open(base_url()."/index.php/VesselSurvey/edit/$id"); ?>
         <!-- <form action="<?php //echo base_url()."/index.php/AddSurveyScreen/index/"; ?>" method="post" enctype="multipart/form-data">-->
            <input type="hidden" name="id" value="<?php echo $id ?>" />
            <div class="row">
              <div class="form-group col-md-6">
								<?php echo form_error('Survey'); ?>
                <label class="control-label">Survey</label>
                <input type="text" name="Survey" required  value = "<?php echo $data->survey_no?>"placeholder="Survey" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Last Survey</label>
                <input type="text" name="Lastsurvey" id="datepicker1" value = "<?php echo date("d/m/Y",strtotime($data->last_survey_date));?>" required placeholder="Last Survey" class="form-control-text">
              </div>
            </div>
            
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Postponed Date</label>
								<?php if($data->postponed_date != "0000-00-00 00:00:00"){?>
								<input type="text" name="postponed_date" id="datepicker2"  value = "<?php echo date("d/m/Y",strtotime($data->postponed_date));?>" placeholder="Postponed Date" class="form-control-text">
								<?php }else{?>
								<input type="text" name="postponed_date" id="datepicker2"  value = "" placeholder="Postponed Date" class="form-control-text">
								<?php }?>
                
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Due</label>
                <input type="text" name="Due" id="datepicker3" placeholder="Due" value = "<?php echo date("d/m/Y",strtotime($data->due_date));?>" class="form-control-text">
              </div>
            </div>
            
             <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Range From</label>
								<?php if($data->range_from != "0000-00-00 00:00:00"){?>
								<input type="text" name="range_from" id="datepicker4"  placeholder="Range" value = "<?php echo date("d/m/Y",strtotime($data->range_from));?>" class="form-control-text">
								<?php }else{?>
								<input type="text" name="range_from" id="datepicker4"  placeholder="Range" value="" class="form-control-text">
								<?php }?>
                
              </div>
							<div class="form-group col-md-6">
                <label class="control-label">Range To</label>
								<?php if($data->range_to != "0000-00-00 00:00:00"){?>
								<input type="text" name="range_to" id="datepicker5"  placeholder="Range" value = "<?php echo date("d/m/Y",strtotime($data->range_to));?>" class="form-control-text">
								<?php }else{?>
								<input type="text" name="range_to" id="datepicker5"  placeholder="Range" value = "" class="form-control-text">
								<?php }?>
                
              </div>
            </div>
        
            
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Reminder Due</label>
                <input type="text" name="examption" placeholder="Reminder Due" value = "<?php echo $data->reminder_due?>" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Reminder Range</label>
                <input type="text" required name="reminder_range" placeholder="Reminder Range" value = "<?php echo $data->reminder_range?>" class="form-control-text">
              </div>
            </div>
           
					 <div class="row">
					 <div class="form-group col-md-6">
                <label class="control-label">Comments</label>
                 <input type="text" name="Comments"  placeholder="Comments" value = "<?php echo $data->comments?>" class="form-control-text">
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
<script>
//  var dateToday = $('#date_expiry').val();
//var dates = $("#datepicker2,#datepicker3").datepicker({
//    dateFormat: 'dd/mm/yy',
//    minDate: dateToday,
//    onSelect: function(selectedDate) {
//        var option = this.id == "datepicker2" ? "minDate" : "maxDate",
//            instance = $(this).data("datepicker"),
//            date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
//        dates.not(this).datepicker("option", option, date);
//    }
//});
</script>
