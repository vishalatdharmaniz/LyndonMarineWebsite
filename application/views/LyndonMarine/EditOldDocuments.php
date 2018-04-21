<?php
include'includes/header_login.php';
include'includes/CheckUserLogin.php';
?>

<section id="main-edit">
  <div class="container">
    
    <div class="row">
        <div class="main-edit-add-left"> <a class="btn-blue" href="<?php echo base_url();?>index.php/VesselOldDocuments/index/<?php echo $vessel_id; ?>">Go Back</a>             
        </div>     
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
          <h2>Edit Old Documents Form</h2> <br>
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
          <?php
            foreach ($old_documents_data as $data)
           {
               
               $document_name=$data['name'];
               $description=$data['description'];
               $document1=$data['document1'];
               $document2=$data['document2'];
               $document_id=$data['document_id'];
               $vessel_id=$data['vessel_id'];
            }

          ?>
          <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/EditOldDocuments/Edit/<?php echo $document_id; ?>/<?php echo $vessel_id; ?>" >
           <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Document Name</label>
                <input type="text" placeholder="Document Name" name="document_name" value="<?php echo $document_name; ?>" required class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Description</label>
                <input type="text" placeholder="Description" name="description"  value="<?php echo $description; ?>" required class="form-control-text">
              </div>
            </div>
           <div class="row">
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label">Upload Document (Max Size 64mb)</label>
                    <input type="file" id="document1-chosen" name="document1"><br>
                  </div>
                  <div class="col-md-8" id="document_view">
                    <br>
                    <?php if(!empty($document1 )) {?>
                    
                      <span id = "show-document1">
                      <a href="<?php echo $document1; ?>" class="btn btn-primary"> View</a>&nbsp;
                      <?php $value = explode("/",$document1 );
                       echo substr($value[7],0,25); ?>
                       <button type="button"  class="btn btn-danger" id="remove-document1" style="margin-left:10px;">Remove</button>
                      </span>
                      
                      <?php } 
                      else { ?>
                      <span> No Document Available </span>
                      <?php } ?>
                  </div>
                    <input type="hidden" name="document1-removed" id="document1-removed">
                </div>
            </div>
             <div class="row">
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label">Upload Document (Max Size 64mb)</label>
                    <input type="file" id="document2-chosen" name="document2"><br>
                  </div>
                  <div class="col-md-8" id="document_view">
                    <br>
                    <?php if(!empty($document2 )) {?>
                    
                      <span id = "show-document2">
                      <a href="<?php echo $document2; ?>" class="btn btn-primary"> View</a>&nbsp;
                      <?php $value = explode("/",$document2 );
                       echo substr($value[7],0,25); ?>
                       <button type="button"  class="btn btn-danger" id="remove-document2" style="margin-left:10px;">Remove</button>
                      </span>
                      
                      <?php } 
                      else { ?>
                      <span> No Document Available </span>
                      <?php } ?>
                  </div>
                    <input type="hidden" name="document2-removed" id="document2-removed">
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