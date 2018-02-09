<?php
include'includes/header_login.php';
?>

<style>
  #errmsg
{
color: red;
}
</style>
<section id="main-edit">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
          <h2>Add Vessel</h2>
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
          <form method="post" action="<?php echo base_url(); ?>index.php/AddVessel/index" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-4"> 
                <label class="control-label">Upload Images:</label>
              </div>
            </div>
             <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Image1 </label>
                  <input required type="file" id="image1-chosen" name="image1" accept="image/*">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Image2</label>
                  <input id="image2-chosen" type="file" name="image2" accept="image/*">
                  <button type="button" class="btn btn-danger" id="remove-image2" style="margin-top:10px;">Remove</button>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Image3</label>
                  <input id="image3-chosen" type="file" name="image3" accept="image/*">
                  <button type="button" class="btn btn-danger" id="remove-image3" style="margin-top:10px;">Remove</button>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Image4 </label>
                  <input id="image4-chosen" type="file" name="image4" accept="image/*">
                  <button type="button" class="btn btn-danger" id="remove-image4" style="margin-top:10px;">Remove</button>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Image5</label>
                  <input id="image5-chosen" type="file" name="image5" accept="image/*">
                  <button type="button" class="btn btn-danger" id="remove-image5" style="margin-top:10px;">Remove</button>
                </div>
              </div>
            </div>
           
		    <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Owner Name</label>
                <input required type="text" placeholder="Owner Name" name="owner_name" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Owner Address</label>
                <input required type="text" placeholder="Owner address" name="owner_address" class="form-control-text">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Owner Email</label>
                <input required type="text" placeholder="Owner Email" name="owner_email" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Owner Contact Number</label>
                <input required type="text" placeholder="Owner contact number" name="owner_contact_number" class="form-control-text">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Manager Name </label>
                <input required type="text" placeholder="Manager Name" name="manager_name" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Manager Address</label>
                <input required type="text" placeholder="Manager address" name="manager_address" class="form-control-text">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Manager Email</label>
                <input required type="text" placeholder="Manager Email" name="manager_email" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Manager Contact Number</label>
                <input required type="text" placeholder="Manager contact number" name="manager_contact_number" class="form-control-text">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Agency</label>
                <input required type="text" placeholder="Agency" name="agency" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Agency Address</label>
                <input required type="text" placeholder="Agency Address" name="agency_address" class="form-control-text">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Agency Email Address</label>
                <input required type="text" placeholder="Agency Email Address" name="agency_email" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Agency Contact Number</label>
                <input required type="text" placeholder="Agency contact number" name="agency_contact_number" class="form-control-text">
              </div>
            </div>
			<div class="row">
				<div class="form-group col-md-6">
					<label class="control-label">Select Vessel Type</label>
					<select name="vessel_type" required placeholder="Select Vessel Type" class="form-control-text">
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
                <input type="text" required placeholder="DWT" id="dwt" name="dwt" id="dwt" class="form-control-text">&nbsp;<span id="errmsg"></span>
              </div>
            </div>
            <div class="row">
				<div class="form-group col-md-6">
					<label class="control-label">IMO Number</label>
					<input type="text" required placeholder="IMO Number" id="imo_number" name="imo_number" class="form-control-text" onblur='check_imo_exists();'>
					<span class="imomessage"></span>
				</div>
				<div class="form-group col-md-6">
                <label class="control-label">LOA</label>
                <input type="text" required placeholder="LOA" name="loa" class="form-control-text">
              </div>
             
			  
            </div>
            <div class="row">
				<div class="form-group col-md-6">
                <label class="control-label">Vessel Name</label>
                <input type="text" required placeholder="Vessel Name" name="vessel_name" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Vessel Breadth </label>
                <input type="text" required placeholder="Vessel Breadth " name="vessel_breadth" class="form-control-text">
              </div>
              
            </div>
            <div class="row">
				<div class="form-group col-md-6">
                <label class="control-label">Year Built</label>
                <input type="text" required placeholder="Year Built" name="year_built" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Vessel Depth</label>
                <input type="text" required placeholder="Vessel Depth" name="vessel_depth" class="form-control-text">
              </div>
              <!--div class="form-group col-md-6">
                <label class="control-label">Price Idea</label>
                <input type="text" required placeholder="Price Idea" name="price_idea" class="form-control-text">
              </div-->
            </div>
         
            <div class="row">
			    <div class="form-group col-md-6">
                <label class="control-label">Place Built </label>
                <input type="text" required placeholder="Place Built" name="place_built" class="form-control-text">
              </div>
               <div class="form-group col-md-6">
                <label class="control-label">Grain</label>
                <input type="text" required placeholder="Grain" name="grain" id="grain" class="form-control-text number1">
              </div>
              <!--div class="form-group col-md-6">
                <label class="control-label">Short Description</label>
                <input type="text" required placeholder="Short Description" name="short_description" class="form-control-text">
              </div-->
              
            </div>
             <div class="row">
              <!--div class="form-group col-md-6">
                <label class="control-label">Select Currency</label>
                <select name="currency" required placeholder="Select Currency" class="form-control-text">
                  <option></option>
                    <option value="USD"> USD </option>
                    <option value="GBP"> GBP </option>
                    <option value="Euro"> Euro </option>
                    
                </select>
              </div-->
              <div class="form-group col-md-6">
					<label class="control-label">Date</label>
					<input type="text" required placeholder="Date" name="vessel_date" id="datepicker" class="form-control-text">
				</div>
              <div class="form-group col-md-6">
                <label class="control-label">Bale</label>
                <input type="text" required placeholder="Bale" name="bale" id="bale" class="form-control-text number2">
              </div>
              
            </div>
             <div class="row">
              
              <!--div class="form-group col-md-6">
                <label class="control-label">Vessel Location</label>
                <input type="text" required placeholder="Vessel Location" name="vessel_location" class="form-control-text">
              </div-->
            </div>
            <div class="row">
			<div class="form-group col-md-6">
                <label class="control-label">Flag</label>
                <input type="text" required placeholder="Flag" name="flag" class="form-control-text">
				</div>
              
              <div class="form-group col-md-6">
                <label class="control-label">Status</label>
                <select name="status" required placeholder="Choose a Status" class="form-control-text">
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
                <input type="text" required placeholder="Class" name="class_no" class="form-control-text">
              </div>
			  <div class="form-group col-md-6">
				<label class="control-label">Role</label>
				<select name="role" required placeholder="Choose a Role" class="form-control-text">
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
      				  <textarea required name="full_description" class="form-control" id="full_description" type="text" placeholder="Long-Drescription"></textarea>
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
          </div>   
          <input type="hidden" value="0" name="image1-removed" id="image1-removed">
        <input type="hidden" name="image2-removed" id="image2-removed">
        <input type="hidden" name="image3-removed" id="image3-removed">
        <input type="hidden" name="image4-removed" id="image4-removed">
        <input type="hidden" name="image5-removed" id="image5-removed">

            <button id="save_button" type="submit" name="submit" class="btn btn-black">Save </button>
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
    $( "#datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' }).val();
    
  } );

  function check_imo_exists() 
{
    var imo_number = $("#imo_number").val();

    $.ajax(
        {
            type:"post",
            url: "<?php echo base_url(); ?>index.php/CheckImoExistence/index",
            data:{imo_number:imo_number},
            success:function(response)
            {
                if (response == true) 
                {
                  document.getElementsByClassName('imomessage')[0].style.color = 'Red';
                  document.getElementsByClassName('imomessage')[0].innerHTML = 'IMO Number already exists';
                  document.getElementById("save_button").disabled = true;
                }
                else 
                {
                  document.getElementsByClassName('imomessage')[0].style.color = 'green';
                  document.getElementsByClassName('imomessage')[0].innerHTML = '';
                  document.getElementById("save_button").disabled = false;
                }  
            }
        });
}
</script>
<script>

