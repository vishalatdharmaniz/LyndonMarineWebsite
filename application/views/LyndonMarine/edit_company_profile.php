<?php
include'includes/header_login.php';
?>
<section id="main-edit">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
          <h2>Edit Company Profile</h2>
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
          <form method="post" action="<?php echo base_url();?>index.php/EditCompanyProfile/index" enctype="multipart/form-data">
          <?php foreach($company_data as $company){ ?>
            <!-- <div class="row">
              <div class="form-group col-md-12">
                <label for="exampleInputEmail1">Profile Image </label>
                <input  type="file" name="profile_pic" accept="image/*">
              </div>
            </div> -->
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Name</label>
                <input type="text" placeholder="Name" name="name" class="form-control-text" value="<?php echo $company['name']; ?>">
              </div>
              
              <div class="form-group col-md-6">
                <label class="control-label">Organization</label>
                <input type="text" placeholder="Organization" name="organization" class="form-control-text" value="<?php echo $company['organization']; ?>">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Telephone</label>
                <input type="text" placeholder="0096343219033"  name="telephone" class="form-control-text" value="<?php echo $company['telephone']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Address</label>
                <input type="text" placeholder="Address" name="address" class="form-control-text" value="<?php echo $company['address']; ?>">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">City</label>
                <input type="text" placeholder="City" name="city" class="form-control-text" value="<?php echo $company['city']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Country</label>
                <input type="text" placeholder="Country" name="country" class="form-control-text" value="<?php echo $company['country']; ?>">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Account Type</label>
                <input type="text" placeholder="Account Type" name="account_type" class="form-control-text" value="<?php echo $company['account_type']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Notes</label>
                <textarea rows="10" placeholder="Notes " name="note" class="form-control-text"><?php echo $company['note']; ?></textarea>
              </div>
            </div>
            <button type="submit" class="btn btn-black">Save </button>
            <?php } ?>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
include'includes/footer.php';
?>

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profile-img").change(function(){
        readURL(this);
    });
  
  $('#profile-img-tag').click(function(){ $('#profile-img').trigger('click'); });
</script>