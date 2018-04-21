<?php
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
        <div class="main-edit-add"> <a class="btn-blue" href="<?php echo base_url();?>index.php/VesselBunkerSupply/index/<?php echo $vessel_id ; ?>">Go Back </a> 
        </div>   
      </div>
      <div class="col-md-offset-1 col-md-6">
        <div class="page-heading">
          <h2>View Vessel Bunker Supply </h2>
        </div>
      </div>
       <div class="col-md-2">
        <div class="main-edit-add"> <a class="btn-blue" href="<?php echo base_url();?>index.php/EditBunkerSupply/index/<?php echo $bunker_id ; ?>">Edit</a> 
        </div>   
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
                <?php foreach($bunker_data as $data) 
                { 
                   $suppliers=$data['suppliers'];
                   $date_of_supply=$data['date_of_supply'];
                  $port_of_supply=$data['port_of_supply'];
                  $due_date=$data['due_date'];
                  $mdo=$data['mdo'];
                  $hfo=$data['hfo'];
                  $luboil_1_type=$data['luboil_1_type'];
                  $luboil_1_quantity=$data['luboil_1_quantity'];
                  $luboil_2_type=$data['luboil_2_type'];
                  $luboil_2_quantity=$data['luboil_2_quantity'];
                  $others=$data['others'];
                  $remarks=$data['remarks'];
                  $reminder=$data['reminder'];
                  $date_due=$data['due_date'];
                  $invoice_amount=$data['invoice_amount'];
                  $invoice_num=$data['invoice_num'];
                  $currency=$data['currency'];
                  $paid_status=$data['paid'];
                  $document1=$data['document1'];    
                  $document2=$data['document2'];    
                  $paid=$data['paid'];
                  $paid_date=$data['paid_date'];
                
                }
              ?>
                <tr>
                  <th width="40%">Date Of Supply</th>
                  <th width="60%"><?php if($date_of_supply!=""){echo $date_of_supply ; } else { echo "N/A";} ?></th> 
                </tr>
                <tr>
                  <th scope="row">Port Of Supply</th>
                  <td> <?php if($port_of_supply!=""){echo $port_of_supply ; } else { echo "N/A";} ?> </td>
                </tr>
                <tr>
                  <th scope="row">Supplier's</th>
                  <td><?php if($suppliers!=""){echo $suppliers ; } else { echo "N/A";} ?> </td>  
                </tr>
                <tr>
                  <th scope="row">MDO</th>
                  <td><?php if($mdo!=""){echo $mdo ; } else { echo "N/A";}  ?> </td>  
                </tr>
                <tr>
                  <th scope="row">HFO</th>
                  <td><?php if($hfo!=""){echo $hfo ; } else { echo "N/A";} ?> </td>  
                </tr>
                <tr>
                  <th scope="row">Luboil 1 Type</th>
                  <td><?php if($luboil_1_type!=""){echo $luboil_1_type ; } else { echo "N/A";} ?> </td>  
                </tr>
                <tr>
                  <th scope="row">Luboil 1 Quantity</th>
                  <td><?php if($luboil_1_quantity!=""){echo $luboil_1_quantity ; } else { echo "N/A";} ?> </td>  
                </tr> 
                <tr>
                 <th width="42">Luboil 2 Type</th>
                 <td><?php if($luboil_2_type!=""){echo $luboil_2_type ; } else { echo "N/A";} ?> </td>  
                </tr> 
                <tr>
                 <th width="42">Luboil 2 Quantity</th>
                 <td><?php if($luboil_2_quantity!=""){echo $luboil_2_quantity ; } else { echo "N/A";} ?> </td>  
                </tr> 
                <tr>
                 <th width="42">Others</th>
                 <td><?php if($others!=""){echo $others ; } else { echo "N/A";} ?> </td>  
                </tr> 
                <tr>
                 <th width="42">Remarks</th>
                 <td><?php if($remarks!=""){echo $remarks ; } else { echo "N/A";} ?> </td>  
                </tr> 
                <tr>
                 <th width="42">Due Date</th>
                 <td><?php if($due_date!=""){echo $due_date ; } else { echo "N/A";} ?> </td>  
                </tr> 
                <tr>
                 <th width="42">Reminder</th>
                 <td><?php if($reminder!=""){echo $reminder ; } else { echo "N/A";} ?> </td>  
                </tr>
                <tr>
                 <th width="42">Invoice Amount</th>
                 <td><?php if($invoice_amount!=""){echo $invoice_amount ; } else { echo "N/A";} ?> </td>  
                </tr>
                <tr>
                 <th width="42">Invoice Number</th>
                 <td><?php if($invoice_num!=""){echo $invoice_num ; } else { echo "N/A";} ?> </td>  
                </tr>
                <tr>
                 <th width="42">Paid</th>
                 <td><?php if($paid!=""){echo $paid ;}else{ echo "N/A";} ?> </td>  
                </tr>
                <tr>
                 <th width="42">Paid Date</th>
                 <td><?php if($paid_date!=""){echo $paid_date ; } else { echo "N/A";} ?></td>  
                </tr>
              </tbody>
               
              </table>
            </div>
                 <div class="row">
              <div class="doc-img">
                  <ul>
                      <li>
                        <?php if(!empty($document1)) {?>
                        <a href="<?php echo $document1; ?>" target="_blank"><img src="<?php echo base_url(); ?>img/icon_for_documents.PNG" class="img-responsive">  </a><br>
                        <span><?php $value = explode("/",$document1);echo substr($value[6],0,20); ?></span>
                        <?php } 
                        else { ?>
                       <!-- <span> No Document Available </span>-->
                        <?php } ?>
                      </li>
                       <li>
                        <?php if(!empty($document2)) {?>
                        <a href="<?php echo $document2; ?>" target="_blank"><img src="<?php echo base_url(); ?>img/icon_for_documents.PNG" class="img-responsive">  </a><br>
                        <span><?php $value = explode("/",$document2);echo substr($value[6],0,20); ?></span>
                        <?php } 
                        else { ?>
                       <!-- <span> No Document Available </span>-->
                        <?php } ?>
                      </li>
                      
                      
                  </ul>
              </div>  
            </div>
            
            </div>
    </div>
  </div>
</section>
<?php
include'includes/footer.php';
?>