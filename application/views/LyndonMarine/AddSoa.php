<?php
include'includes/header_login.php';
include'includes/CheckUserLogin.php';
?>
<section id="main-edit">
  <div class="container">
    <div class="row"> 
       <div class="col-md-2">
        <div class="main-edit-add"> <a class="btn-blue" href="<?php echo base_url();?>index.php/VesselSoa/index/<?php echo $vessel_id ; ?>">Go Back </a> 
        </div>   
      </div>
      <div class="col-md-6 col-md-9">
        <div class="page-heading">
          <h2>Add SOA Form</h2>
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
          <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/AddSoa/index/<?php echo $vessel_id; ?>" >
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">SOA No.</label>
                <input type="text" placeholder="SOA No." name="soa_num" required class="form-control-text">
              </div>
               <div class="form-group col-md-6">
                <label class="control-label">Currency</label>
               <select required class="form-control-text" required id="sel1" name="currency">
                  <option>Select</option>
                  <option value="GBP">GBP</option>
                  <option value="USD">USD</option>
                  <option value="EURO">EURO</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">From Date</label>
                <input type="text" id="datepicker1" placeholder="From Date" name="from_date" required class="form-control-text">
              </div>
                <div class="form-group col-md-6">
                <label class="control-label">To Date</label>
                <input type="text" id="datepicker2" placeholder="To Date" name="to_date" required class="form-control-text">
              </div>
              
              
            </div>
            <div class="row">
               <div class="form-group col-md-6">
                <label class="control-label">Upload Document (Max Size 64mb)</label>
                <input type="file" placeholder="Upload Document" name="document" class="form-control-text">
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
include 'includes/footer.php';
?>
<script>
  $( function() {
    $( "#datepicker1" ).datepicker({ dateFormat: 'dd/mm/yy' }).val(); 
    $( "#datepicker2" ).datepicker({ dateFormat: 'dd/mm/yy' }).val();
  } );

   var dateToday = $('#date_expiry').val();
var dates = $("#datepicker1,#datepicker2").datepicker({
    dateFormat: 'dd/mm/yy',
    minDate: dateToday,
    onSelect: function(selectedDate) {
        var option = this.id == "datepicker1" ? "minDate" : "maxDate",
            instance = $(this).data("datepicker"),
            date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
        dates.not(this).datepicker("option", option, date);
    }
});
</script>