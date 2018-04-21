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
                  $document1=$data['document1'];
                  $document2=$data['document2'];
                  $document3=$data['document3'];
                  $document4=$data['document4'];
                  $document5=$data['document5'];
                  $document6=$data['document6'];
                  $document7=$data['document7'];
                  $document8=$data['document8'];
                  $document9=$data['document9'];
                  $document10=$data['document10'];
                  $document11=$data['document11'];
                  $document12=$data['document12'];
                  $document13=$data['document13'];
                  $document14=$data['document14'];
                  $document15=$data['document15'];
                  $document16=$data['document16'];
                  $document17=$data['document17'];
                  $document18=$data['document18'];
                  $document19=$data['document19'];
                  $document20=$data['document20'];
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
                          <?php if(!empty($document1)) {?>
                          <a href="<?php echo $document1; ?>" target="_blank"><img src="<?php echo base_url(); ?>img/icon_for_documents.PNG" class="img-responsive">  </a><br>
                          <span><?php $value = explode("/",$document1);echo substr($value[6],0,20); ?></span>
                          <?php } 
                          else { ?>
                         <!-- <span> No Document Available </span>-->
                          <?php } ?>
                      </li>
                      <li>
                          <?php if(!empty($document2)) {?>
                          <a href="<?php echo $document2; ?>" target="_blank"><img src="<?php echo base_url(); ?>img/icon_for_documents.PNG" class="img-responsive">  </a><br>
                          <span><?php $value = explode("/",$document2);echo substr($value[6],0,20); ?></span>
                          <?php } 
                          else { ?>
                         <!-- <span> No Document Available </span>-->
                          <?php } ?>
                      </li>
                      <li>
                          <?php if(!empty($document3)) {?>
                          <a href="<?php echo $document3; ?>" target="_blank"><img src="<?php echo base_url(); ?>img/icon_for_documents.PNG" class="img-responsive">  </a><br>
                          <span><?php $value = explode("/",$document3);echo substr($value[6],0,20); ?></span>
                          <?php } 
                          else { ?>
                         <!-- <span> No Document Available </span>-->
                          <?php } ?>
                      </li>
                      <li>
                          <?php if(!empty($document4)) {?>
                          <a href="<?php echo $document4; ?>" target="_blank"><img src="<?php echo base_url(); ?>img/icon_for_documents.PNG" class="img-responsive">  </a><br>
                          <span><?php $value = explode("/",$document4);echo substr($value[6],0,20); ?></span>
                          <?php } 
                          else { ?>
                         <!-- <span> No Document Available </span>-->
                          <?php } ?>
                      </li>
                      <li>
                          <?php if(!empty($document5)) {?>
                          <a href="<?php echo $document5; ?>" target="_blank"><img src="<?php echo base_url(); ?>img/icon_for_documents.PNG" class="img-responsive">  </a><br>
                          <span><?php $value = explode("/",$document5);echo substr($value[6],0,20); ?></span>
                          <?php } 
                          else { ?>
                         <!-- <span> No Document Available </span>-->
                          <?php } ?>
                      </li>
                      <li>
                          <?php if(!empty($document6)) {?>
                          <a href="<?php echo $document6; ?>" target="_blank"><img src="<?php echo base_url(); ?>img/icon_for_documents.PNG" class="img-responsive">  </a><br>
                          <span><?php $value = explode("/",$document6);echo substr($value[6],0,20); ?></span>
                          <?php } 
                          else { ?>
                         <!-- <span> No Document Available </span>-->
                          <?php } ?>
                      </li>
                      <li>
                          <?php if(!empty($document7)) {?>
                          <a href="<?php echo $document7; ?>" target="_blank"><img src="<?php echo base_url(); ?>img/icon_for_documents.PNG" class="img-responsive">  </a><br>
                          <span><?php $value = explode("/",$document7);echo substr($value[6],0,20); ?></span>
                          <?php } 
                          else { ?>
                         <!-- <span> No Document Available </span>-->
                          <?php } ?>
                      </li>
                      <li>
                          <?php if(!empty($document8)) {?>
                          <a href="<?php echo $document8; ?>" target="_blank"><img src="<?php echo base_url(); ?>img/icon_for_documents.PNG" class="img-responsive">  </a><br>
                          <span><?php $value = explode("/",$document8);echo substr($value[6],0,20); ?></span>
                          <?php } 
                          else { ?>
                         <!-- <span> No Document Available </span>-->
                          <?php } ?>
                      </li>
                      <li>
                          <?php if(!empty($document9)) {?>
                          <a href="<?php echo $document9; ?>" target="_blank"><img src="<?php echo base_url(); ?>img/icon_for_documents.PNG" class="img-responsive">  </a><br>
                          <span><?php $value = explode("/",$document9);echo substr($value[6],0,20); ?></span>
                          <?php } 
                          else { ?>
                         <!-- <span> No Document Available </span>-->
                          <?php } ?>
                      </li>
               
                      <li>
                          <?php if(!empty($document10)) {?>
                          <a href="<?php echo $document10; ?>" target="_blank"><img src="<?php echo base_url(); ?>img/icon_for_documents.PNG" class="img-responsive">  </a><br>
                          <span><?php $value = explode("/",$document10);echo substr($value[6],0,20); ?></span>
                          <?php } 
                          else { ?>
                         <!-- <span> No Document Available </span>-->
                          <?php } ?>
                      </li>
                </ul>
                <ul>
                      <li>
                          <?php if(!empty($document11)) {?>
                          <a href="<?php echo $document11; ?>" target="_blank"><img src="<?php echo base_url(); ?>img/icon_for_documents.PNG" class="img-responsive">  </a><br>
                          <span><?php $value = explode("/",$document11);echo substr($value[6],0,20); ?></span>
                          <?php } 
                          else { ?>
                         <!-- <span> No Document Available </span>-->
                          <?php } ?>
                      </li>
                      <li>
                          <?php if(!empty($document12)) {?>
                          <a href="<?php echo $document12; ?>" target="_blank"><img src="<?php echo base_url(); ?>img/icon_for_documents.PNG" class="img-responsive">  </a><br>
                          <span><?php $value = explode("/",$document12);echo substr($value[6],0,20); ?></span>
                          <?php } 
                          else { ?>
                         <!-- <span> No Document Available </span>-->
                          <?php } ?>
                      </li>
                      <li>
                          <?php if(!empty($document13)) {?>
                          <a href="<?php echo $document13; ?>" target="_blank"><img src="<?php echo base_url(); ?>img/icon_for_documents.PNG" class="img-responsive">  </a><br>
                          <span><?php $value = explode("/",$document13);echo substr($value[6],0,20); ?></span>
                          <?php } 
                          else { ?>
                         <!-- <span> No Document Available </span>-->
                          <?php } ?>
                      </li>
                      <li>
                          <?php if(!empty($document14)) {?>
                          <a href="<?php echo $document14; ?>" target="_blank"><img src="<?php echo base_url(); ?>img/icon_for_documents.PNG" class="img-responsive">  </a><br>
                          <span><?php $value = explode("/",$document14);echo substr($value[6],0,20); ?></span>
                          <?php } 
                          else { ?>
                         <!-- <span> No Document Available </span>-->
                          <?php } ?>
                      </li>
                      <li>
                          <?php if(!empty($document15)) {?>
                          <a href="<?php echo $document15; ?>" target="_blank"><img src="<?php echo base_url(); ?>img/icon_for_documents.PNG" class="img-responsive">  </a><br>
                          <span><?php $value = explode("/",$document15);echo substr($value[6],0,20); ?></span>
                          <?php } 
                          else { ?>
                         <!-- <span> No Document Available </span>-->
                          <?php } ?>
                      </li>
                      <li>
                          <?php if(!empty($document16)) {?>
                          <a href="<?php echo $document16; ?>" target="_blank"><img src="<?php echo base_url(); ?>img/icon_for_documents.PNG" class="img-responsive">  </a><br>
                          <span><?php $value = explode("/",$document16);echo substr($value[6],0,20); ?></span>
                          <?php } 
                          else { ?>
                         <!-- <span> No Document Available </span>-->
                          <?php } ?>
                      </li>
                      <li>
                          <?php if(!empty($document17)) {?>
                          <a href="<?php echo $document17; ?>" target="_blank"><img src="<?php echo base_url(); ?>img/icon_for_documents.PNG" class="img-responsive">  </a><br>
                          <span><?php $value = explode("/",$document17);echo substr($value[6],0,20); ?></span>
                          <?php } 
                          else { ?>
                         <!-- <span> No Document Available </span>-->
                          <?php } ?>
                      </li>
                      <li>
                          <?php if(!empty($document18)) {?>
                          <a href="<?php echo $document18; ?>" target="_blank"><img src="<?php echo base_url(); ?>img/icon_for_documents.PNG" class="img-responsive">  </a><br>
                          <span><?php $value = explode("/",$document18);echo substr($value[6],0,20); ?></span>
                          <?php } 
                          else { ?>
                         <!-- <span> No Document Available </span>-->
                          <?php } ?>
                      </li>
                      <li>
                          <?php if(!empty($document19)) {?>
                          <a href="<?php echo $document19; ?>" target="_blank"><img src="<?php echo base_url(); ?>img/icon_for_documents.PNG" class="img-responsive">  </a><br>
                          <span><?php $value = explode("/",$document19);echo substr($value[6],0,20); ?></span>
                          <?php } 
                          else { ?>
                         <!-- <span> No Document Available </span>-->
                          <?php } ?>
                      </li>
                      <li>
                          <?php if(!empty($document20)) {?>
                          <a href="<?php echo $document20; ?>" target="_blank"><img src="<?php echo base_url(); ?>img/icon_for_documents.PNG" class="img-responsive">  </a><br>
                          <span><?php $value = explode("/",$document20);echo substr($value[6],0,20); ?></span>
                          <?php } 
                          else { ?>
                         <!-- <span> No Document Available </span>-->
                          <?php } ?>
                      </li>
                  
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