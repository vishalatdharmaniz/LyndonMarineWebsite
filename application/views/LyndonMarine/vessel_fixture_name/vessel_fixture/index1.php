<?php
include'includes/header_login.php'
?>

<section id="main-edit">
  <div class="container">
    
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
          <h2>Vessel Fixtures </h2> <br>
        </div>
        
        
      </div>
    </div>
     
  </div>
</section>
<?php
if(!isset($search_critria)){
	$search_critria = "";
}
?>
<section id="top_mail">
  <div class="container">
      <div class="row"> 
        
        <div class="col-md-3">
            <div class="main-edit-add-left"> 
              <a class="btn-blue" href="<?php echo base_url();?>index.php/FleetDetails/index/<?php echo $vessel_id; ?>">
              Go Back
              </a>
          </div>       
        </div>
      <div class="col-md-4">

    <form action="<?php echo base_url()."index.php/Vessel_fixture/search/$vessel_id" ?>" method="post">
    <div class="input-group">
			<table>
				<tr>
					<td>
						  <input type="text" id="search_box" class="form-control-text" value="<?php if(isset($search_data)){echo $search_data;}?>" placeholder="Loading Port" name="search_cretria">				
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><span class="caret"></span>
            </button>
            
            <ul class="dropdown-menu">

   <li>
  <div class="col-md-12"><div class="form-group">
    <label for="inputAddress" style="color:black; margin-bottom:15px; margin-top:12px; font-size:18px;">Advanced Search </label>
   </div> <hr></div></li>
   
    <li>
  <div class="col-md-12"><div class="form-group">
    <label for="inputAddress" style="color:black; margin-bottom:15px; margin-top:12px;">Loading Port</label>
   <input type="text" id="search_box" class="form-control-text" value="<?php if(isset($search_data)){echo $search_data;}?>" placeholder="Loading Port" name="loading_port"> 
  </div></div></li>
    <li> <div class="col-md-12"><div class="form-group">
   <label for="inputAddress" style="color:black; margin-bottom:15px;margin-top:12px;">Discharge Port</label>
   <input type="text" id="search_box" class="form-control-text" value="<?php if(isset($search_data)){echo $search_data;}?>" placeholder="Discharge port" name="discharge_port">
  </div></div></li>
    <li><div class="col-md-12"> <div class="form-group">
   <label for="inputAddress" style="color:black; margin-bottom:15px;margin-top:12px;">Fixture No</label>
    <input type="text" id="search_box" class="form-control-text" value="<?php if(isset($search_data)){echo $search_data;}?>" placeholder="Fixture No" name="fixture_no">
  </div></div></li>
  <li>
  <div class="form-group col-md-6">
      <label for="inputEmail4" style="color:black; margin-bottom:15px;margin-top:12px;">Start Date</label>
      <input type="text" id="start_date" class="form-control-text" value="<?php if(isset($search_data)){echo $search_data;}?>" placeholder="Start Date" name="start_date">
    </div>
  <div class="form-group col-md-6">
      <label for="inputPassword4" style="color:black; margin-bottom:15px;margin-top:12px;">End Date</label>
      <input type="text" id="end_date" class="form-control-text" value="<?php if(isset($search_data)){echo $search_data;}?>" placeholder="End Date" name="end_date">
    </div>
  </li>
  </ul>
  
					</td>
				</tr>
			</table>
    
  <div class="input-group-btn"> <a class="btn btn-default text-muted" href="<?php echo base_url();?>index.php/vessel_fixture/index/<?php echo $vessel_id;?>" title="Clear" onclick="reset()"><i class="glyphicon glyphicon-remove"></i> </a>
    <button type="submit" class="btn btn-info"> <span class="glyphicon glyphicon-search" aria-hidden="true"></span> </button>
    </div>
     </div>		
  
      </div>
      <div class="col-md-4">
      </div>
			
     </form> 
      <div class="col-md-5">
        <div class="list_right">
        <ul class="main-edit-add">
					<li><a class="btn-blue" href="<?php echo base_url();?>index.php/vessel_fixture/index/<?php echo $vessel_id; ?>">All Fixture </a></li>
        <li><a class="btn-blue" href="<?php echo base_url();?>index.php/vessel_fixture/add/<?php echo $vessel_id; ?>">Add New Fixture </a></li>
				
          <!-- <li><a class="btn-blue" onclick="mail_selected_vessels()" >Mail Document</a></li> -->
          </ul>
				</br>
				<ul class="main-edit-add">
					<li><button class="btn-blue" onclick="mail_selected_vessels()" >Mail Document</button></li>
				</ul>
         </div>
         </div>
         
         
      </div>
    </div>
