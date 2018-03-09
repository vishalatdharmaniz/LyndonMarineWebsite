<?php
include'includes/header_login.php';
include'includes/CheckUserLogin.php';
?>
<section id="main-edit">
  <div class="container">
    
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
          <h2>Add Crew Details </h2> <br>
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
          <form method="post" action="<?php echo base_url(); ?>index.php/AddCrewDetails/index/<?php echo $vessel_id; ?>" enctype="multipart/form-data">
            
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Name</label>
                <input type="text" placeholder="Name" name="name" required class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Tourist Passport Number</label>
                <input type="text" placeholder="Tourist Passport Number" required name="tourist_p_num" class="form-control-text">
              </div>
            </div>
            <div class="row">
               <div class="form-group col-md-6">
                <label class="control-label">Seaman Passport Number</label>
                <input type="text" placeholder="Seaman Passport Number" name="seaman_p_num" required class="form-control-text">
              </div>
               <div class="form-group col-md-6">
                <label class="control-label">Rank</label>
                <input type="text" placeholder="Rank" name="rank" required class="form-control-text">
              </div>
            </div>
            
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Salary (USD)</label>
                <input type="text" placeholder="Salary (USD)" name="salary" required class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Join Date</label>
                <input type="text" id="datepicker1" placeholder="Join Date" name="join_date" class="form-control-text">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Nationality</label>
                <input type="text" placeholder="Nationality" name="nationality" required class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Remark</label>
                <input type="text" placeholder="Remark" name="remark"  class="form-control-text">
              </div>
            </div>
            
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Upload Freight Invoice:</label>
                <input type="file" placeholder="Upload Freight Invoice:" name="document" class="form-control-text">
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
  } );
</script>