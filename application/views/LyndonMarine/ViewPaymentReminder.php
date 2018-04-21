<?php
include'includes/CheckUserLogin.php';
include'includes/header_login.php';
?>
<style>
  ul {
    display: flex;
  }
</style>
<section id="main-edit">
  <div class="container">
    <div class="row">
      <div class="col-md-2">
        <div class="main-edit-add"> <a class="btn-blue" href="<?php echo base_url();?>index.php/VesselPaymentReminder/index/<?php echo $vessel_id; ?>">Go Back</a> </div>       
      </div>
      <div class="col-md-offset-1 col-md-6">
        <div class="page-heading">
          <h2>View Payment Reminder </h2>
        </div>
      </div>
       <div class="col-md-2">
        <div class="main-edit-add"> <a class="btn-blue" href="<?php echo base_url();?>index.php/EditPaymentReminder/index/<?php echo $reminder_id; ?>/<?php echo $vessel_id; ?>">Edit</a> </div>       
      </div>
    </div>
  </div>
</section>
<section id="table-data">
<div class="container">
  
    <div class="row">
        
      <div class="col-md-10 col-md-offset-1">
        <div class="table-responsive">
        <table class="table table-bordered">
              <tbody>
                <?php
                foreach ($reminder_details as $data)
                 {
                   $invoice_number=$data['invoice_number'];
                   $company=$data['company'];
                   $reminder_date=date("d-m-Y",strtotime($data['reminder_date']));
                   $due_date=date("d-m-Y",strtotime($data['due_date']));
                   $amount=$data['amount'];
                   $currency=$data['currency'];
                   $paid_status=$data['paid_status'];
                   $remarks=$data['remarks'];
                }
                ?>
                <tr>
                  <th width="40%">Invoice Number</th>
                  <th width="60%"><?php echo $invoice_number; ?></th>
                
                </tr>
                <tr>
                  <th scope="row">Company</th>
                  <td><?php echo $company; ?></td>
                </tr>
                <tr>
                  <th scope="row">Date</th>
                  <td><?php echo $reminder_date; ?></td>
                </tr>
                <tr>
                  <th scope="row">Due Date</th>
                  <td><?php echo $due_date; ?></td>
                </tr>
                <tr>
                  <th scope="row">Amount</th>
                  <td><?php echo $amount; ?></td>
                </tr>
                <tr>
                  <th scope="row">Currency</th>
                  <td><?php echo $currency; ?></td>
                </tr>
                <tr>
                  <th scope="row">Paid Status</th>
                  <td><?php echo $paid_status; ?></td>
                </tr>
                <tr>
                  <th scope="row">Remarks</th>
                  <td><?php echo $remarks; ?></td>
                </tr>
              </tbody>  
          </table>
            </div>
            
        </div>
    </div>
  </div>
</section>

<?php
include'includes/footer.php';
?>
