<?php
include'includes/header_login.php';
?>
<section id="main-edit">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
          <h2>Edit Vessel Recommendation Form</h2>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="main-editone">
                  <?php foreach($recommendation_data as $data) 
                                { 
                                  $recommendation_id=$data['recommendation_id'] ;  
                                  $vessel_id=$data['vessel_id'] ; 
                                  $recommendation_type=$data['recommendation_type'] ;  
                                  $recommendation_date=$data['recommendation_date'] ; 
                                  $due_date=$data['due_date'] ; 
                                  $description=$data['description'] ; 
                                  $rectified_status=$data['rectified_status'] ;
                                  $rectified_date=$data['rectified_date'] ; 
                                  $rectified_by=$data['rectified_by'] ; 
                                  $reminder=$data['reminder'] ; 
                                  $image1=$data['image1'] ; 
                                  $image2=$data['image2'] ; 
                                  $image3=$data['image3'] ; 

                                }
                              ?>
  <div class="container">

    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="form-action">
          <form method="post" action="<?php echo base_url(); ?>index.php/EditRecommendation/edit_recommendation/<?php echo $recommendation_id; ?>" enctype="multipart/form-data">
           
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Type of Recommendation</label>
                <select required class="form-control-text" id="sel1" name="recommendation_type" >
                  <option ><?php echo $recommendation_type ; ?></option>
                  <option value="management">Management</option>
                  <option value="text2">dummy text</option>
                  <option value="text3">dummy text</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Recommendation Date</label>
                <input type="text" id="datepicker1" name="recommendation_date" value="<?Php echo date("d-m-Y",strtotime($recommendation_date)); ?>" class="form-control-text">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Due Date</label>
                <input type="text" id="datepicker2" name="due_date" value="<?Php echo date("d-m-Y",strtotime($due_date)); ?>" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Description</label>
                <input type="text" name="description" value="<?Php echo $description; ?>" class="form-control-text">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-12">
                  <p>Is it get rectified</p>
                <label class="control-label">Yes 
                <input type="radio" name="rectified_status" value=" Yes"<?php echo ($rectified_status== 'Yes') ?  "checked" : "" ;  ?>"></label>
                 <label class="control-label">No
                <input type="radio" name="rectified_status" value="No"<?php echo ($rectified_status== 'No') ?  "checked" : "" ;  ?>"></label>
                Show Rectified Date and Rectified by only when it gets rectified.
              </div>
              
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Rectifed  Date</label>
                <input type="text" id="datepicker3" name="rectified_date" value="<?Php echo $rectified_date; ?>" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Rectifed  By </label>
                <input type="text" name="rectified_by" value="<?Php echo $rectified_by; ?>" class="form-control-text">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-12">
                <label class="control-label">Reminder (days)</label>
                <input type="text" name="reminder" value="<?Php echo $reminder; ?>" class="form-control-text">
              </div>
             
            </div>
           <div class="row">
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label">Upload Image </label>
                    <input type="file" id="document1-chosen" name="image1"  accept="png, jpg/*"><br>
                  </div>
                  <div class="col-md-8">
                    <br>
                    <?php if(!empty($image1 )) {?>
                    
                      <span id = "show-document1">
                      <a href="<?php echo $image1 ;  ?>" class="btn btn-primary"> View</a>&nbsp;
                      <?php $value = explode("/",$image1 );
                       echo substr($value[6],0,25); ?>
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
                    <label class="control-label">Upload Image </label>
                    <input type="file" id="document2-chosen"  name="image2" accept="png, jpg/*"><br>
                  </div>
                  <div class="col-md-8">
                    <br>
                    <?php if(!empty($image2)) {?>
                    
                      <span id = "show-document2">
                      <a href="<?php echo $image2 ; ?>" class="btn btn-primary"> View</a>&nbsp;
                       <?php $value = explode("/",$image2);
                        echo substr($value[6],0,25); ?>   
                        <button type="button"  class="btn btn-danger" id="remove-document2" style="margin-left:10px;">Remove</button>
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
                    <label class="control-label">Upload Image </label>
                    <input type="file" id="document3-chosen" name="image3" accept="png, jpg/*"><br>
                  </div>
                  <div class="col-md-8">
                    <br>
                    <?php if(!empty($image3)) {?>
                    
                      <span id = "show-document3">
                      <a href="<?php echo $image3 ; ?>" class="btn btn-primary"> View</a>&nbsp;
                       <?php $value = explode("/",$image3);
                        echo substr($value[6],0,25); ?>   
                        <button type="button"  class="btn btn-danger" id="remove-document3" style="margin-left:10px;">Remove</button>
                      </span>
                      <?php } 
                      else { ?>
                      <span> No Document Available </span>
                      <?php } ?>
                  </div>
                </div>
            </div>
           <input type="hidden" name="document1-removed" id="document1-removed">
           <input type="hidden" name="document2-removed" id="document2-removed">
            <input type="hidden" name="document3-removed"  id="document3-removed">
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
    $( "#datepicker2" ).datepicker({ dateFormat: 'dd/mm/yy' }).val();
     $( "#datepicker3" ).datepicker({ dateFormat: 'dd/mm/yy' }).val();
  } );
</script>
<script>
  $("#remove-document1").click(function(){
      document.getElementById("document1-removed").value = '1';
      document.getElementById("show-document1").style.display = 'none';
    });
      $("#remove-document2").click(function(){
      document.getElementById("document2-removed").value = '1';
      document.getElementById("show-document2").style.display = 'none';
    });
      $("#remove-document3").click(function(){
      document.getElementById("document3-removed").value = '1';
      document.getElementById("show-document3").style.display = 'none';
    });

$("#document1-chosen").click(function(){
      document.getElementById("document1-removed").value = '0';
      // document.getElementById("show-document1").style.display = 'none';
    });
      $("#document2-chosen").click(function(){
      document.getElementById("document2-removed").value = '0';
      // document.getElementById("show-document2").style.display = 'none';
    });
   $("#document3-chosen").click(function(){
      document.getElementById("document3-removed").value = '0';
      // document.getElementById("show-document2").style.display = 'none';
    });
   
</script>