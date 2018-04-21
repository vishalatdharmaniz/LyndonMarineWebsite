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
        <div class="main-edit-add"> <a class="btn-blue" href="<?php echo base_url();?>index.php/VesselOldDocuments/index/<?php echo $vessel_id; ?>">Go Back</a> </div>       
      </div>
      <div class="col-md-offset-1 col-md-6">
        <div class="page-heading">
          <h2>View Old Documents </h2>
        </div>
      </div>
       <div class="col-md-2">
        <div class="main-edit-add"> <a class="btn-blue" href="<?php echo base_url();?>index.php/EditOldDocuments/index/<?php echo $document_id; ?>/<?php echo $vessel_id; ?>">Edit</a> </div>       
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
                foreach ($documents_data as $data)
                 {
                $document_name=$data['document_name'];
                $description=$data['description'];
                $document1=$data['document1'];
                $document2=$data['document2'];
                }
                ?>
                <tr>
                  <th width="40%">Document Name</th>
                  <th width="60%"><?php echo $document_name; ?></th>
                
                </tr>
                <tr>
                  <th scope="row">Description</th>
                  <td><?php echo $description; ?></td>
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
                        <span><?php $value = explode("/",$document1);echo substr($value[7],0,25); ?></span>
                        <?php } 
                        else { ?>
                       <!-- <span> No Document Available </span>-->
                        <?php } ?>
                    </li>   
                    <li> 
                        <?php if(!empty($document2)) {?>
                        <a href="<?php echo $document2; ?>" target="_blank"><img src="<?php echo base_url(); ?>img/icon_for_documents.PNG" class="img-responsive">  </a><br>
                        <span><?php $value = explode("/",$document2);echo substr($value[7],0,25); ?></span>
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
