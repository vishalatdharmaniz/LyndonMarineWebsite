<?php
include'includes/CheckUserLogin.php';
include'includes/header_login.php';
?>
<section id="main-edit">
  <div class="container"> 
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
          <h2>Vessel Old Documents for  
            <?php foreach ($vessel_data as $data) 
                  {
                    echo $data['vessel_name'];
                  } 
               ?> </h2>
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
              <a class="btn-blue" href="<?php echo base_url(); ?>index.php/AddOldDocuments/index/<?php echo $vessel_id; ?>">Add</a>
            </li> 
             <li>
              <a class="btn-blue" href="<?php echo base_url(); ?>index.php/VesselOldDocuments/index/<?php echo $vessel_id; ?>">All Documents</a>
            </li> 
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
              
                <th class="text-center">Document Name</th>
                <th class="text-center">Description</th>
                <th class="text-center">Documents</th>
                <th class="text-center">Select</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                  foreach ($old_documents_data as $data)
                   {
                   
                   $document_name=$data['name'];
                   $description=$data['description'];
                   $document1=$data['document1'];
                   $document2=$data['document2'];
                   $document_id=$data['document_id'];
              ?>
           
              <tr>
                <td class="text-center"><?php echo $document_name; ?></td>
                <td class="text-center"><?php echo $description; ?></td>
                <td class="text-center"><a href="<?php echo base_url(); ?>index.php/VesselOldDocuments/view/<?php echo $document_id; ?>" class="btn btn-primary"> View</a></td>
                <td class="text-center">
                <input type="checkbox" name="checkbox" id="checkbox<?php echo $document_id; ?>">
              </td>
              <td class="text-center">
                <a href="<?php echo base_url(); ?>index.php/VesselOldDocuments/delete/<?php echo $document_id; ?>/<?php echo $vessel_id; ?>" Onclick="return confirm('Are you Sure?');" class="btn-bk">
                  <i class="fa fa-trash" aria-hidden="true"></i>
                </a>
                <a href="<?php echo base_url(); ?>index.php/EditOldDocuments/index/<?php echo $document_id; ?>/<?php echo $data['vessel_id']; ?>" class="btn-bk">
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

}
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
}

</script>