var el = document.querySelector('input#grain');
el.addEventListener('keyup', function (event) {
  if (event.which >= 37 && event.which <= 40) return;

  this.value = this.value.replace(/\D/g, '')
                         .replace(/\B(?=(\d{3})+(?!\d))/g,'');
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

// $("#remove-image1").click(function(){
//      alert("Photo 1 cannot be empty");
//     });
      
 $("#remove-image2").click(function(){
      document.getElementById("image2-removed").value = '1';
      // document.getElementById("show-image2").style.display = 'none';
    });
      $("#remove-image3").click(function(){
      document.getElementById("image3-removed").value = '1';
      // document.getElementById("show-image3").style.display = 'none';
    });
      $("#remove-image4").click(function(){
      document.getElementById("image4-removed").value = '1';
      // document.getElementById("show-image4").style.display = 'none';
    });
      $("#remove-image5").click(function(){
      document.getElementById("image5-removed").value = '1';
      // document.getElementById("show-image5").style.display = 'none';
    });

$("#image1-chosen").click(function(){
      document.getElementById("image2-removed").value = '0';
      // document.getElementById("show-image2").style.display = 'none';
    });

$("#image2-chosen").click(function(){
      document.getElementById("image2-removed").value = '0';
      // document.getElementById("show-image2").style.display = 'none';
    });
      $("#image3-chosen").click(function(){
      document.getElementById("image3-removed").value = '0';
      // document.getElementById("show-image3").style.display = 'none';
    });
      $("#image4-chosen").click(function(){
      document.getElementById("image4-removed").value = '0';
      // document.getElementById("show-image4").style.display = 'none';
    });
      $("#image5-chosen").click(function(){
      document.getElementById("image5-removed").value = '0';
      // document.getElementById("show-image5").style.display = 'none';
    });
</script>