<?php
include'includes/header_login.php';
?>
<section id="main-edit">
  <div class="container">
    <div class="row"> 
       <div class="col-md-2">
        <div class="main-edit-add"> <a class="btn-blue" href="<?php echo base_url();?>index.php/VesselRecommendation/index/<?php echo $vessel_id ; ?>">Go Back </a> 
        </div>   
      </div>
      <div class="col-md-6 col-md-9">
        <div class="page-heading">
          <h2>Add Recommendation Form</h2>
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
                <select required class="form-control-text" required id="sel1" name="recommendation_type">
                  <option selected value="" disabled>Recommendation Type</option>
                  <option value="management">Management</option>
                  <option value="class">Class</option>
                  <option value="port_state">Port State</option>
                  <option value="captain">Captain</option>
                  <option value="P&I">P&I</option>
                  <option value="Other">Other</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Recommendation Date</label>
                <input type="text" id="datepicker1" name="recommendation_date" required placeholder="Recommendation Date" class="form-control-text">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Due Date</label>
                <input type="text" id="datepicker2" name="due_date" required placeholder="Due Date" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Description</label>
                <input type="text" name="description" placeholder="Description" class="form-control-text">
              </div>
            </div>
           <div class="row">
              <div class="form-group col-md-12">
                  <p>Is it rectified?</p>
                <label class="control-label" >Yes
                <input type="radio" name="rectified_status" id="chkYes" value="Yes"  required></label>
                 <label class="control-label">No
                <input type="radio" name="rectified_status" id="chkNo" value="No" required></label>
              </div>
            </div>
            <div id="hidden_div" style="display: none;">
              <div class="row" >
                <div class="form-group col-md-6">
                  <label class="control-label">Rectifed  Date</label>
                  <input type="text" id="datepicker3" name="rectified_date" placeholder="Rectifed  Date"  class="form-control-text">
                </div>
                <div class="form-group col-md-6">
                  <label class="control-label">Rectifed  By </label>
                  <input type="text" id="rectified_by" name="rectified_by"  placeholder="Rectifed  By " class="form-control-text">
                </div>
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
                <label class="control-label">Upload Document (Max Size 64mb)</label>
                <input type="file" name="image1" accept="png, jpg ,pdf/*">
              </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                <label class="control-label">Upload Document (Max Size 64mb)</label>
                <input type="file" name="image2" accept="png, jpg ,pdf/*">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label class="control-label">Upload Document (Max Size 64mb)</label>
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


  //function for displaying hidden div which contains rectified date and rectified by when clicked on yes it willappear otherwise it will remain hidden.
    $(function () {
        $("input[name='rectified_status']").click(function () {
            if ($("#chkYes").is(":checked")) {
                $("#hidden_div").show();
            } else {
                $("#hidden_div").hide();
            }
        });
    });
</script>
