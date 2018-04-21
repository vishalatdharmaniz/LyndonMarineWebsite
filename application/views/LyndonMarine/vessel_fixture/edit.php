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
          <h2>Edit Fixture </h2>
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
					/*if(!empty($error)){
						echo $error['error'];
					}
					$id = $result['id'];
					echo form_open_multipart(base_url()."/index.php/vessel_fixture/edit/$id/$vessel_id/");*/ 
            foreach ($fixture_data as $data) 
            {
              $fixture_no=$data['fixture_no'];
              $fixture_date=$data['fixture_date'];
              $loading_port=$data['loading_port'];
              $discharging_port=$data['discharging_port'];
              $fright=$data['fright'];
              $currency=$data['currency'];
              $bokers=$data['bokers'];
              $commission=$data['commission'];
              $remarks=$data['remarks'];
              $contract=$data['contract'];
              $invoice=$data['invoice'];
              $id=$data['id'];
              $vessel_id=$data['vessel_id'];

            }


          ?>
            <form action="<?php echo base_url(); ?>index.php/EditFixture/edit/<?php echo $id; ?>/<?php echo $vessel_id; ?>" enctype="multipart/form-data" method="post">
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Fixture No.</label>
                <input type="text" name="fixture_no" required placeholder="Fixture No." value="<?php echo $fixture_no; ?>" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Fixture Date:</label>
                <input type="text" name="fixture_date" id="datepicker1" required placeholder="Fixture Date:" value="<?php echo date("d/m/Y",strtotime($data['fixture_date'])); ?>" class="form-control-text">
              </div>
            </div>
			<div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Loading Port(s)</label>
                <input type="text" name="loading_port" required placeholder="Loading Port(s)"  value="<?php echo $loading_port; ?>" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Discharging Port(s)</label>
                <input type="text" name="discharging_port" required placeholder="Discharging Port(s)"  value="<?php echo $discharging_port; ?>" class="form-control-text">
              </div>
            </div>
			<div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Freight</label>
                <input type="text" name="fright" required placeholder="Freight"  value="<?php echo $fright; ?>" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Currency</label>
                <select required class="form-control-text" id="sel1"  name="currency">
                  <option selected value="" disabled>
                      Type of Currency
                  </option>
                  <option <?php if($currency == "USD"){ echo "selected=selected";} ?> value="USD">USD</option>
                  <option <?php if($currency == "GBP"){ echo "selected=selected";} ?> value="GBP">GBP</option>
                  <option <?php if($currency == "Euro"){ echo "selected=selected";} ?> value="Euro">Euro</option>
                </select>
              </div>
            </div>
			<div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Bokers Involved</label>
                <input type="text" name="boker" required placeholder="Bokers Involved"  value="<?php echo $bokers; ?>" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Commission(%)</label>
                <input type="text" name="commission" required placeholder="Commission(%)"  value="<?php echo $commission; ?>" class="form-control-text">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-12">
                <label class="control-label">Remarks</label>
                <input type="text" name="remarks" required placeholder="Remarks"  value="<?php echo $remarks; ?>" class="form-control-text">
              </div>
              	
            </div>
            <div class="row">
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label">Upload Contract (Max Size 64mb)</label>
                    <input type="file" id="document1-chosen" name="contract"  accept="png, jpg/*"><br>
                  </div>
                  <div class="col-md-8">
                    <br>
                    <?php if(!empty($contract)) {?>
                    
                      <span id = "show-document1">
                      <a href="<?php echo $contract ;  ?>" class="btn btn-primary"> View</a>&nbsp;
                      <?php $value = explode("/",$contract);
                       echo substr($value[6],0,25); ?>
                       <button type="button"  class="btn btn-danger" id="remove-document1" style="margin-left:10px;">Remove</button>
                      </span>
                      
                      <?php } 
                      else { ?>
                      <span> No Document Available </span>
                      <?php } ?>
                       <input type="hidden" name="document1-removed" id="document1-removed">
                  </div>
                </div>
            </div> 
            <div class="row">
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label">Upload Invoice (Max Size 64mb)</label>
                    <input type="file" id="document2-chosen" name="invoice"  accept="png, jpg/*"><br>
                  </div>
                  <div class="col-md-8">
                    <br>
                    <?php if(!empty($invoice)) {?>
                    
                      <span id = "show-document2">
                      <a href="<?php echo $invoice ;  ?>" class="btn btn-primary"> View</a>&nbsp;
                      <?php $value = explode("/",$invoice );
                       echo substr($value[6],0,25); ?>
                       <button type="button"  class="btn btn-danger" id="remove-document2" style="margin-left:10px;">Remove</button>
                      </span>
                      
                      <?php } 
                      else { ?>
                      <span> No Document Available </span>
                      <?php } ?>
                       <input type="hidden" name="document2-removed" id="document2-removed">
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
  } );
</script>
<script>
  $("#remove-document1").click(function(){
      document.getElementById("document1-removed").value = '1';
      document.getElementById("show-document1").style.display = 'none';
    });
      $("#remove-document2").click(function(){
      document.getElementById("document2-removed").value = '1';
      document.getElementById("show-document2").style.display = 'none';
    });

$("#document1-chosen").click(function(){
      document.getElementById("document1-removed").value = '0';
      // document.getElementById("show-document1").style.display = 'none';
    });
      $("#document2-chosen").click(function(){
      document.getElementById("document2-removed").value = '0';
      // document.getElementById("show-document2").style.display = 'none';
    });
   
</script>