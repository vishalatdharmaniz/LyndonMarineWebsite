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
					<?php echo validation_errors(); ?>
         <form action="<?php echo base_url();?>index.php/AddSurveyScreen/index/<?php echo $vessel_id; ?>" method="post" enctype="multipart/form-data">
            
            <div class="row">
              <div class="form-group col-md-6">
								<?php echo form_error('Survey'); ?>
                <label class="control-label">Survey</label>
                <input type="text" name="Survey" required  placeholder="Survey" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Last Survey</label>
                <input type="text" name="Lastsurvey" id="datepicker1" required placeholder="Last Survey" class="form-control-text">
								<input type="hidden" name="vessel_id" value = "<?php echo $vessel_id; ?>">
              </div>
            </div>
            
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Postponed Date</label>
                <input type="text" name="postponed_date" id="datepicker2"  placeholder="Postponed Date" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Due</label>
                <input type="text" name="Due" id="datepicker3" required placeholder="Due" class="form-control-text">
              </div>
            </div>
            
             <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Range From</label>
                <input type="text" name="range_from" id="datepicker4"  placeholder="Range" class="form-control-text">
              </div>
							<div class="form-group col-md-6">
                <label class="control-label">Range To</label>
                <input type="text" name="range_to" id="datepicker5"  placeholder="Range" class="form-control-text">
              </div>
            </div>
        
            
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Reminder Due</label>
                <input type="text" name="examption" required placeholder="Reminder Due" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Reminder Range</label>
                <input type="text" required name="reminder_range" placeholder="Reminder Range" class="form-control-text">
              </div>
            </div>
           
					 <div class="row">
					 <div class="form-group col-md-6">
                <label class="control-label">Comments</label>
                 <input type="text" name="Comments"  placeholder="Comments" class="form-control-text">
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
  var dateToday = $('#date_expiry').val();
var dates = $("#datepicker4,#datepicker5").datepicker({
    dateFormat: 'dd/mm/yy',
    minDate: dateToday,
    onSelect: function(selectedDate) {
        var option = this.id == "datepicker4" ? "minDate" : "maxDate",
            instance = $(this).data("datepicker"),
            date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
						if(option == "minDate"){
							//var selectedDate = new Date(date);
							var msecsInADay = 86400000;
							 date = new Date(date.getTime() + msecsInADay);
						}
        dates.not(this).datepicker("option", option, date);
    }
});
</script>
