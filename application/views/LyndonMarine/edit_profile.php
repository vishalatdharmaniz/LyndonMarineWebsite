<?php
include'includes/header_login.php';
?>
<section id="main-edit">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
          <h2>Edit Profile</h2>
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
          <form method="post" action="<?php echo base_url();?>index.php/EditProfile/index" enctype="multipart/form-data">
          <?php foreach($user_data as $user){ ?>
            <div class="row">
              <div class="form-group col-md-12">
                <label for="exampleInputEmail1">Photo1 </label>
                <input  type="file" name="image" accept="image/*">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Username</label>
                <input type="text" placeholder="Username" name="username" class="form-control-text" value="<?php echo $user['username']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">First Name</label>
                <input type="text" placeholder="First Name" name="first_name" class="form-control-text" value="<?php echo $user['first_name']; ?>">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Surname</label>
                <input type="text" placeholder="Surname" name="last_name" class="form-control-text" value="<?php echo $user['last_name']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Organization</label>
                <input type="text" placeholder="Organization" name="organization" class="form-control-text" value="<?php echo $user['organization']; ?>">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Telephone</label>
                <input type="text" placeholder="0096343219033"  name="telephone" class="form-control-text" value="<?php echo $user['telephone']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Address</label>
                <input type="text" placeholder="Address" name="address" class="form-control-text" value="<?php echo $user['address']; ?>">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">City</label>
                <input type="text" placeholder="City" name="city" class="form-control-text" value="<?php echo $user['city']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Country</label>
                <input type="text" placeholder="Country" name="country" class="form-control-text" value="<?php echo $user['country']; ?>">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-12">
                <label class="control-label">Notes</label>
                <textarea rows="10" placeholder="type" name="note" class="form-control-text"><?php echo $user['note']; ?></textarea>
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