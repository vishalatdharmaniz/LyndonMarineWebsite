<?php
include'includes/header_login.php';
include'includes/CheckUserLogin.php';
?>

<section id="main-edit">
  <div class="container">
    
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
          <h2>SOA Details for
               <?php foreach ($vessel_data as $vesselname) 
                  {
                    echo $vesselname['vessel_name'];
                  } 
               ?> </h2> <br>
        </div> 
      </div>
    </div>  
  </div>
</section>

<section id="top_mail">
  <div class="container">
      <div class="row"> 
        <div class="col-md-3">
        <div class="main-edit-add-left"> 
          <a class="btn-blue" href="<?php echo base_url();?>index.php/FleetDetails/index/<?php echo $vessel_id; ?>">Go Back</a>                
        </div>       
      </div>
     
      <div class="col-md-4">
      <div class="input-group">
        <form onsubmit="searchEnter(document.getElementById('search_soa').value); return false;">
          <input type="text" class="form-control-text" placeholder="Search" name="search" id="search_soa">
        </form>
          <span class="input-group-btn">
            <a class="btn btn-default text-muted" href="#" title="Clear" onclick="reset()"><i class="glyphicon glyphicon-remove"></i> </a>
            <button onclick="search(document.getElementById('search_soa').value)" type="button" class="btn btn-info">
              <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
            </button>
          </span>
        </div>
      </div>
      
      <div class="col-md-5">
        <div class="list_right">
        <ul class="main-edit-add"> 
            <li>
              <a class="btn-blue" href="<?php echo base_url();?>index.php/VesselSoa/AddSoaScreen/<?php echo $vessel_id; ?>">Add </a>
            </li>
            <li>
              <a class="btn-blue" href="<?php echo base_url();?>index.php/VesselSoa/index/<?php echo $vessel_id; ?>">All SOA </a>
            </li>
            <li><a class="btn-blue" onclick="mail_selected_vessels()" >Mail Selected Document</a></li>
          </ul>
         </div>
         </div>
         
         
      </div>
    </div>
</section>
<section id="work-done">
  <div class="container">
   
   <div class="row">
   <div class="col-md-12">
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th class="text-center">SOA No.</th>
                <th class="text-center">From Date</th>
                <th class="text-center">To Date</th>
                <th class="text-center">Currency</th>
                <th class="text-center">Document</th>
                <th class="text-center">Select</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                foreach ($soa_data as $data) 
                {
                  $soa_id=$data['soa_id'];
                  $soa_num=$data['soa_num'];
                  $from_date=$data['from_date'];
                  $to_date=$data['to_date'];
                  $currency=$data['currency'];
          
                ?>
                <tr>
                  <td class="text-center"><?php if($soa_num!=''){echo $soa_num;}else{echo "N/A";} ?></td>
                  <td class="text-center"><?php  if($from_date!=''){echo $from_date; }else{echo "N/A";}?></td>
                  <td class="text-center"><?php  if($to_date!=''){echo $to_date; }else{echo "N/A";} ?></td>
                  <td class="text-center"><?php  if($currency!=''){echo $currency; }else{echo "N/A";}?></td>
                  <td class="text-center">
                 <a href="<?php echo base_url(); ?>index.php/VesselSoa/ViewSoa/<?php echo $soa_id; ?>" class="btn btn-primary">View
                  </td>
                  <td class="text-center">
                    <input type="checkbox" name="checkbox" id="checkbox<?php echo $data['soa_id']; ?>">
                </td>
               <td class="text-center">
                  <a href="<?php echo base_url();?>index.php/DeleteSoa/index/<?php echo $data['soa_id']; ?>/<?php echo $data['vessel_id']; ?>" Onclick="return confirm('Are you Sure?');" class="btn-bk">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                  </a>
                  <a href="<?php echo base_url();?>index.php/EditSoa/index/<?php echo $data['soa_id']; ?>/<?php echo $data['vessel_id']; ?>" class="btn-bk">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                  </a>
               </td>
                </tr>
                <?php
                     }
                 ?>


               </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
      <div class="col-md-12">
        <div class="text-center">
          
            <?php echo $links; ?>
          
        </div></div>
      </div>
    </div>
</section>

<?php 
include 'includes/footer.php';
?>
<script>


  function search(search_soa)
{
    if(search_soa == "")
    {
        alert("Please enter a value to be searched");
    }
    else
    {
           var $vessel_id = '<?php echo $vessel_id; ?>'; 
          window.location.href = "<?php echo base_url(); ?>index.php/VesselSoa/searchdata/"+search_soa+"/"+$vessel_id; 
    }
}
function searchEnter(search_soa)
{
    if(search_soa == "")
    {
        alert("Please enter a value to be searched");
    }
    else
    {
       var $vessel_id = '<?php echo $vessel_id; ?>';
       window.location.href = "<?php echo base_url(); ?>index.php/VesselSoa/searchdata/"+search_soa+"/"+$vessel_id; 
    }
}

function reset(search_soa)
{
  $('#search_soa').val('');
    var $vessel_id = '<?php echo $vessel_id; ?>';
  window.location.href = "<?php echo base_url(); ?>index.php/VesselSoa/index/"+$vessel_id;
}

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
        window.location.href = "<?php echo site_url(); ?>/MailSoaDetails/multiple/"+checkbox_ids+"/"+email;
    }

}

</script>