<?php
include'includes/CheckUserLogin.php';
include'includes/header_login.php';
?>
<section id="main-edit">
  <div class="container">
    <div class="row">
			
			<!--<div class="col-md-3">-->
        <div class="main-edit-add-left"> <a class="btn-blue" href="<?php echo base_url();?>index.php/Vessel_fixture/index/<?php echo $vessel_id; ?>">Go Back</a>                
          </div>       
      <!--</div>-->
			
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
          <h2>Add Fixture </h2>
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
				/*	if(!empty($error)){
						echo $error['error'];
					}
					echo form_open_multipart(base_url()."/index.php/AddFixture/add/$vessel_id");*/ ?>
          <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/AddFixture/add_fixture/<?php echo $vessel_id; ?>">  
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Fixture No.</label>
                <input type="text" name="fixture_no" required placeholder="Fixture No." class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Fixture Date:</label>
                <input type="text" name="fixture_date" id="datepicker1" required placeholder="Fixture Date:" class="form-control-text">
              </div>
            </div>
			      <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Loading Port(s)</label>
                <input type="text" name="loading_port" required placeholder="Loading Port(s)" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Discharging Port(s)</label>
                <input type="text" name="discharging_port" required placeholder="Discharging Port(s)" class="form-control-text">
              </div>
            </div>
			<div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Freight</label>
                <input type="text" name="fright" required placeholder="Freight" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Currency</label>
                <select required class="form-control-text" id="sel1" name="currency">
                  <option selected value="" disabled>Type of Currency</option>
                  <option value="USD">USD</option>
                  <option value="GBP">GBP</option>
                  <option value="Euro">Euro</option>
                </select>
              </div>
            </div>
			     <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Bokers Involved</label>
                <input type="text" name="boker" required placeholder="Bokers Involved" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Commission(%)</label>
                <input type="text" name="commission" required placeholder="Commission(%)"  class="form-control-text">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-12">
                <label class="control-label">Remarks</label>
                <input type="text" name="remarks" required placeholder="Remarks" class="form-control-text">
              </div>
              	
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Upload contract</label>
                <input type="file" name="upload_contract" accept="pdf, rtf, excel/*">
              </div>
              <div class="form-group col-md-6">
               <label class="control-label">Upload Invoice</label>
                <input type="file" name="upload_invoice" accept="pdf, rtf, excel/*">
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
  } );
</script>