<?php
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
        <div class="main-edit-add"> <a class="btn-blue" href="<?php echo base_url();?>index.php/CrewDetails/index/<?php echo $vessel_id ; ?>">Go Back </a> 
        </div>   
      </div>
      <div class="col-md-offset-1 col-md-6">
        <div class="page-heading">
          <h2>View Crew Details </h2>
        </div>
      </div>
      <div class="col-md-2">
        <div class="main-edit-add"> <a class="btn-blue" href="<?php echo base_url();?>index.php/CrewDetails/EditCrew/<?php echo $crew_id ; ?>">Edit</a> 
        </div>   
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
                <?php foreach($crew_details as $data) 
                { 
                  $name=$data['name'] ; 
                  $tourist_p_number=$data['tourist_p_num'];
	              $seaman_p_number=$data['seaman_p_num'];
	              $rank=$data['rank'];
	              $salary=$data['salary']; 
                  $join_date=$data['join_date'];
                  $nationality=$data['nationality'];
                  $remark=$data['remark'];
                  $document=$data['document'];
                }
              ?>
                <tr>
                  <th width="40%">Name</th>
                  <th width="60%"><?php echo $name ; ?></th> 
                </tr>
                <tr>
                  <th scope="row">Tourist Passport No.</th>
                  <td> <?php echo $tourist_p_number ; ?> </td>
                </tr>
                <tr>
                  <th scope="row">Seaman Passport No.</th>
                  <td><?php echo $seaman_p_number ; ?> </td>  
                </tr>
                <tr>
                  <th scope="row">Rank</th>
                  <td><?php echo $rank ; ?> </td>  
                </tr>
                <tr>
                  <th scope="row">Salary</th>
                  <td><?php echo $salary ; ?> </td>  
                </tr>
                <tr>
                  <th scope="row">Joined On</th>
                  <td><?php echo $join_date ; ?> </td>  
                </tr>
                <tr>
                  <th scope="row">Nationality</th>
                  <td><?php echo $nationality ; ?> </td>  
                </tr> 
                <tr>
                  <th scope="row">Remarks</th>
                  <td><?php echo $remark ; ?> </td>  
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