</section>
<section id="work-done">
  <div class="container">
		 
    <!--<div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="img-upload"> <img src="img/image01.jpg" class="img-responsive"> </div>
      </div>
    </div>-->
    <div class="row">
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Fixture No</th>
                <th>Date</th>
                <th>Loading port(s)</th>
                <th>Discharging Port(s)</th>
                <th>Freight</th>
                <th>Currency</th>
                <th class="text-center">Contract</th>
                <th class="text-center">Fright Invoice</th>
                <th>Select</th>
                
              </tr>
            </thead>
            <tbody>
            <?php
			//echo "<pre>";print_r($all_fixture);die;
			foreach($all_fixture as $data) { ?>
              <tr>
                <td><?php echo $data['fixture_no']; ?></td>
                <td><?php
								if($data['fixture_date'] != "0000-00-00 00:00:00"){
									echo date("d/m/y",strtotime($data['fixture_date'])); 
								}else{
									echo "--"; 
								}
								?></td>
                <td><?php echo $data['loading_port']; ?></td>
                <td><?php echo $data['discharging_port']; ?></td>
                <td><?php echo $data['fright']; ?></td>
                 <td><?php echo $data['currency']; ?></td>
                <td class="text-center"><a href="<?php echo base_url(); ?>/uploads/<?php echo $data['contract'];?>" class="btn btn-primary">View</td>
				<td class="text-center"><a href="<?php echo base_url(); ?>/uploads/<?php echo $data['invoice'];?>" class="btn btn-primary">View</td>
                 
                <td>
                    <input type="checkbox" name="checkbox" id="checkbox<?php echo $data['id']; ?>">
                </td>
               <td class="text-center">
                  <a href="<?php echo base_url();?>index.php/vessel_fixture/delete/<?php echo $data['id'] ?>/<?php echo $data['vessel_id']; ?>" Onclick="return confirm('Are you Sure?');" class="btn-bk">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                  </a>
                  <a href="<?php echo base_url();?>index.php/vessel_fixture/edit/<?php echo $data['id']; ?>/<?php echo $data['vessel_id']; ?>" class="btn-bk">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                  </a>
               </td>
              </tr>
               
              <?php } ?>
            </tbody>
          </table>
		  <div class="row">
          <div class="col-md-12">
            <div class="text-center"> <?php echo $this->pagination->create_links(); ?> </div>
          </div>
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
	$( document ).ready(function() {
		$( "#start_date" ).datepicker({ dateFormat: 'dd/mm/yy' }).val();
		$( "#end_date" ).datepicker({ dateFormat: 'dd/mm/yy' }).val();
});
</script>
<script>
	function mail_selected_vessels()
{
    var checkedBoxes = getCheckedBoxes("checkbox");
    var checkbox_ids = '';
    for (var index = 0; index < checkedBoxes.length; index++) 
    {
        var checkbox_id = checkedBoxes[index].getAttribute("id");
        checkbox_ids+=checkbox_id+"@";
    }
    var email = prompt("Please enter the Email of recepient:", "abc@gmail.com");
    if (email != null) {
        checkbox_ids = checkbox_ids.slice(0,-1)
				var a = "<?php echo site_url(); ?>/vessel_fixture/mail/"+checkbox_ids+"/"+email;
        window.location.href = "<?php echo site_url(); ?>/vessel_fixture/mail_doc/"+checkbox_ids+"/"+email;
    }

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
</script>