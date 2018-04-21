<?php
include'includes/header_login.php';
include'includes/CheckUserLogin.php';
?>
<section id="main-edit">
  <div class="container">
    <div class="row"> 
       <div class="col-md-2">
        <div class="main-edit-add"> <a class="btn-blue" href="<?php echo base_url();?>index.php/VesselOldDocuments/index/<?php echo $vessel_id ; ?>">Go Back </a> 
        </div>   
      </div>
      <div class="col-md-6 col-md-9">
        <div class="page-heading">
          <h2>Add Old Documents Form</h2>
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
          <form method="post" name="add_form" enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/AddOldDocuments/Add/<?php echo $vessel_id; ?>" >
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Document Name</label>
                <input type="text" placeholder="Document Name" name="document_name" required class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Description</label>
                <input type="text" placeholder="Description" name="description" required class="form-control-text">
              </div>
            </div>
            <div class="row">
               <div class="form-group col-md-6">
                  <label class="control-label">Upload Document (Max Size 64mb)</label>
                  <input type="file" placeholder="Upload Document" name="document1"  class="form-control-text">
               </div>
               <div class="form-group col-md-6">
                  <label class="control-label">Upload Document (Max Size 64mb)</label>
                  <input type="file" placeholder="Upload Document" name="document2" class="form-control-text">
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
include 'includes/footer.php';
?>
<script>