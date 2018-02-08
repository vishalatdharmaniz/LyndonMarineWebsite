<?php
include'includes/header_login.php';
?>
<section id="main-edit">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
          <h2>Edit Certificate</h2>
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
        
          <form method="post" action="<?php echo base_url() ?>index.php/EditCertificate/index/<?php echo $certificate_id; ?>" enctype="multipart/form-data">
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Certificate No.</label>
                <input type="text" placeholder="Certificate No"  name="certificate_no" class="form-control-text" value="<?php echo $certificate_data['certificate_no']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Certificate Name</label>
                <input type="text" placeholder="Certificate" name="certificate_name" class="form-control-text" value="<?php echo $certificate_data['certificate_name']; ?>">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Certificate Type</label>
                <select required class="form-control-text" name="certificate_type" id="certificate_type">
                  <option selected="" id="selectedvalue"><?php echo ucwords($certificate_data['certificate_type']); ?></option>
                  <option value="class">Class</option>
                  <option value="flag">Flag</option>
                  <option value="safety">Safety</option>
                  <option value="management">Management</option>
                  <option value="other">Other</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Date of Issue</label>
                <input type="text" name="date_issue" id="datepicker1" required placeholder="Date of Issue" class="form-control-text" value="<?php echo date("d/m/Y",strtotime($certificate_data['date_issue'])); ?>">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Date of Expiry</label>
                <input type="text" name="date_expiry" id="datepicker2" required placeholder="Date of Expiry" class="form-control-text" value="<?php echo date("d/m/Y",strtotime($certificate_data['date_expiry'])); ?>">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Extention until</label>
                <input type="text" name="extention_until" id="datepicker3" placeholder="Extention until" class="form-control-text" value="<?php echo (($certificate_data['extention_until']) ? date("d/m/Y",strtotime($certificate_data['extention_until'])) : '');?>">
              </div>
            </div>
            
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Reminder 1 (Days)</label>
                <input type="text" required name="reminder1" placeholder="Reminder 1 (Days)" class="form-control-text" value="<?php echo $certificate_data['reminder1']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Reminder 2 (Days)</label>
                <input type="text" required name="reminder2" placeholder="Reminder 2 (Days)" class="form-control-text" value="<?php echo $certificate_data['reminder2']; ?>">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Exemption</label>
                <input type="text" name="examption" placeholder="Exemption" class="form-control-text" value="<?php echo $certificate_data['examption']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Comments</label>
                <input type="text" required name="comments" placeholder="Comments" class="form-control-text" value="<?php echo $certificate_data['comments']; ?>">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4"> 
                <label class="control-label">Upload Certificates:</label>
              </div>
            </div>
            <div class="row">
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label">Document 1 </label>
                    <button type="button" id="remove-document1" >Remove</button>
                    <input type="file" id="document1-chosen" name="document1" accept="pdf/*"><br>
                  </div>
                  <div class="col-md-8">
                    <br>
                    <a href="<?php echo $certificate_data['document1']; ?>" class="btn btn-primary"> View</a>&nbsp;
                      <?php if(!empty($certificate_data['document1'])) {?>
                      <span id = "show-document1"><?php $value = explode("/",$certificate_data['document1']);echo substr($value[6],0,10); ?></span>
                      <?php } 
                      else { ?>
                      <span> No Document Available </span>
                      <?php } ?>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label">Document 2</label>
                    <button type="button" id="remove-document2" >Remove</button>
                    <input type="file" id="document2-chosen" name="document2" accept="pdf/*"><br>
                  </div>
                  <div class="col-md-8">
                    <br>
                    <a href="<?php echo $certificate_data['document2']; ?>" class="btn btn-primary"> View</a>&nbsp;
                      <?php if(!empty($certificate_data['document2'])) {?>
                      <span  id = "show-document2"><?php $value = explode("/",$certificate_data['document2']);echo substr($value[6],0,10); ?></span>
                      <?php } 
                      else { ?>
                      <span> No Document Available </span>
                      <?php } ?>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label">Document 3</label>
                    <button type="button" id="remove-document3" >Remove</button>
                    <input type="file" id="document3-chosen" name="document3" accept="pdf/*"><br>
                  </div>
                  <div class="col-md-8">
                    <br>
                    <a href="<?php echo $certificate_data['document3']; ?>" class="btn btn-primary"> View</a>&nbsp;
                      <?php if(!empty($certificate_data['document3'])) {?>
                      <span id = "show-document3"><?php $value = explode("/",$certificate_data['document3']);echo substr($value[6],0,10); ?></span>
                      <?php } 
                      else { ?>
                      <span> No Document Available </span>
                      <?php } ?>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label">Document 4</label>
                    <button type="button" id="remove-document4" >Remove</button>
                    <input type="file" id="document4-chosen" name="document4" accept="pdf/*"><br>
                  </div>
                  <div class="col-md-8">
                    <br>
                    <a href="<?php echo $certificate_data['document4']; ?>" class="btn btn-primary"> View</a>&nbsp;
                      <?php if(!empty($certificate_data['document4'])) {?>
                      <span id = "show-document4"><?php $value = explode("/",$certificate_data['document4']);echo substr($value[6],0,10); ?></span>
                      <?php } 
                      else { ?>
                      <span> No Document Available </span>
                      <?php } ?>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label">Document 5</label>
                    <button type="button" id="remove-document5" >Remove</button>
                    <input type="file" id="document5-chosen" name="document5" accept="pdf/*"><br>
                  </div>
                  <div class="col-md-8">
                    <br>
                    <a href="<?php echo $certificate_data['document5']; ?>" class="btn btn-primary"> View</a>&nbsp;
                      <?php if(!empty($certificate_data['document5'])) {?>
                      <span id = "show-document5"><?php $value = explode("/",$certificate_data['document5']);echo substr($value[6],0,10); ?></span>
                      <?php } 
                      else { ?>
                      <span> No Document Available </span>
                      <?php } ?>
                  </div>
                </div>
            </div>
        <input type="hidden" name="document1-removed" id="document1-removed">
        <input type="hidden" name="document2-removed"  id="document2-removed">
        <input type="hidden" name="document3-removed"  id="document3-removed">
        <input type="hidden" name="document4-removed"  id="document4-removed">
        <input type="hidden" name="document5-removed"  id="document5-removed">
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
  } );
  $('#selectedvalue').hide();

  $("#remove-document1").click(function(){
      document.getElementById("document1-removed").value = '1';
      document.getElementById("show-document1").style.display = 'none';
    });
      $("#remove-document2").click(function(){
      document.getElementById("document2-removed").value = '1';
      document.getElementById("show-document2").style.display = 'none';
    });
      $("#remove-document3").click(function(){
      document.getElementById("document3-removed").value = '1';
      document.getElementById("show-document3").style.display = 'none';
    });
      $("#remove-document4").click(function(){
      document.getElementById("document4-removed").value = '1';
      document.getElementById("show-document4").style.display = 'none';
    });
      $("#remove-document5").click(function(){
      document.getElementById("document5-removed").value = '1';
      document.getElementById("show-document5").style.display = 'none';
});

$("#document1-chosen").click(function(){
      document.getElementById("document1-removed").value = '0';
      // document.getElementById("show-document1").style.display = 'none';
    });
      $("#document2-chosen").click(function(){
      document.getElementById("document2-removed").value = '0';
      // document.getElementById("show-document2").style.display = 'none';
    });
      $("#document3-chosen").click(function(){
      document.getElementById("document3-removed").value = '0';
      // document.getElementById("show-document3").style.display = 'none';
    });
      $("#document4-chosen").click(function(){
      document.getElementById("document4-removed").value = '0';
      // document.getElementById("show-document4").style.display = 'none';
    });
      $("#document5-chosen").click(function(){
      document.getElementById("document5-removed").value = '0';
      // document.getElementById("show-document5").style.display = 'none';
});
</script>
<!--script>
  var dateToday = $('#datepicker2').val();
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
</script-->
