<?php
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
          <form action="<?php echo base_url(); ?>#" method="post" enctype="multipart/form-data">
            
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Survey</label>
                <input type="text" name="Survey" required placeholder="Survey" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Last Survey</label>
                <input type="text" name="Lastsurvey" required placeholder="Last Survey" class="form-control-text">
              </div>
            </div>
            
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Postponed Date</label>
                <input type="text" name="postponed_date" id="datepicker2" required placeholder="Postponed Date" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Due</label>
                <input type="text" name="Due" id="datepicker3" placeholder="Due" class="form-control-text">
              </div>
            </div>
            
             <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Range</label>
                <input type="text" name="Range" id="datepicker3" required placeholder="Range" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Comments</label>
                 <input type="text" name="Comments" required placeholder="Comments" class="form-control-text">
              </div>
            </div>
        
            
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Reminder Due</label>
                <input type="text" name="examption" placeholder="Reminder Due" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Reminder Range</label>
                <input type="text" required name="comments" placeholder="Reminder Range" class="form-control-text">
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
    $( "#datepicker3" ).datepicker({ 
      dateFormat: 'dd/mm/yy'
    });
  } );
</script>
<script>
  var dateToday = $('#date_expiry').val();
var dates = $("#datepicker2,#datepicker3").datepicker({
    dateFormat: 'dd/mm/yy',
    minDate: dateToday,
    onSelect: function(selectedDate) {
        var option = this.id == "datepicker2" ? "minDate" : "maxDate",
            instance = $(this).data("datepicker"),
            date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
        dates.not(this).datepicker("option", option, date);
    }
});
</script>
