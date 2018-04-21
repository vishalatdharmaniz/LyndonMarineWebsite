<?php
include'includes/header_login.php';
include'includes/CheckUserLogin.php';
?>

 <section id="main-edit">
  <div class="container">
    
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
          <h2>Bunker Supply for 
            <?php foreach ($vessel_data as $data)
                {
                    $vessel_name=$data['vessel_name'];
                    echo $vessel_name;
                }?>
            
          </h2> <br>
        </div> 
       </div>
    </div>
     
  </div>
</section>
<section id="top_mail">
  <div class="container">
      <div class="row"> 
        <div class="col-md-3">
        <div class="main-edit-add-left"> <a class="btn-blue" href="<?php echo base_url(); ?>index.php/FleetDetails/index/<?php echo $vessel_id; ?>">Go Back</a>                
          </div>       
       </div>
      
       <div class="col-md-4">
      <div class="input-group">
        <form onsubmit="searchEnter(document.getElementById('search_bunker').value); return false;">
          <input type="text" class="form-control-text" placeholder="Search" name="search" id="search_bunker">
        </form>
          <span class="input-group-btn">
            <a class="btn btn-default text-muted" href="#" title="Clear" onclick="reset()"><i class="glyphicon glyphicon-remove"></i> </a>
            <button onclick="search(document.getElementById('search_bunker').value)" type="button" class="btn btn-info">
              <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
            </button>
          </span>
        </div>
      </div>
      
      <div class="col-md-5">
        <div class="list_right">
        <ul class="main-edit-add"> 
        <li><a class="btn-blue" href="<?php echo base_url(); ?>index.php/AddBunkerSupplyScreen/index/<?php echo $vessel_id; ?>">Add</a></li>
          <li><a class="btn-blue" onclick="mail_selected_vessels()" >Mail Selected Document</a></li>
          <li><a class="btn-blue" href="<?php echo base_url(); ?>index.php/VesselBunkerSupply/index/<?php echo $vessel_id; ?>" >All Bunker Supply</a></li>
          </ul>
         </div>
         </div>
         
      </div>
    </div>
</section>

