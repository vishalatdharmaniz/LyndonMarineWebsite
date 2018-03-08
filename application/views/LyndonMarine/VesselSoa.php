<?php
include'includes/header_login.php';
include'includes/CheckUserLogin.php';
?>

<section id="main-edit">
  <div class="container">
    
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
          <h2>SOA</h2> <br>
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
      <!-- <div class="input-group">
        <form onsubmit="searchEnter(document.getElementById('search_crew').value); return false;">
          <input type="text" class="form-control-text" placeholder="Search" name="search" id="search_crew">
        </form>
          <span class="input-group-btn">
            <a class="btn btn-default text-muted" href="" title="Clear" onclick="reset()"><i class="glyphicon glyphicon-remove"></i> </a>
            <button onclick="search(document.getElementById('search_crew').value)" type="button" class="btn btn-info">
              <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
            </button>
          </span>
        </div> -->
      </div>
      
      <div class="col-md-5">
        <div class="list_right">
        <ul class="main-edit-add"> 
            <li>
              <a class="btn-blue" href="<?php echo base_url();?>index.php/VesselSoa/AddSoaScreen/<?php echo $vessel_id; ?>">Add </a>
            </li>
       <!--  <li><a class="btn-blue" onclick="mail_selected_vessels()" >Mail Selected Document</a></li> -->
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
                <th class="text-center">SOA No.</th>
                <th class="text-center">Date</th>
                <th class="text-center">Currency</th>
                <th class="text-center">Document</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                foreach ($soa_data as $data) 
                {
                  $soa_id=$data['soa_id'];
                  $soa_num=$data['soa_num'];
                $date=$data['soa_date'];
                $currency=$data['currency'];
          
                ?>
                <tr>
                  <td class="text-center"><?php echo $soa_num; ?></td>
                  <td class="text-center"><?php echo $date; ?></td>
                  <td class="text-center"><?php echo $currency; ?></td>
                  <td class="text-center">
                 <a href="<?php echo base_url(); ?>index.php/VesselSoa/ViewSoa/<?php echo $soa_id; ?>" class="btn btn-primary">View
                  </td>
                  <!-- <td class="text-center">
                    <input type="checkbox" name="checkbox" id="checkbox<?php echo $data['soa_id']; ?>">
                </td> -->
               <td class="text-center">
                  <a href="<?php echo base_url();?>index.php/DeleteSoa/index/<?php echo $data['soa_id']; ?>/<?php echo $data['vessel_id']; ?>" Onclick="return confirm('Are you Sure?');" class="btn-bk">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                  </a>
                  <a href="<?php echo base_url();?>index.php/EditSoa/index/<?php echo $data['vessel_id']; ?>" class="btn-bk">
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
</section>

<?php 
include 'includes/footer.php';
?>