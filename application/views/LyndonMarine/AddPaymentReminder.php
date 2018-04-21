<?php
include'includes/header_login.php';
include'includes/CheckUserLogin.php';
?>
<section id="main-edit">
  <div class="container">
    <div class="row"> 
       <div class="col-md-2">
        <div class="main-edit-add"> <a class="btn-blue" href="<?php echo base_url();?>index.php/VesselPaymentReminder/index/<?php echo $vessel_id ; ?>">Go Back </a> 
        </div>   
      </div>
      <div class="col-md-6 col-md-9">
        <div class="page-heading">
          <h2>Add Payment Reminder Form</h2>
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
          <form method="post" action="<?php echo base_url(); ?>index.php/AddPaymentReminder/Add/<?php echo $vessel_id; ?>" enctype="multipart/form-data"  >
            
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Invoice Number</label>
                <input type="text" placeholder="Invoice Number" name="invoice_number" required="Invoice Number" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Company</label>
                <input type="text" placeholder="Company" name="company" required="Company" class="form-control-text">
              </div>
            </div>
            <div class="row">
               <div class="form-group col-md-6">
                <label class="control-label">Date</label>
                <input type="text" id="datepicker1" placeholder="Reminder Date" name="reminder_date" required="Date" class="form-control-text">
              </div>
                <div class="form-group col-md-6">
                <label class="control-label">Due Date</label>
                <input type="text" id="datepicker2" placeholder="Due Date" name="due_date" class="form-control-text">
              </div>
            </div>
           
            <div class="row">
               <div class="form-group col-md-6">
                <label class="control-label" >Currency</label>
                <select  name="currency" required class="form-control-text">
                   <option selected value="" disabled>Select</option>
                  <option value="USD">USD</option>
                  <option value="GBP">GBP</option>
                  <option value="EURO">EURO</option>
                </select>
              </div>
               <div class="form-group col-md-6">
                <label class="control-label"> Amount</label>
                <input type="text" placeholder="Amount" name="amount" required="Amount" class="form-control-text">
              </div>
            </div>
            
            <div class="row">
             <div class="form-group col-md-6">
                <label class="control-label">Paid </label>
               <select  name="paid_status" required id="paid_status" class="form-control-text" >
                  <option selected value="" disabled>Select</option>
                  <option value="Yes">Yes</option>
                  <option value="No" id="paid_status"  >No</option>
                </select>
              </div>
               <div class="form-group col-md-6">
                <label class="control-label">Remarks</label>
                <input type="text" placeholder="Remarks" name="remarks" class="form-control-text">
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