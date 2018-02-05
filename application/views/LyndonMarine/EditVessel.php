<?php
include'includes/header_login.php';
?>
<section id="main-edit">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
          <h2>Edit Vessel</h2>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="main-editone">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
      <?php foreach($vessel_details as $vessels) { ?>
        <div class="form-action">
          <form action="<?php echo base_url(); ?>index.php/EditVessel/index/<?php echo $vessels['vessel_id']; ?>" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-4"> 
                <label class="control-label">Upload Images:</label>
              </div>
            </div>
             <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Image1 </label>
                  <input type="file" name="image1" accept="image/*">
                  <span id="remove" name="cross"><img id="delimg" src="<?php echo $vessels['image1']; ?>" style="width:100px; height:100px;" alt="" class="img-responsive">
                  <?php if(!empty($vessels['image1'])) { $value = explode("uploads/",$vessels['image1']);echo substr($value[1],0,10); } else { echo "";}?>
                  X</span>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Image2</label>
                  <input type="file" name="image2" accept="image/*">
                  <img src="<?php echo $vessels['image2']; ?>" style="width:100px; height:100px;" alt="" class="img-responsive">
                  <?php if(!empty($vessels['image2'])) { $value = explode("uploads/",$vessels['image2']);echo substr($value[1],0,10); } else { echo "";}?>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Image3</label>
                  <input type="file" name="image3" accept="image/*">
                  <img src="<?php echo $vessels['image3']; ?>" style="width:100px; height:100px;" alt="" class="img-responsive">
                  <?php if(!empty($vessels['image3'])) { $value = explode("uploads/",$vessels['image3']);echo substr($value[1],0,10); } else { echo "";}?>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Image4 </label>
                  <input type="file" name="image4" accept="image/*">
                  <img src="<?php echo $vessels['image4']; ?>" style="width:100px; height:100px;" alt="" class="img-responsive">
                  <?php if(!empty($vessels['image4'])) { $value = explode("uploads/",$vessels['image4']);echo substr($value[1],0,10); } else { echo "";}?>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Image5</label>
                  <input type="file" name="image5" accept="image/*">
                  <img src="<?php echo $vessels['image5']; ?>" style="width:100px; height:100px;" alt="" class="img-responsive">
                  <?php if(!empty($vessels['image5'])) { $value = explode("uploads/",$vessels['image5']);echo substr($value[1],0,10); } else { echo "";}?>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Owner Name</label>
                <input required type="text" placeholder="Owner Name" name="owner_name" class="form-control-text" value="<?php echo $vessels['owner_name']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Owner Address</label>
                <input required type="text" placeholder="Owner address" name="owner_address" class="form-control-text" value="<?php echo $vessels['owner_address']; ?>">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Owner Email</label>
                <input required type="text" placeholder="Owner Email" name="owner_email" class="form-control-text" value="<?php echo $vessels['owner_email']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Owner Contact Number</label>
                <input required type="text" placeholder="Owner contact number" name="owner_contact_number" class="form-control-text" value="<?php echo $vessels['owner_contact_number']; ?>">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Manager Name </label>
                <input required type="text" placeholder="Manager Name" name="manager_name" class="form-control-text" value="<?php echo $vessels['manager_name']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Manager Address</label>
                <input required type="text" placeholder="Manager address" name="manager_address" class="form-control-text" value="<?php echo $vessels['manager_address']; ?>">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Manager Email</label>
                <input required type="text" placeholder="Manager Email" name="manager_email" class="form-control-text" value="<?php echo $vessels['manager_email']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Manager Contact Number</label>
                <input required type="text" placeholder="Manager contact number" name="manager_contact_number" class="form-control-text" value="<?php echo $vessels['manager_contact_number']; ?>">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Agency</label>
                <input required type="text" placeholder="Agency" name="agency" class="form-control-text" value="<?php echo $vessels['agency']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Agency Address</label>
                <input required type="text" placeholder="Agency" name="agency_address" class="form-control-text" value="<?php echo $vessels['agency_address']; ?>">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Agency Email Address</label>
                <input required type="text" placeholder="Agency Email" name="agency_email" class="form-control-text" value="<?php echo $vessels['agency_email']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Agency Contact Number</label>
                <input required type="text" placeholder="Agency contact number" name="agency_contact_number" class="form-control-text" value="<?php echo $vessels['agency_contact_number']; ?>">
              </div>
            </div>
            <div class="row">
             <div class="form-group col-md-6">
                <label class="control-label">Select Vessel Type</label>
                <select name="vessel_type" required placeholder="Select Vessel Type" class="form-control-text">
                  <option selected id="select_vessel_type"><?php echo ucwords($vessels['vessel_type']); ?></option>
                    <option value="General Cargo">General Cargo</option>
                    <option value="Container">Container</option>
                    <option value="Bulk Carrier">Bulk Carrier</option>
                    <option value="Tug">Tug</option>
                    <option value="Yacht/Boat">Yacht/Boat</option>
                    <option value="Cement Carrier">Cement Carrier</option>
                    <option value="Tanker">Tanker</option>
                    <option value="Gaz Carrier">Gaz Carrier</option>
                    <option value="Fishing Vessel">Fishing Vessel</option>
                    <option value="Passenger Ship">Passenger Ship</option>
                    <option value="Multipurpose">Multipurpose</option>
                    <option value="Pallet Carrier">Pallet Carrier</option>
                    <option value="Ro ro">Ro Ro</option>
                    <option value="Refeer">Refeer</option>
                </select>
              </div>
			  <div class="form-group col-md-6">
                <label class="control-label">DWT</label>
                <input type="text" required placeholder="DWT" name="dwt" id="dwt" class="form-control-text" value="<?php echo number_format($vessels['dwt']); ?>">
              </div>
                
            </div>
            <div class="row">
              
              <div class="form-group col-md-6">
                <label class="control-label">IMO Number</label>
                <input type="text" required placeholder="IMO Number" name="imo_number" class="form-control-text" value="<?php echo $vessels['imo_number']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">LOA</label>
                <input type="text" required placeholder="LOA" name="loa" class="form-control-text" value="<?php echo $vessels['loa']; ?>">
              </div>
            </div>
			<div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Vessel Name</label>
                <input type="text" required placeholder="Vessel Name" name="vessel_name" class="form-control-text" value="<?php echo $vessels['vessel_name']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Vessel Breadth </label>
                <input type="text" required placeholder="Vessel Breadth " name="vessel_breadth" class="form-control-text" value="<?php echo $vessels['vessel_breadth']; ?>">
              </div>
              <!--div class="form-group col-md-6">
                <label class="control-label">Price Idea</label>
                <input type="text" required placeholder="Price Idea" name="price_idea" class="form-control-text" value="<?php echo $vessels['price_idea']; ?>">
              </div-->
            </div>
            <div class="row">
			<div class="form-group col-md-6">
                <label class="control-label">Year Built</label>
                <input type="text" required placeholder="Year Built" name="year_built" class="form-control-text" value="<?php echo $vessels['year_built']; ?>">
              </div>
			  <div class="form-group col-md-6">
                <label class="control-label">Vessel Depth</label>
                <input type="text" required placeholder="Vessel Depth" name="vessel_depth" class="form-control-text" value="<?php echo $vessels['vessel_depth']; ?>">
              </div>
              
             
            </div>
            
            
            <div class="row">
              
              
              <!--div class="form-group col-md-6">
                <label class="control-label">Short Description</label>
                <input type="text" required placeholder="Short Description" name="short_description" class="form-control-text" value="<?php echo $vessels['short_description']; ?>">
              </div-->
              <!--div class="form-group col-md-6">
                <label class="control-label">Select Currency</label>
                <select name="currency" required placeholder="Select Currency" class="form-control-text">
                  <option selected><?php echo $vessels['currency']; ?></option>
                    <option value="USD"> USD </option>
                    <option value="GBP"> GBP </option>
                    <option value="Euro"> Euro </option>
                    
                </select>
              </div-->
            </div>
            <div class="row">
              
              <div class="form-group col-md-6">
                <label class="control-label">Place Built </label>
                <input type="text" required placeholder="Place Built" name="place_built" class="form-control-text" value="<?php echo $vessels['place_built']; ?>">
              </div>
			  <div class="form-group col-md-6">
                <label class="control-label">Grain</label>
                <input type="text" required placeholder="Grain" name="grain" id="grain" class="form-control-text" value="<?php echo number_format($vessels['grain']); ?>">
              </div>
            </div>
             <div class="row">
				<div class="form-group col-md-6">
                <label class="control-label">Date</label>
                <input type="text" required placeholder="Date" name="vessel_date" id="datepicker" class="form-control-text" value="<?php echo date("d/m/Y",strtotime($vessels['vessel_date'])); ?>">
              </div>
               <div class="form-group col-md-6">
                <label class="control-label">Bale</label>
                <input type="text" required placeholder="Bale" name="bale" id="bale" class="form-control-text" value="<?php echo number_format($vessels['bale']); ?>">
              </div>
              <!--div class="form-group col-md-6">
                <label class="control-label">Vessel Location</label>
                <input type="text" required placeholder="Vessel Location" name="vessel_location" class="form-control-text" value="<?php echo $vessels['vessel_location']; ?>">
              </div-->
             
            </div>
            <div class="row">
			`
			  <div class="form-group col-md-6">
                <label class="control-label">Flag</label>
                <input type="text" required placeholder="Flag" name="flag" class="form-control-text" value="<?php echo $vessels['flag']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Status</label>
                <select required name="status" id="status" placeholder="Choose a Status" class="form-control-text">
                  <option selected id="select_status"><?php echo ucwords($vessels['status']); ?></option>
                  <option value="active"> Active </option>
                  <option value="suspended"> Suspended </option>
                  <option value="scrapped"> Scrapped </option>
                  <option value="sold"> Sold </option>    
                </select>
              </div>
             
            </div>
            <div class="row">
               <div class="form-group col-md-6">
                <label class="control-label">Class</label>
                <input type="text" required placeholder="Class" name="class_no" class="form-control-text" value="<?php echo $vessels['class_no']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Role</label>
                <select name="role" required placeholder="Choose a Role" class="form-control-text">
                  <option selected id="selected_role"><?php echo ucwords($vessels['role']); ?></option>
                    <option value="admin"> Admin </option>
                    <option value="user1"> User1 </option>
                    <option value="user2"> User2 </option>
                    <option value="staff"> Staff </option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="control-label">Description</label>
                  <textarea required name="full_description" class="form-control" id="full_description" type="text" placeholder="Long-Drescription"><?php echo $vessels['full_description']; ?></textarea>
                  <br>
                  <span class="txtmsg"></span>
                  <script>
                    CKEDITOR.replace( 'full_description' );
                    $("form").submit( function(e) {
                        var messageLength = CKEDITOR.instances['full_description'].getData().replace(/<[^>]*>/gi, '').length;
                        if( !messageLength ) {
                          $( ".txtmsg" ).html("<b>Please enter a Description...</b>").css('color','#FF0000');
                            
                            e.preventDefault();
                        }
                    });
                </script>   
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-black">Save </button>

          </form>
        </div>
           <?php } ?>
      </div>
    </div>
  </div>
</section>
<?php
include'includes/footer.php';
?>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' }).val();
   
  } );
</script>
<script>

var el = document.querySelector('input#grain');
el.addEventListener('keyup', function (event) {
  if (event.which >= 37 && event.which <= 40) return;

  this.value = this.value.replace(/\D/g, '')
                         .replace(/\B(?=(\d{3})+(?!\d))/g, '');
});
var el = document.querySelector('input#bale');
el.addEventListener('keyup', function (event) {
  if (event.which >= 37 && event.which <= 40) return;

  this.value = this.value.replace(/\D/g, '')
                         .replace(/\B(?=(\d{3})+(?!\d))/g, '');
});
var el = document.querySelector('input#dwt');
el.addEventListener('keyup', function (event) {
  if (event.which >= 37 && event.which <= 40) return;

  this.value = this.value.replace(/\D/g, '')
                         .replace(/\B(?=(\d{3})+(?!\d))/g, '');
});
</script>
<script>
  $('#remove').click(function () {
    $('#delimg').hide();
    
});
$('#select_vessel_type,#select_status,#selected_role').hide();
</script>