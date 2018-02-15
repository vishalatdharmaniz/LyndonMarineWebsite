<?php
include'includes/header_login.php';
?>
<section id="main-edit">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
          <h2>Vessel Certificates</h2>
        </div>
      </div>
      <div class="col-md-3">
        <div class="main-edit-add"> <a class="btn-blue" href="<?php echo base_url();?>index.php/AddCertificateScreen/index/<?php echo $vessel_id; ?>">Add</a> </div>
        <br>
        <div class="main-edit-add"> <a class="btn-blue" href="<?php echo base_url(); ?>index.php/VesselCertificate/index/<?php echo $vessel_id; ?>">All Certificate</a> </div>
         <br><div class="main-edit-add"> <a class="btn-blue" onclick="mail_selected_vessels()" >Mail Document</a> </div> 
      </div>
    </div>
  </div>
</section>
<section id="work-done">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="input-group">
        <form onsubmit="searchEnter(document.getElementById('search_vessel').value); return false;">
          <input type="text" class="form-control-text" placeholder="Search" name="search" id="search_vessel">
        </form>
          <span class="input-group-btn">
      			<a class="btn btn-default text-muted" href="#" title="Clear" onclick="reset()"><i class="glyphicon glyphicon-remove"></i> </a>
      			<button onclick="search(document.getElementById('search_vessel').value)" type="button" class="btn btn-info">
      				<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
      			</button>
          </span>
        </div>
      </div>
      <div class="col-md-3">
        <div class="input-group">
          <select class="form-control-text" placeholder="Select" name="certificate_type" id="certificate_type">
            <option value="class">Class</option>
            <option value="flag">Flag</option>
            <option value="safety">Safety</option>
            <option value="management">Management</option>
            <option value="other">Other</option>
          </select>
          <span class="input-group-btn">
            <button onclick="searchtype(document.getElementById('certificate_type').value)" type="button" class="btn btn-info">
              <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
            </button>
          </span>
        </div>
     </div>
    </div>
    <div class="row">
		<div class="col-md-8">
			<button type="button" id="yellowclor" class="update text-center btn btn-yelow btn-sm"></button>
			&nbsp;<span>Due in 45 days</span>&nbsp;&nbsp;
			<button type="button" id="brownclr" class="update text-center btn btn-brwon btn-sm"></button>
			&nbsp;<span>Due in 30 days</span>&nbsp;&nbsp;
			<button type="button" id="redclor" class="update text-center btn btn-red btn-sm"></button>
			&nbsp;<span>Due Now or Overdue</span>&nbsp;&nbsp;
			<button type="button" id="greenclr" class="update text-center btn btn-green btn-sm"></button>
			&nbsp;<span>Valid More than 45 days</span>&nbsp;&nbsp;
		</div>
    </div>
    <div class="row">
      <div class="panel-body">
        <div class="table-responsive">
          <table id="tableselected" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th width="75" >Certificate No.</th>
                <th width="75" >Certificate Type</th>
                <th width="75" >Certificate Name</th>
                <th width="37" >Date of Issue</th>
                <th width="44" >Date of Expiry</th>
                <th width="70" >Extension until</th>
                <th width="71" >Exemption</th>
                <th width="33" class="text-center">View</th>
                <th width="42">Status</th>
                <th width="41">Select</th>
                <th width="110">Action</th>
              </tr>
            </thead>
            <tbody>
		<?php foreach($certificate_data as $data)
				{ ?>
				  <?php
					  $now = time(); 

					  $expiry_date = strtotime($data['date_expiry']);
					  $extention_date = strtotime($data['extention_until']);
					  $caldays = $expiry_date - $now;
					  if($extention_date>$now && $extention_date>$expiry_date)
					  {
						$caldays = $extention_date - $expiry_date; 
						$calday =  round($caldays / (60 * 60 * 24));
					  }
					  $calday =  round($caldays / (60 * 60 * 24));

					?>
					<?php if($calday>30 && $calday<=45) { ?>
						<tr class="text-center" id="yellow">
					<?php  }
					elseif($calday>=1 && $calday<=30) {?>
						<tr class="text-center" id="brown">
					<?php }
					elseif($calday<=0) { ?>
						<tr class="text-center" id="red">
					<?php }
					elseif($calday>45){ ?>
						<tr class="text-center" id="green">
					<?php } ?>
							<td><?php echo $data['certificate_no']; ?></td>
							<td><?php echo ucwords($data['certificate_type']); ?></td>
							<td><?php echo $data['certificate_name']; ?></td>
							<td><?php echo date("d/m/Y",strtotime($data['date_issue']));?></td>
							<td><?php echo date("d/m/Y",strtotime($data['date_expiry']));?></td>
							<td><?php echo (($data['extention_until']) ? date("d/m/Y",strtotime($data['extention_until'])) : 'N/A');?></td>
							<td><?php echo ($data['examption'] ? $data['examption'] : 'N/A'); ?></td>
							<td class="text-center">
								<a href="<?php echo base_url(); ?>index.php/VesselCertificate/view_certificate/<?php echo $data['certificate_id']; ?>" class="btn btn-primary"> View</a>
							</td>
							<td>
								  <?php if($calday>30 && $calday<=45) { ?>
									<button type="button" class="update text-center btn btn-yelow btn-sm"></button>
								  <?php }
								  elseif($calday>=1 && $calday<=30) { ?>
									<button type="button" class="update text-center btn btn-brwon btn-sm"></button>
									<span id="text"></span>
								  <?php } 
								  elseif($calday<=0) { ?>
									<button type="button" class="update text-center btn btn-red btn-sm"></button>
								  <?php }
								  elseif($calday>45) { ?>
									<button type="button" class="update text-center btn btn-green btn-sm"></button>
								  <?php } ?>
							</td>
							<td>
								<input type="checkbox" name="checkbox" id="checkbox<?php echo $data['certificate_id']; ?>">
							</td>
							<td class="text-center">
								<a href="<?php echo base_url();?>index.php/DeleteCertificate/index/<?php echo $data['certificate_id']; ?>/<?php echo $data['vessel_id']; ?>" Onclick="return confirm('Are you Sure?');" class="btn-bk">
									<i class="fa fa-trash" aria-hidden="true"></i>
								</a>
								<a href="<?php echo base_url();?>index.php/VesselCertificate/edit_certificate/<?php echo $data['certificate_id']; ?>" class="btn-bk">
									<i class="fa fa-pencil" aria-hidden="true"></i>
								</a>
							</td>
						</tr>
		<?php } ?>
            </tbody>
          </table>

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
            
  </div>
