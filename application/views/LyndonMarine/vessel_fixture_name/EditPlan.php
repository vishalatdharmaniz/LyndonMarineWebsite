<?php
include'includes/CheckUserLogin.php';
include'includes/header_login.php';
?>
<section id="main-edit">
  <div class="container">
    <div class="row">
        <div class="main-edit-add-left"> <a class="btn-blue" href="<?php echo base_url();?>index.php/VesselPlans/index/<?php echo $vessel_id; ?>">Go Back</a>             
        </div>     
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
          <h2>Edit Plan</h2>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="main-editone">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="form-action">
        <form action="<?php echo base_url(); ?>index.php/EditPlan/index/<?php echo $plans_id; ?>" method="post" enctype="multipart/form-data">
            
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Plan No</label>
                <input type="text" name="plan_no" required placeholder="Plan No" class="form-control-text" value="<?php echo $vessel_plans['plan_no']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Plan Name</label>
                <input type="text" name="plan_name" required placeholder="Plan Name" class="form-control-text" value="<?php echo $vessel_plans['plan_name']; ?>">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-12">
                <label class="control-label">Description</label>
                <input type="text" name="description" required placeholder="Description" class="form-control-text" value="<?php echo $vessel_plans['description']; ?>">
              </div>
                
            </div>
            <div class="row">
              <div class="col-md-4"> 
                <label class="control-label">Upload Certificates:</label>
              </div>
            </div>
            <div class="row">
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label">Upload Plan </label>
                    <input type="file" id="document1-chosen" name="upload_plan1" accept="pdf/*"><br>
                  </div>
                  <div class="col-md-8" id="document_view">
                    <br>
                    <?php if(!empty($vessel_plans['upload_plan1'])) {?>
                    
                      <span id = "show-document1">
                      <a href="<?php echo $vessel_plans['upload_plan1']; ?>" class="btn btn-primary"> View</a>&nbsp;
                      <?php $value = explode("/",$vessel_plans['upload_plan1']);echo substr($value[8],0,20); ?>
                        
                        <button type="button"  class="btn btn-danger" id="remove-document1" style="margin-left:10px;">Remove</button>
                      </span>
                      
                      <?php } 
                      else { ?>
                      <span> No Document Available </span>
                      <?php } ?>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label">Upload Plan</label>
                    <input type="file" id="document2-chosen" name="upload_plan2" accept="pdf/*"><br>
                  </div>
                  <div class="col-md-8" id="document_view">
                    <br>
                     <?php if(!empty($vessel_plans['upload_plan2'])) {?>
                      <span  id = "show-document2">
                        <a href="<?php echo $vessel_plans['upload_plan2']; ?>" class="btn btn-primary"> View</a>&nbsp;
                      <?php $value = explode("/",$vessel_plans['upload_plan2']);echo substr($value[8],0,20); ?>
                          
                          <button type="button"  class="btn btn-danger" id="remove-document2" style="margin-left:10px;">Remove</button>
                      </span>
                      
                      <?php } 
                      else { ?>
                      <span> No Document Available </span>
                      <?php } ?>
                  </div>
                </div>
            </div>
          
            <input type="hidden" name="document1-removed" id="document1-removed">
            <input type="hidden" name="document2-removed"  id="document2-removed">
             <button type="submit" class="btn btn-black">Save </button>
          </form>
        
        </div>
      </div>
    </div>
  </div>
</section>
<?php
include'includes/footer.php';
?>
<script>
  $("#remove-document1").click(function(){
      document.getElementById("document1-removed").value = '1';
      document.getElementById("show-document1").style.display = 'none';
    });
      $("#remove-document2").click(function(){
      document.getElementById("document2-removed").value = '1';
      document.getElementById("show-document2").style.display = 'none';
    });

$("#document1-chosen").click(function(){
      document.getElementById("document1-removed").value = '0';
      // document.getElementById("show-document1").style.display = 'none';
    });
      $("#document2-chosen").click(function(){
      document.getElementById("document2-removed").value = '0';
      // document.getElementById("show-document2").style.display = 'none';
    });
   
</script>