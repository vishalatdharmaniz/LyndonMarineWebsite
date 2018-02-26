<?php
include'includes/CheckUserLogin.php';
include'includes/header_login.php';
?>
<section id="main-edit">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
          <h2>Plans Form </h2>
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
          <form action="<?php echo base_url(); ?>index.php/AddPlans/index/<?php echo $vessel_id;?>" method="post" enctype="multipart/form-data">
            
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Plan No</label>
                <input type="text" name="plan_no" required placeholder="Plan No" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Plan Name</label>
                <input type="text" name="plan_name" required placeholder="Plan Name" class="form-control-text">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-12">
                <label class="control-label">Description</label>
                <input type="text" name="description" required placeholder="Description" class="form-control-text">
              </div>
              	
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Upload Plan</label>
                <input type="file" name="upload_plan1" accept="pdf, rtf, excel/*">
              </div>
              <div class="form-group col-md-6">
               <label class="control-label">Upload Plan</label>
                <input type="file" name="upload_plan2" accept="pdf, rtf, excel/*">
              </div>
            </div>
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