<?php
include'includes/CheckUserLogin.php';
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
        <div class="main-edit-add"> <a class="btn-blue" href="<?php echo base_url();?>index.php/Vessel_fixture/index/<?php echo $vessel_id; ?>">Go Back</a> </div>       
      </div>
      <div class="col-md-offset-1 col-md-6">
        <div class="page-heading">
          <h2>View Fixture </h2>
        </div>
      </div>
        <div class="col-md-2">
        <div class="main-edit-add"> <a class="btn-blue" href="<?php echo base_url();?>index.php/EditFixture/index/<?php echo $id; ?>/<?php echo $vessel_id; ?>">Edit</a> </div>       
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
                <?php 
                  foreach ($fixture_data as $data ) 
                  {
                  
                    $fixture_no=$data['fixture_no'];
                    $fixture_date=strtotime($data['fixture_date']);
                    $fixture_date=date("d-m-Y",$fixture_date);
                    $loading_port=$data['loading_port'];
                    $discharging_port=$data['discharging_port'];
                    $fright=$data['fright'];
                    $currency=$data['currency'];
                    $bokers=$data['bokers'];
                    $commission=$data['commission'];
                    $remarks=$data['remarks'];
                    $contract=$data['contract'];   
                    $invoice=$data['invoice'];
                  }

                ?>
                <tr>
                  <th width="40%">Fixture No</th>
                  <th width="60%"><?php echo $fixture_no; ?></th>
                
                </tr>
                <tr>
                  <th scope="row">Fixture Date</th>
                  <td><?php echo $fixture_date; ?></td>
                </tr>
                <tr>
                  <th scope="row">Loading Port</th>
                  <td><?php echo $loading_port; ?></td>  
                </tr>
                <tr>
                  <th scope="row">Discharging Port</th>
                  <td><?php echo $discharging_port; ?></td>  
                </tr>
                
                <tr>
                  <th scope="row">Freight</th>
                  <td><?php echo $fright; ?></td>  
                </tr>
                
                <tr>
                  <th scope="row">Currency</th>
                  <td><?php echo $currency; ?></td>  
                </tr>
                
                <tr>
                  <th scope="row">Bokers</th>
                  <td><?php echo $bokers; ?></td>  
                </tr>
                
                <tr>
                  <th scope="row">Commission</th>
                  <td><?php echo $commission; ?></td>  
                </tr>
                <tr>
                  <th scope="row">Remarks</th>
                  <td><?php echo $remarks; ?></td>  
                </tr>
                
              </tbody>
               
              </table>
            </div>
            <div class="row">
              <div class="doc-img">
                  <ul>
                      <li> 
                      <?php if(!empty($contract)) {?>
                      <a href="<?php echo $contract; ?>" target="_blank"><img src="http://via.placeholder.com/100x100" class="img-responsive"> </a><br>
                      <span><?php $value = explode("/",$contract);echo substr($value[6],0,25); ?></span>
                      <?php } 
                      else { ?>
                     <!-- <span> No Document Available </span>-->
                      <?php } ?></li>
                      
                      <li>
                      <?php if(!empty($invoice)) {?>
                      <a href="<?php echo $invoice; ?>" target="_blank"><img src="http://via.placeholder.com/100x100" class="img-responsive"> </a><br>
                      <span><?php $value = explode("/",$invoice);echo substr($value[6],0,25); ?></span>
                      <?php } 
                      else { ?>
                     <!-- <span> No Document Available </span>-->
                      <?php } ?></li> 
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
