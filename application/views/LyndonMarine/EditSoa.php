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
             $from_date=$data['from_date'];
             $to_date=$data['to_date'];
             $currency=$data['currency'];
            }

          ?>
          <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/EditSoa/edit_soa/<?php echo $soa_id; ?>" >
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">SOA No.</label>
                <input type="text" placeholder="SOA No." name="soa_num" value="<?php echo $soa_num; ?>" required class="form-control-text">
              </div>
              <div class="form-group col-md-6">
               <label class="control-label">Currency</label>
               <select required class="form-control-text" required id="sel1" name="currency">
                  <option selected value="" disabled>Select </option>
                  <option <?php if($currency=="GBP"){echo "selected=selected";} ?> value="GBP">GBP</option>
                  <option <?php if($currency=="USD"){echo "selected=selected";} ?> value="USD">USD</option>
                  <option <?php if($currency=="EURO"){echo "selected=selected";} ?> value="EURO">EURO</option>
                </select>
              </div>
              
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">From Date</label>
                <input type="text" id="datepicker1" placeholder="Date" name="from_date" value="<?php echo $from_date; ?>"  required class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">To Date</label>
                <input type="text" id="datepicker2" placeholder="Date" name="to_date" value="<?php echo $to_date; ?>"  required class="form-control-text">
              </div> 
            </div>
           <div class="row">
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label">Upload Document (Max Size 64mb)</label>
                    <input type="file" id="document1-chosen" name="document" accept="png, jpg/*"><br>
                  </div>
                  <div class="col-md-8" id="document_view">
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
    $( "#datepicker2" ).datepicker({ dateFormat: 'dd/mm/yy' }).val();
  } );

  $("#remove-document1").click(function(){
      document.getElementById("document1-removed").value = '1';
      document.getElementById("show-document1").style.display = 'none';
    });
  
$("#document1-chosen").click(function(){
      document.getElementById("document1-removed").value = '0';
      // document.getElementById("show-document1").style.display = 'none';
    });
 var dateToday = $('#date_expiry').val();
var dates = $("#datepicker1,#datepicker2").datepicker({
    dateFormat: 'dd/mm/yy',
    minDate: dateToday,
    onSelect: function(selectedDate) {
        var option = this.id == "datepicker1" ? "minDate" : "maxDate",
            instance = $(this).data("datepicker"),
            date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
        dates.not(this).datepicker("option", option, date);
    }
});
</script>