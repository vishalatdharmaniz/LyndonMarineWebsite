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
        <div class="main-edit-add"> <a class="btn-blue" href="<?php echo base_url();?>index.php/EditSoa/index/<?php echo $soa_id; ?>/<?php echo $vessel_id; ?>">Edit</a> </div>       
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
                 $soa_id= $data['soa_id']; 
                 $soa_num=$data['soa_num'];
                 $from_date=$data['from_date'];
                 $to_date=$data['to_date'];
                 $currency=$data['currency'];
                 $document=$data['document']; 
                }
                ?>
                <tr>
                  <th width="40%">SOA No.</th>
                  <th width="60%"><?php if($soa_num!=''){echo $soa_num;}else{echo "N/A";} ?></th>
                
                </tr>
                <tr>
                  <th scope="row">From Date</th>
                  <td><?php  if($from_date!=''){echo $from_date; }else{echo "N/A";}?></td>
                </tr>
                <tr>
                  <th scope="row">To Date</th>
                  <td><?php  if($to_date!=''){echo $to_date; }else{echo "N/A";} ?></td>
                </tr>
                <tr>
                  <th scope="row">Currency</th>
                  <td><?php  if($currency!=''){echo $currency; }else{echo "N/A";}?></td>  
                </tr>
              </tbody>  
          </table>
            </div>
            <div class="row">
            	<div class="doc-img">
                	<ul>
                    	<li> 
                      <?php if(!empty($document)) {?>
                      <a href="<?php echo $document; ?>" target="_blank">
                        <?php 
                        $matches = preg_match('/^.jpg/', substr($document,3), $matches, PREG_OFFSET_CAPTURE);
                        if($matches==0)
                        {
                          echo "<img src='$document;' height='100px' width='100px'> " ;
                        }
                        elseif ( $matches = preg_match('/^.png/', substr($document,3), $matches, PREG_OFFSET_CAPTURE)) {
                         echo "<img src='$document;'  height='100px' width='100px'> " ;
                        }
                        else
                        {
                         ?>
                        <img src="<?php echo base_url(); ?>img/icon_for_documents.PNG" class="img-responsive"> 
                        <?php } ?>
                         </a><br>
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
