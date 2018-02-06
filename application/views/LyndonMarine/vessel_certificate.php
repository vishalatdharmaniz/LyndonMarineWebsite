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
      <?php
       // $all_checked = array();
       // foreach($certificate_data as $data) 
       //  {   
       // include 'includes/GetCertificateIdsJs.php';
       //    }
       //    var_dump($all_checked);
       ?>
      <div class="col-md-3">
        <div class="main-edit-add"> <a class="btn-blue" href="<?php echo base_url();?>index.php/AddCertificateScreen/index/<?php echo $vessel_id; ?>">Add</a> </div>
        <br>
        <div class="main-edit-add"> <a class="btn-blue" href="<?php echo base_url(); ?>index.php/VesselCertificate/index/<?php echo $vessel_id; ?>">All Certificate</a> </div>
         <!-- <br><div class="main-edit-add"> <a class="btn-blue" onclick="myFunction()" >Mail Document</a> </div>  -->
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
      <div class="col-md-6 col-md-offset-3">
        <div class="input-group">
       
          <input type="text" class="form-control-text" placeholder="Search" name="search" id="search_vessel">
          <span class="input-group-btn"> <a class="btn btn-default text-muted" href="#" title="Clear" onclick="reset()"><i class="glyphicon glyphicon-remove"></i> </a>
          <button onclick="search(document.getElementById('search_vessel').value)" type="button" class="btn btn-info"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
          </span>
          </div>
      </div>
    </div>
    
    
    <!--<div class="row">
      <div class="col-md-4">
        <input type="text" class="form-control-text" name="search" id="search_vessel">
        <button onclick="reset()" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <button onclick="search(document.getElementById('search_vessel').value)" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
      </div>
    </div>-->
    <div class="row">
      <div class="col-md-8"> <a>
        <button type="button" onclick="document.getElementsByClassName" class="update text-center btn btn-yelow btn-sm"></button>
        </a>&nbsp;<span>Due in 45 days</span>&nbsp;&nbsp;
        <button type="button" class="update text-center btn btn-brwon btn-sm"></button>
        &nbsp;<span>Due in 30 days</span>&nbsp;&nbsp;
        <button type="button" class="update text-center btn btn-red btn-sm"></button>
        &nbsp;<span>Due Now or Overdue</span>&nbsp;&nbsp;
        <button type="button" class="update text-center btn btn-green btn-sm"></button>
        &nbsp;<span>Valid More than 45 day</span>&nbsp;&nbsp; </div>
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
                <th width="110"></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($certificate_data as $data) { ?>
              <tr>
                <td><?php echo $data['certificate_no']; ?></td>
                <td><?php echo ucwords($data['certificate_type']); ?></td>
                <td><?php echo $data['certificate_name']; ?></td>
                <td><?php echo date("d/m/Y",strtotime($data['date_issue']));?></td>
                <td><?php echo date("d/m/Y",strtotime($data['date_expiry']));?></td>
                <td><?php echo (($data['extention_until']) ? date("d/m/Y",strtotime($data['extention_until'])) : 'N/A');?></td>
                <td><?php echo ($data['examption'] ? $data['examption'] : 'N/A'); ?></td>
                <td class="text-center"><a href="<?php echo base_url(); ?>index.php/VesselCertificate/view_certificate/<?php echo $data['certificate_id']; ?>" class="btn btn-primary"> View</a></td>
                <td><?php

                  $now = time(); 

                  $expiry_date = strtotime($data['date_expiry']);
                  $extention_date = strtotime($data['extention_until']);
                  $caldays = $expiry_date - $now;
                  if($extention_date>$now && $extention_date>$expiry_date)
                  {
                    $caldays = $extention_date - $expiry_date; 
                    $calday =  round($caldays / (60 * 60 * 24));//echo $calday;
                  }
                  $calday =  round($caldays / (60 * 60 * 24));

                ?>
                  <?php if($calday>30 && $calday<=45) { ?>
                  <button type="button" id="yellow" class="update text-center btn btn-yelow btn-sm"></button>
                  <?php }
                  elseif($calday>=1 && $calday<=30) {
                  ?>
                  <button type="button" id="browncolor" class="update text-center btn btn-brwon btn-sm"></button>
                  <span id="text"></span>
                  <?php } 
                  elseif($calday<=0) {
                  ?>
                  <button type="button" class="update text-center btn btn-red btn-sm"></button>
                  <?php }
                  elseif($calday>45) {
                    ?>
                  <button type="button" class="update text-center btn btn-green btn-sm"></button>
                  <?php } ?></td>
                <td><input type="checkbox" name="chkbx" class="checkid" id="<?php echo $data['certificate_id'] ?>" value="<?php echo $data['certificate_id']; ?>"></td>
                <td class="text-center"><a href="<?php echo base_url();?>index.php/DeleteCertificate/index/<?php echo $data['certificate_id']; ?>/<?php echo $data['vessel_id']; ?>" Onclick="return confirm('Are you Sure?');" class="btn-bk"><i class="fa fa-trash" aria-hidden="true"></i></a> <a href="<?php echo base_url();?>index.php/VesselCertificate/edit_certificate/<?php echo $data['certificate_id']; ?>" class="btn-bk"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
              </tr>
              <!--tr>
                <td>CM-HWR 2015</td>
                <td>Registry</td>
                <td>Flag</td>
                <td>5/14/2017</td>
                <td>12/20/2018</td>
                <td>N/A</td>
                 <td>Less than 500 GT</td>
                <td class="text-center"><a href="#" class="btn btn-primary">Click to View</td>
                  <td><button type="button" class="update text-center btn btn-primary btn-sm"></button></td>
              </tr>
               <tr>
                <td>3425235</td>
                <td>Loadline</td>
                <td>Class</td>
                <td>5/14/2017</td>
                <td>12/20/2017</td>
                <td>N/A</td>
                 <td>N/A</td>
                <td class="text-center"><a href="#" class="btn btn-primary">Click to View</td>
                  <td><button type="button" class="update text-center btn btn-success btn-sm"></button></td>
              </tr>
             <tr>
                <td>CM-HWR 2015</td>
                <td>Registry</td>
                <td>Flag</td>
                <td>5/14/2017</td>
                <td>12/20/2018</td>
                <td>N/A</td>
                 <td>Less than 500 GT</td>
                <td class="text-center"><a href="#" class="btn btn-primary">Click to View</td>
                  <td><button type="button" class="update text-center btn btn-danger btn-sm"></button></td>
              </tr-->
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<!--section id="work-done">
  <div class="container">
    
    <div class="row">
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <tbody>
            <?php// foreach($certificate_data as $data) { ?>
           <?php //if($data['reminder1']) { } ?>
              <tr>
                <td><button type="button" class="update text-center btn btn-warning btn-sm"></button></td>
                <td>Due in 45 days</td>
               
              </tr>
              <?php //} ?>
              <tr>
                <td><button type="button" class="update text-center btn btn-primary btn-sm"></button></td>
                <td>Due in 30 days</td>
               
              </tr>
              <tr>
                <td><button type="button" class="update text-center btn btn-danger btn-sm"></button></td>
                <td>Due Now or Overdue</td>
               
              </tr>
              <tr>
                <td><button type="button" class="update text-center btn btn-success btn-sm"></button></td>
                <td>Valid More than 45 day</td>
            
              </tr> 
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section-->
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

</script>