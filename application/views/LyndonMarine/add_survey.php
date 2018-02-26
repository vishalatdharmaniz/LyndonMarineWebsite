<?php
include'includes/header_login.php';

?>
<section id="main-edit">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
          <h2>Add Survey</h2>
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
			<?php echo validation_errors();
			?>
          <?php echo form_open("Survey/add"); ?>
            <div class="row">
              <div class="form-group col-md-12">
                <label class="control-label">Survey</label>
                <input type="text" placeholder="Survey" name="survey_no" class="form-control-text">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Last Survey Date</label>
                <input type="text" placeholder="Last Survey Date" name="last_survey_date" id="datepicker1" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Postponed Date</label>
                <input type="text" placeholder="Postponed Date" name="postponed_date" id="datepicker2" class="form-control-text">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Due Date</label>
                <input type="text" placeholder="Due Date" id="datepicker3" name="due_date" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Range From</label>
                <input type="text" placeholder="Range From" name="range_from" id="datepicker4" class="form-control-text">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Range To</label>
                <input type="text" placeholder="Range To" name="range_to" id="datepicker5" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Comments</label>
                <input type="text" placeholder="Comments" name="comments" class="form-control-text">
              </div>
            </div>
			 <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Reminder Due</label>
                <input type="text" placeholder="Reminder Due" name="reminder_due_date" id="datepicker6" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Reminder Range</label>
                <input type="text" placeholder="Reminder Range" name="reminder_range"  class="form-control-text">
              </div>
            </div>
            <button type="submit" name="submit" class="btn btn-black">Save </button>
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
     $( "#datepicker6" ).datepicker({ dateFormat: 'dd/mm/yy' }).val();
	  $( "#datepicker7" ).datepicker({ dateFormat: 'dd/mm/yy' }).val();
  } );
</script>