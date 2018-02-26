<?php
include'includes/header_login.php';
?>
<section id="main-edit">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
          <h2>Certificate Form</h2>
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
          <form action="<?php echo base_url(); ?>index.php/AddCertificate/index/<?php echo $vessel_id; ?>" method="post" enctype="multipart/form-data">
            
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Certificate No.</label>
                <input type="text" name="certificate_no" required placeholder="Certificate No" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Certificate Name</label>
                <input type="text" name="certificate_name" required placeholder="Certificate Name" class="form-control-text">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Certificate Type</label>
                <select  class="form-control-text" required name="certificate_type" id="certificate_type">
                  <option>Select Certificate Type</option>
                  <option value="class">Class</option>
                  <option value="flag">Flag</option>
                  <option value="safety">Safety</option>
                  <option value="management">Management</option>
                  <option value="other">Other</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Date of Issue</label>
                <input type="text" name="date_issue" id="datepicker1" required placeholder="Date of Issue" class="form-control-text">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Date of Expiry</label>
                <input type="text" name="date_expiry" id="datepicker2" required placeholder="Date of Expiry" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Extention until</label>
                <input type="text" name="extention_until" id="datepicker3" placeholder="Extention until" class="form-control-text">
              </div>
            </div>
            
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Reminder 1 (Days)</label>
                <input type="text" required name="reminder1" placeholder="Reminder 1 (Days)" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Reminder 2 (Days)</label>
                <input type="text" required name="reminder2" placeholder="Reminder 2 (Days)" class="form-control-text">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Exemption</label>
                <input type="text" name="examption" placeholder="Exemption" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Comments</label>
                <input type="text" name="comments" placeholder="Comments" class="form-control-text">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4"> 
                <label class="control-label">Upload Certificates:</label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Upload Doc1 </label>
                  <input type="file" name="document1" accept="pdf/*">
                  <!-- <button type="button"  class="btn btn-danger" id="remove-document1" style="margin-top:10px;">Remove</button> -->
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Upload Doc2</label>
                  <input type="file" name="document2" accept="pdf/*">
                  <!-- <button type="button" class="btn btn-danger" id="remove-document2" style="margin-top:10px;">Remove</button> -->
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Upload Doc3</label>
                  <input type="file" name="document3" accept="pdf/*">
                  <!-- <button type="button" class="btn btn-danger" id="remove-document3" style="margin-top:10px;">Remove</button> -->
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Upload Doc4 </label>
                  <input type="file" name="document4" accept="pdf /*">
                  <!-- <button type="button" class="btn btn-danger" id="remove-document4" style="margin-top:10px;">Remove</button> -->
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Upload Doc5</label>
                  <input type="file" name="document5" accept="pdf/*">
                  <!-- <button type="button" class="btn btn-danger" id="remove-document5" style="margin-top:10px;">Remove</button> -->
                </div>
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
  /*var dateToday = $('#date_expiry').val();
var dates = $("#datepicker2,#datepicker3").datepicker({
    dateFormat: 'dd/mm/yy',
    minDate: dateToday,
    onSelect: function(selectedDate) {
        var option = this.id == "datepicker2" ? "minDate" : "maxDate",
            instance = $(this).data("datepicker"),
            date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
        dates.not(this).datepicker("option", option, date);
    }
}); */
</script>
