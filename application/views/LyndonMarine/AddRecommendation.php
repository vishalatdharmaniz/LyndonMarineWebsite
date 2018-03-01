<?php
include'includes/header_login.php';
?>
<section id="main-edit">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
          <h2>Vessel Recommendation Form</h2>
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
          <form method="post" action="<?php echo base_url(); ?>index.php/AddRecommendation/index/<?php echo $vessel_id;?>" enctype="multipart/form-data">
            
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Type of Recommendation</label>
                <select required class="form-control-text" id="sel1" name="recommendation_type">
                  <option>Type of Recommendation</option>
                  <option value="management">Management</option>
                  <option value="text2">dummy text</option>
                  <option value="text3">dummy text</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Recommendation Date</label>
                <input type="text" id="datepicker1" name="recommendation_date" placeholder="Recommendation Date" class="form-control-text">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Due Date</label>
                <input type="text" id="datepicker2" name="due_date" placeholder="Due Date" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Description</label>
                <input type="text" name="description" placeholder="Description" class="form-control-text">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-12">
                  <p>Is it get rectified</p>
                <label class="control-label">Yes
                <input type="radio" name="rectified_status" value="Yes"></label>
                 <label class="control-label">No
                <input type="radio" name="rectified_status" value="No"></label>
                Show Rectified Date and Rectified by only when it gets rectified.
              </div>
              
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Rectifed  Date</label>
                <input type="text" id="datepicker3" name="rectified_date" placeholder="Rectifed  Date" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Rectifed  By </label>
                <input type="text" name="rectified_by" placeholder="Rectifed  By " class="form-control-text">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-12">
                <label class="control-label">Reminder (days)</label>
                <input type="text" name="reminder" placeholder="Reminder 1 (Days)" class="form-control-text">
              </div>
             
            </div>
            <div class="row">
              <div class="col-md-12">
                <label class="control-label">Upload Doc</label>
                <input type="file" name="image1" accept="png, jpg ,pdf/*">
              </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                <label class="control-label">Upload Doc</label>
                <input type="file" name="image2" accept="png, jpg ,pdf/*">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label class="control-label">Upload Doc</label>
                <input type="file" name="image3" accept="png, jpg,pdf/*">
              </div>
            </div>
            <br>
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
</script>