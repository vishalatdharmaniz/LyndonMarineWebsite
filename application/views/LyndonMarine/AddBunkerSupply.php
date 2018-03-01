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
          <form method="post" "><!-- action="<?php echo base_url(); ?>index.php/AddBunkerSupply/<?php echo $vessel_id; ?> -->
            
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Date Of Supply</label>
                <input type="text" id="datepicker1" placeholder="Date of Supply" required="Date Of Supply" name="date_of_supply" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Port of Supply</label>
                <input type="text" placeholder="Port of Supply" name="port_of_supply" required="Port Of Supply" class="form-control-text">
              </div>
            </div>
            <div class="row">
               <div class="form-group col-md-6">
                <label class="control-label">Supplier(s)</label>
                <input type="text" placeholder="Supplier(s)" name="suppliers" required="Supplier's" class="form-control-text">
              </div>
                <div class="form-group col-md-6">
                <label class="control-label">Due Date</label>
                <input type="text" id="datepicker2" placeholder="Due Date" name="due_date" class="form-control-text">
              </div>
            </div>
            
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">MDO (Tns)</label>
                <input type="text" placeholder="MDO (Tns)" name="mdo" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">HFO (Tns)</label>
                <input type="text" placeholder="HFO (Tns)" name="hfo" class="form-control-text">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Luboil 1 Type</label>
                <input type="text" placeholder="Luboil 1 Quantity " name="luboil_1_type" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Luboil 1 Quantity</label>
                <input type="text" placeholder="Luboil 2 Quantity" name="luboil_1_quantity" class="form-control-text">
              </div>
              
            </div>
            
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Luboil 2 Type</label>
                <input type="text" placeholder="Luboil 2 Type " name="luboil_2_type" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Luboil 2 Quantity</label>
                <input type="text" placeholder="Luboil 2 Quantity" name="luboil_2_quantity" class="form-control-text">
              </div>
              
            </div>
            <div class="row">
              <div class="form-group col-md-12">
                <label class="control-label">Others</label>
                <input type="text" placeholder="Others" name="others" class="form-control-text">
              </div>
            </div>
            
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Remarks</label>
                <input type="text" placeholder="Remarks" name="remarks" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Reminder (Days)</label>
                <input type="text" placeholder="Reminder (Days)" name="reminder" required="Reminder" class="form-control-text">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Invoice Amount</label>
                <input type="text" placeholder="Invoice Amount" name="invoice_amount" required="Invoice Amount" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Currency</label>
                <select  name="currency" class="form-control-text">
                  <option value="USD">USD</option>
                  <option value="GBP">GBP</option>
                  <option value="EURO">EURO</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Paid </label>
               <select  name="paid" class="form-control-text" >
                  <option value="y">Yes</option>
                  <option value="n">No</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Paid Date</label>
                <input type="text" id="datepicker3" placeholder="Paid Date" name="paid_date" required="Paid Date" class="form-control-text">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Upload Invoice</label>
                <input type="File" placeholder="Upload Invoice" name="upload_invoice" required="Upload Invoice" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Other Doc.</label>
                <input type="file" placeholder="Other Doc." name="other_doc" class="form-control-text">
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