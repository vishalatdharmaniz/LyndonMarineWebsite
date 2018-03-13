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
          <form method="post" action="<?php echo base_url(); ?>index.php/EditBunkerSupply/edit_bunker_supply/<?php echo $bunker_id; ?>" enctype="multipart/form-data"  >
              <?php  
                foreach ($bunker_supply_data as $data) 
                {
                  $bunker_id=$data['bunker_id'];
                  $date_of_supply=$data['date_of_supply']; 
                  $port_of_supply=$data['port_of_supply'];
                  $suppliers=$data['suppliers'];
                  $mdo=$data['mdo'];
                  $hfo=$data['hfo'];
                  $luboil_1_type=$data['luboil_1_type'];
                  $luboil_1_quantity=$data['luboil_1_quantity'];
                  $luboil_2_type=$data['luboil_2_type'];
                  $luboil_2_quantity=$data['luboil_2_quantity'];
                  $others=$data['others'];
                  $port_of_supply=$data['port_of_supply'];
                  $due_date=$data['due_date'];
                  $remarks=$data['remarks'];
                  $reminder=$data['reminder'];
                  $invoice_amount=$data['invoice_amount'];
                  $currency=$data['currency'];
                  $paid=$data['paid'];
                  $paid_date=$data['paid_date'];
                  $document1=$data['document1'];
                  $document2=$data['document2'];
                  
                }
              ?>      
            
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Date Of Supply</label>
                <input type="text" id="datepicker1" placeholder="Date of Supply" name="date_of_supply" required="Date Of Supply" value="<?php echo date("d-m-Y",strtotime($date_of_supply)); ?>" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Port of Supply</label>
                <input type="text" placeholder="Port of Supply" value="<?php echo $port_of_supply ; ?>"  name="port_of_supply" required="Port Of Supply" class="form-control-text">
              </div>
            </div>
            <div class="row">
               <div class="form-group col-md-6">
                <label class="control-label">Supplier(s)</label>
                <input type="text" placeholder="Supplier(s)" value="<?php echo $suppliers ; ?>" name="suppliers" required="Supplier's" class="form-control-text">
              </div>
                <div class="form-group col-md-6">
                <label class="control-label">Due Date</label>
                <input type="text" id="datepicker2" placeholder="Due Date" value="<?php echo date("d-m-Y",strtotime($due_date)); ?>" name="due_date" class="form-control-text">
              </div>
            </div>
            
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">MDO (Tns)</label>
                <input type="text" placeholder="MDO (Tns)" name="mdo" value="<?php echo $mdo ; ?>" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">HFO (Tns)</label>
                <input type="text" placeholder="HFO (Tns)" name="hfo" value="<?php echo $hfo ; ?>" class="form-control-text">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Luboil 1 Type</label>
                <input type="text" placeholder="Luboil 1 Quantity " name="luboil_1_type" value="<?php echo $luboil_1_type ; ?>" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Luboil 1 Quantity</label>
                <input type="text" placeholder="Luboil 2 Quantity" name="luboil_1_quantity" value="<?php echo $luboil_1_quantity ; ?>" class="form-control-text">
              </div>
              
            </div>
            
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Luboil 2 Type</label>
                <input type="text" placeholder="Luboil 2 Type" name="luboil_2_type" value="<?php echo $luboil_2_type ; ?>" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Luboil 2 Quantity</label>
                <input type="text" placeholder="Luboil 2 Quantity" name="luboil_2_quantity" value="<?php echo $luboil_2_quantity ; ?>" class="form-control-text">
              </div>
              
            </div>
            <div class="row">
              <div class="form-group col-md-12">
                <label class="control-label">Others</label>
                <input type="text" placeholder="Others" value="<?php echo $others ; ?>" name="others" class="form-control-text">
              </div>
            </div>
            
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Remarks</label>
                <input type="text" placeholder="Remarks" value="<?php echo $remarks ; ?>" name="remarks" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Reminder (Days)</label>
                <input type="text" placeholder="Reminder (Days)" value="<?php echo $reminder ; ?>" name="reminder" required="Reminder" class="form-control-text">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Invoice Amount</label>
                <input type="text" placeholder="Invoice Amount" value="<?php echo $invoice_amount ; ?>" name="invoice_amount" required="Invoice Amount" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Currency</label>
                <select  class="form-control-text" name="currency">
                  <option><?php echo $currency ?></option>
                  <option value="USD">USD</option>
                  <option value="GBP">GBP</option>
                  <option value="EURO">EURO</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Paid </label>
               <select  class="form-control-text" name="paid">
                 <option><?php echo $paid ?></option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Paid Date</label>
                <input type="text" id="datepicker3" placeholder="Paid Date" name="paid_date" value="<?php echo $paid_date ; ?>" class="form-control-text">
              </div>
            </div>
            <br>
          
            <div class="row">
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label">Upload Invoice </label>
                    <input type="file" id="document1-chosen" name="document1"  accept="png, jpg/*"><br>
                  </div>
                  <div class="col-md-8">
                    <br>
                    <?php if(!empty($document1 )) {?>
                    
                      <span id = "show-document1">
                      <a href="<?php echo $document1 ;  ?>" class="btn btn-primary"> View</a>&nbsp;
                      <?php $value = explode("/",$document1 );
                       echo substr($value[6],0,25); ?>
                       <button type="button"  class="btn btn-danger" id="remove-document1" style="margin-left:10px;">Remove</button>
                      </span>
                      
                      <?php } 
                      else { ?>
                      <span> No Document Available </span>
                      <?php } ?>
                  </div>
                </div>
            </div>
             <div class="row">
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label">Other Document </label>
                    <input type="file" id="document2-chosen" name="document2"  accept="png, jpg/*"><br>
                  </div>
                  <div class="col-md-8">
                    <br>
                    <?php if(!empty($document2 )) {?>
                    
                      <span id = "show-document2">
                      <a href="<?php echo $document2 ;  ?>" class="btn btn-primary"> View</a>&nbsp;
                      <?php $value = explode("/",$document2 );
                       echo substr($value[6],0,25); ?>
                       <button type="button"  class="btn btn-danger" id="remove-document2" style="margin-left:10px;">Remove</button>
                      </span>
                      
                      <?php } 
                      else { ?>
                      <span> No Document Available </span>
                      <?php } ?>
                  </div>
                </div>
                   <input type="hidden" name="document1-removed" id="document1-removed">
           <input type="hidden" name="document2-removed" id="document2-removed">
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
  $('#selectedvalue').hide();
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