<?php
include'includes/CheckUserLogin.php';
include'includes/header_login.php';
?>
<section id="main-edit">
  <div class="container"> 
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
            <h2>
               Payment Reminder For
               <?php foreach ($vessel_data as $data) 
                  {
                    echo $data['vessel_name'];
                  } 
               ?>
                 
            </h2>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="top_mail">
  <div class="container">
      <div class="row"> 
        
        <div class="col-md-3">
          <div class="main-edit-add-left"> <a class="btn-blue" href="<?php echo base_url();?>index.php/FleetDetails/index/<?php echo $vessel_id; ?>">Go Back</a> </div>       
        </div>
      
    <!--   <div class="col-md-4">
      <div class="input-group">
        <form onsubmit="searchEnter(document.getElementById('search_document').value); return false;">
          <input type="text" class="form-control-text" placeholder="Search" name="search" id="search_document">
        </form>
          <span class="input-group-btn">
            <a class="btn btn-default text-muted" href="#" title="Clear" onclick="reset()"><i class="glyphicon glyphicon-remove"></i> </a>
            <button onclick="search(document.getElementById('search_document').value)" type="button" class="btn btn-info">
              <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
            </button>
          </span>
        </div>
      </div>
      -->
      <div class="col-md-4">
        <!-- For spacing it is required or search implementation. -->
      </div>
      <div class="col-md-5">
        <div class="list_right">
          <ul class="main-edit-add">
             <li> 
               <a class="btn-blue" href="<?php echo base_url(); ?>index.php/AddPaymentReminder/index/<?php echo $vessel_id; ?>">Add</a>
            </li> 
             <li>
              <a class="btn-blue" href="<?php echo base_url(); ?>index.php/VesselPaymentReminder/index/<?php echo $vessel_id; ?>">All Reminders</a>
            </li> 
            <!--  <li><button class="btn-blue" onclick="mail_selected_vessels()" >Mail Document</button></li> --> 
          </ul>
         </div>
      </div> 
         
         
      </div>
    </div>
</section>

<section id="work-done">
  <div class="container">
     <div class="row">
     <div class="black_bg">
     <div class="col-md-8">
      <div class="mar_box">
      <form id="drop_down" action="<?php echo base_url(); ?>index.php/VesselPaymentReminder/search_dropdown_status/<?php echo $vessel_id; ?>" method="get">
      <input type="hidden" name="range" value="red" />
      <button type="submit" id="redclor" class="update text-center btn btn-red btn-sm"></button>
      </form>
      &nbsp;<span>Due in 5 days</span>&nbsp;&nbsp;
      <form id="drop_down" action="<?php echo base_url(); ?>index.php/VesselPaymentReminder/search_dropdown_status/<?php echo $vessel_id; ?>" method="get">
      <input type="hidden" name="range" value="green" />
      <button type="submit" id="greenclr" class="update text-center btn btn-green btn-sm"></button>
      </form>
      &nbsp;<span>Valid more than 5 days</span>&nbsp;&nbsp;
      <form id="drop_down" action="<?php echo base_url(); ?>index.php/VesselPaymentReminder/search_dropdown_status/<?php echo $vessel_id; ?>" method="get">
      <input type="hidden" name="range" value="blue" />
      <button type="submit" id="blueclr" class="update text-center btn btn-blue-status btn-sm"></button>
      </form>
      &nbsp;<span>Paid</span>&nbsp;&nbsp;
      
      </div>
    </div>
     
      <div class="col-md-2">
     
        <!-- for alignment of status dropdown to right. -->
     </div>
   <div class="col-md-2">
       <div class="input-group">
        <?php
          if(array_key_exists('range',$_REQUEST)){
             $range = $_REQUEST['range'];
          }else{
            $range ="";
          }
          ?>
           <form id="drop_down" action="<?php echo base_url(); ?>index.php/VesselPaymentReminder/search_dropdown_status/<?php echo $vessel_id; ?>" method="get">
         
            <select class="form-control-text1" name="range" style="width: 169px;" onchange="this.form.submit()">
              <option selected value="" disabled>Select Status</option>
              <option value="red" <?php if($range == "red"){echo "selected=selected";}?>>Due in 5 days</option>
              <option value="green" <?php if($range == "green"){echo "selected=selected";}?>>Valid More than 5 days</option>
              <option value="blue" <?php if($range == "blue"){echo "selected=selected";}?>> Paid</option>
              
            </select>
          
          </form>
      </div>
    </div>
