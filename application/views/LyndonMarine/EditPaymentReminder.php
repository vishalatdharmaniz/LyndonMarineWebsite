<?php
include'includes/header_login.php';
include'includes/CheckUserLogin.php';
?>

<section id="main-edit">
  <div class="container">
    
    <div class="row">
        <div class="main-edit-add-left"> <a class="btn-blue" href="<?php echo base_url();?>index.php/VesselPaymentReminder/index/<?php echo $vessel_id; ?>">Go Back</a>             
        </div>     
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
          <h2>Edit Payment Reminder Form</h2> <br>
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
            foreach ($payment_reminder_details as $data)
           {
                
                   $invoice_number=$data['invoice_number'];
                   $company=$data['company'];
                   $reminder_date=date("d-m-Y",strtotime($data['reminder_date']));
                   $due_date=date("d-m-Y",strtotime($data['due_date']));
                   $amount=$data['amount'];
                   $currency=$data['currency'];
                   $paid_status=$data['paid_status'];
                   $remarks=$data['remarks'];
                   $reminder_id=$data['reminder_id'];
            }

          ?>
          <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/EditPaymentReminder/Edit/<?php echo $reminder_id; ?>/<?php echo $vessel_id; ?>" >
           <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Invoice Number</label>
                <input type="text" placeholder="Invoice Number" name="invoice_number" value="<?php echo $invoice_number; ?>" required class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Company</label>
                <input type="text" placeholder="Company" name="company"  value="<?php echo $company; ?>" required class="form-control-text">
              </div>
            </div>
             <div class="row">
               <div class="form-group col-md-6">
                <label class="control-label">Date</label>
                <input type="text" id="datepicker1" placeholder="Date" name="reminder_date"  value="<?php echo $reminder_date; ?>" required="Date" class="form-control-text">
              </div>
                <div class="form-group col-md-6">
                <label class="control-label">Due Date</label>
                <input type="text" id="datepicker2" placeholder="Due Date" value="<?php echo $due_date; ?>" name="due_date" class="form-control-text">
              </div>
            </div>
           
            <div class="row">
               <div class="form-group col-md-6">
                <label class="control-label" >Currency</label>
                <select  name="currency" required class="form-control-text">
                   <option selected value="" disabled>Select</option>
                  <option value="USD" <?php if($currency=='USD'){echo "selected";} ?>>USD</option>
                  <option value="GBP" <?php if($currency=='GBP'){echo "selected";} ?>>GBP</option>
                  <option value="EURO" <?php if($currency=='EURO'){echo "selected";} ?>>EURO</option>
                </select>
              </div>
               <div class="form-group col-md-6">
                <label class="control-label"> Amount</label>
                <input type="text" placeholder="Amount" name="amount" value="<?php echo $amount; ?>" required="Amount" class="form-control-text">
              </div>
            </div>
            
            <div class="row">
             <div class="form-group col-md-6">
                <label class="control-label">Paid </label>
               <select  name="paid_status" required id="paid_status" class="form-control-text" >
                  <option selected value="" disabled>Select</option>
                  <option value="Yes" <?php if($paid_status=='Yes'){echo "selected";} ?> >Yes</option>
                  <option value="No" <?php if($paid_status=='No'){echo "selected";} ?> >No</option>
                </select>
              </div>
               <div class="form-group col-md-6">
                <label class="control-label">Remarks</label>
                <input type="text" placeholder="Remarks" name="remarks" value="<?php echo $remarks; ?>" class="form-control-text">
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
    $( "#datepicker2" ).datepicker({ dateFormat: 'dd/mm/yy' }).val();
     $( "#datepicker3" ).datepicker({ dateFormat: 'dd/mm/yy' }).val();
  } );
  

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