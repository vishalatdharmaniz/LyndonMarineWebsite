<?php
include'includes/header_login.php';
include'includes/CheckUserLogin.php';
?>

<section id="main-edit">
  <div class="container">
    
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
          <h2>Crew Details </h2> <br>
        </div> 
      </div>
    </div>  
  </div>
</section>

<section id="top_mail">
  <div class="container">
      <div class="row"> 
        <div class="col-md-3">
        <div class="main-edit-add-left"> <a class="btn-blue" href="<?php echo base_url();?>index.php/FleetDetails/index/<?php echo $vessel_id; ?>">Go Back</a>                
          </div>       
      </div>
     
      <div class="col-md-4">
      <div class="input-group">
        <form onsubmit="searchEnter(document.getElementById('search_crew').value); return false;">
          <input type="text" class="form-control-text" placeholder="Search" name="search" id="search_crew">
        </form>
          <span class="input-group-btn">
            <a class="btn btn-default text-muted" href="" title="Clear" onclick="reset()"><i class="glyphicon glyphicon-remove"></i> </a>
            <button onclick="search(document.getElementById('search_crew').value)" type="button" class="btn btn-info">
              <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
            </button>
          </span>
        </div>
      </div>
      
      <div class="col-md-5">
        <div class="list_right">
        <ul class="main-edit-add"> 
            <li>
              <a class="btn-blue" href="<?php echo base_url();?>index.php/CrewDetails/AddCrewDetailsScreen/<?php echo $vessel_id; ?>">Add </a>
            </li>
            <li>
              <a class="btn-blue" onclick="mail_selected_vessels()" >Mail Selected Document</a>
            </li>
        </ul>
       </div>
     </div>
   </div>
</div>
</section>

<section id="work-done">
  <div class="container"> 
    <div class="row">
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th class="text-center">Name</th>
                <th class="text-center">Tourist Passport No.</th>
                <th class="text-center">Seaman Passport No.</th>
                <th class="text-center">Rank</th>
                <th class="text-center">Salary</th>
                <th class="text-center">Document</th>
                <th class="text-center">Select</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                foreach ($crew_data as $data) 
                {
                  $crew_id=$data['crew_id'];
                $name=$data['name'];
                $tourist_p_number=$data['tourist_p_num'];
                $seaman_p_number=$data['seaman_p_num'];
                $rank=$data['rank'];
                $salary=$data['salary'];
                

                ?>
                <tr>
                  <td class="text-center"><?php echo $name; ?></td>
                  <td class="text-center"><?php echo $tourist_p_number; ?></td>
                  <td class="text-center"><?php echo $seaman_p_number; ?></td>
                  <td class="text-center"><?php echo $rank; ?></td>
                  <td class="text-center"><?php echo $salary; ?></td>
                  <td class="text-center">
                 <a href="<?php echo base_url(); ?>index.php/CrewDetails/view_crew_details/<?php echo $crew_id; ?>" class="btn btn-primary">View
                  </td>
                  <td>
                    <input type="checkbox" name="checkbox" id="checkbox<?php echo $data['crew_id']; ?>">
                </td>
                <td class="text-center">
                  <a href="<?php echo base_url();?>index.php/DeleteCrew/index/<?php echo $data['crew_id']; ?>/<?php echo $data['vessel_id']; ?>" Onclick="return confirm('Are you Sure?');" class="btn-bk">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                  </a>
                  <a href="<?php echo base_url();?>index.php/CrewDetails/EditCrew/<?php echo $data['crew_id']; ?> " class="btn-bk">
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
          
        </div>
      </div>
    </div>
</section>

<?php
include'includes/footer.php';
?>
<script >
   function search(search_crew)
{
    if(search_crew == "")
    {
        alert("Please enter a value to be searched");
    }
    else
    {
            window.location.href = "<?php echo base_url(); ?>index.php/CrewDetails/searchdata/"+search_crew+"/"+<?php echo $data['vessel_id'] ?>;
    }
}
function searchEnter(search_crew)
{
    if(search_crew == "")
    {
        alert("Please enter a value to be searched");
    }
    else
    {
      window.location.href = "<?php echo base_url(); ?>index.php/CrewDetails/searchdata/"+search_crew+"/"+<?php echo $data['vessel_id'] ?>;
    }
}

function reset(search_crew)
{
  $('#search_crew').val('');
  window.location.href = "<?php echo base_url(); ?>index.php/CrewDetails/index/"+<?php echo $data['vessel_id'] ?>;
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
        checkbox_ids+=checkbox_id+"&";
    }
    var email = prompt("Please enter the Email of recepient:", "abc@gmail.com");
    if (email != null) {
        checkbox_ids = checkbox_ids.slice(0,-1)
        window.location.href = "<?php echo site_url(); ?>/MailCrewDocuments/index/"+checkbox_ids+"/"+email;
    }

}
</script>