<?php
include'includes/header_login.php';
include'includes/CheckUserLogin.php';
?>

<section id="main-edit">
  <div class="container">
    
    <div class="row">
        <div class="main-edit-add-left"> <a class="btn-blue" href="<?php echo base_url();?>index.php/VesselSoa/index/<?php echo $vessel_id; ?>">Go Back</a>             
        </div>     
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
          <h2>EDIT SOA</h2> <br>
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
            foreach ($soa_data as $data) 
            {
             $soa_id= $data['soa_id']; 
             $soa_num=$data['soa_num']; 
             $soa_date=$data['soa_date']; 
             $currency=$data['currency']; 
             $document=$data['document']; 
            }

          ?>
          <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/EditSoa/edit_soa/<?php echo $soa_id; ?>" >
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">SOA No.</label>
                <input type="text" placeholder="SOA No." name="soa_num" value="<?php echo $soa_num; ?>" required class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Date</label>
                <input type="text" id="datepicker1" placeholder="Date" name="date" value="<?php echo $soa_date; ?>"  required class="form-control-text">
              </div>
            </div>
            <div class="row">
               <div class="form-group col-md-12">
               <label class="control-label">Currency</label>
               <select required class="form-control-text" required id="sel1" name="currency">
                  <option><?php echo $currency; ?></option>
                  <option value="GBP">GBP</option>
                  <option value="USD">USD</option>
                  <option value="EURO">EURO</option>
                </select>
              </div>
            </div>
           <div class="row">
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label">Upload Document </label>
                    <input type="file" id="document1-chosen" name="document" accept="png, jpg/*"><br>
                  </div>
                  <div class="col-md-8">
                    <br>
                    <?php if(!empty($document )) {?>
                    
                      <span id = "show-document1">
                      <a href="<?php echo $document; ?>" class="btn btn-primary"> View</a>&nbsp;
                      <?php $value = explode("/",$document );
                       echo substr($value[6],0,25); ?>
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
  $( function() {
    $( "#datepicker1" ).datepicker({ dateFormat: 'dd/mm/yy' }).val();
  } );
  $("#remove-document1").click(function(){
      document.getElementById("document1-removed").value = '1';
      document.getElementById("show-document1").style.display = 'none';
    });
  
$("#document1-chosen").click(function(){
      document.getElementById("document1-removed").value = '0';
      // document.getElementById("show-document1").style.display = 'none';
    });
</script>