<section id="work-done">
  <div class="container"> <div class="row">
     <div class="black_bg">
     <div class="col-md-8">
      <div class="mar_box">
      <form id="drop_down" action="<?php echo base_url(); ?>index.php/VesselBunkerSupply/search_dropdown_status/<?php echo $vessel_id; ?>" method="get">
      <input type="hidden" name="range" value="red" />
      <button type="submit" id="redclor" class="update text-center btn btn-red btn-sm"></button>
      </form>
      &nbsp;<span>Due in 5 days</span>&nbsp;&nbsp;
      <form id="drop_down" action="<?php echo base_url(); ?>index.php/VesselBunkerSupply/search_dropdown_status/<?php echo $vessel_id; ?>" method="get">
      <input type="hidden" name="range" value="green" />
      <button type="submit" id="greenclr" class="update text-center btn btn-green btn-sm"></button>
      </form>
      &nbsp;<span>Valid more than 5 days</span>&nbsp;&nbsp;
      <form id="drop_down" action="<?php echo base_url(); ?>index.php/VesselBunkerSupply/search_dropdown_status/<?php echo $vessel_id; ?>" method="get">
      <input type="hidden" name="range" value="blue" />
      <button type="submit" id="blueclr" class="update text-center btn btn-blue-status btn-sm"></button>
      </form>
      &nbsp;<span>Paid</span>&nbsp;&nbsp;
      
      </div>
    </div>
     
      <div class="col-md-2">
       <!--  <div class="input-group">
          <select class="form-control-text1" placeholder="Select" name="suppliers" id="suppliers">
            <option selected value="">Supplier Name</option>
            <option value="web">web</option>
            <option value="dsd">dsd</option>
            <option value="text3">text3</option>
          </select>
        </div> -->
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
           <form id="drop_down" action="<?php echo base_url(); ?>index.php/VesselBunkerSupply/search_dropdown_status/<?php echo $vessel_id; ?>" method="get">
         
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
                <th class="text-center">Supplier Name</th>
                <th class="text-center">Supply Port</th>
                <th class="text-center">Supply Date</th>
                <th class="text-center">Invoice Amount</th>
                <th class="text-center">Currency</th>
                <th class="text-center">Due Date</th>
                <th class="text-center">Paid</th>
                <th class="text-center">View Invoice </th>
                <th class="text-center">Status</th>
                <th class="text-center">Select</th>
                <th class="text-center">Action</th>
                
              </tr>
            </thead>
            <tbody>
              <?php  
                foreach ($bunker_supply_data as $data) 
                {
                    $now = time(); 
                  $due_date =strtotime($data['due_date']) ;  
                  $date_of_supply =strtotime($data['date_of_supply']);

                  $caldays = $due_date - $now; 

                  if($due_date>$now && $due_date>$date_of_supply)
                  {
                  $caldays = $due_date - $now;   
                  $calday =  round($caldays / (60 * 60 * 24));  
                  }
          
                  $calday =  round($caldays / (60 * 60 * 24)); 
             
            
                  $bunker_id=$data['bunker_id'];
                  $suppliers=$data['suppliers'];
                  $port_of_supply=$data['port_of_supply'];
                  $invoice_amount=$data['invoice_amount'];
                  $invoice_num=$data['invoice_num'];
                  $currency=$data['currency'];
                  $paid_status=$data['paid'];
                  $document1=$data['document1'];    
                  $supply_date=$data['date_of_supply'];
                  $date_due=$data['due_date'];
              ?>          
              <tr>
                
                <td class="text-center">
                  <?php if($invoice_num!=""){echo $invoice_num; } else{echo "N/A" ;} ?>
                </td>
                <td class="text-center"><?php echo $suppliers; ?></td>
                <td class="text-center"><?php echo $port_of_supply; ?></td>
                <td class="text-center"><?php  echo date("d-m-Y",strtotime($supply_date)); ?></td>
                 <td class="text-center">
                  <?php if($invoice_amount!=""){echo $invoice_amount; } else{echo "N/A" ;} ?>
                </td>
                <td class="text-center"><?php if($currency!=""){echo $currency; } else{echo "N/A" ;}  ?></td>
                <td class="text-center"><?php if($date_due!=""){echo date("d-m-Y",strtotime($date_due));} else{echo $date_due="N/A";} ?></td>
                <td class="text-center"><?php if($paid_status=="Yes"){echo $paid_status;} else{echo "No";} ?></td>
                <td class="text-center"><a href="<?php echo base_url(); ?>index.php/ViewBunkerSupply/index/<?php echo $bunker_id ; ?>" class="btn btn-primary">View</td>
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
                    <input type="checkbox" name="checkbox" id="checkbox<?php echo $data['bunker_id']; ?>">
                </td>
               <td class="text-center">
                  <a href="<?php echo base_url();?>index.php/DeleteBunkerSupply/index/<?php echo $bunker_id; ?>/<?php echo $vessel_id ; ?>" Onclick="return confirm('Are you Sure?');" class="btn-bk">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                  </a>
                  <a href="<?php echo base_url();?>index.php/EditBunkerSupply/index/<?php echo $bunker_id; ?>" class="btn-bk">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                  </a>
               </td>
              </tr>
               <?php 
               } //for each loop ends 
               ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="work-done">
  <div class="row">
      <div class="col-md-12">
        <div class="text-center">
          
            <?php echo $links; ?>
          
        </div>
      </div>
    </div>
</section>
<?php
include'includes/footer.php';
?>
<script>
  function search(search_bunker)
{
    if(search_bunker == "")
    {
        alert("Please enter a value to be searched");
    }
    else
    {
            $vessel_id="<?php echo $vessel_id; ?>";
            window.location.href = "<?php echo base_url(); ?>index.php/VesselBunkerSupply/searchdata/"+search_bunker+"/"+$vessel_id;
    }
}
function searchEnter(search_bunker)
{
    if(search_bunker == "")
    {
        alert("Please enter a value to be searched");
    }
    else
    {
       $vessel_id="<?php echo $vessel_id; ?>";
      window.location.href = "<?php echo base_url(); ?>index.php/VesselBunkerSupply/searchdata/"+search_bunker+"/"+$vessel_id;
    }
}

function reset(search_bunker)
{
  $('#search_bunker').val('');
  $vessel_id="<?php echo $vessel_id; ?>";
  window.location.href = "<?php echo base_url(); ?>index.php/VesselBunkerSupply/index/"+$vessel_id;
}

function getCheckedBoxes(chkboxName) 
     {
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
        window.location.href = "<?php echo site_url(); ?>/MailBunkerSupply/index/"+checkbox_ids+"/"+email;
    }

}

$('#suppliers').change(function(){
      $selected_value=$('#suppliers option:selected').text();
      $vessel_id="<?php echo $vessel_id; ?>";
      window.location.href = "<?php echo base_url(); ?>index.php/VesselBunkerSupply/search_supplier_type/"+$vessel_id;
    });

</script>