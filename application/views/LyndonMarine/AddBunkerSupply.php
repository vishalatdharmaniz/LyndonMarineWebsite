<?php
include'includes/header_login.php';
include'includes/CheckUserLogin.php';
?>

 <section id="main-edit">
  <div class="container">
    
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
          <h2>Bunker Supply Form</h2> <br>
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
          <form method="post" action="<?php echo base_url(); ?>index.php/AddBunkerSupply/<?php echo $vessel_id; ?>">
            
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Date of Supply</label>
                <input type="text" id="datepicker1" placeholder="Date of Supply" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Port of Supply</label>
                <input type="text" placeholder="Port of Supply" class="form-control-text">
              </div>
            </div>
            <div class="row">
               <div class="form-group col-md-6">
                <label class="control-label">Supplier(s)</label>
                <input type="text" placeholder="Supplier(s)" class="form-control-text">
              </div>
               <div class="form-group col-md-6">
                <label class="control-label">MDO (tns)</label>
                <input type="text" placeholder="MDO (tns)" class="form-control-text">
              </div>
            </div>
            
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">HFO (Tns)</label>
                <input type="text" placeholder="HFO (Tns)" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Luboil 1 Type</label>
                <input type="text" placeholder="Luboil 1 Type" class="form-control-text">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Luboil 1 Quantity </label>
                <input type="text" placeholder="Luboil 1 Quantity " class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Luboil 2</label>
                <input type="text" placeholder="Luboil 2" class="form-control-text">
              </div>
              
            </div>
            
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Luboil 2 Quantity </label>
                <input type="text" placeholder="Luboil 2 Quantity " class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Others</label>
                <input type="text" placeholder="Others" class="form-control-text">
              </div>
              
            </div>
            <div class="row">
              <div class="form-group col-md-12">
                <label class="control-label">Remark</label>
                <input type="text" placeholder="Remark" class="form-control-text">
              </div>
              
            </div>
            
            
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Due Date</label>
                <input type="text" id="datepicker2" placeholder="Due Date" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Reminder (Days)</label>
                <input type="text" placeholder="Reminder (Days)" class="form-control-text">
              </div>
              
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Invoice Amount</label>
                <input type="text" placeholder="Invoice Amount" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Currency</label>
                <input type="text" placeholder="Currency" class="form-control-text">
              </div>
              
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Other documents</label>
                <input type="text" placeholder="Other documents" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Paid</label>
                <input type="text" placeholder="Paid" class="form-control-text">
              </div>
              
            </div>
            <div class="row">
              <div class="form-group col-md-12">
                <label class="control-label">Paid Date</label>
                <input type="text" placeholder="Paid Date" class="form-control-text">
              </div>
            </div>
            
            <div class="row">
             <div class="form-group col-md-6">
                <label class="control-label">Upload Freight Invoice:</label>
                <input type="text" placeholder="Upload Freight Invoice:" class="form-control-text">
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