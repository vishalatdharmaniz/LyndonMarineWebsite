<?php
include'includes/header_login.php';
include'includes/CheckUserLogin.php';
?>

<section id="main-edit">
  <div class="container">
    
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
          <h2>EDIT SOA</h2> <br>
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
          <?php
            foreach ($soa_data as $data) 
            {
             $soa_id= $data['soa_id']; 
             $soa_num=$data['soa_num']; 
             $soa_date=$data['soa_date']; 
             $currency=$data['currency']; 
             $document=$data['document']; 
            }

          ?>
          <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/EditSoa/edit_soa/<?php echo $soa_id; ?>" >
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">SOA No.</label>
                <input type="text" placeholder="SOA No." name="soa_num" value="<?php echo $soa_num; ?>" required class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Date</label>
                <input type="text" id="datepicker1" placeholder="Date" name="date" value="<?php echo $soa_date; ?>"  required class="form-control-text">
              </div>
            </div>
            <div class="row">
               <div class="form-group col-md-6">
                <label class="control-label">Currency</label>
                <input type="text" placeholder="Currency" name="currency" value="<?php echo $currency; ?>"  class="form-control-text">
              </div>
               <div class="form-group col-md-6">
                <label class="control-label">Upload Document</label>
                <input type="file" placeholder="Upload Document" name="document" value="<?php echo $document; ?>"  class="form-control-text">
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