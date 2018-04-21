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
        <div class="main-edit-add"> <a class="btn-blue" href="<?php echo base_url();?>index.php/VesselSoa/index/<?php echo $vessel_id; ?>">Go Back</a> </div>       
      </div>
      <div class="col-md-offset-1 col-md-6">
        <div class="page-heading">
          <h2>View SOA </h2>
        </div>
      </div>
       <div class="col-md-2">
        <div class="main-edit-add"> <a class="btn-blue" href="<?php echo base_url();?>index.php/EditSoa/index/<?php echo $vessel_id; ?>">Edit</a> </div>       
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
                foreach ($soa_data as $data)
                 {
                $soa_num=$data['soa_num'];
                $soa_date=$data['soa_date'];
                $currency=$data['currency'];
                $document=$data['document'];
                }
                ?>
                <tr>
                  <th width="40%">SOA No.</th>
                  <th width="60%"><?php echo $soa_num; ?></th>
                
                </tr>
                <tr>
                  <th scope="row">Date</th>
                  <td><?php echo $soa_date; ?></td>
                </tr>
                <tr>
                  <th scope="row">Currency</th>
                  <td><?php echo $currency; ?></td>  
                </tr>
              </tbody>  
          </table>
            </div>
            <div class="row">
            	<div class="doc-img">
                	<ul>
                    	<li> 
                      <?php if(!empty($document)) {?>
                      <a href="<?php echo $document; ?>" target="_blank"><img src="http://via.placeholder.com/100x100" class="img-responsive"> </a><br>
                      <span><?php $value = explode("/",$document);echo substr($value[6],0,20); ?></span>
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
