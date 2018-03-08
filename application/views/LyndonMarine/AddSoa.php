<?php
include'includes/header_login.php';
include'includes/CheckUserLogin.php';
?>

<section id="main-edit">
  <div class="container">
    
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
          <h2>ADD SOA</h2> <br>
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
                <label class="control-label">Date</label>
                <input type="text" id="datepicker1" placeholder="Date" name="soa_date" required class="form-control-text">
              </div>
            </div>
            <div class="row">
               <div class="form-group col-md-6">
                <label class="control-label">Currency</label>
                <input type="text" placeholder="Currency" name="currency" class="form-control-text">
              </div>
               <div class="form-group col-md-6">
                <label class="control-label">Upload Document</label>
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
  } );
</script>