</div>
</div>

    <div class="row">
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
              
                <th class="text-center">Invoice Number</th>
                <th class="text-center">Company</th>
                <th class="text-center">Date</th>
                <th class="text-center">Due Date</th>
                <th class="text-center">Amount</th>
                <th class="text-center">Currency</th>
                <th class="text-center">Paid</th>
                <th class="text-center">Remark</th>
                <th class="text-center">View</th>
                <th class="text-center">Status</th> 
                <th class="text-center">Select</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                  foreach ($total_payments_details as $data)
                   {
                       $now = time(); 
                      $date_of_reminder = str_replace('/', '-', $data['reminder_date']);
                      $date_of_reminder = strtotime($date_of_reminder);
              /*  var_dump($date_of_reminder);*/
                      $date_of_due = str_replace('/', '-', $data['due_date']);
                      $date_of_due = strtotime($date_of_due);
                      
                      

                        //var_dump($date_of_due);
                       $caldays = $date_of_due - $now; 
 
                        if($date_of_due>$now && $date_of_due>$date_of_reminder)
                          {
                              $caldays = $date_of_due - $now;   
                              $calday =  round($caldays / (60 * 60 * 24));  
                          }
                      
                           $calday =  round($caldays / (60 * 60 * 24));
                           
                       $invoice_number=$data['invoice_number'];
                       $company=$data['company'];
                       $reminder_date=date("d-m-Y",strtotime($data['reminder_date']) );
                       $due_reminder_date=date("d-m-Y",strtotime($data['due_date']) );
                       $amount=$data['amount'];
                       $currency=$data['currency'];
                       $paid_status=$data['paid_status'];
                       $remarks=$data['remarks'];
                       $reminder_id=$data['reminder_id'];

              ?>
           
              <tr>
                <td class="text-center"><?php if($invoice_number!=''){echo $invoice_number;}else{echo 'N/A';} ?></td>
                <td class="text-center"><?php if($company!=''){ echo $company;}else{echo 'N/A';}  ?></td>
                <td class="text-center"><?php if($reminder_date!=''){ echo $reminder_date;}else{echo 'N/A';}  ?></td>
                <td class="text-center"><?php if($due_reminder_date!=''){ echo $due_reminder_date;}else{echo 'N/A';}  ?></td>
                <td class="text-center"><?php if($amount!=''){ echo $amount;}else{echo 'N/A';}  ?></td>
                <td class="text-center"><?php if($currency!=''){ echo $currency; }else{echo 'N/A';} ?></td>
                <td class="text-center"><?php if($paid_status!=''){ echo $paid_status;}else{echo 'N/A';}  ?></td>
                <td class="text-center"><?php if($remarks!=''){ echo $remarks;}else{echo 'N/A';}  ?></td>
                <td class="text-center"><a href="<?php echo base_url(); ?>index.php/VesselPaymentReminder/view/<?php echo $reminder_id; ?>" class="btn btn-primary"> View</a>
                </td>
                <td class="text-center">
                 <?php 
                 if($paid_status=="Yes") { ?>
                  <button type="button" class="update text-center btn btn-blue-status btn-sm"></button>
                  <?php }
                  elseif($calday<=5) { ?>
                  <button type="button" class="update text-center btn btn-red btn-sm"></button>
                  <?php }
                  elseif($calday>5) { ?>
                  <button type="button" class="update text-center btn btn-green btn-sm"></button>
                  <?php } 
                  elseif($calday) { ?>
                  <button type="button" class="update text-center btn btn-default btn-sm"></button>
                  <?php } ?>
              </td>
                <td class="text-center">
                <input type="checkbox" name="checkbox" id="checkbox<?php echo $reminder_id; ?>">
              </td>
              <td class="text-center">
                <a href="<?php echo base_url(); ?>index.php/VesselPaymentReminder/delete/<?php echo $reminder_id; ?>/<?php echo $vessel_id; ?>" Onclick="return confirm('Are you Sure?');" class="btn-bk">
                  <i class="fa fa-trash" aria-hidden="true"></i>
                </a>
                <a href="<?php echo base_url(); ?>index.php/EditPaymentReminder/index/<?php echo $reminder_id; ?>/<?php echo $data['vessel_id']; ?>" class="btn-bk">
                  <i class="fa fa-pencil" aria-hidden="true"></i>
                </a>
              </td>
              </tr> 
             <?php    } ?>
          
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
      <div class="col-md-12">
        <div class="text-center">
          
            <?php echo $links; ?>
          
        </div>
      </div>
    </div>
    </div>
    
  </div>
</section>
<?php
include'includes/footer.php';
?>
<script>
  function getCheckedBoxes(chkboxName) {
                                    var checkboxes = document.getElementsByName(chkboxName);
                                    var checkboxesChecked = [];
                                    // loop over them all
                                    for (var i=0; i<checkboxes.length; i++) {
                                        // And stick the checked ones onto an array...
                                        if (checkboxes[i].checked) {
                                            checkboxesChecked.push(checkboxes[i]);
                                        }
                                    }
                                    // Return the array if it is non-empty, or null
                                    return checkboxesChecked.length > 0 ? checkboxesChecked : null;
                                    }

// Call as
function mail_selected_vessels()
{
    var checkedBoxes = getCheckedBoxes("checkbox");
    var checkbox_ids = '';
    for (var index = 0; index < checkedBoxes.length; index++) 
    {
        var checkbox_id = checkedBoxes[index].getAttribute("id");
        checkbox_ids+=checkbox_id+"@";
    }
    var email = prompt("Please enter the Email of recepient:", "office@lyndonmarine.com");
    if (email != null) {
        checkbox_ids = checkbox_ids.slice(0,-1)
        window.location.href = "<?php echo site_url(); ?>/VesselOldDocuments/multiple_mail/"+checkbox_ids+"/"+email;
    }

}/*
function search(search_document)
{
    if(search_document == "")
    {
        alert("Please enter a value to be searched");
    }
    else
    {
           $vessel_id="<?php echo $vessel_id; ?>";
            window.location.href = "<?php echo base_url(); ?>index.php/VesselOldDocuments/search_document/"+search_document+"/"+$vessel_id;
    }
}
function searchEnter(search_document)
{
    if(search_document == "")
    {
        alert("Please enter a value to be searched");
    }
    else
    { 
            $vessel_id="<?php echo $vessel_id; ?>";
            window.location.href = "<?php echo base_url(); ?>index.php/VesselOldDocuments/search_document/"+search_document+"/"+$vessel_id;
    }
}
function reset(search_document)
{
  $('#search_document').val('');
    $vessel_id="<?php echo $vessel_id; ?>";
  window.location.href = "<?php echo base_url(); ?>index.php/VesselOldDocuments/index/"+$vessel_id;
}*/

</script>