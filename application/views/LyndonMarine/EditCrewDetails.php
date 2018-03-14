<?php
include'includes/header_login.php';
include'includes/CheckUserLogin.php';
?>
<section id="main-edit">
  <div class="container">
    
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
          <h2>Edit Crew Details </h2> <br>
        </div> 
      </div>
    </div>  
  </div>
</section>
<section id="main-editone">
  <?php 
   foreach ($crew_details as $data) 
   {
    $crew_id=$data['crew_id'];
    $name=$data['name'];
    $tourist_p_num=$data['tourist_p_num'];
    $seaman_p_num=$data['seaman_p_num'];
    $rank=$data['rank'];
    $salary=$data['salary'];
    $join_date=$data['join_date'];
    $nationality=$data['nationality'];
    $remark=$data['remark'];
    $document=$data['document']; 
   }


  ?>
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="form-action">
          <form method="post" action="<?php echo base_url(); ?>index.php/EditCrew/index/<?php echo $crew_id ; ?>" enctype="multipart/form-data">
            
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Name</label>
                <input type="text" placeholder="Name" name="name" value="<?php echo $name ; ?>" required class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Tourist Passport Number</label>
                <input type="text" placeholder="Tourist Passport Number" value="<?php echo $tourist_p_num ; ?>" required name="tourist_p_num" class="form-control-text">
              </div>
            </div>
            <div class="row">
               <div class="form-group col-md-6">
                <label class="control-label">Seaman Passport Number</label>
                <input type="text" placeholder="Seaman Passport Number" value="<?php echo $seaman_p_num ; ?>" name="seaman_p_num" required class="form-control-text">
              </div>
               <div class="form-group col-md-6">
                <label class="control-label">Rank</label>
                <input type="text" placeholder="Rank" name="rank" value="<?php echo $rank ; ?>" required class="form-control-text">
              </div>
            </div>
            
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Salary (USD)</label>
                <input type="text" placeholder="Salary (USD)" name="salary" value="<?php echo $salary ; ?>" required class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Join Date</label>
                <input type="text" id="datepicker1" placeholder="Join Date" value="<?php echo $join_date ; ?>" name="join_date" class="form-control-text">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Nationality</label>
                <input type="text" placeholder="Nationality" name="nationality" value="<?php echo $nationality ; ?>" required class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Remark</label>
                <input type="text" placeholder="Remark" name="remark" value="<?php echo $remark ; ?>"  class="form-control-text">
              </div>
            </div>
             <div class="row">
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label">Upload Document: </label>
                    <input type="file" id="document-chosen" name="document"  accept="png, jpg/*"><br>
                  </div>
                  <div class="col-md-8">
                    <br>
                    <?php if(!empty($document)) {?>
                    
                      <span id = "show-document">
                      <a href="<?php echo $document ;  ?>" class="btn btn-primary"> View</a>&nbsp;
                      <?php $value = explode("/",$document );
                       echo substr($value[6],0,25); ?>
                       <button type="button"  class="btn btn-danger" id="remove-document" style="margin-left:10px;">Remove</button>
                      </span>
                      
                      <?php } 
                      else { ?>
                      <span> No Document Available </span>
                      <?php } ?>
                       <input type="hidden" name="document-removed" id="document-removed">
                  </div>
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
<script>
  $( function() {
    $( "#datepicker1" ).datepicker({ dateFormat: 'dd/mm/yy' }).val();
  } );
    $('#selectedvalue').hide();
  $("#remove-document").click(function(){
      document.getElementById("document-removed").value = '1';
      document.getElementById("show-document").style.display = 'none';
    });

$("#document-chosen").click(function(){
      document.getElementById("document-removed").value = '0';
  
    });
</script>