</section>
<?php
include'includes/footer.php';
?>
<script>
  function search(search_vessel)
{
    if(search_vessel == "")
    {
        alert("Please enter a value to be searched");
    }
    else
    {
            window.location.href = "<?php echo base_url(); ?>index.php/VesselCertificate/searchdata/"+search_vessel+"/"+<?php echo $data['vessel_id'] ?>;
    }
}
function searchEnter(search_vessel)
{
    if(search_vessel == "")
    {
        alert("Please enter a value to be searched");
    }
    else
    {
            window.location.href = "<?php echo base_url(); ?>index.php/VesselCertificate/searchdata/"+search_vessel+"/"+<?php echo $data['vessel_id'] ?>;
    }
}
 function searchtype(certificate_type)
{
    if(certificate_type == "")
    {
        alert("Please enter a value to be searched");
    }
    else
    {
            window.location.href = "<?php echo base_url(); ?>index.php/VesselCertificate/search_certificate_type/"+certificate_type+"/"+<?php echo $data['vessel_id'] ?>;
    }
}
function reset(search_vessel)
{
  $('#search_vessel').val('');
  window.location.href = "<?php echo base_url(); ?>index.php/VesselCertificate/index/"+<?php echo $data['vessel_id'] ?>;
}
function mail_details(certificate_id) 
{ 
    var email = prompt("Please enter the Email of recepient:", "abc@gmail.com");
    if (email != null) {
        window.location.href = "<?php echo site_url(); ?>/MailCertificateDetail/index/"+certificate_id+"/"+email;
    }
}
$("#yellowclor").click(function() {
$("tbody tr#yellow").each(function() {       
    $('tbody tr#yellow').show();
  $('#green,#red,#brown').hide();
});
});
$("#redclor").click(function() {
$("tbody tr#red").each(function() {       
   $('tbody tr#red').show();
  $('#green,#yellow,#brown').hide();
});
});
$("#brownclr").click(function() {
$("tbody tr#brown").each(function() {       
   $('tbody tr#brown').show();
  $('#green,#yellow,#red').hide();
});
});

$("#greenclr").click(function() {
$("tbody tr#green").each(function() {       
   $('tbody tr#green').show();
  $('#brown,#yellow,#red').hide();
});
});

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
    var email = prompt("Please enter the Email of recepient:", "abc@gmail.com");
    if (email != null) {
        checkbox_ids = checkbox_ids.slice(0,-1)
        window.location.href = "<?php echo site_url(); ?>/MailCertificateDetail/multiple_vessels/"+checkbox_ids+"/"+email;
    }

}

</script>